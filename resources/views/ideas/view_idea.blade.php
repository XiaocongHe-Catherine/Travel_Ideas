
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
@endsection