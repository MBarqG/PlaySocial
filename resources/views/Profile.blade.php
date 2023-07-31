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
    {{-- --------------main------------- --}}
    <div class="container">
        <div class="list-container">
            @foreach ($videos as $video)
                @php
                    $videoDate = Carbon\Carbon::parse($video->created_at);
                    $timeDifference = $videoDate->diffForHumans();
                @endphp
                <div class="vid-list">
                    <a href="/video/{{ $video->id }}"><img src="{{ $video->thumbnail }}" class="thumbnail"></a>
                    <div class="flex-div">
                        <img src="{{ Auth::user()->profile_picture }}">
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
    <script src="{{ asset('js\main.js') }}"></script>
</body>

</html>
