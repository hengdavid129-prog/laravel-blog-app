<x-layout.master>
    @push('style')
        <style>
            table {
                text-align: center;
            }

            table tr th, td {
                text-align: center;
                vertical-align: middle;
                border: 1px solid rgb(186, 185, 185);
            }
        </style>
    @endpush
    <!-- Page content-->
    <div class="container my-5">
        <div class="row">
            <div class="d-flex justify-content-between mb-2">
                <h3>Post List</h3>
                <a class="btn btn-success" href="{{ route('post.create') }}" role="button">Create</a>
            </div>
            <!-- Blog entries-->
            <div class="col-lg-12">
                <div class="card p-3">
                    <table id="datatable" class="table table-striped" style="width: 100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Thumbnail</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Tag</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th style="width: 100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $post)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <div class="img-container" style="width: 6rem;">
                                                <img style="width: 100%; height: 100%; object-fit: covert;" src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}">
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->category->name }}</td>
                                    <td>
                                        @foreach ($post->tags as $tag)
                                            <span class="bg-secondary p-1 rounded text-white">{{ $tag->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>{{ ($post->created_at)->format('Y-m-d') }}</td>
                                    <td>{{ ($post->updated_at)->format('Y-m-d') }}</td>
                                    <td>
                                        <div class="d-flex justify-center align-items-center gap-1">
                                            <a class="btn btn-primary btn-sm" href="create_edit.html" role="button">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <form action="" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout.master>
