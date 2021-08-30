<div class="aside">

    <div class="top">
        <span>GPW</span>
    </div>

    <ul>
        <li>
            <a href="/">
                Home
            </a>
        </li>
        <li>
            <a href="{{ route('dashboard') }}" class="{{ str_contains(url()->current(), '/dashboard') ? 'router-link-exact-active' : null }}">
                <i class="bi-box icon"></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('my-goals.index') }}" class="{{ str_contains(url()->current(), '/my-goal') ? 'router-link-exact-active' : null }}">
                <i class="bi-graph-up icon"></i>
                <span class="text">My goal</span>
            </a>
        </li>
        <li>
            <a href="{{ route('days.index') }}" class="{{ str_contains(url()->current(), '/days') ? 'router-link-exact-active' : null }}">
                <i class="bi-calendar-date icon"></i>
                <span class="text">Days</span>
            </a>
        </li>
        <li>
            <a href="{{ route('products.index') }}" class="{{ str_contains(url()->current(), '/products') ? 'router-link-exact-active' : null }}">
                <i class="bi-cart icon"></i>
                <span class="text">Products</span>
            </a>
        </li>
        <li>
            <a href="{{ route('meals.index') }}" class="{{ str_contains(url()->current(), '/meals') ? 'router-link-exact-active' : null }}">
                <i class="bi-egg-fried icon"></i>
                <span class="text">Meals</span>
            </a>
        </li>
{{--        <li>--}}
{{--            <a href="{{ route('users.index') }}">--}}
{{--                Users--}}
{{--            </a>--}}
{{--        </li>--}}
        <li>
            <a href="">
                <i class="bi-box-arrow-left icon"></i>
                <span class="text">Logout</span>
            </a>
        </li>
    </ul>
</div>
