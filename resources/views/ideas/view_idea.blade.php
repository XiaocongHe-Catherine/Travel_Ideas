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
<script>
    $.ajax({
        url: 'https://api.foursquare.com/v2/venues/explore?client_id=A3X4KJKUDLPHNSCOWGZF23CKR3FM2IKEMPYTC5B2J4X22W4F&client_secret=U2NY5VFW1U0UEZXCZGACJMADWUYMZ5WHE3XXQUTJQTNKELMY&limit=5&near=Paris&v=20210404',
        type: 'get',
        data: query,
        dataType: 'json',
        success: function (data) {
            alert(data);
            for (var x = 0; x < data.length; x++) {
                content = data[x].id;
                content += "<br>";
                content += data[x].name;
                content += "<br>";
                $(content).appendTo("#foursquare_api");
               // updateListing(data[x]);
            }
        }
    }
    );
  </script>
<article class="idea_info">
<table class="table table-striped">
     <tbody>
     <tr>
            <h3>{{ $idea->title }}</h3>
        <tr>
            <td><label >Destination</label></td>
            <td> {{ $idea->destination }}</td>
        </tr>
        <tr>
            <td><label>Travel Date</label></td>
            <td> {{ $idea->start_date}} to {{ $idea->end_date}}</td>
        </tr>
        <tr>
            <td><label >Tags</label></td>
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
<article class="points_of_interest">
<h2>Points of Interest</h2>
<div id="foursquare_api">
</div>

</article>
<!-- <script>
function foursquare()
    {
      $client = new Client();
      $response = $client->request('GET', 'https://api.foursquare.com/v2/venues/explore', [
        'form_params' => [
        'client_id' => 'A3X4KJKUDLPHNSCOWGZF23CKR3FM2IKEMPYTC5B2J4X22W4F',
        'client_secret' => 'U2NY5VFW1U0UEZXCZGACJMADWUYMZ5WHE3XXQUTJQTNKELMY',
        'limit' => 10,
        'v' => 20210404,
        'near' => 'Paris',
      ]
      ]);
      $response = json_decode($response->body());
      {
        Log::$value['items']['venue']['name'];
        echo $value['items']['venue']['name'];
        $output='<tr>Hello<td>';
      }
      alert ('test');
      return Response($output);
    }
</script> -->
<!-- <script>
$.ajax({
    url:"https://api.foursquare.com/v2/venues/explore?client_id=A3X4KJKUDLPHNSCOWGZF23CKR3FM2IKEMPYTC5B2J4X22W4F&client_secret=U2NY5VFW1U0UEZXCZGACJMADWUYMZ5WHE3XXQUTJQTNKELMY&limit=5&near=Paris&v=20210404",
    dataType: 'json',
    success:function(data){
        $(data).parseJSON()
        var arr = [];
    $(data).find("name").each(function(i) { 
        var text = $(this).text();
        arr.push(text);
          $('<li>' + text + '</a ></li>').appendTo('#foursquare_api'); 
    $('<li>hello</li>').appendTo('#foursquare_api');
});
</script> -->

@endsection

