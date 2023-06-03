<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Venue;
use Illuminate\Http\Request;

class VenueController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data ['venue'] = Venue::all();
        return view('admin.venue.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.venue.create');
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

            $venue = new Venue();

            $venue->venue_name = $request->name;

            if ($request->hasFile('image')){

                $path = 'images/venue';
                $img = $request->file('image');
                $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
                $img->move($path,$file_name);

                if ($venue->venue_image != null && file_exists($venue->venue_image)){
                    unlink($venue->venue_image);
                }

                $venue->venue_image = $path .'/'. $file_name;

            }
            $venue->save();
            session()->flash('success', 'Venue Added Successfully');
            return redirect()->route('admin.venue.index');
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
        $data ['venue'] = Venue::find($d_id);
        return view('admin.venue.edit',$data);
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
                'venue_name' => 'required',
            ]);

            $venue = Venue::find($d_id);
            $venue->category_name = $request->category_name;

            if ($request->hasFile('image'))
            {

                $path = 'images/venue';
                $img = $request->file('image');
                $file_name = rand(0000,9999).'-'.$img->getFilename().'.'.$img->getClientOriginalExtension();
                $img->move($path,$file_name);


                if ($venue->venue_image != null && file_exists($venue->venue_image)){
                    unlink($venue->venue_image);
                }

                $venue->venue_image = $path .'/'. $file_name;

            }
            $venue->save();
            session()->flash('success', 'Venue Updated Successfully');
            return redirect()->route('admin.venue.index');
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
            $venue=Venue::find($d_id);

            if ($venue->venue_image != null && file_exists($venue->venue_image)){
                unlink($venue->venue_image);
            }
            Venue::destroy($d_id);
            session()->flash('success', 'Venue Deleted Successfully');
            return redirect()->route('admin.venue.index');
        }
    }
}
