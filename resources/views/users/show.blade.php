<h2>User Details:</h2>
<p><strong>Id:</strong> {{ $users->id}}</p>
<p><strong>Name:</strong> {{ $users->name}}</p>
<p><strong>Email:</strong> {{ $users->email}}</p>
<a href="{{ route('users.index') }}">Back to Users List</a>