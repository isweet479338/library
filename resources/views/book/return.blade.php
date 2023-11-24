@extends('layouts.app')

@section('content')

        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">

               <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Active Rent List</h4>
             
                    @if (session('message'))
                    <h3 style="color:green">{{ session('message') }}</h3>
                    @endif

                    <div class="table-responsive">
                      <table id="myTable" class="table table-bordered">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Name </th>
                            <th> Email </th>
                            <th> Date </th>
                            <th> Book </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($all as $key => $value)
                          <tr>
                            <td> {{$key+1}} </td>
                            <td> {{$value->user->name}} </td>
                            <td> {{$value->user->email}} </td>
                            <td> {{$value->user->rent_date}} </td>
                            <td> {{$value->book->name}} </td>
                        
                            <td> 
                              <a href="{{ route('return_book', $value->id) }}" class="btn btn-info">Return</a>

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

@push('script')
<script type="text/javascript">
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
@endpush

@endsection