<header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            @if(Auth::check())
                            <li class="header__top__right__auth">
                                <a href="{{route('profile')}}"> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} </a>
                            </li>
                            <li class="header__top__right__auth">
                                <a href="{{route('logout')}}"> Logout</a>
                            </li>   
                            <li class="header__top__right__auth">
                                <a href="{{route('register')}}"> Register</a>
                            </li>
                            <li class="header__top__right__auth">
                                <a href="{{route('login')}}"> Login</a>
                            </li>
                            @endif
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{route('post.all')}}">Home</a></li>
                            <li><a href="{{route('post.index')}}">Posts</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>