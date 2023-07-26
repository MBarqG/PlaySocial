<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="images/mainicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css\settingsStyle.css') }}">
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
                    <button class="hiddenbutton" type="submit"><img
                            src="{{ asset('images/search-icon.png') }}"></button>
                </form>
            </div>
        </div>
        <div class="navEnd flex-div">
            <img src="{{ asset('images/upload.png') }}" class="upload-icon">
            <img src="{{ Auth::user()->profile_picture }}" class="user-icon">
        </div>
    </nav>
    <!----------side bar------->
    <div class="sidebar">
        <div class="shortcut-links">
            <a href="/Profile"><img src="{{ asset('images/mainicon.png') }}">
                <p>Home</p>
            </a>
            <a href="/saves"><img src="{{ asset('images/save on.png') }}">
                <p>Saved videos</p>
            </a>
            <a style="color: #dc3545" href="/settings"><img src="{{asset('images/settings.png')}}">
                <p>Settings</p>
            </a>
            <a href="/Logout"><img src="{{ asset('images/Logout.png') }}">
                <p>Logout</p>
            </a>
            <hr>
        </div>
        <div class="following">
            <h3>Following</h3>
            @foreach ($FollowList as $Follow)
                @php
                    $user = App\Models\User::find($Follow->creator_id);
                @endphp
                <a href="{{ route('profile', ['id' => $user->id]) }}"><img src="{{ asset($user->profile_picture) }}">
                    <p>{{ $user->name }}</p>
                </a>
            @endforeach
            <hr>
        </div>
    </div>

    {{-- --------------main------------- --}}
    <div class="container mt-5">
        <h2>Channels Settings:
            <hr>
        </h2>
        <div class="row">
          <div class="col-md-6 mx-auto">
            <form method="POST" action="update" enctype="multipart/form-data">
            @csrf
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name">
              </div>
              <div class="form-group">
                <label for="profile-picture">Profile Picture</label>
                <div class="drop-zone" id="drop-zone">
                    <p>Drag and drop an image here or click to browse.</p>
                    <label for="image-input" id="image-label">
                        <img src="" alt="Upload" id="image-preview">
                    </label>
                    <input type="file" id="image-input" name="profile_picture" accept="image/*" style="display: none;">
                </div>
              </div>
              <button type="submit" class="btn btn-outline-danger Settings">Save Settings</button>
            </form>
          </div>
        </div>
        <hr>
      </div>

      {{-- --------------videos------------- --}}
      <div class="container">
        <h2>Videos Settings:
            <hr>
        </h2>
        <form action="DeleteVideo" method="POST">
            @csrf
            <table class="table table-striped table-hover table-striped-red-white">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="title-column">Title</th>
                        <th scope="col" class="Description-column">Description</th>
                        <th scope="col"  >Thumbnail</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($videos as $video)
                    <tr>
                        <td>{{ $video->id }}</td>
                        <td>{{ $video->title }}</td>
                        <td>{{$video->description}}</td>
                        <td>
                            <img src="{{ $video->thumbnail }}" alt="Thumbnail" width="150" height="60">
                        </td>
                        <td>
                            <input type="checkbox" name="videosToDelete[]" value="{{ $video->id }}">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-danger Settings">Delete Selected Videos</button>
        </form>
    </div>



    {{-- --------------upload------------ --}}
    <div style="display: none" class="overlay-card">
        <div class="card-content">
            <h2>upload your Video</h2>
            <hr>
            <form method="POST" action="UploadVideo" enctype="multipart/form-data">
                @csrf
                <label for="title" class="inline-block text-red mb-4"> Video Title: </label>
                <input type="text" class="border border-danger rounded" name="title" />
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
                <br>
                <label for="description" class="inline-block text-red mb-4 textarea_label"> Video Description: </label>
                <textarea placeholder='Enter description...' rows="4" cols="48"
                    class="border border-danger rounded large_text_box" name="description"></textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
                <br>
                <br>
                <label for="thumbnail" class="inline-block text-red mb-4">Video Thumbnail:</label>
                <input type="file" class="border border-danger rounded" name="thumbnail" accept="image/*" />

                @error('thumbnail')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
                <br>
                <label for="path" class="inline-block text-red mb-4">Upload Video:</label>
                <input type="file" class="border border-danger rounded" name="path" accept="video/mp4, video/avi, video/quicktime, video/x-matroska" />

                @error('path')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
                <br>
                <button class="btn btn-outline-danger" type="submit">Upload</button>
                <hr>
            </form>
            <button class="btn btn-danger" onclick="hideOverlay()">close</button>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js\settings.js') }}"></script>
</body>

</html>
