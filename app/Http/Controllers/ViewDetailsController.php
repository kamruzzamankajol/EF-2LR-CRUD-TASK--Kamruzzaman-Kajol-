<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
class ViewDetailsController extends Controller
{

	public function index(){
       $posts= Post::orderBy('id','desc')->get();
       return view('index',compact('posts'));
	}

  public function search(Request $request){
     $posts= new Post;
  if($request->has('family_bachelor')){
      $posts = $posts->whereIn('family_bachelor', $request->input('family_bachelor')); }
   if($request->has('title')){
        $posts = $posts->whereIn('title',$request->input('title'));
     }
    
      if($request->has('address')){
        $posts = $posts->where('address',$request->input('address'));
     }
      if($request->input('range') != 0){
        $posts = $posts->where('rent','<=',$request->input('range')*1000);
      }
    $posts = $posts->get();
    return view('index',compact('posts'));
  }


  public function view_details($id){
    $data=Post::where('id',$id)->count();
    if($data>0){
    $data=Post::find($id);
    $user_phone=User::select('phone_no')->where('id',$data->user_id)->first();
    $data->phone=$user_phone->phone_no;
    return view('view_details',compact('data'));
     }
     return redirect()->back();
    }
}
