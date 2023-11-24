@extends('layouts.app')

@section('content')

        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">

               <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">All Book List, Select and Rent </h4>
             
                    @if (session('message'))
                    <h3 style="color:green">{{ session('message') }}</h3>
                    @endif

                    <div class="table-responsive">
                      <form method="POST" action="{{ route('rant_book') }}" >
                        @csrf
                     
                      <table id="myTable" class="table table-bordered">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Name </th>
                            <th> Auther </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($all as $key => $value)
                          <tr>
                            <td> {{$key+1}} </td>
                            <td> {{$value->name}} </td>
                            <td> {{$value->auther}} </td>
                          
                            <td> 
                              <!-- <a href="{{ route('rant_book', $value->id) }}" class="btn btn-info">Rent</a> -->
                              <input type="checkbox" name="book_id[]" value="{{ $value->id }}">
                             </td>
                          </tr>
                        @endforeach  
                        </tbody>
                      </table>
                   
                    <button type="submit" class="btn btn-primary">Rent to</button>

                     </form>

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