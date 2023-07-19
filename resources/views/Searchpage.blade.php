<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="images/mainicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css\ProfileStyle.css') }}">
    <title>PlaySocial</title> 
</head>
<body>

  <nav class="flex-div">
    <div class="navStart flex-div">
      <img src="{{ asset('images/menu.png') }}" class="menu-icon">
      <a href="/Profile"><img src="{{ asset('images/logo.png') }}" class="logo"></a>
    </div>
    <div class="navMid flex-div">
      <div class="Search-box flex-div">
        <form method="GET" action="Search">
          @csrf
          <input autocomplete="off" type="text" placeholder="Search" name="text">
          <button class="hiddenbutton" type="submit"><img src="{{ asset('images/search-icon.png') }}"></button>          
        </form>
      </div>
    </div>
    <div class="navEnd flex-div">
    <img src="{{ asset('images/upload.png') }}" class="upload-icon" >
    <img src="{{ Auth::user()->profile_picture }}" class="user-icon">
  </div>
  </nav>
    <!----------side bar------->
    <div class="sidebar">
      <div class="shortcut-links">
        <a style="color: #dc3545" href="/Profile"><img src="{{ asset('images/mainicon.png') }}"><p>Home</p></a>
        <a href="/saves"><img src="{{ asset('images/save on.png') }}"><p>Saved videos</p></a>
        <a href="/Logout"><img src="{{ asset('images/Logout.png') }}"><p>Logout</p></a>
        <hr>
      </div>
      <div class="following">
        <h3>Following</h3>
        <a href=""><img src="{{ asset('images\instructor.jpg') }}"><p>Samer Huwari</p></a>
        <a href=""><img src="{{ asset('images\instructor.jpg') }}"><p>Samer Huwari</p></a>
        <a href=""><img src="{{ asset('images\instructor.jpg') }}"><p>Samer Huwari</p></a>
        <a href=""><img src="{{ asset('images\instructor.jpg') }}"><p>Samer Huwari</p></a>
        <a href=""><img src="{{ asset('images\instructor.jpg') }}"><p>Samer Huwari</p></a>
        <hr>
      </div>
    </div>
    {{----------------main videos---------------}}
    <div class="container">
      <h2>Channels: <hr> </h2>
        @foreach ($creators as $creator)
        <div class="list-container">
          <div class="vid-listC">
            <a href="/profile/{{$creator->id}}"><img src="{{ $creator->profile_picture}}" class="profile_picture"></a>
            <button type="button" class="btn btn-danger">Follow</button>
            <div class="flex-divC">
              <p>Name: {{ $creator->name }}</p>
            </div>
          </div>
          @endforeach
        </div> 
    </div>
    {{----------------main videos---------------}}
    <div class="container">
      <h2>Videos: <hr></h2>
    <div class="list-container"> 
      @foreach ($Videos as $video)
      @php
      $videoDate = Carbon\Carbon::parse($video->created_at);
      $timeDifference = $videoDate->diffForHumans();
      $user = App\Models\User::find($video->user_id);
      @endphp 
      <div class="vid-list">
        <a href="/video/{{$video->id}}"><img src="{{ $video->thumbnail}}" class="thumbnail"></a>
        <div class="flex-div">
          <img src="{{ asset($user->profile_picture) }}">
          <div class="vid-info">
            <a href="/video/{{$video->id}}">Title: {{$video->title}}</a>
            <p>Description: {{$video->description}}</p>
            <p>Upload: {{$timeDifference}} </p>
            <p>Video Duration: {{$video->duration}} Seconds</p>
          </div>
        </div>
      </div> 
      @endforeach   
    </div>
  </div>

    <div class="overlay-card">
      <div class="card-content">
        <h2>upload your Video</h2>
        <hr>
        <form method="POST" action="UploadVideo" enctype="multipart/form-data">
          @csrf
          <label for="title" class="inline-block text-red mb-4"> Video Title: </label>
          <input type="text" class="border border-danger rounded" name="title"/>
          @error('title')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
          <br>
          <label for="description" class="inline-block text-red mb-4 textarea_label"> Video Description: </label>
          <textarea placeholder='Enter description...' rows="4" cols="48" class="border border-danger rounded large_text_box" name="description"></textarea>
          @error('description')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
          <br>
          <br>
          <label for="thumbnail" class="inline-block text-red mb-4">Video Thumbnail:</label>
          <input type="file" class="border border-danger rounded" name="thumbnail"/>
          @error('thumbnail')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
          <br>
          <label for="path" class="inline-block text-red mb-4">Upload Video:</label>
          <input type="file" class="border border-danger rounded" name="path"/>
          @error('path')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
          <br>
          <button class="btn btn-outline-danger" type="submit">Upload</button>
          <hr>
        </form>
        <button class="btn btn-danger" onclick="hideOverlay()">close</button>
      </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
      <script src="{{ asset('js\main.js') }}"></script>
</body>
</html>