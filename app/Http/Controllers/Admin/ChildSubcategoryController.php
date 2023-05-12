<?php

namespace App\Http\Controllers\Admin;

use App\Models\ChildSubCategory;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ParentSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChildSubcategoryController extends Controller
{
    public function view(){
        $data['categories'] = Category::orderBy('id','DESC')->get();
        return view('admin.childSubCategory.create',$data);
    }

    public function getSubCat($id){
        $parent_sub_cat = ParentSubCategory::where('parent_category_id',$id)->get();
        return response()->json($parent_sub_cat);
    }

    public function getChildSubCat($id){
        $parent_sub_cat = ChildSubCategory::where('sub_cat_id',$id)->get();
        return response()->json($parent_sub_cat);
    }

    public function index(){
        $data ['childSubCategories'] = DB::table('child_sub_categories')
            ->join('parent_sub_categories','child_sub_categories.sub_cat_id', 'parent_sub_categories.id')
            ->join('categories','child_sub_categories.parent_category_id', 'categories.id')
            ->select('categories.category_name','parent_sub_categories.sub_cat_name','child_sub_categories.*')
            ->orderBy('child_sub_categories.id','DESC')
            ->get();
        return view('admin.childSubCategory.index' ,$data);
    }

    public function store(Request $request){
        $request->validate([
            'child_sub_cate_name'   => 'required',
         ]);

         $category = new ChildSubCategory();

         $category->parent_category_id = $request->category_id;
         $category->sub_cat_id = $request->parent_sub_cat;
         $category->child_sub_cat_name = $request->child_sub_cate_name;
         $category->save();
         session()->flash('success', 'Child Sub Category Created Successfully');
         return redirect()->route('admin.child-sub-category.list');
    }

    public function edit($id){
        $d_id = decrypt($id);
        $data ['childSubCategories'] = ChildSubCategory::with('categories','parent_sub_categories')->find($d_id);
        return view('admin.childSubCategory.edit',$data);
    }

    public function update(Request $request, $id){
        $request->validate([
            'child_sub_cat_name'   => 'required',
         ]);

         $d_id = decrypt($id);
        $category = ChildSubCategory::find($d_id);
         $category->child_sub_cat_name = $request->child_sub_cat_name;

        $category->save();
        session()->flash('success', 'Child Sub Category Updated Successfully');
         return redirect()->route('admin.child-sub-category.list');
    }

    public function delete($id){
        $d_id = decrypt($id);

        ChildSubCategory::destroy($d_id);
        session()->flash('success', 'Sub Category deleted Successfully');
        return redirect()->route('admin.child-sub-category.list');
    }
}
