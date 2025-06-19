<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Models\Product\Repository;
use Illuminate\Http\Request;

class RepositoryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Repository::class);
    }

    public function store(Request $request, Product $product)
    {
        $request->validate([
            'type' => 'required|in:in,out',
            'quantity' => 'required|integer|gt:0',
            'note' => 'nullable|string',
        ]);

        if ($request->type == 'out') {

            if (($product->quantity - $request->quantity) < 0) {
                return back()->withError(__('messages.error.products.repositories.quantity_can_not_be_negative', ['quantity' => $product->quantity]));
            }

            $newQuantity = (-1 * $request->quantity);
        } else {
            $newQuantity = $request->quantity;
        }

        $repository = new Repository;
        $repository->type = $request->type;
        $repository->quantity = $request->quantity;
        $repository->product_id = $product->id;
        $repository->note = $request->note;
        $repository->save();

        $product->quantity = $product->quantity + $newQuantity;
        $product->update();

        return redirect()->route('admin.products.show', ['product' => $product->id])->withSuccess(__('messages.success.added'));
    }

    public function destroy(Product $product, Repository $repository)
    {

        if ($repository->type == 'in') {

            if (($product->quantity - $repository->quantity) < 0) {
                return back()->withError(__('messages.error.products.repositories.quantity_can_not_be_negative-2', ['quantity' => $product->quantity]));
            }

            $newQuantity = (-1 * $repository->quantity);
        } else {
            $newQuantity = $repository->quantity;
        }

        $product->quantity = $product->quantity + $newQuantity;
        $product->update();

        $repository->delete();

        return back()->withSuccess(__('messages.success.deleted'));

    }
}
