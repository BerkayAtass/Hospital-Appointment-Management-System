<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::all();
        return view('admin.product.index',[
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Product();
        $data->parent_id = 0;
        $data->title = $request->title;
        $data->keywords = $request->keywords;
        $data->description = $request->description;
        $data->status = $request->status;
        if($request->file('image')){
            $data->image = $request->file('image')->store('image');
        }
        $data->save();
        $data->save();
        return redirect('admin/product');
    }

    /**
     * Display the specified resource.
     */
    public function show( Product $product, $id)
    {
        $data = Product::find($id);
        return view('admin.product.show',[
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product,$id)
    {
        $data = Product::find($id);
        return view('admin.product.edit',[
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product,$id)
    {
        $data = Product::find($id);
        $data->parent_id = 0;
        $data->user_id = 0;
        $data->title = $request->title;
        $data->keywords = $request->keywords;
        $data->description = $request->description;
        $data->detail = $request->detail;
        $data->price = $request->price;
        $data->tax = $request->tax;
        $data->status = $request->status;
        if($request->file('image')){
            $data->image = $request->file('image')->store('image');
        }
        $data->save();
        return redirect('admin/product');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
