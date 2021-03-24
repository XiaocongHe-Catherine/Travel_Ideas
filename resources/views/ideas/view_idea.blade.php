
@extends('layout')

@section('content')

<section class="uper">
<article  >
<table class="table table-striped">
     <tbody>
     <tr>
            <td><label for="title" >Idea Name</label></td>
            <td>{{ $idea->title }}</td>
        </tr>
        <tr>
            <td><label for="destination" >Destination</label></td>
            <td> {{ $idea->destination }}</td>
        </tr>
        </tr>
            <td><label for="traveldate" >Travel Date</label></td>
            <td> {{ $idea->start_date}} to {{ $idea->end_date}}</td>
        </tr>
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
            <td><label for="user" >Author</label></td>
            <td> {{ $idea->user->name}}  </td>
        </tr>
    </tbody>
  </table>
</article>
</section>
<section>
<h2>Hotel recommentation</h2>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<p><div id="hotel_api"><ol id="hotel_info"></ol></div></p>	
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
        $('<li><a href= "' + text + '">' + text + '</a ></li>').appendTo('#hotel_api'); 
    }
    })
    }
});
</script>
</p>
</section>
@endsection

