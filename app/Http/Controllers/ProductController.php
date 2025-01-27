<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 
use App\Models\Brand; 
use App\Models\category; 


class ProductController extends Controller
{
protected $product;

    public function __construct(){
        $this->product = new Product();
    }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $products = $this->product->all();
    //    dd($products);
       $categories = category::pluck('catname', 'id');
       $brands = Brand::pluck('brandname', 'id');

       return view('product.index', compact('products', 'categories', 'brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // Debugging: Check request data
        // dd($request->all());
    
        // Validate incoming request data
        $request->validate([
            'productname' => 'required|string|max:255',
            'cat_id' => 'required|exists:categories,id', // Ensure category exists
            'brand_id' => 'required|exists:brands,id', // Ensure brand exists
            'price' => 'required', // Assuming status is a boolean value
        ]);
    
        // dd($request->all());
        // Create a new product
        $product = new Product();
        $product->productname = $request->productname;
        $product->cat_id = $request->cat_id;  // Using category_id here
        $product->brand_id = $request->brand_id; // Using brand_id here
        $product->price = $request->price;
        $product->save();
    
        // Redirect to the product index page with success message
        return redirect()->route('product.index')->with('success', 'Product created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
