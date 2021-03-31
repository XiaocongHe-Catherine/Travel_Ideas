<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>My Travel Plan Idea</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" >
  <link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
<section id="page">
<header>              
                Welcome  <a href="/">{{ Auth::user()->name }} </a>  
                <h1>Travel Ideas</h1>                   
                  
            <nav class="clear"> <!-- The nav link semantically marks your main site navigation -->      
                <ul>
                    <li><a href="/ideas">All Ideas</a></li>
                    <li><a href="/ideas/create">Create Idea</a></li>       
                    <li><a href="/login">Login/logout</a></li>                   
                </ul>
            </nav>  
           
            <div class="form-group">
            <form method="get" action="{{ route('search') }}">
            @csrf
              <select name="des_or_tags">
                  <option value="destination">destination</option>
                  <option value="tag">tag</option>
              </select>
             <input id="search" name="search">
             <input type="checkbox" name="partial_match" > 
             <label> Partial Match</label>
            <button type="submit" >Find ideas!</button>
            </form>
            </div>         
</header> 

<section id="articles" class="container">
    <h2>&nbsp;</h2>
    @yield('content')
</section>

<footer> 
  <div class="line"></div>
   <p> Copyright 2021 TravelIdea</p>
   <a href="#" class="up">Go UP</a>
</footer>
</section>
</body>
</html>