@extends('layouts.app')

@section('content')
<link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header"><h3>Welcome  {{ Auth::user()->name }}</h3> -->
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h5> You are logged in!</h5>
                    <p>Please click <a href="{{ route('ideas.index')}}">here</a> to explore our "Travel Idea" website </div>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
