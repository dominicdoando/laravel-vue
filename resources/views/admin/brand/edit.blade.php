@extends('admin.admin_master')

@section('admin')

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              {{-- <x-jet-welcome /> --}}
              <div class="container">
                <div class="row">
                  @if(session('success'))
                  <div class="col-12 mb-2 mt-2">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>{{ session('success') }}</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  </div>
                  @endif
                  
                  <div class="col-md-8 pt-2 pb-2">
                    <h4 class="card-title">Edit Brand</h4>
                    <form action="{{ url('brand/update/'.$brands->id) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="old_image" value="{{ $brands->brand_image }}"/>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Update Brand Name</label>
                        <input type="text" name="brand_name" class="form-control" placeholder="Enter email" value="{{ $brands->brand_name }}">
                        @error('brand_name')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Update Brand Name</label>
                        <input type="file" name="brand_image" class="form-control"  value="{{ $brands->brand_image }}">
                        @error('brand_image')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <img src="{{ asset($brands->brand_image) }}" alt="" style="width:300px;">
                      </div>
                      <button type="submit" class="btn btn-primary">Update Brand</button>
                    </form>
                  </div>
                </div>
              </div>
              
          </div>
      </div>
  </div>
@endsection
