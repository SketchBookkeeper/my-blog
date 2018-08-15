@extends ('layouts.admin')

@section ('content')
    <form method="POST" action="/admin/store/post">
        {{ csrf_field() }}

        <div class="row">
            <div class="col-sm-12 col-md-9">
                <div class="form-group">
                <label for="post-title">Title</label>
                <input type="text" id="post-title" name="title" class="form-control">
                </div>

                <div class="form-group">
                    <label for="post-excerpt">Excerpt</label>
                    <input type="text" id="post-excerpt" name="excerpt" class="form-control">
                </div>

                <div class="form-group">
                    <label for="post-body">Body</label>
                    <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>

            <div class="col-sm-12 col-md-3">
                <!-- Tags -->
            </div>
        </div>

        <button type="submit" class="btn btn-outline-primary">Publish</button>
    </form>
@endsection
