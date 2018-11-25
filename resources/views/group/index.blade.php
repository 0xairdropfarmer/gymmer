@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Group </h1>
@stop

@section('content')
<div class="row col-md-12 custyle">
    <table class="table table-striped custab">
    <thead>
    <a href="{{route('group.create')}}" class="btn btn-primary btn-md pull-right"><b>+</b> Add new Group</a>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th> Permission</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    
    @foreach($groups as $group)
    
            <tr>
                <td>{{ $group->id}}</td>
                <td>{{ $group->name}}</td>
                <td>
                
                @foreach(json_decode($group->permission,true) as $perm)
                <div class="badge outter-badge">
                {{ $perm}}
                </div>
                @endforeach
                </td>
                <td class="text-center">
                <form action="{{route('group.destroy',$group->id)}}" method="post">
               
                <a class='btn btn-info btn-xs' href="{{route('group.edit',$group->id)}}">
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