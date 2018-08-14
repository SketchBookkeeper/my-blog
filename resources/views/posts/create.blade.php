@extends ('layouts.app')

@section ('content')
    <form method="POST" action="/admin/store/post">
        {{ csrf_field() }}

        <label for="post-title">Title</label>
        <input type="text" id="post-title" name="title" >

        <label for="post-excerpt">Excerpt</label>
        <input type="text" id="post-excerpt" name="excerpt">

        <label for="post-body">Body</label>
        <textarea name="body" id="body" cols="30" rows="10" ></textarea>

        <button type="submit" class="button">Publish</button>
    </form>
@endsection
