<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Phone;
use App\Models\Product;

class MainController extends Controller
{
    public function index()
    {
        echo "Eloquent Relações";
    }

    public function OneToOne()
    {
        // buscar o telefone de um cliente
        // $client1 = Client::find(12)->phone;
        // echo "Telefone do cliente ID: " . $client1->client_id . " : " . $client1->phone_number;
        // echo "<hr>";

        // todos os dados do cliente e o telefone dele
        // $client2 = Client::find(12);
        // $phone = $client2->phone->phone_number;
        // echo "<br>";
        // echo "Nome do cliente: " . $client2->client_name . "<br>";
        // echo "Telefone do cliente: " . $phone;
        // echo "<hr>";

        //outra forma é usando o método with()
        // $client3 = Client::with("phone")->find(12);
        // $phone = $client3->phone->phone_number;
        // echo "<br>";
        // echo "Nome do cliente: " . $client3->client_name . "<br>";
        // echo "Telefone do cliente: " . $phone;
        // echo "<hr>";

        $clients = Client::with("phone")->get();
        foreach($clients as $client){
            echo "<br>";
            echo "Nome do cliente: " . $client->client_name .  " - Telefone: " . $client->phone->phone_number;
        }
    }

    public function OneToMany()
    {
        // Buscar o id e o nome do cliente e todos os telefones dele
        // $client1 = Client::find(10);
        // $phones = $client1->phones;
        // echo "Cliente: " . $client1->client_name . "<br>";        
        // echo "Telefones: <br> ";
        // foreach($phones as $phone){            
        //     echo $phone->phone_number . "<br>";
        // }  
        
        // $client2 = Client::with("phones")->find(10);
        // echo "<br>";
        // echo "Cliente: " . $client2->client_name . "<br>";        
        // echo "Telefones: <br> ";
        // foreach($client2->phones as $phone){            
        //     echo $phone->phone_number . "<br>";
        // }

        // vamos buscar todos os clientes e os seus telefones
        $clients = Client::with("phones")->get();
        foreach ($clients as $client) {
            echo "<br>";
            echo "Cliente: " . $client->client_name . "<br>";        
            echo "Telefones: <br> ";
            foreach($client->phones as $phone){            
                echo $phone->phone_number . "<br>";
        }
        }
    }

    public function BelongsTo()
    {
        // neste método vamos pegar no telefone e descobrir a que cliente pertence
        // $phone1 = Phone::find(10);
        // $client = $phone1->client;
        // echo "Telefone: " . $phone1->phone_number . "<br>";
        // echo "Cliente: " . $client->client_name;

        //outra forma é usando o método with()
        echo "<br>";
        $phone2 = Phone::with("client")->find(10);
        echo "<br>";        
        echo "Telefone: " . $phone2->phone_number . "<br>";
        echo "Cliente: " . $phone2->client->client_name;
    }

    public function ManyToMany()
    {
        // buscar um cliente e todos os produtos que ele comprou
        // $client1 = Client::find(1);
        // $products = $client1->products;
        // echo "Cliente: " . $client1->client_name . "<br>";
        // echo "Produtos: <br>";
        // foreach ($products as $product) {
        //     echo $product->product_name . "<br>";
        // } 

        //agora vamos buscar todos os clientes que compraram um determinado produto
        $product1 = Product::find(1);
        $clients = $product1->clients;
        echo "Produto: " . $product1->product_name . "<br>";
        echo "Clientes: <br>";
        foreach ($clients as $client) {
            echo $client->client_name . "<br>";
        } 
    }

    public function RunningQueries()
    {
        //vamos buscar um cliente e os seus telefones, mas só queremos os telefones que começa por 8
        // $client1 = Client::find(1);
        // $phones = $client1->phones()->where("phone_number", "like", "8%")->get();
        // echo "Cliente: " . $client1->client_name . "<br>";
        // echo "Telefones: <br>";
        // foreach ($phones as $phone) {
        //     echo $phone->phone_number . "<br>";
        // }

        //buscar todos os produtos que um cliente comprou, mas só queremos os produtos que custam mais de 50
        // $client2 = Client::find(1);
        // $products = $client2->products()->where("price", ">", 50)->get();
        // echo "Cliente: " . $client2->client_name . "<br>";
        // foreach ($products as $product) {
        //     echo $product->product_name . " - " . $product->price . "<br>";
        // }

        //vão aparecer produtos repetidos. Para evitar isso, podemos usar o método distinct() e vamos ordenar
        //os produtos por ordem alfabética do nome
        echo "<hr>";
        $client2 = Client::find(1);
        $products = $client2->products()
            ->where("price", ">", 50)            
            ->distinct()
            ->orderBy("product_name")
            ->get();
        echo "Cliente: " . $client2->client_name . "<br>";
        foreach ($products as $product) {
            echo $product->product_name . " - " . $product->price . "<br>";
        }

    }

    public function SameResults()
    {
        //vamos buscar os mesmos resultados, mas sem usar as relações
        //vamos buscar os clientes e os seus telefones
        // $client1 = Client::find(1);
        // $phones = Phone::where("client_id", $client1->id)->get();
        // echo "Cliente: " . $client1->client_name . "<br>";
        // foreach ($phones as $phone) {
        //     echo $phone->phone_number . "<br>";
        // }

        //vamos buscar todos os produtos que um cliente comprou
        $client2 = Client::find(1);
        $products = Product::join("orders", "products.id", "=", "orders.product_id")
            ->where("orders.client_id", $client2->id)
            ->get();
        echo "<br>";
        echo "Cliente: " . $client2->client_name . "<br>";
        echo "Produtos: <br>";
        foreach ($products as $product) {
            echo $product->product_name . " - " . $product->price . "<br>";
        }
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
