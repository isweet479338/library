@extends('layouts.app')

@section('content')

        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">

               <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">All Book List </h4>
                    <p>Total {{ $total }} Books</p>
                    @if (session('message'))
                    <h3 style="color:green">{{ session('message') }}</h3>
                    @endif

                    <h3 id="msg" style="color:green"></h3>

                    <div class="table-responsive">
                       <table id="myTable" class="table table-bordered">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Name </th>
                            <th> Auther </th>
                            <th> Image </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($all as $key => $value)
                          <tr>
                            <td> {{$key+1}} </td>
                            <td> {{$value->name}} </td>
                            <td> {{$value->auther}} </td>
                            <td> <img src="{{ asset( 'storage/'. $value->picture ) }}">  </td>
                            <td> 
                              <a data-toggle="modal" data-target="#exampleModal" href="{{ route('book.show', $value->id) }}" data-id='{{ $value->id }}' class="btn btn-primary add" >Add Book Quantity</a>

                              <a href="{{ route('book.show', $value->id) }}" class="btn btn-info">View</a>

                              <a href="{{ route('book.edit', $value->id) }}" class="btn btn-success">Edit</a>

                              <form method="POST" action="{{ route('book.destroy', $value->id) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                              </form>

                             </td>
                          </tr>
                        @endforeach  
                        </tbody>
                      </table>
                   
                    </div>
                  </div>
                </div>
              </div>



              </div>
            </div>
         
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        </div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <input type="number" name="amount" id="amount" placeholder="Please Enter An Amount" required class="form-control" />
         <input type="hidden" name="id" id="id"  />
      </div>
      <div class="modal-footer">
        <button type="button" id="hide" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="add" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>












@push('script')
<script type="text/javascript">
  $(document).ready( function () {
    $('#myTable').DataTable();
} );



jQuery(document).ready(function($){
    //----- Open model CREATE -----//
    
    $(".add").click(function (e) {
          var id = $(this).data('id');
           $('#id').val(id);
    });


    $("#add").click(function (e) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

        e.preventDefault();
        var amount = $('#amount').val();
        var id = $('#id').val();

        var type = "POST";
        var ajaxurl = "{{ route('quantity') }}";
        $.ajax({
            type: type,
            url: ajaxurl,
            data: {'id' : id, 'amount' : amount },
            dataType: 'json',
            success: function (data) {
              $('#amount').val('');
              $('#id').val('');
              $('#hide').click();
              $('#msg').text('Amount Added Success.');

            },
            error: function (data) {
                console.log(data);
            }
        });
    });
});










</script>
@endpush


@endsection