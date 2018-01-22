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
                                <input type="email" name="email_us" id="email_us" class="form-control" value="{{old('task')}}">
                                <label>Deadline</label>
                            </div>
                            </form>
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
                            <table class="table table-striped task-table">
                                @foreach ($tasks as $task)
                                    <tr>

                                            <td class="table-text"><div>{{ $tasks->title }}</div></td>

                                            <!-- Task Delete Button -->
                                            <td>
                                                <form action="{{url('home/' . $tasks->id)}}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <div>For User: {{ $tasks->email_us }}</div>
                                                    <div>From User: {{ $tasks->user_id }}</div>
                                                    <button type="submit" id="delete-task-{{ $tasks->id }}" class="btn btn-danger">
                                                        <i class="fa fa-btn fa-trash"></i>Delete
                                                    </button>
                                                </form>
                                            </td>

                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
