<x-home.layout>
    <!-- home page-->
<h5>Tesing GIT merging with conflict</h5>
<!-- showing the blog posts -->
    <div class="container mt-5">
        <div class="posts m-3">
            <div class="row m-3">
                @if (count($posts)) 
                    @foreach ($posts as $post)
                        <div class="col-sm-4 mb-3">
                            <div class="card h-100">
                                @if (!$post->thumbnail)
                                    <img src="{{ asset('images/7.jpg') }}" class="img-fluid rounded-top" />
                                @else
                                @php
                                    $imagePath = Storage::url('image/' . $post->thumbnail);
                                @endphp
                                    <img src="{{ asset($imagePath) }}"
                                        class="img-fluid rounded-top" alt="post-blog-image" />
                                @endif
                                <div class="card-body"">
                                    <div class="category text-end">
                                        <small
                                            class="text-danger border border-danger p-1 bg-light rounded">{{ $post->category }}</small>
                                    </div>
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <p class="card-text">{{ $post->excerpt }}</p>
                                    <div class="button text-end">
                                        <a href="{{ route('post.show', $post->slug) }}"
                                            class="btn btn-primary btn-sm">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>
        @else
            <div class="no-posts text-center p-5 m-5 border rounded bg-danger">
                <h4 class="fw-bold text-light">No posts yet.</h4>
            </div>
            @endif

        </div>
    </div>

</x-home.layout>
