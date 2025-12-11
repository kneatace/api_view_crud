<h3>User registration form</h3>
<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <label for="name">Name:</label><br>
    <input type='text' name='name' id='name' required><br><br>
    <label for="email">Email:</label><br>
    <input type='email' name='email' id='email' required><br><br>
    <label for="password">Password:</label><br>
    <input type='password' name='password' id='password' required><br><br>
    <label for="password_confirmation">Confirm Password:</label><br>
    <input type="password" name="password_confirmation" required><br><br>
    <input type='submit' value='Submit'>
</form>
@if ($errors->any())
    <div style="color:red">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif