<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'user_id' => 1,
                'title' => 'Primeiro post do administrador',
                'content' => 'Este é o primeiro post do administrador do sistema. Sejam bem-vindos à comunidade.',
            ],
            [
                'user_id' => 1,
                'title' => 'Uma nota importante',
                'content' => 'Todos os usuários devem manter o respeito mútuo e a cordialidade nas interações.',
            ],
            [
                'user_id' => 2,
                'title' => 'Olá a todos!',
                'content' => 'O meu nome é João, acabei de me registrar, e estou muito feliz por fazer parte desta comunidade.',
            ],
            [
                'user_id' => 1,
                'title' => 'Bem-vindo João',
                'content' => 'Muito obrigado por se juntar a nós, João. Espero que você se sinta em casa.',
            ],
            [
                'user_id' => 2,
                'title' => 'Muito obrigado',
                'content' => 'Obrigado, administrador. Estou muito feliz por fazer parte desta comunidade.',
            ]            
        ];

        DB::table("posts")->insert($posts);
    }
}
