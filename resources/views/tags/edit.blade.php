@extends ('layouts.admin')

@section ('content')

    <form method="POST" action="/admin/update/tag">
        {{ csrf_field() }}

        <input type="hidden" name="id" value="{{ $tag->id }}">

        <div class="row">
            <div class="form-group col-sm-10">
                <label for="tag-name">Tag Name</label>
                <input type="text" id="tag-name" name="name" value="{{ $tag->name }}" class="form-control">
            </div>

            <div class="form-group col-sm-2">
                <label for="tag-color">Tag Color</label>
                <input type="color" id="tag-color" name="color" value="{{ $tag->color }}" class="form-control">
            </div>
        </div>

        <button type="submit" class="btn btn-outline-primary">Update</button>
    </form>

@endsection
