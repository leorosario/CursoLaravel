<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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

    public function listFiles()
    {

        // $files = Storage::files();
        $files = Storage::disk('local')->files(null, true);

        echo '<pre>';
        print_r($files);
    }

    public function deleteFile()
    {
        Storage::delete("file1.txt");
        echo 'Ficheiro removido com sucesso.';

        // delete all files
        // Storage::delete(Storage::files());
    }

    public function createFolder()
    {
        Storage::makeDirectory('documents');
        Storage::makeDirectory('documents/teste');
    }

    public function deleteFolder()
    {
        Storage::deleteDirectory('documents');
    }

    public function listFilesWithMetadata()
    {
        $list_files = Storage::allFiles();

        $files = [];

        foreach ($list_files as $file) {
            $files[] = [
                'name' => $file,
                'size' => round(Storage::size($file) /1024, 2) . ' kb',
                'last_modified' => Carbon::createFromTimestamp(Storage::lastModified($file))->format('d-m-Y H:i:s'),
                'mime_type' => Storage::mimeType($file)
            ];
        }

        return view('list-files-with-metadata', compact('files'));
    }

    public function listFilesForDownload()
    {
        $list_files = Storage::disk('public')->allFiles();

        $files = [];

        foreach ($list_files as $file) {
            $files[] = [
                'name' => $file,
                'size' => round(Storage::disk('public')->size($file) /1024, 2) . ' kb',
                'file' => basename($file)     
            ];
        }

        return view('list-files-for-download', compact('files'));
    }
}
