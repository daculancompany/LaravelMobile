<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\SaleDetail;
use Illuminate\Http\Request;

class SaleDetailController extends Controller
{
    public function index(Sale $sale)
    {
        return response()->json($sale->details()->with('product')->get());
    }

    public function show(Sale $sale, SaleDetail $detail)
    {
        return response()->json($detail->load('product'));
    }

    public function update(Request $request, Sale $sale, SaleDetail $detail)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        DB::transaction(function () use ($detail, $validated) {
            $oldQuantity = $detail->quantity;
            $newQuantity = $validated['quantity'];
            
            // Update product stock
            $detail->product->increment('stock', $oldQuantity - $newQuantity);
            
            // Update detail
            $detail->update([
                'quantity' => $newQuantity,
                'subtotal' => $detail->unit_price * $newQuantity
            ]);
        });

        return response()->json($detail->fresh());
    }

    public function destroy(Sale $sale, SaleDetail $detail)
    {
        DB::transaction(function () use ($detail) {
            // Restore product stock
            $detail->product->increment('stock', $detail->quantity);
            $detail->delete();
        });

        return response()->json(null, 204);
    }
}