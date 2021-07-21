@extends('admin.admin_master')

@section('admin')
<div class="col-lg-12">
  <div class="card card-default">
    <div class="card-header card-header-border-bottom">
      <h2>Add Slider</h2>
    </div>
    <div class="card-body">
      <form action="{{ url('slider/update/'.$sliders->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="old_image" value="{{ $sliders->image }}"/>
        <div class="form-group">
          <label for="">Title</label>
          <input type="text" name="title" value="{{ $sliders->title }}" class="form-control" placeholder="Enter Email">
        </div>
        <div class="form-group">
          <label for="">Description</label>
          <textarea class="form-control" name="description" value="" rows="3">{{ $sliders->description }}</textarea>
        </div>
        <div class="form-group">
          <label for="exampleFormControlFile1">Image</label>
          <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <div class="form-group">
          <img src="{{ asset($sliders->image) }}" alt="" style="width:300px;">
        </div>
        <div class="form-footer pt-4 pt-5 mt-4 border-top">
          <button type="submit" class="btn btn-primary btn-default">Update Slider</button>
        </div>
      </form>
    </div>
  </div>

</div>
@endsection
