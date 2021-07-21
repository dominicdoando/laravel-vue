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
                  <h1 class="col-12 pt-4">Home About</h1>
                  <div class="text-right m-2 col-12">
                    <a href="{{ route('add.about') }}" class="btn btn-info">Add About</a>
                  </div>
                  
                  <div class="col-md-12 pt-2">
                      <h4 class="card-title">All Slider</h4>
                      <table class="table">
                        <thead>
                          <tr>
                            <th>SL No</th>
                            <th>Home About</th>
                            <th>Short Description</th>
                            <th>Long Description</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php ($i = 1)
                          @foreach ($homeabout as $about)
                          <tr>
                            <td scope="row">{{ $i++ }}</td>
                            <td>{{ $about->title }}</td>
                            <td><p style="max-width:400px;">{{ $about->short_dis }}</p></td>
                            <td><p style="max-width:400px;">{{ $about->long_dis }}</p></td>
              
                              <td>
                                <a href="{{ url('about/edit/'.$about->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ url('about/delete/'.$about->id) }}" onclick="return confirm('Are you sure delete this?')" class="btn btn-danger">Delete</a>
                              </td>
                          </tr>
                          @endforeach
                          
                        </tbody>
                      </table>
                  </div>
                  <div class="col-md-4 pt-2 pb-2">
                  </div>
                </div>
              </div>
          </div>
      </div>
  </div>
@endsection
