@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/locales.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.css"></script>

    <div class="container">
            <a href="{{ url('/tasks') }}">
            <button type="submit" class="btn btn-default" >
                <i class="fa fa-plus"></i> My Tasks
            </button>
            </a>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel-heading">All tasks
                        <br><label for="task-name" class="control-label">Add task for user.</label>
                        <!--add task-->

                        <div action="{{ url('taskCreate')}}" method="POST" class="form-horizontal"> {{csrf_field()}}
                            <div class="col-md-7 col-md-offset-2 ">
                                <form action="{{ url('taskCreate')}}" method="POST" class="form-horizontal"> {{csrf_field()}}
                                    <div class="col-md-7 col-md-offset-3 ">
                                          <label for="task-name" class="control-label">Title</label>
                                          <input type="text" name="title" id="title" class="form-control" value="{{old('task')}}">
                                          <label for="task-description" class="control-label">Discription</label>
                                          <textarea type="text" name="description" id="description" class="form-control" value="{{old('task')}}"></textarea>
                                          <label for="task-email" class="control-label">Email</label>
                                          <input type="email" name="email_us" id="email_us" class="form-control" value="{{old('task')}}">
                                          <label>Deadline</label>
                                          <input name="dateTime" id="dateTime" class="timepicker form-control" type="datetime-local">
                                             <script type="text/javascript">
                                                 $('.timepicker').datetimepicker({
                                                     format: 'HH:ss:mm'
                                                 });
                                             </script>
                                    </div>
                                    <div class="form-group">
                                    <div class="col-sm-offset-10">
                                        <button type="submit" class="btn btn-default">
                                        <i class="fa fa-plus"></i> Add Task
                                        </button>
                                    </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
                    <div class="panel-body">

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                            </div>
@endsection