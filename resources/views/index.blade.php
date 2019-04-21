@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">


        @if($posts->count()>0)
          @foreach($posts as $post)
            <div class="col-md-12">
              <div class="panel panel-default">
                  
              <div class="row" style="margin-left: -5px;margin-top: 12px;" >

                <div class="col-md-12">
                  <h1>{{$post->title}}</h1>
                  <p>{{$post->post}}</p>
                </div>
              </div>
          
           </div>
            </div>
         @endforeach
         @endif
   </div>
</div>
@endsection


