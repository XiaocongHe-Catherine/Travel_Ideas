
@extends('layout')

@section('content')

<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

<section class="uper">
<article  >
  <table>
    <tbody id="TravelIdeas">  
        @foreach($ideas as $idea)
        <tr>
            <td><a href="{{ route('ideas.show',$idea->travel_id)}}">{{$idea->travel_id}}</a></td>
            <td><a href="{{ route('ideas.show',$idea->travel_id)}}">{{$idea->title}}</a></td>
        </tr>
        <tr>
            <td> {{ $idea->destination }}</td>
        </tr>
        </tr>
            <td> {{ $idea->startdate}}</td>
            <td> {{ $idea->enddate}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
</article>
</section>
@endsection