<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" target="_blank" href="{{ url('/') }}">Trang chủ <span
                        class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/home') }}">DashBoard <span class="sr-only"></span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('category.index') }}">Danh Mục</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('slider.index') }}">Slider</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Dịch Vụ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Nick Game</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Vòng Quay</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Dịch Vụ</a>
            </li>
        </ul>

    </div>
</nav>
