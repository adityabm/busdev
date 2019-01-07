<li> 
    <a href="{{url('/')}}">Home</a>
</li>
<li> 
    <a href="{{url('/')}}">List of Business</a>
</li>
@if(!Auth::check())
<li> 
    <a href="{{url('/login')}}">Login / Register</a>
</li>
@else
<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</a> 
  <ul class="dropdown-menu dropdown-menu-left">
     <li><a href="{{url('dashboard')}}">Dashboard</a></li>
     <li>
     	<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
     	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		    {{ csrf_field() }}
		</form>
     </li>
  </ul>
</li>
@endif