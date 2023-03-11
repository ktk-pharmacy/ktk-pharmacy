<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Cart;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Http\Resources\CartCollection;

class CartController extends Controller
{
    public function index(Request $request)
    {
        // $cart = Cart::first();
        // return(new CartResource($cart));
        $carts = $this->getCart($request);
        return response()->success('Success!', 200, $carts);
    }

    public function store(Request $request, Products $product)
    {

        $request->validate([
            'quantity' => 'required|numeric|min:0|not_in:0',
            'add_to_cart' => 'required|boolean'
        ]);

        $customer = $request->user();

        try {
            //   var_dump($request->add_to_cart);
            if ($request->add_to_cart) {
                $existCartProduct = Cart::where([
                    'customer_id' => $customer->id,
                    'product_id' => $product->id
                ])->increment('quantity', $request->quantity);


                if (!$existCartProduct) {
                    Cart::create([
                        'customer_id' => $customer->id,
                        'product_id' => $product->id,
                        'quantity' => $request->quantity
                    ]);
                }
            } else {
                $cartProduct = Cart::where([
                    'customer_id' => $customer->id,
                    'product_id' => $product->id
                ])->firstOrFail();

                if ($cartProduct->quantity > $request->quantity && $cartProduct->quantity != 1) {
                    $cartProduct->decrement('quantity', $request->quantity);
                } else {
                    $cartProduct->delete();
                }
            }

            $carts = $this->getCart($request);

            return response()->success('Success!', 200, $carts);
        } catch (\Throwable $th) {
            return response()->error("Product not found!", 404);
        }
    }

    public function getCart(Request $request)
    {
        $carts = Cart::with('product')->where('customer_id', $request->user()->id)->get();
        return CartResource::collection($carts);
    }
}
