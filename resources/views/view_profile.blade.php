@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="row">
       <div class="col-md-2" style="margin-top: 12%;">
           @include('layouts.side_navbar')
       </div>
        <div class="col-md-10 panel panel-default" >
          <h3 style="color: red;">{{ $error_msg or '' }}</h3> 
                <div class="col-md-12"><h3>Personal Information <span style="font-size:15px;"><a style="cursor: pointer;" onclick="event.preventDefault(); document.getElementById('main_part').style.display='none';document.getElementById('edit_part').style.display='block';"><i style="padding: 15px;" class="fa fa-edit"></i></a></span></h3><hr></div>
                
                <style type="text/css">
                 td{padding: 15px;font-size: 20px;color: black;}
                 .align_left{text-align: left;color: #4c5db9;}
                </style>
                {{--Main part--}}
                <div id="main_part">
                <div class="col-md-9">
               <table style="width: 100%;">
                    <tr>
                        <td>Name :</td>
                        <td class="align_left">{{$data->name}}</td>
                    </tr>
                    <tr>
                        <td>Email :</td>
                        <td class="align_left">{{$data->email}}</td>
                    </tr> <tr>
                        <td>Primary Phone No :</td>
                        <td class="align_left">{{$data->phone_no}}</td>
                    </tr><tr>
                        <td>Address :</td>
                        <td class="align_left">{{$data->address}}</td>
                    </tr><tr>
                        <td>Optional Phone :</td>
                        <td class="align_left">{{$data->optional_phone}}</td>
                    </tr><tr>
                        <td>Optional Email :</td>
                        <td class="align_left">{{$data->optional_email}}</td>
                    </tr><tr>
                        <td style="padding-bottom: 30px;">Account Open Date :</td>
                        <td class="align_left" style="padding-bottom: 30px;">{{$data->created_at}}</td>
                    </tr>
                </table>
                </div>
                <div class="col-md-3">
                	@if($data->photo)
                	<img src="{{url('storage/user_image/'.$data->photo)}}"  style="width: 100%;height: 100%">
                	@else
                	<img src="{{url('img/Unknown.png')}}" style="width: 100%;height: 100%">
                	@endif
                </div>
            </div>
            {{--Edit part--}}
            <div id="edit_part" style="display: none;">
                <form class="form-horizontal" method="POST" action="{{ route('edit_profile') }}" id="edit_form" enctype='multipart/form-data'>
                  {{ csrf_field() }}
                <div class="col-md-9">
                <table style="width: 100%;">
                    <tr>
                       <td>Name :</td>
                        <td><input type="text" class="form-control"  name="name" placeholder="Enter Your name" value="{{$data->name}}"></td>
                    </tr> <tr>
                        <td>Address :</td>
                        <td><input type="text" class="form-control" name="address" placeholder="Enter Your Address" value="{{$data->address}}"></td>
                    </tr><tr>
                           <td>Optional Phone :</td>
                        <td><input type="text" class="form-control" name="optional_phone" placeholder="Enter Optional Phone No" value="{{$data->optional_phone}}"></td>
                    </tr><tr>
                        <td>Optional Email :</td>
                        <td><input type="text" class="form-control" name="optional_email" placeholder="Enter Optional Email " value="{{$data->optional_email}}"></td>
                    </tr>
                </table> </div>

        	<div class="col-md-3">
			<div style="width:190px;height: 190px; background-color: #95959a;float: left;margin-left: 10px;position: relative; overflow: hidden;" class="image_up">
				@if($data->photo)
                	<img src="{{url('storage/user_image/'.$data->photo)}}" id="image" style="width: 100%;height: 100%">
                	@else
                	<img src="{{url('img/Unknown.png')}}" id="image" style="width: 100%;height: 100%">
                	@endif
			 <input type="file" name="image"  style="font-size: 162px;opacity: 0;margin-top: -219px;" onchange="setImage(this)">
			</div>
		</div>

               <div class="col-md-5"></div>
               <div class="col-md-2">
                   <input type="submit" style="margin-bottom: 15px;"  value="Update" class="btn btn-lg btn-primary">
               </div>              
           </form>
            </div>
        </div>
   </div>
</div>

<script type="text/javascript">
function setImage(input){
 if (input.files && input.files[0]) {
   var reader = new FileReader();
   reader.onload = function(e) {
  $('#image').attr('src', e.target.result);
  }
 reader.readAsDataURL(input.files[0]);
}
}
	
</script>
@endsection


