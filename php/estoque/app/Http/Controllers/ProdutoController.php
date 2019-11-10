<?php namespace estoque\Http\Controllers;

use estoque\Categoria;
use estoque\Produto;
use Illuminate\Support\Facades\DB;
use Request;
use estoque\Http\Requests\ProdutoRequest;

class ProdutoController extends Controller {

    public function __construct()
    {
        $this->middleware('autorizador');
    }

    public function lista()
    {
        $produtos = Produto::all();
        return view('produto.listagem')->with('produtos', $produtos);
    }
    public function listaJson(){
        $produtos = DB::select('select * from produtos');
        return response()->json($produtos);
    }
    public function mostra($id)
    {
        $produto = Produto::find($id);
        if(empty($produto)) {
            return "Esse produto não existe";
        }
        return view('produto.detalhes')->with('p', $produto);
    }
    public function novo()
    {
        return view('produto.formulario')->with('categoria', Categoria::all());
    }
    public function adiciona(ProdutoRequest $request)
    {
        Produto::create($request->all());
        return redirect()->action('ProdutoController@lista')->withInput(Request::only('nome'));
    }

    public function remover($id)
    {
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()->action('ProdutoController@lista');
    }



}