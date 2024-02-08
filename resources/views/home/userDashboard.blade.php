<x-home.layout>

    <div class="container">

        <div class="row">
            <div class="col-6">
                <div class="posts shadow border m-5 p-5 rounded bg-body-tertiary">
                    {{-- posts --}}
                    <div class="totalPosts">
                        <div class="row">
                            <div class="col-sm-8">
                                <h5>Total Posts</h5>
                            </div>
                            <div class="col-sm-4 text-end">
                                <h5 class="fw-bold">{{ count($posts) }}</h5>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-6">
                            <div class="createPost">
                                <a href="{{ route('post.create') }}" class="btn btn-sm btn-primary">Create Post</a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="managePosts text-end">
                                <a href="{{ route('posts.manage') }}" class="btn btn-sm btn-danger">Manage Posts</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="posts shadow border m-5 p-5 rounded bg-body-tertiary">
                    {{-- posts --}}
                    <div class="totalEbooks">
                        <div class="row">
                            <div class="col-sm-8">
                                <h5>Total E-Books</h5>
                            </div>
                            <div class="col-sm-4 text-end">
                                <h5 class="fw-bold">{{ $ebooks->count() }}</h5>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-6">
                            <div class="createPost">
                                <a href="{{ route('ebook.add') }}" class="btn btn-sm btn-primary">Add E-Book</a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="managePosts text-end">
                                <a href="{{ route('ebooks.manage') }}" class="btn btn-sm btn-danger">Manage E-Books</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</x-home.layout>
