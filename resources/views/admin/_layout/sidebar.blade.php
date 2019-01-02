<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="index.html"><img src="{{url('template/assets/images/icon/logo.png')}}" alt="logo"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                @if (Auth::user()->role == 0)
                    <ul class="metismenu" id="menu">
                        <li><a href="{{url('/dashboard')}}">Dashboard</a></li>
                        <li><a href="{{url('/merchant')}}">Merchant</a></li>
                        <li><a href="{{url('/order')}}">Order</a></li>
                        <li><a href="{{url('/user')}}">User</a></li>
                    </ul>
                @elseif(Auth::user()->role == 1)
                    <ul class="metismenu" id="menu">
                        <li><a href="{{url('/dashboard')}}">Dashboard</a></li>
                        {{-- <li><a href="{{url('/jo')}}">Merchant</a></li> --}}
                    </ul>
                @elseif(Auth::user()->role == 2)
                    <ul class="metismenu" id="menu">
                        <li><a href="{{url('/dashboard')}}">Dashboard</a></li>
                        <li><a href="{{url('/merchant')}}">Merchant</a></li>
                        <li><a href="{{url('/order')}}">Order</a></li>
                    </ul>
                @else
                @endif
                
            </nav>
        </div>
    </div>
</div>