@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header ">Units List <a href="/units/create"><button class="btn btn-primary float-right ">Add New Unit</button></a></div>
                @if (session('msg'))
                    <div class="alert alert-success" role="alert">
                    {{ session('msg') }}
                    </div>
                @endif
                @if (session('err'))
                    <div class="alert alert-danger" role="alert">
                    {{ session('err') }}
                    </div>
                @endif
                <div class="card-body">
                 <!-- Units Table -->
                 <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Block No.</th>
                            <th scope="col">Unit No.</th>
                            <th scope="col">Occupant Name</th>
                            <th scope="col">Contact No.</th>
                            <th scope="col">Current Visitors</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($units as $key=>$unit)
                            <tr>
                            <th scope="row">{{$unit->id}}</th>
                            <td>{{$unit->block_no}}</td>
                            <td>{{$unit->unit_no}}</td>
                            <td>{{$unit->occupant_name}}</td>
                            <td>{{$unit->contact_no}}</td>
                            <td>
                            @isset($unit->current_visitors)
                             {{count($unit->current_visitors)}}
                            @endisset
                            </td>
                            <td>
                            <a href="/units/{{$unit->id}}">Edit</a>
                            | 
                            <a href="#" onclick="myFunction({{$unit->id}})" >Delete</a>
                            </td>
                            </tr>
                            @endforeach
                        
                        </tbody>
                </table>
                <div class="d-flex justify-content-center ">
                    {{ $units->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
      <h5 class="modal-title text-center">Are you sure to Delete this unit ID of <span id="delete_id"></span>?</h5>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
        <form method="post" action="#" id="delete_form">
        @csrf 
        @method('delete')
        <button type="submit" class="btn btn-primary">Delete</button>
        </form>
        
      </div>
    </div>
  </div>
</div>
<script>
function myFunction(x) {
    $('#exampleModal').modal('show');
    document.getElementById('delete_id').innerHTML=x;
    document.getElementById('delete_form').action=`/units/${x}`;
}
</script>
@endsection
