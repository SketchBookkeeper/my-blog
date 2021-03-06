@extends ('layouts.admin')

@section ('content')
    <h2>Tags</h2>

    <ul class="list-group mb-5">

        @foreach($tags as $tag)

            <li class="list-group-item">

                <div class="row flex-nowrap">
                    <div class="col-sm-1 rounded" style="background: {{ $tag->color }}"></div>

                    <div class="col-sm-7 d-flex align-items-center">
                        <span>{{ $tag->name }}</span>
                    </div>

                    <div class="col-sm-4 d-flex justify-content-end">
                        <a href="/admin/edit/tag/{{ $tag->name }}" class="btn btn-sm btn-outline-primary mr-2">Edit</a>

                        <form action="/admin/delete/tag" method="POST">
                            @method('DELETE')
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $tag->id }}">

                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </div>
                </div>

            </li>

        @endforeach

    </ul>

    <div class="card">
        <div class="card-header">
            Add Tag
        </div>

        <div class="card-body">
            <form method="POST" action="/admin/store/tag">
                {{ csrf_field() }}

                <div class="row">
                    <div class="form-group col-sm-10">
                        <label for="tag-name">Tag Name</label>
                        <input type="text" id="tag-name" name="name" class="form-control">
                    </div>

                    <div class="form-group col-sm-2">
                        <label for="tag-color">Tag Color</label>
                        <input type="color" id="tag-color" name="color" value="#A52422" class="form-control">
                    </div>
                </div>

                <button type="submit" class="btn btn-outline-primary">Publish</button>
            </form>
        </div>
    </div>
@endsection
