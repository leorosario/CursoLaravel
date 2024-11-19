<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        //devolvendo todos os dados de uma tabela
        //$clients = DB::table("clients")->get();

        //apresentar num array associativo
        //$clients = DB::table("clients")->get()->toArray();

        //apresentar num array de arrays associativos
        // $results = $clients = DB::table("products")->get()->map(function($item){
        //     return (array) $item;
        // });

        //apresentar os dados a partir dos resultados
        // $products = DB::table("products")->get();
        // foreach ($products as $product) {
        //     echo $product->product_name . "<br>";
        // }

        //obter apenas algumas colunas
        //$products = DB::table("products")->get(["product_name", "price"]);
        
        //pluck - obter de forma simples os dados de uma coluna específica
        //$results = DB::table("products")->pluck("product_name");

        //devolver apenas a primeira linha de um resultado
        //$results = DB::table("products")->get()->first();

        //devolver apenas a última linha de um resultado
        //$results = DB::table("products")->get()->last();

        //SELECT * FROM products WHERE id = 10
        //$results = DB::table("products")->find(10);

        //select com where
        //$products = DB::table("products")->where("id", ">=", 10)->get();

        // $products = DB::table("products")
        //     ->select("product_name", "price")
        //     ->get();

        //SELECT * FROM products WHERE price > 70
        // $products = DB::table("products")
        //     ->where("price", ">", 70)
        //     ->get();

        //SELECT * FROM products WHERE price > 50 AND product_name LIKE "A%"
        // $products = DB::table("products")
        //     ->where("price", ">", 50)
        //     ->where("product_name", "like", "A%")
        //     ->get();

        //SELECT * FROM products WHERE price > 50 OR product_name LIKE "A%"
        // $products = DB::table("products")
        //     ->where("price", ">", 80)
        //     ->orWhere("product_name", "like", "A%")
        //     ->get();

        // $products = DB::table("products")
        //     ->where([
        //         ["price", ">", 50],
        //         ["product_name", "like", "A%"]
        //     ])->get();

        // $products = DB::table("products")
        //     ->where("price", ">", 90)
        //     ->orWhere(function(Builder $query){
        //         $query->where("product_name", "Banana")
        //             ->orWhere("product_name", "Cereja");
        //     })->get();


        // $products = DB::table("products")
        //     ->where("product_name", "not like", "M%")
        //     ->get();

        // $products = DB::table("products")
        //     ->whereNot("product_name", "like", "M%")
        //     ->get();

        // $results = DB::table("clients")
        //     ->whereAny(["client_name", "email"], "like", "%va%")
        //     ->get();

        // $products = DB::table("products")
        //     ->whereBetween("price", [25, 50])
        //     ->get();

        // $products = DB::table("products")
        //     ->whereNotBetween("price", [25, 50])
        //     ->get();

        // SELECT * FROM products WHERE id = 1 OR id = 3 OR id = 5
        // $products = DB::table("products")
        //     ->whereIn("id", [1, 3, 5])
        //     ->get();

        // $products = DB::table("products")
        //     ->whereNotIn("id", [1, 3, 5])
        //     ->get();

        // $clients = DB::table("clients")
        //     ->whereNotNull("deleted_at")
        //     ->get();

        // $clients = DB::table("clients")
        //     ->whereDate("created_at", "2032-02-14")
        //     ->get();

        // $clients = DB::table("clients")
        //     ->whereDay("created_at", "10")
        //     ->get();

        //$this->showRawData($products);
        // $this->showDataTable($clients);

        // queres ir buscar dados agregados
        // $count = DB::table("products")->count();
        // $max_price = DB::table("products")->max("price");
        // $min_price = DB::table("products")->min("price");
        // $avg_price = DB::table("products")->avg("price");
        // $sum_prices = DB::table("products")->sum("price");

        // echo "<pre>";
        // print_r([
        //     "count" => $count,
        //     "max_price" => $max_price,
        //     "min_price" => $min_price,
        //     "avg_price" => $avg_price,
        //     "sum_prices" => $sum_prices            
        // ]);

        // order os produtos por preço descente
        // $results = DB::table("products")
        //     ->orderBy("price", "desc")
        //     ->get();
        // $this->showDataTable($results);

        //buscar apenas os produtos com os 3 preços mais altos
        // $results = DB::table("products")
        //     ->orderBy("price", "desc")
        //     ->limit(3)
        //     ->get();
        // $this->showDataTable($results);

        //INSERT
        //adicionar um novo client

        // $new_client = [
        //     "client_name" => "João Ribeiro",
        //     "email" => "joao.ribeiro@gmail.com"
        // ];
        // DB::table("clients")->insert($new_client);

        // DB::table("clients")->insert([
        //     "client_name" => "João Ribeiro 2",
        //     "email" => "joao.ribeiro2@gmail.com"
        // ]);


        //adicionar dois clientes
        // DB::table("clients")->insert([
        //     [
        //         "client_name" => "Cliente 1",
        //         "email" => "cliente1@gmail.com",
        //         "created_at" => Carbon::now()

        //     ],
        //     [
        //         "client_name" => "Cliente 2",
        //         "email" => "cliente2@gmail.com",
        //         "created_at" => Carbon::now()
        //     ]
        // ]);

        //UPDATE
        // DB::table("clients")
        //     ->where("id", 1)
        //     ->update([
        //         "client_name" => "ALTERADO",
        //         "email" => "alterado@gmail.com",
        //     ]);

        // DB::table("clients")
        //     ->where("client_name", "Catarina Melany Cunha")
        //     ->update([                
        //         "email" => "novo@gmail.com",
        //     ]);

        //DELETE - HARD
        // DB::table("clients")
        //     ->where("id", 10)
        //     ->delete();

        //DELETE - SOFT
        // DB::table("clients")
        //     ->where("id", 11)
        //     ->update([
        //         "deleted_at" => Carbon::now()               
        //     ]);
    }

    private function showRawData($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

    private function showDataTable($data)
    {
        echo "<table border='1'>";
        //header
        echo "<tr>";
        foreach ($data[0] as $key => $value) {
            echo "<th>" . $key . "</th>";
        }
        echo "</tr>";
        foreach ($data as $row) {
            echo "<tr>";
            foreach ($row as $key => $value) {
                echo "<td>" . $value . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}
