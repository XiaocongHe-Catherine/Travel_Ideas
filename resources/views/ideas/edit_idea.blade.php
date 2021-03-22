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
</div>
    <form method="post" action="{{ route('ideas.update',$idea->id) }}">
        @method('PATCH')
        @csrf
            <table class="table table-striped">
            <tbody>
                <tr>
                    <td><label for="title" >Idea Name</label></td>
                    <td><input name="title" type="text" value="{{ $idea->title }}" class="form-control" /></td>
                </tr>
                <tr>
                    <td><label for="destination" >Destination</label></td>
                    <td><input name="destination" type="text" value="{{ $idea->destination }}" class="form-control" /></td>
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
                    <td> @php
                             $first=true
                         @endphp

                        @foreach($idea->tags as $tag)
                         @if($first==true)
                            {{ $tag->tag_name}}
                            {{ $first=false }}
                         @else
                            , {{ $tag->tag_name}}
                         @endif

                     @endforeach</td>
                    <td>&nbsp</td>
                    <td><label for="user" >Author</label></td>
                    <td> {{ $idea->user->name}}  </td>
                </tr>
                 <tr>
                    <td></td><td><button type="submit">Update</button></td>
                </tr>
             </tbody>
            </table>
    </form>
@endsection
