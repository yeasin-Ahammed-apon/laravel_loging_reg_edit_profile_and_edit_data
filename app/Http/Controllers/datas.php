<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

class datas extends Controller
{ 
    //open for all
    public function home(){
        $db =  DB::table('datas')->get();
        return view('pages.public.home',['datas' => $db]);
    }
    public function view_public($id){
        $db =  DB::table('datas')->where('id',$id)->first();
        return view('pages.public.view_public',['datas' => $db]);
    }

    // list_page of data
    public function list(){
        $db = DB::table('datas')->get();
        return view('pages.data.list',['datas' => $db]);
    }

    // view_page of data
    public function view_page($id){
        $db = DB::table('datas')->where('id',$id)->first();
        return view('pages.data.view',['datas'=>$db]);
    }

    // add_page of data
    public function add_page(){
        return view('pages.data.add');
    }

    // add action of data
    public function add(Request $request){
        $validated = $request->validate([
            'name' => 'required|unique:datas,name|max:30',
            'image' => 'required|mimes:jpg,png|unique:datas,image|max:500',
            'details' => 'required'
        ]); 
        $name = $request->name;
        $image_file = $request->file('image');
        $image_ext = $request->file('image')->extension();        
        $details = $request->details;
              
        Storage::putFileAs("public/image", $image_file, $name.".".$image_ext);            
        DB::table('datas')->insert([
           'name' => $name,
           'image' => $name.".".$image_ext,
           'details' => $details
        ]);

        return redirect('/list')
            ->with('message','data added successfully')
            ->with('color','text-success');        
        
    }

    // edit_page of data
    public function edit_page($id){
        $db = DB::table('datas')->where('id',$id)->first();
        return view('pages.data.edit',['datas'=>$db]);
    }

    // update action of data
    public function update(Request $request){ 
        $id = $request->id;
            
        $validated = $request->validate([
            'name' => 'required|unique:datas,name,'.$id.',id|max:30',
            'image' => 'mimes:jpg,png|max:500',
            'details' => 'required'
        ]);        

        $name = $request->name;                            
        $details = $request->details; 

        $db = DB::table('datas')->where('id',$id)->first();
        
        if ($request->has('image')){
            $image_file = $request->file('image');  
            $image_ext = $request->file('image')->extension();  
            Storage::delete('public/image/'.$db->image);
            Storage::putFileAs("public/image", $image_file, $name.".".$image_ext);
            DB::table('datas')
                ->where('id',$id)
                ->update([
                'name' => $name,
                'image' => $name.".".$image_ext,
                'details' => $details
             ]);
        }
        if (!$request->has('image')) {            
            $image_ext = pathinfo(storage_path().'public/image/'.$db->image ,PATHINFO_EXTENSION);        
            if ($name == $db->name) {
                DB::table('datas')
                ->where('id',$id)
                ->update([                                
                'details' => $details
             ]); 
            }
            if ($name != $db->name) {
            Storage::move('public/image/'.$db->image, "public/image/$name.$image_ext");            
            DB::table('datas')
                ->where('id',$id)
                ->update([
                'name' => $name,
                'image' => $name.".".$image_ext,
                'details' => $details
             ]);
            }
            
        }        

        return redirect('/list')
            ->with('message','data update successfully')
            ->with('color','text-primary'); 
        
    }

    // delete action of data
    public function delete($id){
     DB::table('datas')
            ->where('id',$id)
            ->delete();

        return redirect('/list')
                ->with('message','data deleted successfully')
                ->with('color','text-danger');            
        
    }
}
