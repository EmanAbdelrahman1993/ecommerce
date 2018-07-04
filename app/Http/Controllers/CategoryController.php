<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Validator;
use App\User;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_cats= Category::orderBy('id','desc')->paginate(10);
        $user = User::where('id', auth()->user()->id)->first();
        $username = $user->name;
        //$parentname = Category::where('parent_id',$parent_id)->first();
        return view('category/index',['all_cats'=>$all_cats,'username'=>$username]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_cats= Category::orderBy('id','desc')->paginate(10);
        return view('category.create',['all_cats'=>$all_cats]);

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

            'description' => 'required|max:255',


        ]);


        //dd( request());
        $new = new Category();
        $new->name = request('name');
        $new->description = request('description');
        $new->user_id = auth()->user()->id;
        if( request('parent_id') == "No Parent")
             $new->parent_id = null;
        else
            $new->parent_id = request('parent_id');



       // dd(  $new->parent_id);

        $new->save();
        session()->flash('success','Category Added Successfully');
        return redirect('category/index');
    }

    public function show(Category $category)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = category::find($id);
        $all_cats= Category::all();
//        return view('category.edit',['cat'=>$cat,'all_cats'=>'$all_cats']);
        return view('category.edit',['cat'=>$cat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',

            'description' => 'required|max:255',


        ]);


        //dd( request());
        $new =  Category::find($id);
        $new->name = request('name');
        $new->description = request('description');
        if( request('parent_id') == "No Parent")
            $new->parent_id = null;
        else
            $new->parent_id = request('parent_id');



        // dd(  $new->parent_id);

        $new->save();
        session()->flash('success','Category Updated Successfully');
        return redirect('category/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();


        session()->flash('success','Category Deleted Successfully');
        return redirect('category/index');
    }
//    public function parentName($parent_id)
//    {
//        $parent = Category::where('id',$parent_id)->get();
//
//        return $parent->name;
//    }
}
