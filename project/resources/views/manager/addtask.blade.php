@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Task</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ 'addtask'}}  ">
                    	<input type="hidden" name="assign_by" value="{{ $id }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('task_name') ? ' has-error' : '' }}">
                            <label for="task_name" class="col-md-4 control-label">Task</label>

                            <div class="col-md-6">
                                <input id="task_name" type="text" class="form-control" name="task_name" value="{{ old('task_name') }}" autofocus>

                                @if ($errors->has('task_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('task_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('duration') ? ' has-error' : '' }}">
                            <label for="duration" class="col-md-4 control-label">Duration</label>

                            <div class="col-md-6">
                                <input id="duration" type="text" class="form-control" name="duration" value="{{ old('duration') }}" autofocus>

                                @if ($errors->has('duration'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('duration') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('devloper') ? ' has-error' : '' }}">
                            <label for="devloper" class="col-md-4 control-label">Devloper Name</label>

                            <div class="col-md-6">
                              <select name ="devloper_id" class="form-control">
                                    <option value="">Select devloper</option>
                                    @foreach($results as $result)
                                    <option value="{{ $result->id }}">{{ $result->name }}</option>
                                    @endforeach
                                </select>  
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
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