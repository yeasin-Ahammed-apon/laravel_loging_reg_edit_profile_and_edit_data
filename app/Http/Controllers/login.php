<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class login extends Controller
{
    //login page    
    public function login_page(){
        return view('pages.log.login');
    }
    //login action
    public function login(Request $request){
        $validated = $request->validate([            
            'email' => 'required|email',            
            'password' => 'required|min:3|max:20'
        ]); 
        $email = $request->email;
        $password = $request->password;
        $db = DB::table('users')->where('email',$email)->first();
        $check_pass = Hash::check($password, $db->password);
        if ($check_pass == true) {
            session()->put('loggedin',"true");
            session()->put('name',$db->name);
            session()->put('image',$db->image);
            return redirect('/list')
            ->with('message','Loging successfull')
            ->with('color','text-success');   
        }else{
            return redirect('/login_page')
            ->with('message', 'invaild password or email, plz try again')
            ->with('color','text-danger');   

        }
     
    }
    //registration page
    public function registration_page(){
        return view('pages.log.registration');
    }
    //registration action
    public function registration(Request $request){
        $validated = $request->validate([
            'name' => 'required|unique:users,name|max:30',
            'email' => 'required|email|unique:users,email',
            'image' => 'required|mimes:jpg|unique:users,image|max:500',
            'password' => 'required|max:20|min:3'
        ]); 
        $name = $request->name;
        $email = $request->email;
        $image_file = $request->file('image');
        $image_ext = $request->file('image')->extension();
        $password = $request->password;
              
        Storage::putFileAs("public/users", $image_file, $name.".".$image_ext);            
        DB::table('users')->insert([
            'name' => $name,
            'email' => $email,
            'image' => $name.".".$image_ext,
            'password' => Hash::make($password),
            'created_at' => now()
        ]);

        return redirect('/login_page')
            ->with('message','data added successfully')
            ->with('color','text-success');        
        
        
    }
    //logout action
    public function logout(){
         session()->flush();
        return redirect('/')
            ->with('message','you are logout')
            ->with('color','text-primary');
    }
    
    
}

