<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="images/mainicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css\ProfileStyle.css') }}">
    <title>PlaySocial</title>
</head>

<body>
@include('Layout.navigation')
    <!----------side bar------->
    @include('Layout.sidebar')
    {{-- --------------main videos------------- --}}
   
    <div class="container">
        <h2>Channels:
            <hr>
        </h2>
            <div class="list-container">
                @foreach ($creators as $creator)
                <div class="vid-listC">
                    <div class="profile-container">
                    <a href="{{ route('profile', ['id' => $creator->id]) }}">
                        <img src="{{ $creator->profile_picture }}" class="profile_picture">
                    </a>
                         @php
                            $controller = new \App\Http\Controllers\UserController();
                            $followData = $controller->checkIfFollow($creator->id);
                        @endphp
                    @if ($creator->id != auth()->id())
                        @if ($followData[0])
                            <form style="display: inline" method="POST"
                                action="{{ url($creator->id . '/unFollow') }}">
                                @csrf
                                <input type="text" style="display: none" class="hideinput"
                                    value="{{ $creator->id }}" name="creator_id">
                                <button type="submit" class="btn btn-outline-danger">Unfollow</button>
                            </form>
                        @else
                            <form style="display: inline" method="POST" action="{{ url($creator->id . '/Follow') }}">
                                @csrf
                                <input type="text" style="display: none" value="{{ $creator->id }}"
                                    name="creator_id">
                                <button type="submit" class="btn btn-danger">Follow</button>
                            </form>
                        @endif
                    @endif
                    <p class="creator-info">Name: {{ $creator->name }}, {{ $followData[1] }} Followers</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>


    {{-- --------------main videos------------- --}}
    <div class="container">
        <h2>Videos:
            <hr>
        </h2>
        <div class="list-container">
            @foreach ($Videos as $video)
                @php
                    $videoDate = Carbon\Carbon::parse($video->created_at);
                    $timeDifference = $videoDate->diffForHumans();
                    $user = App\Models\User::find($video->user_id);
                @endphp
                <div class="vid-list">
                    <a href="/video/{{ $video->id }}"><img src="{{ $video->thumbnail }}" class="thumbnail"></a>
                    <div class="flex-div">
                        <img src="{{ asset($user->profile_picture) }}">
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
</div>
@include('Layout.uploadcard')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js\main.js') }}"></script>
</body>

</html>
