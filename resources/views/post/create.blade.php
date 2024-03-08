<x-home.layout>
    <!-- create blog post -->

    <!-- main div container -->
    <div class="container-fluid mt-2">

        <div class="row m-5 mt-4 p-4">
            <div class="col-5">
                {{-- image --}}
                <img src="{{ asset('images/pst2.svg') }}" class="img-fluid" alt="" srcset="">
            </div>
            <div class="col-7">
                <div class="shadow rounded p-4 bg-body-tertiary">
                    <div class="heading">
                        <h4 class="fw-bold ft">Create Post
                            <span class="m-3">
                                <i class="fa-solid fa-feather ft"></i>
                            </span>
                        </h4>
                    </div>
                    <!-- create post form -->


                    <form action="{{ route('post.save') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" id="title"
                                aria-describedby="helpId" placeholder="Post Title" required />
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Slug</label>
                            <input type="text" class="form-control" name="slug" id="slug"
                                aria-describedby="helpId" placeholder="Post Slug" required />
                        </div>
                        <div class="mb-3">
                            <label for="excerpt" class="form-label">Excerpt</label>
                            <textarea class="form-control" name="excerpt" id="excerpt" placeholder="Post Excerpt" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="body" class="form-label">Body</label>
                            <textarea class="form-control" name="body" id="body" rows="8" placeholder="Write your post" required></textarea>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <!-- category -->
                                <div>
                                    <label for="category" class="form-label">Category</label>
                                    <select class="form-select form-select-sm" name="category" id="category">
                                        <option value="" selected disabled>Select Category</option>
                                        @foreach (\App\Models\Post::$categories as $category)
                                            <option value="{{ $category }}">{{ $category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <!-- thumbnail -->
                                <div>
                                    <label for="thumbnail" class="form-label">Thumbnail</label>
                                    <div class="custom-file border p-2">
                                        <input type="file" class="custom-file-input form-input" id="thumbnail"
                                            name="thumbnail" />
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="text-end mt-4 ">
                            <button type="submit" class="btn btn-sm btn-primary">
                                Create
                            </button>
                        </div>


                </div>



                </form>
            </div>
        </div>
    </div>
    </div>



</x-home.layout>
