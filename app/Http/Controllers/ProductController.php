<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
       $this->request = $request;

       //******formas de aplicar segurança na aplicação */

       //$this->middleware('auth');
       /*$this->middleware('auth')->only([
           'create','destroy','show'
           ]);*/
           $this->middleware('auth')->except([
               'index','show'
               ]); 
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$products = ['Product 01','Product 02','Product 03'];
        $teste = 123;
        $teste2 = 321;
        $teste3 = [1,2,3,4,5];
        $products = ['Tv', 'Geladeira', 'forno', 'sofá'];

//*****^^^^^^variável^^^^^$teste123 */

       // return view('teste',[
       //     'teste'=> $teste
       // ]);
       return view('admin.pages.products.index',compact('teste','teste2','teste3','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'Exibindo o form de cadastro de um novo produto';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return 'Cadastrando um novo produto';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "Exibindo o produto do id: {$id}";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "Editando o produto: {$id}";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return "Editando o produto: {$id}";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "Deletando o produto: {$id}";
    }
}
