@extends('layouts.admaster')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{url('admin/devloperlist/devupdate/'.$devedits->id)}}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Devloper Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $devedits->name }}"autofocus>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('devloper') ? ' has-error' : '' }}">
                            <label for="devloper" class="col-md-4 control-label">Manager Name</label>

                            <div class="col-md-6">
                              <select name ="manager" class="form-control">
                                    <option value="">Select Manager</option>
                                    <option value=""></option>
                                </select>  
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>  	
@endsection