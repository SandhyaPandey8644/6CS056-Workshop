
<form action="{{ $action }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this record?')">
    @csrf
    @method('DELETE')

    <button type="submit">Delete</button>
</form>
