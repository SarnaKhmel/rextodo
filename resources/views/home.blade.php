@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/public/css/app.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700%7COpen+Sans:400,300%7CLibre+Baskerville:400,400italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="../castom/assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../castom/assets/css/simple-line-icons.css">
    <link rel="stylesheet" type="text/css" href="../castom/assets/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../castom/assets/css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="../castom/assets/css/jquery.timepicker.css">
    <link rel="stylesheet" type="text/css" href="../castom/assets/css/vegas.min.css" >
    <link rel="stylesheet" type="text/css" href="../castom/assets/css/global.css">
    <link rel="stylesheet" type="text/css" href="../castom/assets/css/style.css" >
    <script type="text/javascript" src="../castom/assets/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="../castom/assets/js/jquery-ui.js"></script>
    <script type="text/javascript" src="../castom/assets/js/jquery.timepicker.min.js"></script>
    <script type="text/javascript" src="../castom/assets/js/bootstrap.js"></script>
    <script src="http://www.openlayers.org/api/OpenLayers.js"></script>
    <script src="../castom/assets/js/vegas.min.js"></script>

    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
    <script src="http://ubilabs.github.io/geocomplete/jquery.geocomplete.js"></script>
    <div class="container">
        <a href="{{ url('/tasks') }}">
            <button type="submit" class="btn btn-default" >
                <i class="fa fa-plus"></i> My Tasks
            </button>
        </a>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">All tasks

                        <!--add task-->
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

                            <!--    <div class="input-wrap clearfix">
                                    <input type="text" class="form-control time-pick" placeholder="07:00 am" id="timetwo" style="background:#ffffff;" title="Time in format 18/01/2018">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                </div>
                            -->



                                <div class="well">
                                    <div  class="input-append date" id="datetimepicker1">
                                        <input data-format="dd/MM/yyyy hh:mm:ss"  type="text"/>
                                        <span class="add-on">
                                            <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                                       </span>
                                    </div>
                                </div>
                                -->
                                <div class="input-wrap clearfix">
                                    <input type="text" class="form-control pick-date2" placeholder="06/11/2016" id="datetwo" style="background:#e9faff;" title="Дата прибуття у форматі 04/09/2016">
                                    <i class="fa fa-calendar-o" aria-hidden="true"></i>
                                </div>

                                <div class="input-wrap clearfix">
                                    <input type="text" class="form-control time-pick" placeholder="07:00 am" id="timetwo" style="background:#dcfffc;" title="Час прибуття у форматі 04/09/2016">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                </div>

                                <script>
                                    $( document ).ready(function() {
                                        $('#datetimepicker1').datepicker({
                                            language: 'pt-BR'
                                        });
                                    });
                                </script>

                                <script>
                                    $(function(){
                                        //$('#dateone').datepicker();
                                        $('#datetwo').datepicker();
                                        // $('#timeone').timepicker();
                                        $('#timetwo').timepicker();
                                        /*$("#accordion").accordion();
                                          $("#dialog").dialog();
                                          $("#txtAddressk").geocomplete();
                                          $("#txtAddressl").geocomplete();*/
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

                    <div class="panel-body">

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif



                            </div>
                        <div class="panel-body">

                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection
