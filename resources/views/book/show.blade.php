@extends('layouts.app')

@section('content')

        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">

               <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="text-center" > 
                  
                    <img width="200" height="200" src="{{ asset('storage/'. $book->picture ) }}">
                      <h4 class="card-title">{{ $book->name }} </h4>
                    </div>

                    @if (session('message'))
                    <h3 style="color:green">{{ session('message') }}</h3>
                    @endif

                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Name </th>
                            <th> Info </th>
                           
                          </tr>
                        </thead>
                        <tbody>
                   
                          <tr>
                            <td> 1. </td>
                            <td> Book Name </td>
                            <td> {{ $book->name }} </td>
                          </tr>

                          <tr>
                            <td> 2. </td>
                            <td> Copis </td>
                            <td> {{ $book->copis }} </td>
                          </tr>

                          <tr>
                            <td> 3. </td>
                            <td> Available </td>
                            <td> {{ $book->available }} </td>
                          </tr>
                          <tr>
                            <td> 4. </td>
                            <td> Auther </td>
                            <td> {{ $book->auther }} </td>
                          </tr>
                          <tr>
                            <td> 5. </td>
                            <td> Page </td>
                            <td> {{ $book->page }} </td>
                          </tr>
                          <tr>
                            <td> 6. </td>
                            <td> Description </td>
                            <td> {{ $book->discription }} </td>
                          </tr>
                          <tr>
                            <td> 7. </td>
                            <td>  Revision </td>
                            <td> {{ $book->revision }} </td>
                          </tr>
                          <tr>
                            <td> 8. </td>
                            <td> Total Revision </td>
                            <td> {{ $book->revision_number }} </td>
                          </tr>

                          <tr>
                            <td> 9. </td>
                            <td> First Release Date </td>
                            <td> {{ $book->first_release }} </td>
                          </tr>

                          <tr>
                            <td> 10. </td>
                            <td> Last Release Date </td>
                            <td> {{ $book->last_release }} </td>
                          </tr>
                        </tbody>
                      </table>
                  <p>Active Rent History</p>
                        <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Name </th>
                            <th> Phone </th>
                            <th> Email </th>
                            <th> Date </th>
                          
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($rent as $key => $value)
                          <tr>
                            <td> {{$key+1}} </td>
                            <td> {{$value->user->name}} </td>
                            <td> {{$value->user->phone}} </td>
                            <td> {{$value->user->email}} </td>
                            <td> {{$value->created_at}} </td>
                          </tr>
                        @endforeach  
                        </tbody>
                      </table>
                         <p> Rent History</p>

                          <table id="myTable" class="table table-bordered">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Name </th>
                            <th> Phone </th>
                            <th> Email </th>
                            <th>Rent Date </th>
                            <th>Back Date </th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($history as $key => $value)
                          <tr>
                            <td> {{$key+1}} </td>
                            <td> {{$value->user->name}} </td>
                            <td> {{$value->user->phone}} </td>
                            <td> {{$value->user->email}} </td>
                            <td> {{$value->created_at}} </td>
                            <td> {{$value->back_date}} </td>
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