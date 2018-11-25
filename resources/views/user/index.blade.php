@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>User </h1>
@stop

@section('content')
<div class="row col-md-12 custyle">
    <table class="table table-striped custab">
    <thead>
    <a href="{{route('user.create')}}" class="btn btn-primary btn-md pull-right"><b>+</b> Add new User</a>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th> Group</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    
    @foreach($users as $user)
           
            <tr>
                <td>{{ $user->id}}</td>
                <td>{{ $user->name}}</td>
                <td>{{ $user->email}}</td>
                <td>
                @if($user->group)
                {{ $user->group->name}}</td>
                @endif
                
                </td>
                <td class="text-center">
                <form action="{{route('user.destroy',$user->id)}}" method="post">
               
                <a class='btn btn-info btn-xs' href="{{route('user.edit',$user->id)}}">
                <span class="glyphicon glyphicon-edit">
                </span> Edit</a> 
                
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger btn-xs">
                <span class="glyphicon glyphicon-remove"></span> Delete
                </button>
                
                </form>
                </td>
            </tr>
        @endforeach  
    </table>
    </div>

@stop

@section('css')

@stop
@section('js')

@stop