<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Image;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $posts= Post::all();
       return view('home',compact('posts'));
    }

    public function give_post(){
     return view('give_post');
    }

    public function submit_post(Request $request){

        $post= new Post;
        $post->title =$request->input('title');
        $post->post =$request->input('post');
        if ($post->save()) {
            return redirect('home');
        }
        else{
            return redirect()->back();
        }
    }



 public function edit_post($id){
    $check=Post::where('id',$id)->count();
        if($check==1){
            $data=Post::find($id);
          return view('edit_post',compact('data'));       
        }
        return redirect()->back();
    }



  public function submit_update_post(Request $request){
        $post=Post::find($request->input('post_id'));
        $post->title=$request->input('title');
        $post->post=$request->input('post');
        if ($post->save()) {
            return redirect('home');
        }
        else{
            return redirect()->back();
        }

 }
    public function delete_post($id){
       $check=Post::where('id',$id)->count();
        if($check==1){
          Post::find($id)->delete();
          return redirect()->back();
        }
    }

    
    public function view_profile(Request $request){
      $data = User::find(Auth::user()->id);
      return view('view_profile',compact('data'));
    }

    public function edit_profile(Request $request){
       $image= $request->file('image');
        if($image)
        $image->storeAs('public/user_image',Auth::user()->id.'.jpg');
       $name= $request->input('name');
       $address= $request->input('address');
       $optional_phone= $request->input('optional_phone');
       $optional_email= $request->input('optional_email');

       $user = User::find(Auth::user()->id);
       $user->name = $name;
       $user->photo = Auth::user()->id.'.jpg';
       $user->address = $address;
       $user->optional_phone = $optional_phone;
       $user->optional_email = $optional_email;
 
      if ($user->save()) {
          return redirect()->back();
      }
      else{return redirect()->back()->with($error_msg,'There Have Some Problems...Please Try Again..!!');}
    }

}
