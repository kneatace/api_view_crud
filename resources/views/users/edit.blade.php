<h2> Edit user credentials</h2><br>
<form action="{{ route('users.update', $users->id) }}" method="POST">
    @csrf 
    @method('PUT')
    <label for="name">Name:</label><br>
    <input type='text' name='name' id ='name' value="{{ $users ->name }}" required><br><br>
    <label for ="email">Email:</label><br>
    <input type='email' name='email' id='email' value="{{ $users -> email }}" required><br><br>
    <input type='submit' value='Update'>
</form>
<a href="{{ route('users.index') }}"> Back to Users List</a>
