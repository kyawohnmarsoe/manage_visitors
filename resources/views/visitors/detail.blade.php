@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Visitors List <a href="{{url('/visitors')}}"><button class="btn btn-secondary float-right ">Back</button></a></div>
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
                            <th scope="col">Visitor Name</th>
                            <th scope="col">Contact No.</th>
                            <th scope="col">Block No.</th>
                            <th scope="col">Unit No.</th>
                            <th scope="col">NRIC No.</th>
                            <th scope="col">Entry At</th>
                            <th scope="col">Exit At</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($visitors as $key=>$visitor)
                            <tr>
                            <th scope="row">{{$visitor->id}}</th>
                            <td>{{$visitor->visitor_name}}</td>
                            <td>{{$visitor->contact_no}}</td>
                            <td>{{$visitor->block_no}}</td>
                            <td>{{$visitor->unit_no}}</td>
                            <td>{{$visitor->nric_no}}</td>
                            <td>{{$visitor->entry_at}}</td>
                            <td>
                            @isset($visitor->exit_at)
                            {{$visitor->exit_at}}
                            @endisset
                            @empty($visitor->exit_at)
                            <form method="post" action="{{url('/visitors/exit/'.$visitor->id)}}">
                            @csrf 
                            @method('PATCH')
                            <button class="btn btn-success" type="submit">Exit</button>
                            </form>
                            @endempty
                            </td>
                         
                            <td>
                            <a href="{{url('/visitors/'.$visitor->id)}}">Edit</a>
                            | 
                            <a href="#" onclick="myFunction({{$visitor->id}})" >Delete</a>
                            </td>
                            </tr>
                            @endforeach
                        
                        </tbody>
                </table>
                  <div class="d-flex justify-content-center ">
                    {{ $visitors->links() }}
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
      <h5 class="modal-title text-center">Are you sure to Delete this visitor ID of <span id="delete_id"></span>?</h5>
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
    document.getElementById('delete_form').action=`{{url('/visitors/${x}')}}`;
}
</script>
@endsection
