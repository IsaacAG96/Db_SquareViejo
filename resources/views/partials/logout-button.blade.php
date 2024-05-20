<!-- resources/views/partials/logout-button.blade.php -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
<a href="{{ route('logout') }}" class="btn btn-danger"
   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    Log out
</a>
