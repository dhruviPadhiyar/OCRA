<x-home.layout>
    <div class="container">
        <div class="alert alert-warning show row mt-2" role="alert">
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
                <div class="back">
                    <a href="{{ route('ebooks.manage') }}" class="text-dark fw-bold" style="text-decoration: none;">
                        < Go Back to Manage Ebooks </a>
                </div>

                <div class="col-4 mt-5">
                    <form action="{{ route('ebook.update', $ebook->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <img src="{{ asset('/storage/Ebook/cover/' . $ebook->cover) }}" class="img-fluid rounded-top"
                            alt="post-blog-image" />
                        <div class="editCover">
                            <div class="mt-3">
                                <input type="file" class="form-control" name="cover" id="newCover"
                                    placeholder="Edit Cover" aria-describedby="fileHelpId" />
                                <div id="fileHelpId" class="form-text">Edit Cover</div>
                            </div>

                        </div>
                </div>
                <div class="col-4">
                    <div class="row m-2">

                    </div>
                    <div class="details m-2">
                        <div class="title m-4">
                            <h3 class="fw-bold fieldData">{{ ucwords($ebook->title) }}</h3>
                            <div class="fieldEdit" style="display: none;">
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="newTitle" id="newTitle"
                                        aria-describedby="helpId" value="{{ $ebook->title }}" />
                                    <small id="helpId" class="form-text text-muted">Edit Title</small>
                                </div>
                            </div>
                        </div>

                        <div class="excerpt m-4">
                            <p class="fieldData">{{ $ebook->description }}</p>
                            <div class="fieldEdit" style="display: none;">
                                <div class="mb-3">
                                    <label for="excerpt" class="form-label">Edit Description</label>
                                    <textarea class="form-control h-100" name="newDescription">{{ $ebook->description }}</textarea>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-4">
                    <!-- ebook pdf view -->
                    <div class="ebook m-3 border rounded border-secondry">
                        <embed src="{{ asset('storage/Ebook/book/' . $ebook->ebook) }}" type="application/pdf"
                            width="100%" height="400px" class="rounded" />

                    </div>
                    <!-- edit ebook -->
                    <div class="mt-3">
                        <input type="file" class="form-control" name="ebook" id="newCover"
                            placeholder="Edit Cover" aria-describedby="fileHelpId" />
                        <div id="fileHelpId" class="form-text">Edit Ebook PDF</div>
                    </div>
                    <div class="submitBtn text-end">
                        <button type="submit" class="btn btn-primary btn-sm">
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>

    </div>
    </div>


</x-home.layout>
