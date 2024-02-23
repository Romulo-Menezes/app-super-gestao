<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fornecedor;


class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Instanciando o objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fulando';
        $fornecedor->site = 'fulaninho.com.br';
        $fornecedor->uf = 'RJ';
        $fornecedor->email = 'contato@fulaninho.com.br';
        $fornecedor->save();

        //Método create (precisa do fillable na classe)
        Fornecedor::create([
            'nome' => 'Sicrano',
            'site' => 'sicraninho.com.br',
            'uf' => 'SP',
            'email' => 'contato@sicraninho.com.br'
        ]);
        
        Fornecedor::create([
            'nome' => 'Beltrano',
            'site' => 'beltraninho.com.br',
            'uf' => 'MG',
            'email' => 'contato@beltraninho.com.br'
        ]);

    }
}
