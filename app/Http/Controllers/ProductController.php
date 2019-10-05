<?php

namespace App\Http\Controllers;

use Session;
use App\{Product, Question};
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();
        $products = Product::all();
        // Session::put('products', $products->toArray());
        return view('products.index', [
            'products' => $products,
            'questions' => $questions
        ]);
        // return view('products.index', compact('products', 'questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:4|max:15',
            'price' => 'required|numeric',
            'stock' => 'required|integer'
        ]);

        $product = Product::create($request->only('name', 'price', 'stock'));
        Session::flash('create', 'Se ha creado el producto ' . $product->name . ' satisfactoriamente!');
        return redirect('products');
        /*
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->save();
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id = null)
    {
        $product = Product::find($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
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
        $this->validate($request, [
            'name' => 'required|string|min:4|max:15',
            'price' => 'required|numeric',
            'stock' => 'required|integer'
        ]);

        

        $product = Product::find($id);
        $product->name = $request->name;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->save();
        Session::flash('update', 'Se ha actualizado el producto '. $product->name);

        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $name = Product::find($id)->name;
        Product::destroy($id);
        Session::flash('delete', 'Se ha eliminado el producto ' . $name);
        return redirect('products');
    }
}
