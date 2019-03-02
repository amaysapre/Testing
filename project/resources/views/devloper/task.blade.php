@extends('layouts.devmaster')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	<table class="table">
  <thead>
    <tr>
      <th scope="col">Task Name</th>
      <th scope="col">Timing</th>
      <th scope="col">Assign By</th>
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
      <td>{{ $task->status }}</td>
      <td><a href="{{ url('devloper/edit/'.$task->id)}}" class="btn btn-primary">Edit</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
    	</div>    	
    </div>	
</div>
@endsection