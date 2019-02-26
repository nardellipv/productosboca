<div class="heder-bottom">
    <div class="container">
        <div class="logo-nav">
            <div class="logo-nav-left">
                <h1><a href="index.html"><img src="{{asset('styleWeb/img/logochico.png') }}" alt="logo"/>Boca
                        Total <span>Compra donde sea</span></a></h1>
            </div>
            <div class="logo-nav-left1">
                <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header nav_2">
                        <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse"
                                data-target="#bs-megadropdown-tabs">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                        <ul class="nav navbar-nav">
                            <li><a href="{{ url('/') }}" class="act">Inicio</a></li>
                            @foreach($categories as $category)
                                <li><a href="{{ url('categoria', $category->slug) }}">{{ $category->name }}</a></li>
                            @endforeach
                            <li><a href="mail.html">Contacto</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            {{--<div class="logo-nav-right">
                <ul class="cd-header-buttons">
                    <li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
                </ul> <!-- cd-header-buttons -->
                <div id="cd-search" class="cd-search">
                    <form action="#" method="post">
                        <input name="Search" type="search" placeholder="Search...">
                    </form>
                </div>
            </div>--}}
            <div class="header-right2">
                <div class="cart box_1">
                    <a href="{{ route('listProducts') }}">
                        <h3>
                            <div class="total">
                                @if($countCart == 0)
                                    <span>$ 0 </span> -
                                @else
                                    <span>$ {{ $totalCart }} </span> -
                                @endif
                            </div>
                            <img src="{{asset('styleWeb/images/bag.png') }}" alt="carrito"/>
                            <span class="badge badge-warning">{{ $countCart }}</span>
                        </h3>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>