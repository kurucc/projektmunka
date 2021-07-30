@include('header')
<a href={{ url('logout') }}>Logout</a>

@if (Auth::guard('employee')->check() && Auth::guard('employee')->user()->role === 'admin')
    <a href={{ url('dashboard/admin') }}>Admin</a>
@endif

@include('footer')