<form action="{{ route('example.store') }}" method="POST">
    @csrf
    <input type="text" placeholder="name" name="name">
<hr/>
    <textarea name="content" placeholder="content"></textarea>
    <input type="submit" value="create">
</form>
