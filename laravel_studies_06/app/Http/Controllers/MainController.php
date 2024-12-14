<?php

namespace App\Http\Controllers;

use App\Models\Client;

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
