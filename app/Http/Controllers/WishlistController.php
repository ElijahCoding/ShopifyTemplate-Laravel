<?php

namespace App\Http\Controllers;

use App\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function store(Request $request)
    {
        Wishlist::updateOrCreate($request->all());

        return response()->json([
            'message' => 'success'
        ], 201);
    }

    public function destroy(Request $request)
    {
        $item = Wishlist::where("shop_id", $request['shop_id'])->where('customer_id', $request['customer_id'])
            ->where('product_id', $request['product_id'])->first();

        return Wishlist::destroy($item->id);
    }
}
