@extends('layout')

@section('content')

<script src="http://code.jquery.com/jquery-latest.js"></script>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
</div><br />
@endif
</div>

<article class="idea_info">
<h2>{{ $idea->title }}</h2>
<table class="table table-striped">
     <tbody>
     <tr>
        
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

<div id="messages">

    <ul id="chat-message-lists-view">

    @foreach($comments as $comment) 

    <li>
    <span>{{ $comment->user->name}}: {{$comment->comment}} - {{$comment->created_at}}</span>

 
    </li>

    @endforeach
    </ul>


</div>

<form id="btn-chat">
@csrf
<input type="text" name="comment" id="message" autocomplete="" placeholder="Type your message">

<input type="hidden" name="id" value={{ $idea->id}}>
<input type="submit" id="message-send-btn" value="Send">
</form>



<article class="hotel_info">
<h2>Hotel recommendation</h2>
<div id="hotel_api"><ol id="hotel_info"></ol></div>
</article>
<script>
$.ajax({
    url:"http://api.hotwire.com/v1/deal/hotel?dest={{ $idea->destination }}&&apikey=8gvzbxja3eunnhm9ff28ffvw&callback=?",
    dataType: 'xml',
    success:function(data){
        var arr = [];
    $(data).find("Headline").each(function(i) { 
        console.LOG
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

<!-- Recommended places using Foursquare API  -->
<article class="foursquare">
<h2>Recommended Places</h2>
<div class="point-of-interest">
    <table width="100%" border="1">
    <tr>
        <th>Venue Name</th>
        <th>Category</th>
        <th>Address</th>
    </tr>
        <?php
        foreach($groups as $key=>$index){
        $items      = $index->items;
            foreach($items as $venues=>$venue){
                
                $venue_name =   $venue->venue->name;
                $category_name = $venue->venue->categories[0]->name;
                $formatted_address  =   $venue->venue->location->formattedAddress[0].' '.$venue->venue->location->formattedAddress[1].' '.$venue->venue->location->formattedAddress[2];
                $full_address  = $venue_name.' '.$category_name;
            ?>
            <tr>
            <td><?php echo $venue_name?> </td>
            <td><?php echo $category_name?></td>
            <td><?php echo $venue->venue->location->formattedAddress[0].'</br>'.$venue->venue->location->formattedAddress[1].'</br>'.$venue->venue->location->formattedAddress[2];?></td>
            
            </tr>
        
            <?php 
            }
        }?>
        </table>
    
</div>
</article>
@endsection


<!-- Get all comment messages and refresh with AJAX for latest -->
@section('scripts')
<script>
$(document).ready(function() {

    
    var intervalId = window.setInterval(function(){
        callMessage();
}, 5000);


window.onload = function(){
       var objDev = document.getElementById('chat-message-lists-view');
       objDev.scrollTop = objDev.scrollHeight;
    }

   function callMessage(){
   
    $.ajax({
        method: 'Get',
        url: "{{url('message/get-all/'.$idea->id)}}",
        dataType: "html",
        success: function(data) {
          $('#chat-message-lists-view').html(data);
         
      
         
        },
        error: function(error) {
            console.log('error');
        }
    });
 
   }
  
    

    $('#message-send-btn').on('click',function(event){
        event.preventDefault();
        var data = $("#btn-chat").serialize();
    $.ajax({
        method: 'POST',
        url: "{{route('message.store')}}",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
        data: data,
        dataType: "html",
        success: function(data) {
          $('#chat-message-lists-view').html(data);
          $('#btn-chat').get(0).reset();
        },
        error: function(error) {
            console.log('error');
        }
    });
    })
});
</script>
@endsection
