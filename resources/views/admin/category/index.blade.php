<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Dashboard') }}
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
                      <h4 class="card-title">All Category</h4>
                      <table class="table">
                        <thead>
                          <tr>
                            <th>SL No</th>
                            <th>CATEGORY</th>
                            <th>User Name</th>
                            <th>Created At</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          {{-- @php ($i = 1) --}}
                          @foreach ($categories as $category)
                          <tr>
                            <td scope="row">{{ $categories->firstItem()+$loop->index }}</td>
                            <td>{{ $category->user->name }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>
                              @if($category->created_at !== NULL)
                              {{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}
                              @else
                              <span>No Data</span>
                              @endif
                              
                              </td>
                              <td>
                                <a href="{{ url('category/edit/'.$category->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ url('softdelete/category/'.$category->id) }}" class="btn btn-danger">Delete</a>
                              </td>
                          </tr>
                          @endforeach
                          
                        </tbody>
                      </table>
                      {{-- {{ $categories->links() }} --}}
                      {{ $categories->render(); }}
                  </div>
                  <div class="col-md-4 pt-2 pb-2">
                    <h4 class="card-title">Add Category</h4>
                    <form action="{{ route('store.category') }}" method="POST">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputEmail1">Category Name</label>
                        <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        @error('category_name')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <button type="submit" class="btn btn-primary">Add Category</button>
                    </form>
                  </div>
                </div>
              </div>
              
{{-- //TRASH --}}
              <div class="container">
                <div class="row">
                  

                  <div class="col-md-8 pt-2">
                      <h4 class="card-title">TRASH LIST</h4>
                      <table class="table">
                        <thead>
                          <tr>
                            <th>SL No</th>
                            <th>CATEGORY</th>
                            <th>User Name</th>
                            <th>Created At</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          {{-- @php ($i = 1) --}}
                          @foreach ($trashCat as $category)
                          <tr>
                            <td scope="row">{{ $categories->firstItem()+$loop->index }}</td>
                            <td>{{ $category->user->name }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>
                              @if($category->created_at !== NULL)
                              {{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}
                              @else
                              <span>No Data</span>
                              @endif
                              
                              </td>
                              <td>
                                <a href="{{ url('category/restore/'.$category->id) }}" class="btn btn-info">Restore</a>
                                <a href="{{ url('pdelete/category/'.$category->id) }}" class="btn btn-danger">P Delete</a>
                              </td>
                          </tr>
                          @endforeach
                          
                        </tbody>
                      </table>
                      {{-- {{ $trashCat->links() }} --}}
                      {{ $trashCat->render(); }}
                  </div>
                  <div class="col-md-4 pt-2 pb-2">
                  </div>
                </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
