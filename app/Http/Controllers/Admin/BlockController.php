<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Event;
use App\Models\Section;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    public function addBlock(Request $request, $id=null){

        $eventDetails['event'] = Event::with('section','block')->where(['id' => $id])->first();
        if ($request->isMethod('post')){
            // echo '<pre>'; print_r($data); die;
            $request->validate([
                'block_number' => 'required',
            ]);

            $block = new Block();

            $block->block_number = $request->block_number;
            $block->event_id = $id;
            $block->section_id = $request->section_id;

            if ($request->hasFile('block_image')){

                $path = 'images/block';
                $img = $request->file('block_image');
                $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
                $img->move($path,$file_name);

                if ($block->block_image != null && file_exists($block->block_image)){
                    unlink($block->block_image);
                }

                $block->block_image = $path .'/'. $file_name;

            }
            $block->save();
            session()->flash('success','Block added Successfully');
            return redirect('/admin/add/block/'.$id);

        }
        return view('admin.block.create',$eventDetails);

    }

    public function editBlock($id){
        $data['sections']= Section::where('event_id',$id)->get();
        $data['block']= Block::find($id);
        return view('admin.block.edit',$data);
    }

    public function update(Request $request, $id){

        $request->validate([
            'block_number' => 'required',
        ]);

        $block = Block::find($id);

            $block->block_number = $request->block_number;
            $block->event_id = $block->event_id;
            $block->section_id = $block->section_id;

            if ($request->hasFile('block_image')){

                $path = 'images/block';
                $img = $request->file('block_image');
                $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
                $img->move($path,$file_name);

                if ($block->block_image != null && file_exists($block->block_image)){
                    unlink($block->block_image);
                }

                $block->block_image = $path .'/'. $file_name;

            }
            $block->save();
            session()->flash('success','Block Updated Successfully');
        return redirect()->route('admin.add.block',$block->event_id);
    }

    public function deleteBlock($id){
        Block::where('id',$id)->delete();
        return redirect()->back();
    }
}