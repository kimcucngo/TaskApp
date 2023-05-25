@extends('common.master')
@section('user')

  <div class="text-center">
    <h1 class="h4 text-gray-900 mb-4">Edit Profile</h1>
  </div>
  @if(session('message'))
  <div class="alert alert-danger">{{session('message')}}</div>
  @endIf
  <form class="user" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label
      for="example-text-input"
      class="col-sm-2 col-form-label"
      >Name</label>
      <input 
      type="text" 
      class="form-control form-control-user" 
      id="name" 
      name="name" 
      value="{{ $userData->name }}"
      placeholder="User Name">
    </div>
    <div class="form-group">
      <label
      for="example-text-input"
      class="col-sm-2 col-form-label"
      >Email</label>
      <input 
      type="text" 
      class="form-control form-control-user" 
      id="email" 
      name="email" 
      value="{{ $userData->email }}"
      placeholder="Email">
    </div>
    {{-- <div class="frow mb-3">
      <label
      for="example-text-input"
      class="col-sm-2 col-form-label"
      >Profile Images</label>
      <input
      name="avatar"
      class="rounded avatar-lg"
      type="file"
      id="avatar">
    </div> --}}

    <div class="row mb-3">
      <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image </label>
      <div class="col-sm-10">
          <input name="profile_image" class="form-control" type="file" id="image">
      </div>
  </div>
  <div class="row mb-3">
      <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
      <div class="col-sm-10">
          <img id="showImage" class="rounded avatar-lg"
              {{-- src="{{ !empty($user->profile_image) ? url($user->profile_image) : url('upload/no_image.jpg') }}" --}}
              alt="Card image cap">
      </div>
  </div>
    
    <div class="form-group text-center row mt-3 pt-1">
      <button class="btn btn-primary btn-user btn-block" type="submit">Edit Profile</button>
    </div>
  </form>

@endsection
