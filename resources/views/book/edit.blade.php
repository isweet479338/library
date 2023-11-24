@extends('layouts.app')

@section('content')

        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Book Update Form</h4>

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


                    <form action="{{ route('book.update', $book->id) }}" method="post" class="form-sample" enctype="multipart/form-data">
                      @method('PUT')
                      @csrf
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Book Name</label>
                            <div class="col-sm-9">
                              <input type="text" name="name" value="{{ $book->name }}" required class="form-control" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Total Copis</label>
                            <div class="col-sm-9">
                              <input type="number" name="copis" value="{{ $book->copis }}" readonly required class="form-control" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Total Revision</label>
                            <div class="col-sm-9">
                              <input type="text"  value="{{ $book->revision }}"  name="revision" class="form-control" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Last Revision</label>
                            <div class="col-sm-9">
                              <input type="text"  value="{{ $book->revision_number }}"  name="revision_number"  class="form-control" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Auther Name</label>
                            <div class="col-sm-9">
                              <input type="text"  value="{{ $book->auther }}"  name="auther"  required class="form-control" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Total Pages</label>
                            <div class="col-sm-9">
                              <input type="text"  value="{{ $book->page }}"  name="page"  class="form-control" />
                            </div>
                          </div>
                        </div>
                      </div>


                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">First Release</label>
                            <div class="col-sm-9">
                              <input class="form-control"  value="{{ $book->first_release }}"  name="first_release"  type="date" placeholder="dd/mm/yyyy" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Last Release</label>
                            <div class="col-sm-9">
                              <input class="form-control" value="{{ $book->last_release }}"  name="last_release"  type="date" placeholder="dd/mm/yyyy" />
                            </div>
                          </div>
                        </div>
                      </div>
                     
                      
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Short Description</label>
                            <div class="col-sm-9">
                              <input type="text"  value="{{ $book->discription }}"  name="discription"  class="form-control" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Photo</label>
                            <div class="col-sm-9">
                              <input type="file"  name="photo"  class="form-control" />
                            </div>
                          </div>
                        </div>

                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Picture</label>
                            <div class="col-sm-9">
                              <img width="100" height="100"  src="{{ asset( 'storage/'. $book->picture ) }}">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                        
                           <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        </div>

                      </div>

                     
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