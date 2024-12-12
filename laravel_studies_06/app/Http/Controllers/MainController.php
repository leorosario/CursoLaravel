<?php

namespace App\Http\Controllers;

//use App\Models\Product;

use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        // buscar todos os dados dos produtos
        //$results = Product::all(); //SELECT * FROM products

        //buscar todos os dados com um array associativo

        //buscar produtos ordenados pelo nome alfabeticamente
        // $results = Product::orderBy("product_name")->get()->toArray();

        //buscar os 3 primeiros produtos
        // $results = Product::limit(3)->get()->toArray();

        // $results = Product::find(10)->toArray();

        //Usar a cláusula Where
        // $results = Product::Where("price", ">=", 70)->get()->toArray();

        // $results = Product::Where("price", ">=", 70)->first()->toArray();

        //Buscar apenas o primeiro elemento se ele existir, caso contrário retorna array vazio
        // $results = Product::Where("price", ">=", 190)->firstOr(function (){
        //     return [];
        // });

        // $product = Product::find(10);
        // echo $product->price; //valor da bd
        // echo '<br>';
        // $product->price = 200; //definir um novo preço apenas no código (não na BD)
        // echo $product->price;
        // echo '<br>';

        // $product->refresh(); // volta a recuperar o preço original na BD
        // echo $product->price;
        // echo '<br>';
        
        //$this->showData($results);

        // $product = Product::find(10);
        // echo $product->product_name . "<br>";

        // $product = Product::Where("price", ">=", 70)->first();
        // echo $product->product_name . " te um preço de " . $product->price . "<br>";

        // $product = Product::firstWhere("price", ">=", 60);
        // echo $product->product_name . " te um preço de " . $product->price . "<br>";

        // $product = Product::findOr(100, function(){
        //     echo "Não foi encontrado o produto desejado";
        // });

        // if($product){
        //     echo $product->product_name . " te um preço de " . $product->price . "<br>";
        // }

        // $product = Product::findOrFail(120);
        // echo $product->product_name . " te um preço de " . $product->price . "<br>";

        $total_products = Product::count();
        $product_max_price = Product::max("price");
        $product_min_price = Product::min("price");
        $product_avg_price = Product::avg("price");
        $product_sum_price = Product::sum("price");

        $results = [
            "total_products" => $total_products,
            "product_max_price" => $product_max_price,
            "product_min_price" => $product_min_price,
            "product_avg_price" => $product_avg_price,
            "product_sum_price" => $product_sum_price
        ];

        $this->showData($results);
        
    }

    private function showData($data)
    {
        echo "<pre>";
        print_r($data);
    }

    private function ArrayOfObject($data)
    {
        $tmp = [];

        foreach ($data as $key => $value) {
            $tmp[] = (object) $value;
        }
        return $tmp;
    }
}
