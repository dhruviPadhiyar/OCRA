<x-home.layout>
        <div class="heading mt-2">
            <h4 class="fw-bold">Your Ebooks</h4>
        </div>
        <div class="container">
            <table class="table table-bordered table-hover table-responsible w-100">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Cover</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach ($ebooks as $ebook)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $ebook->title }}</td>
                        <td class="w-50">{{ $ebook->description }}</td>
                        <td>
                            <img src="{{ asset('/storage/Ebook/cover/' . $ebook->cover) }}"
                            class="img-fluid w-50 h-50" alt="cover-image" />
                        </td>
                        <td>
                            <div class="action">
                                <a href="{{ route('ebook.edit',$ebook->id) }}" class="btn btn-sm text-primary" data-toggle="tooltip" data-placemnet="top" title="Edit Post"><i class="fa-solid fa-square-pen"></i></a>
                                <a href="{{ route('ebook.delete',$ebook->id) }}" class="btn btn-sm text-danger"
                                data-toggle="tooltip" data-placemnet="top" title="Delete Post"
                                ><i class="fa-solid fa-trash-can"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </x-home.layout>