
@extends('layout')

@section('content')

<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
     </div><br />
  @endif
</div>
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
<article class="travel_ideas">
{{ $count }} records
  <table class="table table-striped">
    <tbody id="TravelIdeas">  
        @foreach($ideas as $idea)
        <tr>
            <td><a href="{{ route('ideas.show',$idea->id)}}">{{$idea->id}}</a></td>
            <td><label>Idea Name</label></td>
            <td><a href="{{ route('ideas.show',$idea->id)}}">{{$idea->title}}</a></td>
        </tr>
        <tr>
            <td></td>
            <td><label>Destination</label></td>
            <td> {{ $idea->destination }}</td>
        </tr>
        <tr>
            <td></td>
            <td><label>Travel Date</label></td>
            <td> {{ $idea->start_date}} to {{ $idea->end_date}}</td>
        </tr>
        <tr>
            <td></td>
            <td><label>tags</label></td>
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
        <tr>
            <td></td>
            <td><input type="button" class="mybutton" value="Display" onclick="location.href='{{ route('ideas.show',$idea->id)}}'"></td>
            @if($idea->user_id == Auth::user()->id)
            <td><input type="button" class="mybutton" value="Edit" onclick="location.href='{{ route('ideas.edit',$idea->id)}}'"></td>  
            <td>
            <form action="{{ route('ideas.destroy',$idea->id)}}" method ="post" id="delete_form">
                  @csrf
                  @method('Delete')
                 <button class="mybutton" type="submit">Delete</button>
            </form>  
            </td>   
             @endif 
        </tr>
        @endforeach
    </tbody>
  </table>
</article>

@endsection