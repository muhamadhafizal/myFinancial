@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit
				

                 <!-- <a href="" class="btn btn-xs pull-right" data-toggle="modal" data-target="#exampleModal">add</a> -->
                 <!-- <a href="" class="btn btn-xs pull-right">Personal</a> -->
                 <a href="{{ route('home') }}" class="btn btn-xs pull-right">Home</a>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('update', $data->id) }}">
                         {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$data->name}}" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Date</label>
                            <div class="col-md-6">
                                <input id="date" type="text" class="form-control" name="date" value="{{$data->date}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">In</label>
                            <div class="col-md-6">
                                <input id="in" type="text" class="form-control" name="in" value="{{$data->profit}}">
                            </div>
                        </div>

                         <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Out</label>
                            <div class="col-md-6">
                                <input id="out" type="text" class="form-control" name="out" value="{{$data->expanses}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Remarks</label>
                            <div class="col-md-6">
                                <textarea name="remarks" class="form-control">{{$data->remarks}}</textarea>
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
