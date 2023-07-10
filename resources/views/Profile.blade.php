<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="images/mainicon.png">
    <link rel="stylesheet" href="{{ asset('css\ProfileStyle.css') }}">
    <title>PlaySocial</title> 
</head>
<body>

  <nav class="flex-div">
    <div class="navStart flex-div">
      <img src="{{ asset('images/menu.png') }}" class="menu-icon">
      <img src="{{ asset('images/logo.png') }}" class="logo">
    </div>
    <div class="navMid flex-div">
      <div class="Search-box flex-div">
        <input type="text" placeholder="Search">
        <img src="{{ asset('images/search-icon.png') }}">
      </div>
    </div>
    <div class="navEnd flex-div">
    <img src="{{ asset('images/upload.png') }}" >
    <img src="{{ Auth::user()->profile_picture }}" class="user-icon">
  </div>
  </nav>
    <!----------side bar------->
    <div class="sidebar">
      <div class="shortcut-links">
        <a href=""><img src="{{ asset('images/mainicon.png') }}"><p>Home</p></a>
        <hr>
      </div>
      <div class="following">
        <h3>Following</h3>
        <a href=""><img src="{{ asset('images\instructor.jpg') }}"><p>Samer Huwari</p></a>
        <a href=""><img src="{{ asset('images\instructor.jpg') }}"><p>Samer Huwari</p></a>
        <a href=""><img src="{{ asset('images\instructor.jpg') }}"><p>Samer Huwari</p></a>
        <a href=""><img src="{{ asset('images\instructor.jpg') }}"><p>Samer Huwari</p></a>
        <a href=""><img src="{{ asset('images\instructor.jpg') }}"><p>Samer Huwari</p></a>
      </div>
    </div>

    {{-- --------------main------------- --}}
    <div class="container">
    {{--------------places holder need to be dynamic-----------------}}
      <div class="list-container">
        <div class="vid-list">
          <a href="/video"><img src="{{ asset('images\Monetization slide.png')}}" class="thumbnail"></a>
          <div class="flex-div">
            {{-- <img src="{{ asset('images\instructor.jpg') }}"> --}}
            <div class="vid-info">
              <a href="">Monetization slide</a>
              <p>PlaySocial</p>
              <p>100k views 2 days</p>
            </div>
          </div>
        </div>      
        <div class="list-container">
          <div class="vid-list">
            <a href="/video"><img src="{{ asset('images\Monetization slide.png')}}" class="thumbnail"></a>
            <div class="flex-div">
              {{-- <img src="{{ asset('images\instructor.jpg') }}"> --}}
              <div class="vid-info">
                <a href="">Monetization slide</a>
                <p>PlaySocial</p>
                <p>100k views 2 days</p>
              </div>
            </div>
          </div>    
        {{--------------places holder need to be dynamic-----------------}}
      </div>
    </div>


      
      <script src="{{ asset('js\main.js') }}"></script>
</body>
</html>