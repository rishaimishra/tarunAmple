welcome
{{ Auth::guard('admin')->user()}}
<br>
<a href="{{ route('admin.add.page') }}">add admin </a>
<br>
<a href="{{ route('admin.logout') }}">Logout </a>