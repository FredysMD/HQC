<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use DB;

class Orden extends Controller
{
    //

    public static function show($customer_id, $orden ){

        $query = \DB::table('ordens')
                    ->join('customers', 'customers.customer_id', '=', 'ordens.customer_id')
                    ->join('orden_products', 'orden_products.orden_id', '=', 'ordens.orden_id')
                    ->join('products', 'products.product_id', '=', 'orden_products.product_id')
                    ->where('customers.user_id', '=', $customer_id)
                    ->where('ordens.code', '=', $orden)
                    ->get();

                    
        
        return Response::json(['data' => $query]);
        
    }

    public static function insert(){

        DB::insert('insert into ordens (customer_id, code, address_delivery, state, date_delivery) values (?, ?, ?, ?, ?);', [1, 'code1', 'SA', 1, '2022-06-01']);
        DB::insert('insert into ordens (customer_id, code, address_delivery, state, date_delivery) values (?, ?, ?, ?, ?);', [2, 'code2', 'AA', 1, '2022-06-06']);

        DB::insert('insert into customers (name_customer, user_id, type_user_id) values (?, ?, ?);', ['Fredys Márquez',  '12345678', 1 ]);
        DB::insert('insert into customers (name_customer, user_id, type_user_id) values (?, ?, ?);', ['Kelly Alvarez',  '1234567890', 1 ]);

        DB::insert('insert into products (name, ref) values (?, ?);', ['SAMSUNG GALAXY A03','1231']);
        DB::insert('insert into products (name, ref) values (?, ?);', ['SAMSUNG GALAXY A02','1232' ]);

        DB::insert('insert into orden_products (product_id, quantity, orden_id) values (?, ?, ?);', [1,50,1]);
        DB::insert('insert into orden_products (product_id, quantity, orden_id) values (?, ?, ?);', [2,50,1 ]);
        DB::insert('insert into orden_products (product_id, quantity, orden_id) values (?, ?, ?);', [2,150,2]);

        return Response::json(['message' => "Succesfull"]);
    }
}
