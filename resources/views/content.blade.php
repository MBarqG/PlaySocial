<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="images/mainicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css\contentStyle.css') }}">
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

<div class="container">
    <div class="row">
        <!-------change to be dynamic-------->
        <div class="play-video">
            <video controls autoplay>
                <source  src="{{ asset('Videos\test1.mkv') }}" type="video/mp4">
            </video>
            <h3>test1</h3>
            <div class="play-video-info">
                <p>100k views 2 days</p>
                <div>
                    <a href=""><img src="{{ asset('images\like.png') }}">125</a>
                    <a href=""><img src="{{ asset('images\dislike.png') }}">2</a>
                </div>
            </div>
            <hr>
            <div class="plublisher">
                <img src="{{ Auth::user()->profile_picture }}">
                <div>
                    <p>Mohammed barq</p>
                    <span>10 Followers</span>
                </div>
                <button type="button" class="btn btn-danger">Follow</button>
            </div>
            <div class="video-descriparion">
                
            </div>
        </div>
        <!--------------->
        <div class="right-sidebar">
            <!-------change to be dynamic-------->
            <div class="side-video-list">
                <a href="" class="small-thumbnail"><img src="{{ asset('images\Collaboration slide.png')}}"></a>
                <div class="video-info">
                    <a href="">Collaboration</a>
                    <p>Mohammed barq</p>
                    <p>69k views</p>
                </div>
            </div>
            <!--------------->
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <script src="{{ asset('js\content.js') }}"></script>
</body>
</html>