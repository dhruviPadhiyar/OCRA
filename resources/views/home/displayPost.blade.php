<x-home.layout>
    <div class="container">
        <div class="alert alert-warning show row" role="alert">
            <div class="col-10">
                <strong>Click on the text , you want to edit! </strong>
            </div>
            <div class="col-2 text-end">
                <button type="button" class="btn btn-sm border-less close" data-dismiss="alert" area-label="close">
                    <span aria-hidden="true">
                        <span> &times;
                        </span>
                </button>

            </div>
        </div>


        
            <div class="post card m-auto shadow bg-body-tertiary border rounded">
                <div class="row mt-0 m-3 p-3">
                    <div class="col-4 mt-5">
                        <form action="{{ route('post.update',$post->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                        @if (!$post->thumbnail)
                            <img src="{{ asset('images/6.jpg') }}" class="img-fluid rounded-top" alt="" />
                        @else
                            <img src="{{ asset('/storage/image/' . $post->thumbnail) }}" class="img-fluid rounded-top"
                                alt="post-blog-image" />
                        @endif
                        <div class="editThumbnail">
                            <div class="mt-3">
                                <input
                                    type="file"
                                    class="form-control"
                                    name="newTumbnail"
                                    id="new thumbnail"
                                    placeholder="Edit Thumbnail"
                                    aria-describedby="fileHelpId"
                                />
                                <div id="fileHelpId" class="form-text">Edit Thumbnail</div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="row m-2">
                            <div class="back col-6">
                                <a href="{{ route('posts.manage') }}" class="text-dark fw-bold"
                                    style="text-decoration: none;">
                                    < Go Back to Manage Posts </a>
                            </div>
                            <div class="category fieldDiv text-end col-6">
                                <small class="fw-bold text-danger p-1 border border-danger rounded fieldData">
                                    {{ $post->category }} </small>

                                <div class="fieldEdit" style="display: none;">
                                    <div class="mb-3">
                                        <label for="category" class="form-label">Edit Category</label>
                                        <select class="form-select form-select-sm" name="newCategory" id="category">
                                            <option value="" selected>{{ $post->category }}</option>
                                            @foreach (\App\Models\Post::$categories as $category)
                                                <option value="{{ $category }}">{{ $category }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="details m-2">
                            <div class="title m-4">
                                <h3 class="fw-bold fieldData">{{ ucwords($post->title) }}</h3>
                                <div class="fieldEdit" style="display: none;">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="title" id="newTitle"
                                            aria-describedby="helpId" value="{{ $post->title }}" />
                                        <small id="helpId" class="form-text text-muted">Edit Title</small>
                                    </div>

                                </div>
                            </div>
                            <div class="excerpt m-4">
                                <p class="fieldData">{{ $post->excerpt }}</p>
                                <div class="fieldEdit" style="display: none;">
                                    <div class="mb-3">
                                        <label for="excerpt" class="form-label">Edit Excerpt</label>
                                        <textarea class="form-control h-100" name="newExcerpt">{{ $post->excerpt }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="m-4 body">
                                <p class="fieldData">{{ $post->body }}</p>
                                <div class="fieldEdit" style="display: none;">
                                    <div class="mb-3">
                                        <label for="body" class="form-label">Edit Post</label>
                                        <textarea class="form-control"name="newBody">{{ $post->body }}</textarea>
                                    </div>

                                </div>
                            </div>
                            <div class="submitBtn text-end">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    Save
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    </div>
    </div>


</x-home.layout>
