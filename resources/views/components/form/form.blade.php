@props(['title', 'backRoute', 'method' => 'POST', 'action', 'param' => null, 'hasFile' => false ])
<div class="container my-5">
    <div class="row">
        <div class="d-flex justify-content-between mb-2">
            <h3>{{ $title }}</h3>
            <a class="btn btn-success" href="{{ route($backRoute) }}" role="button">Back</a>
        </div>
        <!-- Blog entries-->
        <div class="col-lg-12">
            <div class="card p-3">
                <form method='POST' action="{{ route($action, $param) }}" @if ($hasFile) enctype="multipart/form-data" @endif>
                    @csrf

                    @if ($method != 'POST')
                        @method($method)
                    @endif

                    {{ $slot }}

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
