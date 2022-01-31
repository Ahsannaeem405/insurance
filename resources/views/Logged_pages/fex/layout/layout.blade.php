<ul class="nav " role="" style="padding-top: 12px;">
    <li class="nav-item d-flex align-items-center {{ (request()->is('user/fex')) ? 'active' : '' }}">
        <img src="{{asset('images/grid.png')}}" alt="">
        <a class="nav-link nav-itemz" href="{{url('user/fex')}}" >Quoter</a>
    </li>
    <li class="nav-item d-flex align-items-center {{ (request()->is('user/fex/quote/compare')) ? 'active' : '' }}">
    <img src="{{asset('images/Frame.png')}}" alt="">
        <a class="nav-link" href="{{url('user/fex/quote/compare')}}" >Quote Compare</a>
    </li>

    <li class="nav-item d-flex align-items-center {{ (request()->is('user/fex/setting')) ? 'active' : '' }}" style="color: #707C97;">
    <img src="{{asset('images/Frame2.png')}}" alt="">
        <a class="nav-link" href="{{url('user/fex/setting')}}" >Setting</a>
    </li>

</ul>
