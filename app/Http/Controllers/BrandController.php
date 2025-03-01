<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    protected $brand;

    // Inject the category model via the constructor
    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            // Fetch all categories and pass them to the view
            $response['brands'] = $this->brand->all();
            return view('brand.index')->with($response);
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
        // dd($request->all()); 
        // Validate incoming request data (optional)
        $request->validate([
            'brandname' => 'required|string|max:255',
            'status' => 'required|boolean',  // Ensure status is either true (1) or false (0)
        ]);
        // dd($request->all()); 
        // Create the category
        $brand = new Brand;
        $brand->brandname = $request->brandname;
        $brand->status = $request->status;
        $brand->save();

        // $this->category->create([
        //     'catname' => $request->catname,
        //     'status' => (int)$request->status,  // 1 for Active, 0 for Inactive
        // ]);
        // dd($this->category);

        return redirect()->route('brand.index')->with('success', 'brand created successfully!');
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
        $response['brand']=$this->brand->find($id);
        return view('brand.edit')->with($response);
    }

    public function update(Request $request, string $id)
    {
$brand=$this->brand->find($id);
// dd($category->toArray(),$request->toArray());
$brand->update(array_merge($brand->toArray(),$request->toArray()));
return redirect()->route('brand.index')->with('success', 'brand updated successfully!');

    }

    /**
     * Update the specified resource in storage.
     */
 

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand=$this->brand->find($id);
        $brand->delete();
        return redirect()->route('brand.index')->with('success', 'brand updated successfully!');
     }
}
