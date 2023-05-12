<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Section;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    //   public function create($id){
//       $data ['product'] = DB::table('products')
//           ->join('categories','products.category_id', 'categories.id')
//           ->select('categories.category_name','products.*')
//           ->where('products.id',$id)
//           ->first();
//       return view('vendor.productAttributes.create',$data);
//   }

public function addSection(Request $request, $id=null){

    $eventDetails['event'] = Event::with('section')->where(['id' => $id])->first();
    if ($request->isMethod('post')){
        // echo '<pre>'; print_r($data); die;
        $request->validate([
            'section_name' => 'required',
        ]);

        $section = new Section();

        $section->section_name = $request->section_name;
        $section->event_id = $id;

        if ($request->hasFile('section_image')){

            $path = 'images/section';
            $img = $request->file('section_image');
            $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
            $img->move($path,$file_name);

            if ($section->section_image != null && file_exists($section->section_image)){
                unlink($section->section_image);
            }

            $section->section_image = $path .'/'. $file_name;

        }
        $section->save();
        session()->flash('success','Section added Successfully');
        return redirect('/admin/add/section/'.$id);

    }
    return view('admin.section.create',$eventDetails);

}



public function editSection($id){
    $data['section']= Section::find($id);
    return view('admin.section.edit',$data);
}


public function update(Request $request, $id){

    $request->validate([
        'section_name' => 'required',
    ]);

    $section = Section::find($id);

    $section->section_name = $request->section_name;
    $section->event_id = $section->event_id;

        if ($request->hasFile('section_image')){

            $path = 'images/section';
            $img = $request->file('section_image');
            $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
            $img->move($path,$file_name);

            if ($section->section_image != null && file_exists($section->section_image)){
                unlink($section->section_image);
            }

            $section->section_image = $path .'/'. $file_name;

        }
        $section->save();
        session()->flash('success','Section Updated Successfully');
    return redirect()->route('admin.add.section',$section->event_id);
}

public function deleteSection($id){
    Section::where('id',$id)->delete();
    return redirect()->back();
}
}