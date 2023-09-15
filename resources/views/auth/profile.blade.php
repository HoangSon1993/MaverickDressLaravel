<form action="{{ route('profile') }}" method="post">
    @csrf
    @method('put')
    <input type="text" name="email" disabled value="{{ auth()->user()->email }}">
    <input type="text" name="name" value="{{ auth()->user()->name }}"><br>
    <input type="checkbox" name="change_password">
    <input type="password" name="password" placeholder="password">
    <button type="submit">Update</button>
</form>
<a href="{{route('logout')}}">Dang xuat</a><br>
@if(session('success'))
    {{ session('success') }}
@endif

