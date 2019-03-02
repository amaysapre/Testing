@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	<a href="{{ url('manager/add')}}" class="btn btn-primary pull-right">Add</a>
			<table class="table table-sm table-bordered">
			  <thead>
			    <tr>
			      <th>Devlopers</th>
			      <th>Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@foreach($devlopers as $devloper)
			    <tr>
			      <td>{{ $devloper->name }}</td>
			      <td><a href="{{ url('manager/devloper/edit/'.$devloper->id) }}" class="btn btn-primary">Edit</a>
			      	  <a href="{{ url('manager/devloper/del/'.$devloper->id) }}"class="btn btn-primary">Delete</a>
			      </td>
			    </tr>
			    @endforeach
			  </tbody>
			</table>

		</div>
	</div>
</div>


@endsection