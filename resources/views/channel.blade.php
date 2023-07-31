<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="images/mainicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css\channel.css') }}">
    <title>PlaySocial</title>
</head>

<body>
@include('Layout.navigation')

    <!----------side bar------->
@include('Layout.sidebar')

    {{-- --------------main------------- --}}
    <div class="containerP">
        <div class="profile">
            <img src="{{ asset($channel->profile_picture) }}">
            <div class="user-info">
                @php
                    $controller = new \App\Http\Controllers\UserController();
                    $followData = $controller->checkIfFollow($channel->id);
                @endphp
                <span class="user-name">{{ $channel->name }}</span>
                <span class="following-count">{{ $followData[1] }} Followers</span>
            </div>
            @if ($channel->id != auth()->id())
                <div class="follow-container">
                    @if ($followData[0])
                        <form method="POST" action="{{ url($channel->id . '/unFollow') }}">
                            @csrf
                            <input type="text" style="display: none" class="hideinput" value="{{ $channel->id }}"
                                name="creator_id">
                            <button type="submit" class="btn btn-outline-danger">Unfollow</button>
                        </form>
                    @else
                        <form method="POST" action="{{ url($channel->id . '/Follow') }}">
                            @csrf
                            <input type="text" style="display: none" value="{{ $channel->id }}" name="creator_id">
                            <button type="submit" class="btn btn-danger">Follow</button>
                        </form>
                    @endif
            @endif
        </div>
    </div>
    </div>
    <br>

    <div class="container">
        <div class="list-container">
            @foreach ($videoList as $video)
                @php
                    $videoDate = Carbon\Carbon::parse($video->created_at);
                    $timeDifference = $videoDate->diffForHumans();
                @endphp
                <div class="vid-list">
                    <a href="/video/{{ $video->id }}"><img style="max-height: 500px"
                            src="{{ asset($video->thumbnail) }}" class="thumbnail"></a>
                    <div class="flex-div">
                        <a href="{{ route('profile', ['id' => $channel->id]) }}"><img style="max-height: 35px"
                                src="{{ asset($channel->profile_picture) }}"></a>
                        <div class="vid-info">
                            <a href="/video/{{ $video->id }}">Title: {{ $video->title }}</a>
                            <p>Description: {{ $video->description }}</p>
                            <p>Upload: {{ $timeDifference }} </p>
                            <p>Video Duration: {{ $video->duration }} Seconds</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

   @include("Layout.uploadcard")


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js\channel.js') }}"></script>
</body>

</html>
