@extends('layouts.admaster')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">Task Name</th>
				      <th scope="col">Duration</th>
				      <th scope="col">Manager name</th>
				      <th scope="col">Devloper Name</th>
				      <th scope="col">Status</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($tasks as $task)
				    <tr>
						<td>{{ $task->task_name }}</td>
						<td>{{ $task->duration }}</td>
						<td>{{ $task->createdby->name }}</td>
						<td>{{ $task->devloper->name }}</td>
						<td>{{ $task->status }}</td>
						<td><a href="{{ url('admin/task/edittask/'.$task->id)}}"class="btn btn-primary">Edit</a></td>
				    </tr>
				    @endforeach
				  </tbody>
			</table>
        </div>	
    </div>    	
</div>        	

@endsection