@extends('layouts.admaster')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Task</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="task_name" class="col-md-4 control-label">Task Name</label>

                            <div class="col-md-6">
                                <input id="task_name" type="text" class="form-control" name="task_name" value="{{ $tasks->task_name}}"autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="duration" class="col-md-4 control-label">Duration</label>

                            <div class="col-md-6">
                                <input id="duration" type="text" class="form-control" name="duration" value="{{ $tasks->duration}}"autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="manager_name" class="col-md-4 control-label">Manager name</label>

                            <div class="col-md-6">
                                <select name ="assign_by" id = "mng_list" class="form-control">
                                    <option value="">Select devloper</option>
                                    @foreach($managerlists as $managerlist)
                                        <option value="{{ $managerlist->id }}" @if($managerlist->id==$tasks->assign_by) selected @endif>{{ $managerlist->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="devloper_id" class="col-md-4 control-label">Devloper name</label>

                            <div class="col-md-6">
                               <select name ="devloper_id" id="dev_id" class="form-control">
                                    <option value="">Select devloper</option>
                                    @foreach($devs as $dev)
                                    <option value="{{$dev->id}}" 
                                    @if($dev->id==$tasks->devloper_id)
                                    selected 
                                    @endif >
                                    {{$dev->name}}
                                    </option>
                                    @endforeach
                                </select> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status" class="col-md-4 control-label">Status</label>

                            <div class="col-md-6">
                               <select class="form-control" name="status">

                                <option value="inprogress"  @if($tasks->status=='inprogress'){{'selected=""'}}
                                @endif >
                                InProgress</option>

                                <option value="completed" @if($tasks->status=='completed')
                                    {{'selected=""'}}
                                @endif >Completed
                                 </option>
                                    
                                <option value="incomplete" @if($tasks->status=='incomplete')  {{'selected=""'}}
                                @endif >Incomplete</option>
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
 <script type="text/javascript">
                $(document).ready(function(){
                $('#mng_list').change(function(){
                    var mng_id = $('#mng_list').val();
                    //alert(mng_id);
                    $.ajax({
                    url: '{{ url("get_dev") }}',
                    type : 'POST',
                    data : {'mng_id' : mng_id, '_token' : '{{ csrf_token()   }}'},
                    cache : false,
                    success : function(data)
                          {
                            //alert(data);
                               $('#dev_id').html(data);
                          }
                    });
                });
            });
</script>
@endsection
