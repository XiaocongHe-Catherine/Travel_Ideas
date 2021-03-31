@extends('layout')

@section('content')

<link href="{{ asset('/css/datePicker.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
<script src="/js/jquery-3.5.1.min.js" type="text/javascript" ></script>
<script src="/js/jquery.datePicker.js" type="text/javascript" ></script>
<script src="/js/jquery-ui-1.10.0.custom.min.js" type="text/javascript" ></script>
<script type="text/javascript">
$(document).ready(function(){
   $("#start_date").datepicker({
         dateFormat:'yy-mm-dd'
   });
   $("#end_date").datepicker({
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
    <form method="post" action="{{ route('ideas.update',$idea->id) }}">
        @method('PATCH')
        @csrf
            <table class="table table-striped">
            <tbody>
                <tr>
                    <td><label for="title" >Idea Name</label></td>
                    <td><input name="title" id="title" type="text" value="{{ $idea->title }}" class="form-control" /></td>
                </tr>
                <tr>
                    <td><label for="destination" >Destination</label></td>
                    <td><input name="destination" id="destination" type="text" value="{{ $idea->destination }}" class="form-control" /></td>
                </tr>
                <tr>
                    <td><label for="start_date" >Start Date</label></td>
                    <td><input id="start_date" name="start_date" type="text" value="{{ $idea->start_date }}" class="form-control"/></td>
                </tr>
                <tr>
                    <td><label for="end_date" >End Date</label></td>
                    <td><input id="end_date" name="end_date" type="text"  value="{{ $idea->end_date }}" class="form-control"/></td>
                </tr>
                <tr>
                    <td><label for="tags" >tags</label></td>
                    <td><input id ="tags" name="tags" type="text" 
                    value="@php $first=true @endphp @foreach($idea->tags as $tag) @if($first==true){{ $tag->tag_name}}{{ $first=false }}@else, {{ $tag->tag_name}}@endif @endforeach" class="form-control"/></td>
                    <td></td>
                    <td><label >Author</label></td>
                    <td> {{ $idea->user->name}}  </td>
                </tr>
                 <tr>
                    <td></td><td><button type="submit">Update</button></td>
                </tr>
             </tbody>
            </table>
    </form>
</article>
<article class="hotel_info">
<h2>Hotel recommentation</h2>
<div id="hotel_api"><ol id="hotel_info"></ol></div>
</article>
<script>
$.ajax({
    url:"http://api.hotwire.com/v1/deal/hotel?dest={{ $idea->destination }}&&apikey=8gvzbxja3eunnhm9ff28ffvw&callback=?",
    dataType: 'xml',
    success:function(data){
        var arr = [];
    $(data).find("Headline").each(function(i) { 
        var text = $(this).text();
        if (arr.indexOf(text) === -1) {
        arr.push(text);
        if(arr.length<8){
          $('<li><a href= "' + text + '">' + text + '</a ></li>').appendTo('#hotel_api'); 
        }
    }
    })
    }
});
</script>
@endsection
