<form action="{{route('register')}}" method="post">
    @csrf
    <input type="text" name="name" placeholder="name">
    <input type="text" name="email" placeholder="email">
    <input type="password" name="password" placeholder="password">
    <input type="password" name="confirm-password" placeholder="confirm password">
    <button type="submit">Register</button>
</form>

@if(session('success'))
    {{ session('success') }}
@endif

