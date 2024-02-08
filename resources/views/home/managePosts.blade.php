<x-home.layout>
    <div class="heading">
        <h4 class="fw-bold">Your Posts</h4>
    </div>
    <div class="container">
        <table class="table table-bordered table-hover table-responsible w-100">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Excerpt</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $post->title }}</td>
                    <td class="w-50">{{ $post->excerpt }}</td>
                    <td>{{ $post->category }}</td>
                    <td>
                        <div class="action">
                            <a href="{{ route('post.edit',$post->id) }}" class="btn btn-sm text-primary" data-toggle="tooltip" data-placemnet="top" title="Edit Post"><i class="fa-solid fa-square-pen"></i></a>
                            <a href="{{ route('post.delete',$post->id) }}" class="btn btn-sm text-danger"
                            data-toggle="tooltip" data-placemnet="top" title="Delete Post"
                            ><i class="fa-solid fa-trash-can"></i></a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</x-home.layout>
