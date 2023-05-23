@extends('common.master')
@section('user')

  <div class="text-center">
    <h1 class="h4 text-gray-900 mb-4">Change Password</h1>
  </div>
  @if(session('message'))
  <div class="alert alert-danger">{{session('message')}}</div>
  @endIf
  <form class="user" method="POST" action="{{route('password.update')}}">
    @csrf
    method(PUT)
    <div class="form-group">
      <label
      for="example-text-input"
      class="col-sm-2 col-form-label"
      >Old Password</label>
      <input 
      type="password" 
      class="form-control form-control-user" 
      id="oldpassword" 
      name="oldpassword" 
      placeholder="Old Password">
    </div>
    <div class="form-group">
      <label
      for="example-text-input"
      class="col-sm-2 col-form-label"
      >New Password</label>
      <input 
      type="password" 
      class="form-control form-control-user" 
      id="newpassword" 
      name="newpassword" 
      placeholder="New Password">
    </div>
    <div class="form-group">
      <label
      for="example-text-input"
      class="col-sm-2 col-form-label"
      >Confirm New Password</label>
      <input 
      type="password" 
      class="form-control form-control-user" 
      id="confirmpassword" 
      name="confirmpassword" 
      placeholder="Confirm New Password">
    </div>
    <div class="form-group text-center row mt-3 pt-1">
      <button class="btn btn-primary btn-user btn-block" type="submit">Change Password</button>
    </div>
  </form>
  </div>

@endsection   
