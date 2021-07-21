@extends('admin.admin_master')

@section('admin')
<div class="col-lg-12">
  <div class="card card-default">
    <div class="card-header card-header-border-bottom">
      <h2>Add Slider</h2>
    </div>
    <div class="card-body">
      <form action="{{ url('about/update/'.$home_abouts->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="">Title</label>
          <input type="text" name="title" value="{{ $home_abouts->title }}" class="form-control" placeholder="Enter Email">
        </div>
        <div class="form-group">
          <label for="">Short Description</label>
          <textarea class="form-control" name="short_dis" value="" rows="3">{{ $home_abouts->short_dis }}</textarea>
        </div>
        <div class="form-group">
          <label for="">Long Description</label>
          <textarea class="form-control" name="long_dis" value="" rows="3">{{ $home_abouts->long_dis }}</textarea>
        </div>
        <div class="form-footer pt-4 pt-5 mt-4 border-top">
          <button type="submit" class="btn btn-primary btn-default">Update About</button>
        </div>
      </form>
    </div>
  </div>

</div>
@endsection
