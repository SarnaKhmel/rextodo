@extends('layouts.app')
@section('content')


    <div class="container">
        <a href="{{ url('/home') }}">
            <button type="submit" class="btn btn-default" >
                <i class="fa fa-plus"></i> All Tasks
            </button>
        </a>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div class="panel-heading"> My tasks
                    <br><label for="task-name" class="control-label">Add a task to yourself.</label>
                    <!--add task-->
                    <form action="{{ url('taskCreate')}}" method="POST" class="form-horizontal">
                        {{csrf_field()}}
                        <div class="col-md-7 col-md-offset-1">

                            <label for="task-name" class="control-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{old('task')}}">
                            <label for="task-description" class="control-label">Discription</label>
                            <textarea type="text" name="description" id="description" class="form-control" value="{{old('task')}}"></textarea>
                            <label for="task-email" class="control-label">Email</label>
                            <input type="text" name="email_us" id="email_us" class="form-control" value="{{old('task')}}">
                            <label>Deadline</label>

                            <div class="container">
                                <div class="row">
                                    <div class='col-sm-6'>
                                        <div class="form-group">
                                            <div class='input-group date' id='datetimepicker5'>
                                                <input type='text' class="form-control" />
                                                <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-10">

                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-plus"></i> Add Task
                                </button>
                            </div>
                        </div>
                    </form>
                            <ul class="todo-list ui-sortable">
                                @foreach($data as $ololo)
                                    <li id="{{$ololo["id"]}}" >
                                        <span class="text"> {{$ololo['title']}}</span>
                                        <span class="text"> {{$ololo['description']}}</span>
                                        <span class="text"> {{$ololo['email_us']}}</span>
                                        <span class="text"> {{$ololo['time']}}</span>
                                    </li>
                                    @endforeach
                            </ul>
                </div>

                <div class="panel-body">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif





                </div>



            </div>
        </div>
    </div>


@endsection
