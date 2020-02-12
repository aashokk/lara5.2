
@extends('layouts.header')

@section('content')
    <div class="container">
        <p>User List</p>
        <table class="table table-bordered">
        <thead>
          <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($user_details as $user_detail)
                <tr>
                  <td>{{$user_detail->name}}</td>
                  <td>{{$user_detail->email}}</td>
                  <td><a href="./user_update/{{$user_detail->id}}">Edit</a> | <a href="{{route('user.delete', $user_detail->id)}}">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
@stop