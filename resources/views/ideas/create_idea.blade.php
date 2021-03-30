@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<link href="{{ asset('/css/datePicker.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
<script src="/js/jquery-3.5.1.min.js" type="text/javascript" ></script>
<script src="/js/jquery.datePicker.js" type="text/javascript" ></script>
<script src="/js/jquery-ui-1.10.0.custom.min.js" type="text/javascript" ></script>
<script type="text/javascript">
$(document).ready(function(){
   $("#datepicker").datepicker({
         dateFormat:'yy-mm-dd'
   });
   $("#datepicker_e").datepicker({
         dateFormat:'yy-mm-dd'
   });
   
})
</script>
<div class="message">
        @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
</div>
<article>
     <h3>Please use the form below to add your idea </h3>
    <form method="post" action="{{ route('ideas.store') }}">
    @csrf
            <table class="table table-striped">
            <tbody>
                <tr>
                    <td><label for="title" >Idea Name</label></td>
                    <td><input name="title" type="text" class="form-control"/></td>
                </tr>
                <tr>
                    <td><label for="destination" >Destination</label></td>
                    <td><input name="destination" type="text" class="form-control"/></td>
                </tr>
                </tr>
                    <td><label for="start_date" >Start Date</label></td>
                    <td><input id="datepicker" name="start_date" type="text" class="form-control"/></td>
                </tr>
                </tr>
                    <td><label for="end_date" >End Date</label></td>
                    <td><input id="datepicker_e" name="end_date" type="text" class="form-control"/></td>
                </tr>
                <tr>
                    <td><label for="tags" >tags</label></td>
                    <td><input name="tags" type="text" class="form-control"/></td>
                </tr>
                 <tr>
                    <td></td><td><button type="submit">Add</button></td>
                </tr>
             </tbody>
            </table>
    </form>
</article>
@endsection
