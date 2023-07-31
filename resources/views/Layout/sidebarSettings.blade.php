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