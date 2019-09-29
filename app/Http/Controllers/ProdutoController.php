<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use estoque\Produto;
use Request;

class ProdutoController extends Controller {
    
    public function lista(){
        
        $produtos = DB::select('select * from produtos');
        
        return view('produto.listagem')->with('produtos', $produtos);
        
        //return view('listagem')->withProdutos($produtos);
        //return view('listagem', ['produtos' => $produtos]);
    }

    public function mostra($id){
        
        //$id = Request::route('id'); //procura o valor da rota chamada id
        //$id = Request::input('id', '0'); //0 é o valor default (caso nao haja parâmetro id)
        $resposta = DB::select('select * from produtos where id = ?', [$id]);

        if(empty($resposta)) {
            return "Esse produto não existe";
        }
        return view('produto.detalhes')->with('p', $resposta[0]);
    }

    public function novo(){
        return view('produto.formulario');
    }

    public function adiciona(){
        $nome = Request::input('nome');
        $valor = Request::input('valor');
        $descricao = Request::input('descricao');
        $quantidade = Request::input('quantidade');

        DB::insert('insert into produtos values (null, ?, ?, ?, ?)',
        array($nome, $valor, $descricao, $quantidade));

        //return redirect('/produtos')->withInput(Request::only('nome'));

        //return redirect('/produtos')->withInput();
        //return redirect('/produtos')->withInput(Request::only('nome'));
        //return redirect('/usuarios')->withInput(Request::except('senha'));

        return redirect()->action('ProdutoController@lista')->withInput(Request::only('nome'));
    }

}