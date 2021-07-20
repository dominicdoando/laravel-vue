<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          MULTI PICTURE
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              {{-- <x-jet-welcome /> --}}
              <div class="container">
                <div class="row">
                  <div class="col-md-8">
                    <div class="card-group row">
                      @foreach ($images as $multi)
                      <div class="col-md-4 mt-5">
                        <div class="card">
                          <img class="card-img-top" src="{{ asset($multi->image) }}" alt="Card image cap">
                        </div>
                      </div>
                      
                      @endforeach
                      
                    </div>
                  </div>
                  <div class="col-md-4 pt-2 pb-2">
                    <h4 class="card-title">MULTI PICTURE</h4>
                    <form action="{{ route('store.image') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputEmail1">Brand Image</label>
                        <input type="file" name="image[]" class="form-control" multiple placeholder="Enter email">
                        @error('image')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <button type="submit" class="btn btn-primary">Add Image</button>
                    </form>
                  </div>
                </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
