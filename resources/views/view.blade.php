@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Info
				

                 <!-- <a href="" class="btn btn-xs pull-right" data-toggle="modal" data-target="#exampleModal">add</a> -->
                 <!-- <a href="" class="btn btn-xs pull-right">Personal</a> -->
                 <a href="{{ route('home') }}" class="btn btn-xs pull-right">Home</a>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal">

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input id="" type="text" class="form-control" name="" value="{{$data->name}}"  disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Date</label>
                            <div class="col-md-6">
                                <input id="" type="text" class="form-control" name="" value="{{$data->date}}" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">In</label>
                            <div class="col-md-6">
                                <input id="" type="text" class="form-control" name="" value="{{$data->profit}}" disabled>
                            </div>
                        </div>

                         <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Out</label>
                            <div class="col-md-6">
                                <input id="" type="text" class="form-control" name="" value="{{$data->expanses}}" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Remarks</label>
                            <div class="col-md-6">
                                <textarea class="form-control" disabled>{{$data->remarks}}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="button" class="btn btn-primary" onclick="window.location='{{ action('BusinessController@edit', $data->id) }}'">Edit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
