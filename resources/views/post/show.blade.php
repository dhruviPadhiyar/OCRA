<x-home.layout>
    {{-- {{ $post }} --}}

    <div class="container mt-5 mb-5">
        <div class="post card m-auto shadow bg-body-tertiary border rounded">
            <div class="row mt-0 m-3 p-3">
                <div class="col-4 mt-5">
                    @if (!$post->thumbnail)
                        <img src="{{ asset('images/6.jpg') }}" class="img-fluid rounded-top" alt="" />
                    @else
                        <img src="{{ asset('/storage/image/' . $post->thumbnail) }}" class="img-fluid rounded-top"
                            alt="post-blog-image" />
                    @endif
                    <div class="mt-5 author">
                        <div class="row">
                            <div class="col-3 icon">
                                <img src="{{ asset('images/writer.png') }}" class="img-fluid rounded-top"
                                    alt="author" />
                            </div>
                            <div class="col-9 author-name mt-3">
                                <p class="fw-bold">
                                    {{ ucwords($post->user->name) }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="row m-2">
                        <div class="back col-6">
                            <a href="{{ redirect()->getUrlGenerator()->previous() }}" class="text-dark fw-bold"
                                style="text-decoration: none;">
                                < Go Back to Posts </a>
                        </div>
                        <div class="category text-end col-6">
                            <small class="fw-bold text-danger p-1 border border-danger rounded">
                                {{ $post->category }} </small>
                        </div>
                    </div>
                    <div class="details m-2">
                        <div class="title m-4">
                            <h3 class="fw-bold">{{ ucwords($post->title) }}</h3>
                        </div>
                        <div class="excerpt m-4">
                            <p>{{ $post->excerpt }}</p>
                        </div>
                        <div class="m-4 body">
                            {{ $post->body }}
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <!-- add comment -->
            <div class="addComment col-6">
                <div class="addComment me-0 p-3 shadow border rounded">
                    {{-- add comment --}}
                    <h5>Add comment</h5>
                    <form action="{{ route('post.comment', $post->id) }}" method="post">
                        @csrf

                        <div class="row">
                            <div class="col-9">
                                <div>
                                    <textarea class="form-control" name="comment" id="comment" placeholder="Add comment..."></textarea>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="submit text-end ">
                                    <button type="submit" class="btn btn-sm btn-dark">
                                        Post
                                    </button>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- show comments -->
            @if (count($post->comments))

            <div class="col-6">
                <div class="showComments">
                    <p class="fw-bold">
                        Previous Comments
                    </p>
                        @foreach ($post->comments as $comment)
                            <div class="cmt p-3 border shadow rounded">
                                <div class="row">
                                    <div class="col-9">
                                        <div class="commentTest m-2 p-2">
                                      {{ $comment->content }}

                                        </div>
                                    </div>
                                    <div class="col-3">
                                      <div class="author m-2 p-2">
                                        <i class="fa-solid fa-circle-user "></i>
                                        {{ $comment->author->name }}
                                      </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

        </div>


    </div>


</x-home.layout>
