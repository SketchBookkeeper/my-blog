@extends ('layouts.admin')

@section ('content')
    <div class="row">
        <div class="col-sm flex-justify-content-between">
            <h2>Posts</h2>
        </div>

        <div class="col-sm d-flex justify-content-end">
            <div>
               <a href="/admin/create/post" class="btn btn-outline-primary">Add Post</a>
            </div>
        </div>
    </div>

    <div class="row mb-5">

        @foreach($posts->items() as $post)

            <div class="col-sm-12 col-lg-4 mb-4">

                <div class="card">
                    <h5 class="card-header">
                        {{ $post['title'] }}
                    </h5>

                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">
                            <span>Updated</span>
                            {{
                                \Carbon\Carbon::createFromTimeStamp(
                                    strtotime( $post['created_at'] )
                                )->diffForHumans()
                            }}
                        </h6>

                        <div class="mb-2">
                            @foreach($post['tags'] as $tag)
                                <span class="badge" style="background-color: {{ $tag['color'] }};">
                                    {{ $tag['name'] }}
                                </span>
                            @endforeach
                        </div>

                        @if ($post['excerpt'])
                            <p class="card-text">{{ $post['excerpt'] }}</p>
                        @endif

                        <a href="/admin/edit/post/{{ $post['slug'] }}" class="card-link">Edit</a>
                    </div>
                </div>

            </div>

        @endforeach

    </div>

    {{ $posts->links() }}

@endsection
