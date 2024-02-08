<x-home.layout>

    <!-- add e-book page -->

    <div class="container">
        <h4 class="text-center fw-bold mt-5 mb-3">Add E-BOOK
            <span><i class="fa-solid fa-swatchbook"></i></span>
        </h4>

        <div class="addEbookForm m-auto border shadow rounded p-4 bg-primary-subtle ">
            <form action="{{ route('ebook.save') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId"
                        placeholder="E-Book Title" />
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" placeholder="What the book is about?"></textarea>
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
                        <i class="fa-solid fa-map-pin mr-3"></i>
                        <span>Upload</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    
</x-home.layout>
