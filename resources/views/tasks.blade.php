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
                <div class="panel panel-default">
                    <div class="panel-heading">My tasks
                        <div class="form-group">
                            <div class="col-sm-offset-10">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-plus"></i> Add Task
                                </button>
                            </div>
                            <form action="{{ url('task')}}" method="POST" class="form-horizontal">
                                {{csrf_field()}}
                            <div class="col-md-7 col-md-offset-1">
                                <label for="task-name" class="control-label">Title</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{old('task')}}">
                                <label for="task-discription" class="control-label">Discription</label>
                                <input type="text" name="discription" id="discription" class="form-control" value="{{old('task')}}">
                                <label for="task-email" class="control-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{old('task')}}">
                                <label>Deadline</label>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <!--task btn-->


                        <div class="panel-body">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
