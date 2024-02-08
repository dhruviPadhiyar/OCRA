<x-home.layout>

    <div class="container-fluid">
        {{-- ebook --}}

        <!-- dashboard : e-books -->

        <div class="row m-4">
            @foreach ($ebooks as $ebook)
                <div class="col-6 mb-4">
                    <div class="card h-100 card m-auto shadow bg-body-tertiary border rounded">
                        <div class="row">
                            <div class="col-4">
                                <div class="cover m-5 mb-3">
                                    <img src="{{ asset('/storage/Ebook/cover/' . $ebook->cover) }}"
                                        class="img-fluid" alt="cover-image" />
                                </div>
                                <div class="author" style="margin-left: 50px;">
                                    <div class="row mt-3">
                                        <div class="col-3 icon">
                                            <img src="{{ asset('images/writer.png') }}" class="img-fluid rounded-top"
                                                alt="author" />
                                        </div>
                                        <div class="col-9 author-name ">
                                            <p class="fw-bold">
                                                {{ ucwords($ebook->author->name) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="card-body m-3">
                                    <div class="title m-2 p-2">
                                        <h5 class="fw-bold card-title">{{ $ebook->title }}</h5>
                                    </div>
                                    <div class="description border m-2 p-2 rounded">
                                        <p class="card-text">{{ $ebook->description }}</p>
                                    </div>

                                    <div class="readBtn text-end m-2 p-2">
                                        <a href="{{ route('ebook.read', $ebook->id) }}" class="btn btn-danger btn-sm">
                                            <span class="mr-1">Read</span>
                                            <i class="fa-solid fa-book-open"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach


        </div>


    </div>

</x-home.layout>
