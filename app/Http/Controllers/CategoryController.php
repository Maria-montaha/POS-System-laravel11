<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;

class categoryController extends Controller
{
    protected $category;

    // Inject the category model via the constructor
    public function __construct(category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        // Fetch all categories and pass them to the view
        $response['categories'] = $this->category->all();
        return view('category.index')->with($response);
    }

    public function create()
    {
        //
    }

    // public function store(Request $request)
    // {
    //     $this->category->create($request->all());
    //     return redirect()->back();
    // }

    public function store(Request $request)
    {
        // dd($request->all()); 
        // Validate incoming request data (optional)
        $request->validate([
            'catname' => 'required|string|max:255',
            'status' => 'required|boolean',  // Ensure status is either true (1) or false (0)
        ]);
        // dd($request->all()); 
        // Create the category
        $category = new category;
        $category->catname = $request->catname;
        $category->status = $request->status;
        $category->save();

        // $this->category->create([
        //     'catname' => $request->catname,
        //     'status' => (int)$request->status,  // 1 for Active, 0 for Inactive
        // ]);
        // dd($this->category);

        return redirect()->route('category.index')->with('success', 'Category created successfully!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $response['category']=$this->category->find($id);
        return view('category.edit')->with($response);
    }

    public function update(Request $request, string $id)
    {
$category=$this->category->find($id);
// dd($category->toArray(),$request->toArray());
$category->update(array_merge($category->toArray(),$request->toArray()));
return redirect()->route('category.index')->with('success', 'Category updated successfully!');

    }

    public function destroy(string $id)
    {
       $category=$this->category->find($id);
       $category->delete();
       return redirect()->route('category.index')->with('success', 'Category updated successfully!');
    }
}
