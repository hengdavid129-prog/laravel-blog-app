<x-layout.master>
    @push('style')
        <style>
            table {
                text-align: center;
            }

            table tr th, td {
                text-align: center;
                vertical-align: middle;
                border: 1px solid rgb(211, 211, 211);
            }
        </style>
    @endpush
    <!-- Page content-->
    <div class="container my-5">
        <div class="row">
            <div class="d-flex justify-content-between mb-2">
                <h3>Tag List</h3>
                <a class="btn btn-success" href="{{ route('tag.create') }}" role="button">Create</a>
            </div>
            <!-- Blog entries-->
            <div class="col-lg-12">
                <div class="card p-3">
                    <table id="datatable" class="table table-striped" style="width: 100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tag</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th style="width: 100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tags as $tag)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $tag->name }}</td>
                                    <td>{{ $tag->created_at->format('Y-m-d') }}</td>
                                    <td>{{ $tag->updated_at == $tag->created_at ? '---' : ($tag->updated_at)->format('Y-m-d') }}</td>
                                    <td class="d-flex justify-center align-items-center gap-1">
                                        <a class="btn btn-primary btn-sm" href="{{ route('tag.edit', $tag) }}" role="button">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form action="{{ route('tag.destroy', $tag) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No Data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout.master>
