<x-layout.master>
    @push('style')
        <style>
            table {
                text-align: center;
                align-items: center;
            }
        </style>
    @endpush

    <!-- Page content-->
    <div class="container my-5">
        <div class="row">
            <div class="d-flex justify-content-between mb-2">
                <h3>Category List</h3>
                <a class="btn btn-success" href="{{ route('category.create') }}" role="button">Create</a>
            </div>
            <!-- Blog entries-->
            <div class="col-lg-12">
                <div class="card p-3">
                    <table id="datatable" class="table table-striped" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Category</th>
                                <th>created At</th>
                                <th>Updated At</th>
                                <th style="width: 100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ ($category->created_at)->format('Y-m-d') }}</td>
                                    <td>{{ $category->updated_at == $category->created_at ? '---' : ($category->updated_at)->format('Y-m-d') }}</td>
                                    <td class="d-flex justify-center align-items-center gap-1">
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('category.show', $category->id) }}" role="button">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form method="POST" action="{{ route('category.destroy', $category) }}">
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
                                    <td colspan="10" class="text-center">No Data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout.master>
