<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            ['nome' => 'Trabalho', 'cor' => '#3b82f6', 'descricao' => 'Tarefas relacionadas ao trabalho'],
            ['nome' => 'TCC', 'cor' => '#ef4444', 'descricao' => 'Tarefas do trabalho de conclusão de curso'],
            ['nome' => 'Atividade', 'cor' => '#22c55e', 'descricao' => 'Atividades gerais'],
        ];

        foreach ($categorias as $categoria) {
            Categoria::firstOrCreate(['nome' => $categoria['nome']], $categoria);
        }
    }
}
