<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Brand;
use App\Models\Category;
use App\Model\Product;
use App\Models\ChildSubCategory;
use App\Models\Event;
use App\Models\ParentSubCategory;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data ['events'] = DB::table('events')
            ->join('parent_sub_categories','events.sub_cat_id', 'parent_sub_categories.id')
            ->join('child_sub_categories','events.child_sub_cat_id', 'child_sub_categories.id')
            ->join('categories','events.category_id', 'categories.id')
            ->select('categories.category_name','parent_sub_categories.sub_cat_name','child_sub_categories.child_sub_cat_name','events.*')
            ->orderBy('events.id','DESC')
            ->get();
        return view('admin.event.index',$data);
    }

    public function details($id){
        $data ['product'] = DB::table('products')
            ->join('categories','products.category_id', 'categories.id')
            ->join('users','products.user_id', 'users.id')
            ->join('brands','products.brand_id', 'brands.id')
            ->select('categories.category_name','users.name','brands.brand_name','products.*')
            ->where('products.id',$id)
            ->first();
        return view('admin.product.details',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        $data['categories'] = Category::all();
        $data ['users'] = User::all();
        return view('admin.event.create',$data);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        if (auth()->user()->demo_id == 1) {
            session()->flash('error', 'Demo account are not change anything! thanks');
            return redirect()->route('admin.products.index');
        }
        else
        {
            $request->validate([
                'category_id' => 'required',
                'parent_sub_cat' => 'required',
                'child_sub_cat' => 'required',
                'match_name' => 'required',
                'image' => 'mimes:jpeg,png,webp',
                'stadium_image' => 'mimes:jpeg,png,webp',
            ]);

            $data = array();

            $data['category_id'] = $request->category_id;
            $data['sub_cat_id'] = $request->parent_sub_cat;
            $data['child_sub_cat_id'] = $request->child_sub_cat;
            $data['match_name'] = $request->match_name;
            $data['match_date_time'] = $request->match_date_time;
            $data['location'] = $request->location;
            $data['description'] = $request->description;



            if ($request->hasFile('image')){

                $path = 'images/events/';
                $img = $request->file('image');
                $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
                $img->move($path,$file_name);


                $data['image'] = $path .'/'. $file_name;

            }if ($request->hasFile('stadium_image')){

                $path = 'images/stadium/';
                $img = $request->file('stadium_image');
                $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
                $img->move($path,$file_name);


                $data['stadium_image'] = $path .'/'. $file_name;

            }
            DB::table('events')->insert($data);
            session()->flash('success', 'Event Created Successfully');
            return redirect()->route('admin.event.index');
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
        $data['categories'] = Category::all();
        $data['parent_sub_cat'] = ParentSubCategory::all();
        $data['child_sub_cat']= ChildSubCategory::all();
        $data['event']= Event::find($d_id);
        return view('admin.event.edit',$data);
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

        if (auth()->user()->demo_id == 1) {
            session()->flash('error', 'Demo account are not change anything! thanks');
            return redirect()->route('admin.products.index');
        }
        else
        {
            $request->validate([
                'category_id' => 'required',
                'sub_cat_id' => 'required',
                'child_sub_cat_id' => 'required',
                'match_name' => 'required',
                'image' => 'mimes:jpeg,png,webp',
                'stadium_image' => 'mimes:jpeg,png,webp',
            ]);

            $d_id = decrypt($id);

            $event = Event::find($d_id);

            $event->category_id = $request->category_id;
            $event->sub_cat_id = $request->sub_cat_id;
            $event->child_sub_cat_id = $request->child_sub_cat_id;
            $event->match_name = $request->match_name;
            $event->match_date_time = $request->match_date_time;
            $event->location = $request->location;
            $event->description = $request->description;

            if ($request->hasFile('image')){

                $path = 'images/events/';
                $img = $request->file('image');
                $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
                $img->move($path,$file_name);

                if ($event->image != null && file_exists($event->image)){
                    unlink($event->image);
                }

                $event->image = $path .'/'. $file_name;

            }

            if ($request->hasFile('stadium_image')){

                $path = 'images/stadium/';
                $img = $request->file('stadium_image');
                $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
                $img->move($path,$file_name);

                if ($event->stadium_image != null && file_exists($event->stadium_image)){
                    unlink($event->stadium_image);
                }

                $event->stadium_image = $path .'/'. $file_name;

            }

            $event->save();
            session()->flash('success', 'Event Updated Successfully');
            return redirect()->route('admin.event.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function replicate($id){
        $data= Event::find($id);
        $newPost = $data->replicate();
        $newPost->created_at = Carbon::now();
        $newPost->save();
        return redirect()->route('admin.event.index');
    }
    public function destroy($id)
    {


    }

    public function delete($id){
        if (auth()->user()->demo_id == 1) {
            session()->flash('error', 'Demo account are not change anything! thanks');
            return redirect()->route('admin.products.index');
        }
        else
        {
            $d_id = decrypt($id);
            $attribute = DB::table('attributes')
                ->join('products','attributes.product_id', 'products.id')
                ->select('attributes.product_id','products.*')
                ->where('attributes.product_id',$d_id)
                ->first();
            $product = Product::find($d_id);


            if (!empty($attribute->product_id)){
                session()->flash('warning','Product not deleted  because at first deleted Attribute');
                return redirect()->route('admin.products.index');
            }
            else{
                $images = json_decode($product->product_image);
                $path = 'images/products/';

                foreach ($images as $eachImage) {
                    unlink($path . $eachImage);
                }
                Product::destroy($d_id);
                session()->flash('success', 'Product Deleted Successfully');
                return redirect()->route('admin.products.index');
            }
        }

    }

    public function productList(){
        $data ['products'] = DB::table('products')
            ->join('categories','products.category_id', 'categories.id')
            ->join('users','products.user_id', 'users.id')
            ->join('brands','products.brand_id', 'brands.id')
            ->select('categories.category_name','users.name','brands.brand_name','products.*')
            ->orderBy('products.id','DESC')
            ->get();
        return view('admin.stock.product',$data);
    }

}