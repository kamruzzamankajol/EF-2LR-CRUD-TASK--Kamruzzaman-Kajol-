@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1" style="background-color: white">
			<div class="row">
				<div class="col-md-12">
			<h2>Update Your Post </h2>
			<form action="{{route('submit_update_post')}}" method="post" enctype='multipart/form-data'>
				{{ csrf_field() }}
				<input type="hidden" name="post_id" value="{{$data->id}}">
				<table style="width: 100%;" id="input_table">
					<tr>
						<td><label> Title : </label></td>
						<td><input type="text" name="title" class="form-control" required="true" value="{{$data->title}}"><br></td>
					</tr>
					<tr>
						<td><label>Post :</label></td>
						<td><textarea cols="50" rows="10" class="form-control" name="post" required="true">{{$data->post}}</textarea><br></td>
					</tr>
				</table>
				<br>
					<input type="submit" class="btn btn-lg btn-primary" style="float: right;margin-bottom: 15px;margin-left: -50px;">
		
			</form>
		</div>
	</div>
</div>
</div>
</div>
@endsection
