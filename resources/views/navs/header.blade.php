<header id="header" id="home">
    <div class="container">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <a href="index.html"><img src="img/logo.png" alt="" title="" /></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="index.html">Home</a></li>
                    <li><a href="{{ route('post.select', 1) }}">single</a></li>
                    {{-- <li><a href="about-us.html">About Us</a></li>
                    <li><a href="category.html">Category</a></li> --}}
                    {{-- <li><a href="price.html">Price</a></li> --}}
                    {{-- <li><a href="blog-home.html">Post</a></li> --}}
                    <li><a href="{{ route('post.view') }}">Add Post</a></li>
                    <li ><a href="{{ route('mapRoute') }}" href="">Localisation</a>
                        <ul>
                            {{-- <li><a href="elements.html">elements</a></li>
                    <li><a href="search.html">search</a></li> --}}
                        </ul>
                    </li>
                    @auth
                        <li><a class="ticker-btn" href="#">{{ Auth::user()->name }}</a></li>
                    @else
                        <li><a class="ticker-btn" href="{{ route('register') }}">Signup</a></li>
                        <li><a class="ticker-btn" href="{{ route('login') }}">Login</a></li>
                    @endauth

                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </div>
</header>
