<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          All Brand
      </h2>
  </x-slot>

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
                  

                  <div class="col-md-8 pt-2">
                      <h4 class="card-title">All Brand</h4>
                      <table class="table">
                        <thead>
                          <tr>
                            <th>SL No</th>
                            <th>Brand Name</th>
                            <th>Brand Image</th>
                            <th>Created At</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          {{-- @php ($i = 1) --}}
                          @foreach ($brands as $brand)
                          <tr>
                            <td scope="row">{{ $brands->firstItem()+$loop->index }}</td>
                            <td>{{ $brand->brand_name }}</td>
                            <td><img src="{{ asset($brand->brand_image) }}" alt="" style="height:40px;"></td>
                            <td>
                              @if($brand->created_at !== NULL)
                              {{ Carbon\Carbon::parse($brand->created_at)->diffForHumans() }}
                              @else
                              <span>No Data</span>
                              @endif
                              
                              </td>
                              <td>
                                <a href="{{ url('brand/edit/'.$brand->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ url('brand/delete/'.$brand->id) }}" onclick="return confirm('Are you sure delete this?')" class="btn btn-danger">Delete</a>
                              </td>
                          </tr>
                          @endforeach
                          
                        </tbody>
                      </table>
                      {{-- {{ $categories->links() }} --}}
                      {{ $brands->render(); }}
                  </div>
                  <div class="col-md-4 pt-2 pb-2">
                    <h4 class="card-title">Add Brand</h4>
                    <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputEmail1">Brand Name</label>
                        <input type="text" name="brand_name" class="form-control" placeholder="Enter email">
                        @error('brand_name')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Brand Image</label>
                        <input type="file" name="brand_image" class="form-control" placeholder="Enter email">
                        @error('brand_image')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <button type="submit" class="btn btn-primary">Add Brand</button>
                    </form>
                  </div>
                </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
