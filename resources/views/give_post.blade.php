@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1" style="background-color: white">
			<div class="row">
				<div class="col-md-12">
			<h2>Give Your Post </h2>
			<form action="{{route('submit_post')}}" method="post" enctype='multipart/form-data'>
				{{ csrf_field() }}
				<table style="width: 100%;" id="input_table">
					<tr>
						<td><label> Title : </label></td>
						<td><input type="text" name="title" class="form-control" required="true" value=""><br></td>
					</tr>
					<tr>
						<td><label>Post :</label></td>
						<td><textarea cols="50" rows="10" class="form-control" name="post" required="true"></textarea><br></td>
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