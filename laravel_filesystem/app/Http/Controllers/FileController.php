<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileController extends Controller
{
    public function index()
    {
        return view("home");
    }

    public function storageLocalCreate()
    {
        // Storage::disk('public')->put('file.txt', 'Conteúdo do ficheiro 1');
        Storage::put("file1.txt", 'Conteúdo do ficheiro 1');
        Storage::disk('local')->put('file2.txt', 'Conteúdo do ficheiro 2');

        echo "Fim";
    }

    public function storageLocalAppend()
    {
        // Storage::append("file3.txt", Str::random(100));
        Storage::disk('local')->append("file3.txt", Str::random(100));

        return redirect()->route("home");
    }

    public function storageLocalRead()
    {
        $content = Storage::get("file1.txt");
        // $content = Storage::disk("local")->get("file1.txt");
        echo $content;
    }

    public function storageLocalReadMulti()
    {
        $lines = Storage::get("file3.txt");
        $lines = explode(PHP_EOL, $lines);
        
        foreach ($lines as $line) {
            echo "<p>$line</p>";
        }
    }

    public function storageLocalCheckFile()
    {
        $exists = Storage::exists("file1.txt");
        // ou
        // $exists = Storage::disk("local")->exists("file1.txt");

        if($exists){
            echo "O ficheiro existe";
        }else{
            echo "O ficheiro não existe";
        }

        echo "<br>";

        if(Storage::missing("file100.txt")){
            echo "O ficheiro não existe";
        }else{
            echo "O ficheiro existe";
        }
    }

    public function storageJSON()
    {
        $data = [
            [
                'name' => 'joao',
                'email' => 'joao@gmail.com'
            ],
            [
                'name' => 'ana',
                'email' => 'ana@gmail.com'
            ],
            [
                'name' => 'carlos',
                'email' => 'carlos@gmail.com'
            ]
        ];

        Storage::put("data.json", json_encode($data));
        echo "Ficheiro JSON criado.";
    }

    public function readJSON(){
        $data = Storage::json('data.json');
        echo '<pre>';
        print_r($data);
    }
}
