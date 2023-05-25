
@extends('common.master')
@section('user')

  <div class="text-center">
    <h1 class="h4 text-gray-900 mb-4">All Task Page</h1>
  </div>
  @if(session('message'))
  <div class="alert alert-danger">{{session('message')}}</div>
  @endIf
  <form class="user" method="POST" action="{{ route('task.all') }}" enctype="multipart/form-data">
    @csrf
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
                <td>{{$taskData->status}}</td>
                <td>{{$taskData->priority}}</td>
                <td>
                <a href="{{route('task.edit',$taskData->id)}}" class="btn btn-info sm"
                    title="Edit Data"> <i class="fas fa-edit"></i> 
                </a>
                <a href="{{route('task.destroy',$taskData->id)}}" class="btn btn-danger sm"
                    title="Delete Data"> <i class="fas fa-trash-alt" id="delete"></i>
                </a>
                </td>
              </tr>
            @endforeach
        </tbody>
    </table>
    {{ $tasksData->links() }}
  </form>

@endsection
