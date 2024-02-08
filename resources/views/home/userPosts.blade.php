<x-home.layout>

    <div class="container mb-3">
        {{-- manage posts --}}

        @if (count($posts))
            @foreach ($posts as $post)
                <div class="mt-5 m-auto card shadow bg-body-tertiary border rounded">
                    <div class="row">
                        <div class="col-4 m-4 p-3">
                            <!-- image - thumbnail -->
                            @if (!$post->thumbnail)
                                <img src="{{ asset('images/6.jpg') }}" class="m-5 img-fluid rounded" alt="" />
                            @else
                                <img src="{{ asset('/storage/image/' . $post->thumbnail) }}" class="m-5 img-fluid rounded"
                                    alt="post-blog-image" />
                            @endif
                           
                            <div class="action m-5">
                                    <a href="" class="btn btn-sm btn-success ">Edit Post</a>
                                    <a href="" class="btn btn-sm btn-danger ">Delete Post</a>
                                
                            </div>
                        </div>
                        <!-- post body col -->
                        <div class="col-7 m-4">
                            <div class="category text-end mt-4">
                                <small
                                    class="fw-bold text-danger border rounded border-danger p-2">{{ $post->category }}</small>
                            </div>
                            <div class="title m-2 p-1">
                                <h4 class="fw-bold">{{ ucwords($post->title) }}</h4>
                            </div>
                            <div class="slug m-2 p-1">
                                <p class="fw-bold">
                                    {{ $post->slug }}
                                </p>
                            </div>
                            <div class="excerpt m-2 p-1">
                                <p>
                                    {{ $post->excerpt }}
                                </p>    
                            </div>
                            <div class="body m-2 p-1">
                                <p>{{ $post->body }}</p>
                            </div>
                            <div class="timestamp m-2 text-end">
                               Posted  {{ $post->created_at->diffForHumans() }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="no-posts">
                <h4 class="text-danger">
                    No posts yet.
                </h4>
                <a href="{{ route('post.create') }}" class="btn fw-bold"> <span class="text-danger"> ></span> go to
                    create post</a>
            </div>
        @endif

        <div class="pagination mt-4 d-flex justify-content-end">
            {{ $posts->links() }}
        </div>

    </div>
   

</x-home.layout>
