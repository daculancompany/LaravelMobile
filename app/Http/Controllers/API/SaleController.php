<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\SaleDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function index()
    {
        return response()->json(Sale::with(['customer', 'details.product'])->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'nullable|exists:customers,id',
            'sale_date' => 'required|date',
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'discount' => 'numeric|min:0',
            'tax' => 'numeric|min:0',
            'payment_method' => 'required|string'
        ]);

        return DB::transaction(function () use ($validated) {
            // Calculate totals
            $total = 0;
            foreach ($validated['items'] as $item) {
                $product = Product::find($item['product_id']);
                $total += $product->price * $item['quantity'];
            }

            $grandTotal = $total - $validated['discount'] + $validated['tax'];

            // Create sale
            $sale = Sale::create([
                'customer_id' => $validated['customer_id'],
                'invoice_number' => 'INV-'.time(),
                'sale_date' => $validated['sale_date'],
                'total_amount' => $total,
                'discount' => $validated['discount'],
                'tax' => $validated['tax'],
                'grand_total' => $grandTotal,
                'payment_method' => $validated['payment_method']
            ]);

            // Create sale details
            foreach ($validated['items'] as $item) {
                $product = Product::find($item['product_id']);
                
                SaleDetail::create([
                    'sale_id' => $sale->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $product->price,
                    'subtotal' => $product->price * $item['quantity']
                ]);

                // Update product stock
                $product->decrement('stock', $item['quantity']);
            }

            return response()->json($sale->load('details'), 201);
        });
    }

    public function show(Sale $sale)
    {
        return response()->json($sale->load(['customer', 'details.product']));
    }

    public function destroy(Sale $sale)
    {
        DB::transaction(function () use ($sale) {
            // Restore product stock
            foreach ($sale->details as $detail) {
                $detail->product->increment('stock', $detail->quantity);
            }
            
            $sale->details()->delete();
            $sale->delete();
        });

        return response()->json(null, 204);
    }
}