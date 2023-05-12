<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data ['categories'] = Category::all();
        return view('admin.category.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->demo_id == 1){
            session()->flash('error', 'Demo account are not change anything! thanks');
            return redirect()->route('admin.category.index');
        }
        else
        {
            $request->validate([
                'name' => 'required',
            ]);

            $category = new Category();

            $category->category_name = $request->name;

            if ($request->hasFile('image')){

                $path = 'images/category';
                $img = $request->file('image');
                $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
                $img->move($path,$file_name);

                if ($category->category_image != null && file_exists($category->category_image)){
                    unlink($category->category_image);
                }

                $category->category_image = $path .'/'. $file_name;

            }
            $category->save();
            session()->flash('success', 'Category Added Successfully');
            return redirect()->route('admin.category.index');
        }
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
        $d_id = decrypt($id);
        $data ['category'] = Category::find($d_id);
        return view('admin.category.edit',$data);
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
        if (auth()->user()->demo_id == 1){
            session()->flash('error', 'Demo account are not change anything! thanks');
            return redirect()->route('admin.category.index');
        }
        else
        {
            $d_id = decrypt($id);
            $request->validate([
                'category_name' => 'required',
            ]);

            $category = Category::find($d_id);
            $category->category_name = $request->category_name;

            if ($request->hasFile('image'))
            {

                $path = 'images/category';
                $img = $request->file('image');
                $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
                $img->move($path,$file_name);


                if ($category->category_image != null && file_exists($category->category_image)){
                    unlink($category->category_image);
                }

                $category->category_image = $path .'/'. $file_name;

            }
            $category->save();
            session()->flash('success', 'Category Updated Successfully');
            return redirect()->route('admin.category.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
    public function delete($id)
    {
        if (auth()->user()->demo_id == 1){
            session()->flash('error', 'Demo account are not change anything! thanks');
            return redirect()->route('admin.category.index');
        }
        else
        {
            $d_id = decrypt($id);
            $category=Category::find($d_id);

            if ($category->category_image != null && file_exists($category->category_image)){
                unlink($category->category_image);
            }
            Category::destroy($d_id);
            session()->flash('success', 'Category Deleted Successfully');
            return redirect()->route('admin.category.index');
        }
    }
}
