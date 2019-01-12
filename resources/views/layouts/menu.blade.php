<li> 
    <a href="{{url('/')}}">Beranda</a>
</li>
<li> 
    <a href="{{url('projects')}}">Daftar Projek</a>
</li>
@if(!Auth::check())
<li> 
    <a href="{{url('/login')}}">Masuk / Daftar</a>
</li>
@else
<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</a> 
  <ul class="dropdown-menu dropdown-menu-left">
     <li><a href="{{url('dashboard')}}">Dasbor</a></li>
     <li>
     	<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a>
     	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		    {{ csrf_field() }}
		</form>
     </li>
  </ul>
</li>
@endif

<li>
  <form id="demo-2">
    <input type="search" placeholder="Search" name="search" onkeypress="return runScript(event)" id="search-engine">
  </form>
</li>