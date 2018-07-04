<?php

namespace App\Http\Controllers;

use App\Product;
use App\Images;
use App\Category;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_products = Product::orderBy('id', 'asc')->paginate(5);

        return view('products/index', ['all_products' => $all_products]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_cats = Category::orderBy('id','asc')->get();
       // dd($all_cats);
        return view('products.create',['all_cats'=>$all_cats]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'size' => 'required',
            'color' => 'required',
            'file' =>  'required|file',

            'image' =>'required|image',
        ]);


        //dd( request());
        $new = new Product;
        $new->name = $request->name;
       // $new->name = $request['name'];
        $new->price = $request->price;
        $new->size = $request->size;
        $new->color = $request->color;

       // $image =  $request->image;

        //$img = $request->file('image');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);

            $new->image = $name;
            //dd($new->image);
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $name = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/files');
            $file->move($destinationPath, $name);

            $new->file = $name;
            //dd($new->file);
        }



        $new->user_id = auth()->user()->id;
        $new->cat_id = request('cat_id');
        //dd($new);
        //dd($new);

        $new->save();
        session()->flash('success','Product Added Successfully');
        return redirect('products/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product = Product::find($id);
        return view('products.show',['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $all_cats= Category::all();
//        return view('category.edit',['cat'=>$cat,'all_cats'=>'$all_cats']);
        return view('products.edit',['product'=>$product,'all_cats'=>$all_cats]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'size' => 'required',
            'color' => 'required',
            'file' => 'required|file',
            'cat_id' => 'required',


        ]);


        //dd( request());
        $new = Product::find($id);
        $new->name = request('name');
        $new->price = request('price');
        $new->size = request('size');
        $new->color = request('color');
        $new->cat_id = request('cat_id');
        $new->user_id = auth()->user()->id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);

            $new->image = $name;
            //dd($new->image);
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $name = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/files');
            $file->move($destinationPath, $name);

            $new->file = $name;
            //dd($new->file);
        }



        $new->user_id = auth()->user()->id;
        $new->cat_id = request('cat_id');
        //dd($new);
        //dd($new);

        $new->save();


        $new->save();
        session()->flash('success','Product Updated Successfully');
        return redirect('products/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();


        session()->flash('success','Category Deleted Successfully');
        return redirect('category/index');
    }
    public function userview()
    {
        $all_products = Product::orderBy('id', 'asc')->paginate(9);


        return view('products/userview', ['all_products' => $all_products]);

    }

}
