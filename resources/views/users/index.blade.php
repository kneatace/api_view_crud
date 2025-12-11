@if(session('success'))
    <div id = "flash-message" style="color: green; margin-bottom: 10px;">
        {{ session('success') }}
    </div>
      <script>
        setTimeout(function() {
            const flash = document.getElementById('flash-message');
            if (flash) {
                flash.style.opacity = '0'; // fade out
                setTimeout(() => flash.remove(), 500); // remove after fade
            }
        }, 3000);
    </script>
@endif
<h2>Users List</h2><br>
<table border="1" cellpadding="10">
    <tr>
        <th>SN</th>
        <th>Name</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>
    @foreach ($users as $user)
    <tr>
        <td>{{ $loop -> iteration }}</td>
        <td>{{ $user ->name}}</td>
        <td>{{ $user ->email}}</td>
        <td>
            <a href="{{ route('users.show', $user->id) }}">View</a>
            <a href="{{ route('users.edit', $user->id) }}">Edit</a>
            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this user?');">
            </form>
        </td>
    </tr>
    @endforeach
</table> <br>
<a href="{{ route('users.create') }}">Create new users</a>
