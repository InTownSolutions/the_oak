<x-layouts.app title="Admin Login | The Oak">
    <main class="auth-shell">
        <section class="auth-card">
            <a class="brand auth-brand" href="/">
                <span class="brand-mark">O</span>
                <span>The Oak Shillong</span>
            </a>

            <div class="auth-heading">
                <p class="eyebrow">Admin Access</p>
                <h1>Login To The Oak Admin</h1>
                <p>Access enquiries, bookings, tariffs, and customer follow-ups.</p>
            </div>

            @if (session('success'))
                <p class="form-success">{{ session('success') }}</p>
            @endif

            @if ($errors->any())
                <div class="form-error">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form class="auth-form" method="POST" action="{{ route('login.store') }}">
                @csrf
                <label>
                    Email Address
                    <input name="email" type="email" value="{{ old('email') }}" placeholder="admin@example.com" required autofocus>
                </label>
                <label>
                    Password
                    <input name="password" type="password" placeholder="Enter password" required>
                </label>
                <label class="auth-check">
                    <input name="remember" type="checkbox" value="1">
                    <span>Keep me signed in</span>
                </label>
                <button class="primary-action form-action" type="submit">Login</button>
            </form>

            <p class="auth-switch">Need an admin account? <a href="{{ route('register') }}">Create one</a></p>
        </section>
    </main>
</x-layouts.app>
