@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit {{ $group->name }} Group </h1>
@stop

@section('content')
<form class="form-horizontal" method="post" action="{{route('group.update',$group->id)}}">
<fieldset>
@method('put')
@csrf
<!-- Form Name -->

<!-- Text input-->
<div class="form-group" >
  <label class="col-md-4 control-label" for="textinput">Name</label>  
  <div class="col-md-4">
  <input id="textinput" name="name" type="text" value="{{ $group->name }}" class="form-control input-md">
    
  </div>
</div>
<!-- Select Multiple -->
<div class="form-group">
  <label class="col-md-4 control-label" for="permission">Permission</label>
  <div class="col-md-4">
    <select id="permission" name="permission[]" class="form-control" multiple="multiple">
                 @foreach(array_keys(\Gate::abilities()) as $a)
                        @if(in_array($a,json_decode($group->permission,true))) 
                        <option selected value={{$a}} >{{$a}}</option> 
                        @else
                        <option value={{$a}}>{{$a}}</option> 
                      @endif
                    @endforeach
    </select>
  </div>
</div>
<!-- Button -->
<div class="form-group">
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