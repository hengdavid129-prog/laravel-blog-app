<x-layout.master>
    <!-- Page content-->
    <div class="container my-5">
        <div class="row">
            <div class="d-flex justify-content-between mb-2">
                <h3>Edit Category</h3>
                <a class="btn btn-success" href="{{ route('category.index') }}" role="button">Back</a>
            </div>
            <!-- Blog entries-->
            <div class="col-lg-12">
                <div class="card p-3">
                    <form method="POST" action="{{ route('category.update', $category) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="tag" class="form-label">Category</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $category->name }}" />
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout.master>
