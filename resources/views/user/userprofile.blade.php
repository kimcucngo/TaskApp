@extends('common.master')
@section('user')
    <div class="card">
        <br /><br />
        <center>
            <img
                class="rounded-circle avatar-xl"
                src=""
                alt="Card image cap"/>
        </center>

        <div class="card-body">
            <h6 class="card-title">
                Name :{{$userData->name}}</h6>
            <hr />
            <h6 class="card-title">
                User Email :{{$userData->email}}
            </h6>
            <hr />
            <a href="{{route('profile.edit')}}"
                class="btn btn-info btn-rounded waves-effect waves-light">
                Edit Profile</a>
        </div>
    </div>

@endsection