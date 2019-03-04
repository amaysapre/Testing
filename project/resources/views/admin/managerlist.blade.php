@extends('layouts.admaster')
@section('content')
<div clss="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	<a href="{{url('admin/addmanager')}}" class="btn btn-primary pull-right">Add Manager</a>
			<table class="table table-bordered">
			  <thead>
			    <tr>
			      <th scope="col">Manager Name</th>
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@foreach($managerlists as $managerlist)
			    <tr>
			      <td>{{ $managerlist->name }}</td>
			      <td><a href ="{{ url('admin/managerlist/edit/'.$managerlist->id) }}" class="btn btn-primary">Edit</a>
			      <a href="" class="btn btn-primary">Delete</a>
			      </td>
			    </tr>
			    @endforeach
			  </tbody>
			</table>
		</div>
	</div>
</div>
@endsection