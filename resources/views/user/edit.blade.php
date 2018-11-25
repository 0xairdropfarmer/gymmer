@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit {{ $user->name }}  </h1>
@stop

@section('content')
<form class="form-horizontal" method="post" action="{{route('user.update',$user->id)}}">
<fieldset>
@method('put')
@csrf
<!-- Form Name -->
<input type="hidden" value={{$user->id}} name="id"></input>
<!-- Text input-->
<div class="form-group" >
  <label class="col-md-4 control-label" for="textinput">Name</label>  
  <div class="col-md-4">
  <input id="textinput" name="name" type="text" value="{{ $user->name }}" class="form-control input-md">
    
  </div>
</div>
<div class="form-group" >
  <label class="col-md-4 control-label" for="textinput">E-mail</label>  
  <div class="col-md-4">
  <input id="email" name="email" type="email" value="{{ $user->email }}"placeholder="E-mail" class="form-control input-md">
 </div>
 </div>
<div class="form-group" >
  <label class="col-md-4 control-label" for="textinput">Password</label>  
  <div class="col-md-4">
  <input id="password" name="password" type="password" placeholder="" class="form-control input-md">
 </div>
  
</div>
<div class="form-group" >
  <label class="col-md-4 control-label" for="textinput">Confirm Password</label>  
  <div class="col-md-4">
  <input id="confirm_password" name="password_confirmation" type="password" placeholder="" class="form-control input-md">
 </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="permission">select Group</label>
  <div class="col-md-4">

    <select id="permission" name="group_id" class="form-control" >
                 @foreach($groups as $group)
                
                       <option @if($user->group_id == $group->id)selected @endif value={{$group->id}}>{{$group->name}}</option> 
                    @endforeach
    </select>
  </div>
</div>
<!-- Select Multiple -->

<!-- Button -->
<div class="form-user">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" type="submit" class="btn btn-primary">Submit</button>
  </div>
</div>


</fieldset>
</form>

@stop

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.3/css/bootstrap-select.css" />
    
@stop
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.3/js/bootstrap-select.js"></script>
    <script>
    $('#permission').selectpicker()
    </script>
@stop