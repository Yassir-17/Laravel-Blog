<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Laravel Blog</a>
    </div>
    {{-- stop --}}
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="{{Request::is('/') ? "active" : ""}}"><a href="/">Home </a></li>
        <li class="{{Request::is('blog') ? "active" : ""}}"><a href="/blog" >Blog</a></li>
        <li class="{{Request::is('about') ? "active" : ""}}"><a href="/about">About</a></li>
        <li class="{{Request::is('contact') ? "active" : ""}}"><a href="/contact" >Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        @if(Auth::check())
          <li class="dropdown">
            <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Hello {{Auth::user()->name}} <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('posts.index')}}">Posts</a></li>
              <li><a class="dropdown-item" href="{{route('categories.index')}}">Categories</a></li>
              <li><a class="dropdown-item" href="{{route('tags.index')}}">Tags</a></li>
              <li role="separator" class="divider"></li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
              <li><a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                Logout
                </a>
              </li>
            </ul>   
          </li>
        @else
         <li> <a href="{{route('login')}}" btn btn-default>Login</a></li>
        @endif
      </ul>
    </div>
  </div>
</nav>

<!--####################End navbar##################### -->   