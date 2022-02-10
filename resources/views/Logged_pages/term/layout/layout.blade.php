<ul class="nav " role="" style="padding-top: 12px;">
    <li class="nav-item d-flex align-items-center {{ (request()->is('user/term')) ? 'active' : '' }}">
        <img src="{{asset('images/grid.png')}}" alt="">
        <a class="nav-link nav-itemz" href="{{url('user/term')}}" >Quoter</a>
    </li>
    <li class="nav-item d-flex align-items-center {{ (request()->is('user/term/quote/compare')) ? 'active' : '' }}">
    <img src="{{asset('images/Frame.png')}}" alt="">
        <a class="nav-link" href="{{url('user/term/quote/compare')}}" >Quote Compare</a>
    </li>

    <li class="nav-item d-flex align-items-center {{ (request()->is('user/term/setting')) ? 'active' : '' }}" style="color: #707C97;">
    <img src="{{asset('images/Frame2.png')}}" alt="">
        <a class="nav-link" href="{{url('user/term/setting')}}" >Setting</a>
    </li>

</ul>
