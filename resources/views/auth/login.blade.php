<form action="{{ route('login') }}" method="post">
    @csrf
    <input type="email" name="email" id="" placeholder="email">
    <input type="password" name="password" id="" placeholder="password">
    <button type="submit">Login</button>
</form>
@if(session('error'))
    {{ session('error')}}
@endif
