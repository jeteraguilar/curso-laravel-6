<?php

namespace App\Http\Controllers;
use App\Models\Product;
 use App\Http\Requests\StoreUpdateProductRequest;
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
    //        $this->middleware('auth')->except([
    //            'index','show'
    //            ]); 
     }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$products = ['Product 01','Product 02','Product 03'];
      
        // $products = Product::where()->get();
        // $products = Product::all();
        // $products = Product::paginate();
        $products = Product::latest()->paginate();

//*****^^^^^^variável^^^^^$teste123 */

       // return view('teste',[
       //     'teste'=> $teste
       // ]);
       return view('admin.pages.products.index',[
           'products' => $products,
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductRequest $request)
    {
        $data = $request->only('name', 'description','price');
        
       Product::create($data);
        
        return redirect()->route('products.index');
        // $request->validate([
        //     'name'=> 'required|min:3|max:255',
        //     'description' => 'nullable|min:3|max:10000',
        //     'photo' => 'required|image',
        // ]);

        // dd('OK');
//****************************************************************** */
        // dd($request->all());

        //  dd($request->name);

        // dd($request->only(['name','_token']));

        // dd($request->has('name'));
    
        // dd($request->input('name', 'default'));

        // dd($request->except('name','description'));

   
        // if($request->file('photo')->isValid());
        //     dd($request->photo->getClientOriginalName());

        // if($request->file('photo')->isValid()){
        //     // dd($request->file('photo')->store('products'));
        //     $nameFile = $request->name . '.'. $request->photo->extension();
        //     dd($request->file('photo')->storeAs('products',$nameFile));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $product = Product::where('id',$id) ->first();
        if(!$product = Product::find($id))
            return redirect()->back();
        // dd($product);

        return view('admin.pages.products.show',[
            'product' => $product
        ]);
        // return "Detalhes do rpoduto {$id}"
    
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.pages.products.edit',compact ('id'));
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
        dd("Editando o produto: {$id}");
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
