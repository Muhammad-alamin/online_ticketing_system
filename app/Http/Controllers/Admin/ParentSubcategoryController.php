<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Model\ParentSubCategory as ModelParentSubCategory;
use App\Models\ParentSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParentSubcategoryController extends Controller
{
    public function view(){
        $data['categories'] = Category::orderBy('id','DESC')->get();
        return view('admin.parentSubCategory.create',$data);
    }

    public function index(){
        $data ['subCategories'] = DB::table('parent_sub_categories')
            ->join('categories','parent_sub_categories.parent_category_id', 'categories.id')
            ->select('categories.category_name','parent_sub_categories.*')
            ->orderBy('parent_sub_categories.id','DESC')
            ->get();
        return view('admin.parentSubCategory.index' ,$data);
    }

    public function store(Request $request){
        $request->validate([
            'sub_cate_name'   => 'required',
         ]);

         $category = new ParentSubCategory();

         $category->parent_category_id = $request->category_id;
         $category->sub_cat_name = $request->sub_cate_name;

         $category->save();
         session()->flash('success', 'Sub Category Created Successfully');
         return redirect()->route('admin.parent-sub-category.list');
    }

    public function edit($id){
        $d_id = decrypt($id);
        $data['categories'] = Category::all();
        $data['sub_category'] = ParentSubCategory::find($d_id);
        return view('admin.parentSubCategory.edit',$data);
    }

    public function update(Request $request, $id){
        $request->validate([
            'sub_cat_name'   => 'required',
         ]);

         $d_id = decrypt($id);
        $category = ParentSubCategory::find($d_id);
        $category->parent_category_id = $request->category_id;
         $category->sub_cat_name = $request->sub_cat_name;

        $category->save();
        session()->flash('success', 'Sub Category Updated Successfully');
         return redirect()->route('admin.parent-sub-category.list');
    }

    public function delete($id){
        $d_id = decrypt($id);

        ParentSubCategory::destroy($d_id);
        session()->flash('success', 'Sub Category deleted Successfully');
        return redirect()->route('admin.parent-sub-category.list');
    }
}
