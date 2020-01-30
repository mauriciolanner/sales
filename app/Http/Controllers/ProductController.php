<?php

namespace App\Http\Controllers;

use App\Product;
use App\Tax;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        // Classe protegida por login
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $taxes = Tax::all();
        return view('product', compact('products', 'taxes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->code = $request->code;
        $product->price = $request->price;

        //dd($request);

        //dd($request->hasFile('image'));

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $name = uniqid(date('HisYmd'));
            $extension = $request->image->extension();
            $nameFile = "{$name}.{$extension}";
            $upload = $request->image->storeAs('products', $nameFile);
            if ($upload) {
                $finalname = 'products/' . $nameFile;
                $product->image = $finalname;
            }
        } else {
            $product->image = 'products/sample.png';
        }

        $product->save();

        $tax = Tax::find($request->tax);
        $product->taxes()->attach($tax);

        return redirect('produtos')->with('success', 'Produto criado com sucesso');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
