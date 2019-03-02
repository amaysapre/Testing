@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	<a href="{{ url('manager/addtask') }}" class="btn btn-primary pull-right">Add Task </a>
			<table class="table table-sm table-bordered">
			  <thead>
			    <tr>
			      <th scope="col">Task Name</th>
			      <th scope="col">Duration</th>
			      <th scope="col">Devloper Name</th>
			      <th scope="col">Status</th>
			      <th scope="col">Action </th>
			    </tr>
			  </thead>
			  <tbody>
			  	@foreach($tasks as $task)
			    <tr>
			      <td>{{ $task->task_name}}</td>
			      <td>{{ $task->duration}}</td>
			      <td>{{ $task->devloper->name}}</td>
			      <td>{{ $task->status}}</td>
			      <td><a href="{{ url('manager/editstatus/'.$task->id) }}" class="btn btn-primary">Edit</a>
			      	<a href="{{ url('manager/destroy/'.$task->id) }}" class="btn btn-primary" onclick="return confirm('Are you sure you want to delete this item?');">Del</a>
			      	<!-- <form action="{{ url('manager/destroy/'.$task->id) }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="btn btn-primary"value="Delete"/>
                     </form> -->
			      	 
			      </td>
			    </tr>
			    @endforeach
			  </tbody>
			</table>
		</div>
	</div>
</div>






















@endsection