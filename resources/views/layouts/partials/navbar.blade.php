<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route ('home')}}">Home</a>
                </li>
                @if(\Illuminate\Support\Facades\Route::has('posts'))
                <li class="nav-item">
                    <a class="nav-link" href="{{route ('posts')}}">Posts</a>
                </li>
                @endif
            </ul>
            <a href="{{route ('logout')}}"> logout </a>
        </div>
    </div>
</nav>
