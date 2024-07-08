<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categorias =[
            'Maquillaje',
            'Pedicura',
            'Cabello',
            'Manicura'
        ];
        foreach($categorias as $categoria){
            Categoria::create([
                'nombre'=>$categoria
            ]);
        }
    }
}
