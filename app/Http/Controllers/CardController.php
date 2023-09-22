<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cart;
use Illuminate\Support\Facades\DB;

class CardController extends Controller
{
    public function add_to_cart(Request $request)
    {
//        dd($request);
        $quantity = $request->quantity;
        $id = $request->id;

        $products = DB::table('products')
            ->where('id', $id)
            ->first();
//        dd($products);
        $data['quantity'] = $quantity;
        $data['id'] = $products->id;
        $data['name'] = $products->name;
        $data['price'] = $products->price;
        $data['attributes'] = [$products->img];
//        $data['attributes'] = [
//            'img' => $products->img,
//            'detail' => $products->detail,
//            'description' => $products->description,
//        ];

        Cart::add($data);
        cardArray();
        return redirect()->back();
    }
    public function delete($id){
        Cart::remove($id);
        return redirect()->back();
    }

    public function clearCart(){
        Cart::clear();
        return redirect()->back();
    }
}
