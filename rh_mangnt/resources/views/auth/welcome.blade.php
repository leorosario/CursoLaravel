<x-layout-guest page-title="Welcome">

    <div class="container mt-5">
        <div class="row justify-content-center">
            {{-- logo --}}
            <div class="text-center mb-5">
                <img src="{{ asset("assets/images/logo.png") }}" alt="logo" width="200px">
            </div>
            {{-- welcome message --}}
            <div class="card p-5 text-center">
                <p>Welcome, <strong>{{ $user->name }}</strong></p>
                <p>Your account has been successfully created.</p>
                <p>You can now <a href="{{ route("login") }}">Login</a> to your account.</p>
            </div>
        </div>
    </div>

</x-layout-guest>
