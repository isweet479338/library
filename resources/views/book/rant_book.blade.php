@extends('layouts.app')

@section('content')

        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Renter Info</h4>
           
                   
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('message'))
                     <h3 style="color:green">{{ session('message') }}</h3>
                    @endif

                    <form action="{{ route('rant_book_submit') }}" method="POST" class="form-sample" enctype="multipart/form-data">
                      @csrf
                     
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Name</label>
                            <div class="col-sm-9">
                              <input type="text" name="name" value="{{ old('name') }}" required class="form-control" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Phone</label>
                            <div class="col-sm-9">
                              <input type="number" name="phone" value="{{ old('phone') }}"  required class="form-control" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                              <input type="text"  value="{{ old('email') }}"  name="email" required class="form-control" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                              <input type="text" required value="{{ old('address') }}"  name="address"  class="form-control" />
                            </div>
                          </div>
                        </div>
                      </div>

                     

                    <div class="table-responsive">
                      <table id="myTable" class="table table-bordered">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Name </th>
                            <th> Auther </th>
                          
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($book as $key => $value)
                        <input type="hidden" name="book_id[]" value="{{ $value->id }}">
                          <tr>
                            <td> {{$key+1}} </td>
                            <td> {{$value->name}} </td>
                            <td> {{$value->auther}} </td>
                          
                           
                          </tr>
                        @endforeach  
                        </tbody>
                      </table>
                    </div>

                     <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>




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



@endsection