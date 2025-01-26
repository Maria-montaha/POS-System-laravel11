<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;

class CatagoryController extends Controller
{
    protected $catagory;

    // Inject the Catagory model via the constructor
    public function __construct(Catagory $catagory)
    {
        $this->catagory = $catagory;
    }

    public function index()
    {
        // Fetch all categories and pass them to the view
        $response['catagories'] = $this->catagory->all();
        return view('catagory.index')->with($response);
    }

    public function create()
    {
        //
    }

    // public function store(Request $request)
    // {
    //     $this->catagory->create($request->all());
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
        $catagory = new Catagory;
        $catagory->catname = $request->catname;
        $catagory->status = $request->status;
        $catagory->save();

        // $this->catagory->create([
        //     'catname' => $request->catname,
        //     'status' => (int)$request->status,  // 1 for Active, 0 for Inactive
        // ]);
        // dd($this->catagory);

        return redirect()->route('catagory.index')->with('success', 'Category created successfully!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $response['catagory']=$this->catagory->find($id);
        return view('catagory.edit')->with($response);
    }

    public function update(Request $request, string $id)
    {
$catagory=$this->catagory->find($id);
// dd($catagory->toArray(),$request->toArray());
$catagory->update(array_merge($catagory->toArray(),$request->toArray()));
return redirect()->route('catagory.index')->with('success', 'Category updated successfully!');

    }

    public function destroy(string $id)
    {
       $catagory=$this->catagory->find($id);
       $catagory->delete();
       return redirect()->route('catagory.index')->with('success', 'Category updated successfully!');
    }
}
