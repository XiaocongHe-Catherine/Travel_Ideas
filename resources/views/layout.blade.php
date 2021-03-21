<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>My Travel Plan Idea</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
  <section id="page">
<header>           
            <hgroup>
                <h1>Travel Ideas</h1>                 
            </hgroup>
                            
            <nav class="clear"> <!-- The nav link semantically marks your main site navigation -->
                <ul>
                    <li><a href="/">All Ideas</a></li>
                    <li><a href="/">Create Idea</a></li>       
                    <li><a href="/login">Login</a></li>                 
                    <li><a href="/login">Loginout</a></li>
                </ul>
            </nav>             
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