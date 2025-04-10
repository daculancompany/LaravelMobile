<?php

namespace App\Http\Controllers\API;  // Fixed typo in "error"

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;  // Added missing import

class CustomerController extends Controller
{
 
    public function index(Request $request)
    {
        $query = Customer::query();
        
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%")
                  ->orWhere('phone', 'like', "%$search%")
                  ->orWhere('address', 'like', "%$search%");
            });
        }
        
        // Pagination with configurable default
        $perPage = $request->input('per_page', config('app.default_per_page', 15));
        $customers = $query->paginate($perPage);
        
        return response()->json($customers);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:customers,email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $customer = Customer::create($validator->validated());
        
        return response()->json([
            'message' => 'Customer created successfully',
            'data' => $customer
        ], 201);
    }


    public function show(Customer $customer)
    {
        return response()->json([
            'data' => $customer,
            'recent_sales' => $customer->sales()
                ->with(['details.product' => function($query) {
                    $query->select('id', 'name', 'price');
                }])
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get()
        ]);
    }


    public function update(Request $request, Customer $customer)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|string|max:255',
            'email' => 'nullable|email|unique:customers,email,'.$customer->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $customer->update($validator->validated());
        
        return response()->json([
            'message' => 'Customer updated successfully',
            'data' => $customer
        ]);
    }


    public function destroy(Customer $customer)
    {
       
        if ($customer->sales()->exists()) {
            return response()->json([
                'message' => 'Cannot delete customer with sales history',
                'errors' => ['sales' => 'Customer has associated sales records']
            ], 422);
        }

        $customer->delete();
        
        return response()->json(null, 204);
    }

  
    public function stats(Customer $customer)
    {
        return response()->json([
            'total_sales' => $customer->sales()->count(),
            'total_spent' => $customer->sales()->sum('grand_total'),
            'average_order' => $customer->sales()->avg('grand_total'),
            'last_purchase' => $customer->sales()
                ->select('id', 'sale_date', 'grand_total')
                ->orderBy('sale_date', 'desc')
                ->first()
        ]);
    }
}