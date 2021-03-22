
@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

  <table class="table table-striped">
    <tbody id="TravelIdeas">  
        @foreach($ideas as $idea)
        <tr>
            <td><a href="{{ route('ideas.show',$idea->id)}}">{{$idea->id}}</a></td>
            <td><label for="title" >Idea Name</label></td>
            <td><a href="{{ route('ideas.show',$idea->id)}}">{{$idea->title}}</a></td>
        </tr>
        <tr>
            <td>&nbsp</td>
            <td><label for="destination" >Destination</label></td>
            <td> {{ $idea->destination }}</td>
        </tr>
        </tr>
            <td>&nbsp</td>
            <td><label for="traveldate" >Travel Date</label></td>
            <td> {{ $idea->start_date}} to {{ $idea->end_date}}</td>
        </tr>
        <tr>
            <td>&nbsp</td>
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
        <tr>
             <td>&nbsp</td>
             <td><a href="{{ route('ideas.show',$idea->id)}}"><button  type="button">Display</button></a></td>
             <td><a href="{{ route('ideas.edit',$idea->id)}}"><button type="button">Edit</button></a></td>
             <form action="{{ route('ideas.destroy',$idea->id)}}", method ="post">
             @csrf
             @method('Delete')
                <td><button type="submit">Delete</button></td>
             </form>
         </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection