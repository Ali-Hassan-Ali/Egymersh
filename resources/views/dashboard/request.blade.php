@extends('dashboard.layouts.master')

@section('page_content')

<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Requests</h2>
        </div>
        @include('dashboard.layouts.messages')

    </div>
   @livewire('walit.showadmin')
      </div>
    </div>


        <div class="modal fade"  id="request_id" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Change</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                     <form method="POST" action="{{ route('requset.update') }}" enctype="multipart/form-data" >
                       @csrf
                        <input name="id" type="hidden" id="inputID" value="" />
                        <div class="modal-body">
                            <div class="mb-4">
                                <label class="form-label">message</label>
                                <input type="text"  id="message"  name="message" type="inputID" placeholder="Enter message" class="form-control">
                            </div>
                            <div class="mb-4">
                            <label class="form-label">select status</label>
                            <select class="form-select" id="status" name="status"  id="selct-store-order">
                                <option>pending</option>
                                <option>confirmed</option>
                                <option>Rejected</option>
                            </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="supmit" id="id" value="id" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                    </div>
            </div>
        </div>



</section>


@endsection


@section('scripts')
<script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    $(document).ready(function() {
        $( ".change_request" ).click(function() {

          var requestId =  $(this).attr( "request_id" );
          $("#inputID").val(requestId);
        });
    });



</script>


@endsection
