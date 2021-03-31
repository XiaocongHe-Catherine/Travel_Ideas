@extends('layout')

@section('content')

<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
</div><br />
@endif
</div>

<article class="idea_info">
<table class="table table-striped">
     <tbody>
     <tr>
            <td><label>Idea Name</label></td>
            <td>{{ $idea->title }}</td>
        </tr>
        <tr>
            <td><label >Destination</label></td>
            <td> {{ $idea->destination }}</td>
        </tr>
        <tr>
            <td><label>Travel Date</label></td>
            <td> {{ $idea->start_date}} to {{ $idea->end_date}}</td>
        </tr>
        <tr>
            <td><label >tags</label></td>
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
            <td><label>Author</label></td>
            <td> {{ $idea->user->name}}  </td>
        </tr>
    </tbody>
  </table>
</article>

<article class="hotel_info">
<h2>Hotel recommentation</h2>
<div id="hotel_api"><ol id="hotel_info"></ol></div>
</article>

<script src="http://code.jquery.com/jquery-latest.js"></script>
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

