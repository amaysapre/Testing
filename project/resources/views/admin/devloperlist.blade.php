@extends('layouts.admaster')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Devloper List</div>
                <a href="{{url('admin/adddevloper')}}" class="btn btn-primary pull-right">Add Devloper</a>
                <div class="panel-body"></div>
                <table class="table">
					  <thead class="thead-dark">
					    <tr>
					      <th scope="col">Devloper Name</th>
					      <th scope="col">Manager Name</th>
					      <th scope="col">Action</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach($devlists as $devlist)
					    <tr>
					      <td>{{ $devlist->name }}</td>
					      <td>@if(isset($devlist->manager)){{ $devlist->manager->name}}
						  @endif
					      </td>
					      <td><a href="{{'devloperlist/devedit/'.$devlist->id}}" class="btn btn-primary">Edit</a>
					      	  <a href="" class="btn btn-primary">Delete</a>
					      </td>
					    </tr>
					    @endforeach
					  </tbody>
					</table>
			</div>
		</div>
	</div>
</div>	
@endsection