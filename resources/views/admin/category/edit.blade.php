<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Edit Category
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
                  
                  <div class="col-md-8 pt-2 pb-2">
                    <h4 class="card-title">Edit Category</h4>
                    <form action="{{ url('category/update/'.$categories->id) }}" method="POST">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputEmail1">Update Category Name</label>
                        <input type="text" name="category_name" class="form-control" placeholder="Enter email" value="{{ $categories->category_name }}">
                        @error('category_name')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <button type="submit" class="btn btn-primary">Update Category</button>
                    </form>
                  </div>
                </div>
              </div>
              
          </div>
      </div>
  </div>
</x-app-layout>
