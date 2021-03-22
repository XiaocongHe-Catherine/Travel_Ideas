
@extends('layout')

@section('content')

<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

<section class="uper">
<article  >
  <table>
    <tbody id="TravelIdeas">  
        @foreach($ideas as $idea)
        <tr>
            <td><a href="{{ route('ideas.show',$idea->id)}}">{{$idea->id}}</a></td>
            <td><label for="title" >Idea Name</label></td>
            <td><a href="{{ route('ideas.show',$idea->id)}}">{{$idea->title}}</a></td>
        </tr>
        <tr>
            <td><label for="destination" >Destination</label></td>
            <td> {{ $idea->destination }}</td>
        </tr>
        </tr>
            <td><label for="traveldate" >Travel Date</label></td>
            <td> {{ $idea->start_date}} to</td>
            <td> {{ $idea->end_date}}</td>
        </tr>
        <tr>
            <td><label for="tags" >tags</label></td>
            @foreach($idea->tags as $tag)
            <td> {{ $tag->tag_name}}</td>
            @endforeach
        </tr>
        @endforeach
    </tbody>
  </table>
</article>
</section>
@endsection