<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use DB;

class Orden extends Controller
{
    //

    public function show($customer_id, $orden ){

        $query = \DB::table('ordens')
                    ->join('customers', 'customers.customer_id', '=', 'ordens.customer_id')
                    ->join('orden_products', 'orden_products.orden_id', '=', 'ordens.orden_id')
                    ->join('products', 'products.product_id', '=', 'orden_products.product_id')
                    ->where('customers.user_id', '=', $customer_id)
                    ->where('ordens.code', '=', $orden)
                    ->get();

                    
        
        return Response::json(['data' => $query]);
        
    }
}
