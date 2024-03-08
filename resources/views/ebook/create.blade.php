<x-home.layout>

    <!-- add e-book page -->

    <div class="container-fluid ">

        <div class="row m-5 mt-4 p-4">
            <div class="col-5">
                <img
                    src="{{ asset('images/eb2.svg') }}"
                    class="img-fluid"
                    alt=""
                />

            </div>
            <div class="col-7">
                <div class="heading">
                    <h4 class="text-center fw-bold mt-5 mb-3">Add E-BOOK
                        <span><i class="fa-solid fa-swatchbook"></i></span>
                    </h4>
                </div>

                <div class="addEbookForm m-auto border shadow rounded p-4 bg-body-tertiary">
                    <form action="{{ route('ebook.save') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" id="title"
                                aria-describedby="helpId" placeholder="E-Book Title" />
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="5" id="description" placeholder="What the book is about?"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="cover" class="form-label">Cover</label>
                            <input type="file" class="form-control" name="cover" id="cover" placeholder=""
                                aria-describedby="fileHelpId" />
                            <div id="fileHelpId" class="form-text">Upload a Cover photo for the E-Book</div>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">E-Book</label>
                            <input type="file" class="form-control" name="ebook" id="ebook" placeholder=""
                                aria-describedby="fileHelpId" />
                            <div id="fileHelpId" class="form-text">Upload a pdf of the E-Book</div>
                        </div>
                        <div class="submit text-end">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <span class="m-2">Upload</span>
                                <i class="fa-solid fa-paper-plane"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-home.layout>
