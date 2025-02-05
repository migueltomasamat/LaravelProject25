<div class="container-fluid nav-bar bg-transparent">
    <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
        <a href="{{route('home')}}" class="navbar-brand d-flex align-items-center text-center">
            <div class="icon p-2 me-2">
                <img class="img-fluid" src="{{URL::asset('img/icon-deal.png')}}" alt="Icon" style="width: 30px; height: 30px;">
            </div>
            <h1 class="m-0 text-primary">DAWmobiliaria</h1>
        </a>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto">
                <a href="{{route('home')}}" class="nav-item nav-link {{request()->is('/')?'active':''}}">Inicio</a>
                <a href="{{route('about')}}" class="nav-item nav-link {{request()->is('about')?'active':''}}">About</a>
                <a href="{{route('inmuebles')}}" class="nav-item nav-link {{request()->is('inmuebles')?'active':''}}">Inmuebles</a>
                <a href="{{route('api')}}" class="nav-item nav-link {{request()->is('login')?'active':''}}">Registro API</a>
            </div>
            <a href="" class="btn btn-primary px-3 d-none d-lg-flex">Add Property</a>
        </div>
    </nav>
</div>
