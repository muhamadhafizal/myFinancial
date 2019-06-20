@extends('layouts.app')

@section('content')
<div class="container">

    @if(Session::has('flash_message'))
        <div class="alert alert-success"><span class="fa fa-check"></span><em> {!! session('flash_message') !!}</em></div>
    @endif
    @if(Session::has('flash_message_delete'))
        <div class="alert alert-danger"><span class="fa fa-check"></span><em> {!! session('flash_message_delete') !!}</em></div>
    @endif

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Business

                 <a href="" class="btn btn-xs pull-right" data-toggle="modal" data-target="#exampleModal">add</a>
                 <!-- <a href="" class="btn btn-xs pull-right">Personal</a> -->
                 <a href="{{ route('home') }}" class="btn btn-xs pull-right">Home</a>
                </div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h5>In: RM{{$in}} &nbsp Out: RM{{$out}}</h5>
                    <h5>Net: RM{{$net}}</h5>
                    
                   <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Date</th>
                            <th>Title</th>
                            <th>In(+)</th>
                            <th>Out(-)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                       @foreach($a as $data)
                       
                           <tr>
                               <td>{{$i++}}</td>
                               <td>{{$data->date}}</td>
                               <td>{{$data->name}}</td>
                               <td>{{$data->profit}}</td>
                               <td>{{$data->expanses}}</td>
                               <td> <a href="{{ action('BusinessController@show', $data->id) }}"><i class="fa fa-eye"></i> | <a onclick="return confirm('Are you sure you want to delete?')" href="{{ action('BusinessController@destroy', $data->id) }}"><i class="fa fa-trash-o"></i></a></td>      
                           </tr>
                       @endforeach
                   </table>
                   <!-- Button trigger modal -->

                   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                       <div class="modal-content">
                         <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Add Transaction</h5>
                         </div>
                         <div class="modal-body">
                           <form method="POST" action="{{ route('addtransaction') }}">
                            {{ csrf_field() }}
                             <div class="form-group">
                               <label for="recipient-name" class="col-form-label">Title</label>
                               <input type="text" class="form-control" name="title" required>
                             </div>
                             <div class="form-group">
                               <label for="recipient-name" class="col-form-label">Amount RM</label>
                               <input type="number" class="form-control" name="amount" step="0.01" required>
                             </div>
                             <div class="form-group">
                               <label for="recipient-name" class="col-form-label">Date</label>
                               <input type="date" class="form-control" name="date" required>
                             </div>
                             <div class="form-group">
                               <label for="recipient-name" class="col-form-label">Category</label>
                               <select name="category" class="form-control">
                                   <option value="revenue">In</option>
                                   <option value="expanses">Out</option>
                                 </select>
                             </div>
                             <div class="form-group">
                               <label for="message-text" class="col-form-label">Remarks:</label>
                               <textarea class="form-control" name="remarks" required></textarea>
                             </div>
                             <div class="modal-footer">
                               <button type="submit" class="btn btn-primary">submit</button>
                             </div>
                           </form>
                         </div>
                       </div>
                     </div>
                   </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
  
  $(document).ready( function () {
      $('.table').DataTable();
  } );

</script>
@endpush