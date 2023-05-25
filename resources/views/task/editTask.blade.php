@extends('common.master')
@section('user')

  <div class="text-center">
    <h1 class="h4 text-gray-900 mb-4">Edit Task</h1>
  </div>
  @if(session('message'))
  <div class="alert alert-danger">{{session('message')}}</div>
  @endIf
  <form class="user" method="POST" action="{{ route('task.update',$taskData->id) }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label
      for="example-text-input"
      class="col-sm-2 col-form-label"
      >Task Name</label>
      <input 
      type="text" 
      class="form-control form-control-user" 
      id="task_name" 
      name="task_name"
      value="{{$taskData->task_name}}"
      placeholder="Task Name">
    </div>
    <div class="form-group">
      <label
      for="example-text-input"
      class="col-sm-2 col-form-label"
      >Content</label>
      <input 
      type="text" 
      class="form-control form-control-user" 
      id="content" 
      name="content"
      value="{{$taskData->content}}"
      placeholder="Content">
    </div>
    <div class="form-group">
      <label
      for="example-text-input"
      class="col-sm-2 col-form-label"
      >Start Date</label>
      <input 
      type="date" 
      class="form-control form-control-user" 
      id="start_date" 
      name="start_date"
      value="{{$taskData->start_date}}"
      placeholder="Start Date">
    </div>
    <div class="form-group">
      <label
      for="example-text-input"
      class="col-sm-2 col-form-label"
      >End Date</label>
      <input 
      type="date" 
      class="form-control form-control-user" 
      id="end_date" 
      name="end_date"
      value="{{$taskData->end_name}}"
      placeholder="End Date">
    </div>
    <div class="form-group">
      <label
      for="example-text-input"
      class="col-sm-2 col-form-label"
      >Status</label>
      <select 
      type="text" 
      class="form-select" 
      id="status" 
      name="status">
      <option value="1">Pending</option>
      <option value="2">On process</option>
      <option value="3">Done</option>
    </select>
    </div>
    <div class="form-group">
      <label
      for="example-text-input"
      class="col-sm-2 col-form-label"
      >Priority</label>
      <select 
      type="text" 
      class="form-select" 
      id="priority" 
      name="priority">
      <option value="1">Urgent</option>
      <option value="2">High</option>
      <option value="3">Medium</option>
      <option value="4">Low</option>
    </select>
    </div>
    <div class="form-group text-center row mt-3 pt-1">
      <button class="btn btn-primary btn-user btn-block" type="submit">Edit Task</button>
    </div>
  </form>

@endsection
