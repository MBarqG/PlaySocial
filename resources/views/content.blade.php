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
          {{-- <img src="{{ asset('images/menu.png') }}" class="menu-icon"> --}}
          <a href="/Profile"><img src="{{ asset('images/logo.png') }}" class="logo"></a>
        </div>
        <div class="navMid flex-div">
          <div class="Search-box flex-div">
            <input type="text" placeholder="Search">
            <img src="{{ asset('images/search-icon.png') }}">
          </div>
        </div>
        <div class="navEnd flex-div">
        {{-- <img src="{{ asset('images/upload.png') }}" > --}}
        <img src="{{ asset(Auth::user()->profile_picture) }}" class="user-icon">
      </div>
      </nav>

<div class="container">
    <div class="row">
        <!-------change to be dynamic-------->
        <div class="play-video">
            <video controls autoplay>
                <source  src="{{asset($video->path)}}" type="video/mp4">
            </video>
            <h3>{{$video->title}}</h3>
            <div class="play-video-info">
                <p>Duration : {{$video->duration}} Seconds</p>
                <div>
                    <a href=""><img src="{{ asset('images\like.png') }}">125</a>
                    <a href=""><img src="{{ asset('images\dislike.png') }}">2</a>
                </div>
            </div>
            <hr>
            <div class="plublisher">
                <img src="{{ asset($creator->profile_picture) }}">
                <div>
                    <p>{{$creator->name}}</p>
                    <span>10 Followers</span>
                </div>
                <button type="button" class="btn btn-danger">Follow</button>
            </div>
            <div class="video-descripion">
                <P>{{$video->description}}</P>
                <hr>
                <h4>134 comments</h4>

                <div class="add-comment">
                    <img src="{{ asset('images\instructor.jpg') }}">
                    <input type="text"placeholder="add comment here...">
                </div>
                <div class="old-comments">
                    <img src="{{ asset('images\instructor.jpg') }}">
                    <div>
                        <h3>Samer Huwari <span> 2 days ago </span></h3>
                        <p>comment text</p>
                    </div>
                </div>


            </div>
        </div>
        <!--------------->
        <div class="right-sidebar">
            <!-------change to be dynamic-------->
            @foreach ($videoList as $Videoitem)
            @if ($Videoitem->id == $video->id)
                @continue
            @endif
            <div class="side-video-list">
                <a href="/video/{{$Videoitem->id}}" class="small-thumbnail"><img src="{{ asset($Videoitem->thumbnail)}}"></a>
                <div class="video-info">
                    <a href="/video/{{$Videoitem->id}}">{{$Videoitem->title}}</a>
                    <p>{{$creator->name}}</p>
                    <p>Duration : {{$Videoitem->duration}} Seconds</p>
                </div>
            </div>
            @endforeach
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