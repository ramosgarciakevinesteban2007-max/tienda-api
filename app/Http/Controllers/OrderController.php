<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function store(Request $request){
       
        $orden = new Order();
        $orden->user_id = 1;
        $orden->metodo_pago = 'Tarjeta';
        $orden->save();

       
        $products   = $request->input('product_id');  // array de IDs
        $prices     = $request->input('price');        // array de precios
        $cantidades = $request->input('cantidad');     // array de cantidades

        foreach ($products as $index => $product_id) {
            $orden->products()->attach($product_id, [
                'price'    => $prices[$index],
                'cantidad' => $cantidades[$index],
            ]);
        }

        return redirect('/orden-exitosa/' . $orden->id);
    }
}
