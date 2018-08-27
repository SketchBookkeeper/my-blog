@extends ('layouts.admin')

@section ('content')
    <form method="POST" action="/admin/update/post" class="mb-4">
        {{ csrf_field() }}

        <input type="hidden" name="id" value="{{ $post->id }}">

        <div class="row">
            <div class="col-sm-12 col-md-9">
                <div class="form-group">
                <label for="post-title">Title</label>
                <input type="text" id="post-title" name="title" value="{{ $post->title }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="post-excerpt">Excerpt</label>
                    <input type="text" id="post-excerpt" name="excerpt" value="{{ $post->excerpt }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="post-body">Body</label>
                    <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{ $post->body }}</textarea>
                </div>
            </div>

            <div class="col-sm-12 col-md-3">
                <p>Tags</p>

                @foreach($tags as $tag)

                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            name="tags[]"
                            value="{{ $tag->id }}"
                            id="tag-{{ $tag->name }}"
                            {{ in_array($tag->name, $active_tags) ? 'checked' : '' }}
                        >
                        <label class="form-check-label" for="defaultCheck1">
                            {{ $tag->name }}
                        </label>
                    </div>

                @endforeach

            </div>
        </div>

        <button type="submit" class="btn btn-outline-primary">Update</button>
    </form>

    <h3>Delete Post</h3>

    <form action="/admin/delete/post" method="POST">
        @method('DELETE')
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $post->id }}">

        <button class="btn btn-sm btn-outline-danger">Delete {{ $post->title }}</button>
    </form>
@endsection
