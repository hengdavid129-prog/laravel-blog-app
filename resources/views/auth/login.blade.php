<x-layout.master>
    <!-- Page content-->
    <div class="d-flex justify-content-center mt-5">
        <div class="card p-3 w-25">
            <h3>Login</h3>
            <form method="POST" action="{{ route('login') }}">
                <x-form.field label="Email" name="email" type="email" />

                <x-form.field label="Password" name="password" type="password" />
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
</x-layout.master>
