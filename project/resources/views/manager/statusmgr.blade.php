@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{url('manager/editstatus/'.$status->id)}}">
                   
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="task_name" class="col-md-4 control-label">TaskName</label>

                            <div class="col-md-6">
                                <input id="task_name" type="text" class="form-control" name="task_name" value="{{$status->task_name}}" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="duration" class="col-md-4 control-label">Duration</label>

                            <div class="col-md-6">
                                <input id="duration" type="text" class="form-control" name="duration" value="{{$status->duration}}" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="assign_by" class="col-md-4 control-label">CreatedBy</label>

                            <div class="col-md-6">
                                <input id="assign_by" type="text" class="form-control" name="createdby" value="{{$status->assign_by}}" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status" class="col-md-4 control-label">Status</label>

                            <div class="col-md-6">
                               <select class="form-control" name="status">

                                <option value="inprogress"  @if($status->status=='inprogress'){{'selected=""'}}
                                @endif >
                                InProgress</option>

                                <option value="completed" @if($status->status=='completed')
                                    {{'selected=""'}}
                                @endif >Completed
                                 </option>
                                    
                                <option value="incomplete" @if($status->status=='incomplete')  {{'selected=""'}}
                                @endif >Incomplete</option>

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