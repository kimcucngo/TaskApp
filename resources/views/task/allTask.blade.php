
@extends('common.master')
@section('user')

  <div class="text-center">
    <h1 class="h4 text-gray-900 mb-4">All Task Page</h1>
  </div>
  @if(session('message'))
  <div class="alert alert-danger">{{session('message')}}</div>
  @endIf
  <form class="user" method="GET" action="{{ route('task.all') }}" enctype="multipart/form-data">
      <div class="row mb-3">
        <div class="col-md-3">
          <label for="example-date-input" class="row-sm-2 row-form-label">Status</label>
            <div class="mb-3">
                <select name="status" class="form-select">
                  <option value="">
                    All Status</option>
                <option value="1" {{ request()->status == '1' ? 'selected' : false }}>
                    On Pending</option>
                <option value="2" {{ request()->status == '2' ? 'selected' : false }}>
                    On Process </option>
                <option value="3" {{ request()->status == '3' ? 'selected' : false }}>
                    Done</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
          <label for="example-date-input" class="row-sm-2 row-form-label">Priority</label>
            <div class="mb-3">
                <select name="priority" class="form-select">
                    <option value="">
                      All Priority</option>
                    <option value="1" {{request()->priority == "1" ? 'selected' : false}}>
                      Urgent</option>
                    <option value="2" {{request()->priority == "2" ? 'selected' : false}}>
                      High</option>
                    <option value="3" {{request()->priority == "3" ? 'selected' : false}}>
                      Medium</option>
                    <option value="4" {{request()->priority == "4" ? 'selected' : false}}>
                      Low</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="example-date-input" class="row-sm-2 row-form-label">Start Date</label>
                <input name="start_date" 
                      class="form-control" 
                      type="date"
                      value="{{request()->start_date}}" 
                      id="example-date-input">
            </div>
            <div class="col">
                <label for="example-date-input" class="row-sm-2 row-form-label">End Date</label>
                <input name="end_date" 
                      class="form-control" 
                      type="date"
                      value="{{request()->end_date}}" 
                      id="example-date-input">
            </div>
        </div>
      <div class="col-md-2">
        <div class="mb-3">
            <button type="submit" 
                  class="btn btn-primary waves-effect waves-light"
                  class="form-control">Search</button>
        </div>
    </div>
  </div>
  </form>
    <p class="card-title-desc"></p>
    <table class="table mb-0">
        <thead>
            <tr>
                <th>No</th>
                <th><a href="">Task Name</a></th>
                <th><a href="">Content</a></th>
                <th><a href="">Start Date</a></th>
                <th><a href="">End Date</a></th>
                <th><a href="">Status</a></th>
                <th><a href="">Priority</a></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($tasksData as $key=>$taskData)
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$taskData->task_name}}</td>
                <td>{{$taskData->content}}</td>
                <td>{{$taskData->start_date}}</td>
                <td>{{$taskData->end_date}}</td>
                <td>{{$taskData->getStatus()}}</td>
                <td>{{$taskData->getPriority()}}</td>
                <td>
                <a href="{{route('task.edit',$taskData->id)}}" class="btn btn-info sm"
                    title="Edit Data"> <i class="fas fa-edit"></i> 
                </a>
                <a href="{{route('task.destroy',$taskData->id)}}" class="btn btn-danger sm"
                    title="Delete Data"><i class="fas fa-trash-alt" id="delete"></i>
                </a>
                </td>
              </tr>
            @endforeach
        </tbody>
    </table>
    {{ $tasksData->links() }}
@endsection
