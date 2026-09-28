<x-layouts.app title="Register Admin | The Oak">
    <main class="auth-shell">
        <section class="auth-card">
            <a class="brand auth-brand" href="/">
                <span class="brand-mark">O</span>
                <span>The Oak Shillong</span>
            </a>

            <div class="auth-heading">
                <p class="eyebrow">Admin Registration</p>
                <h1>Create Admin Account</h1>
                <p>Create a secure login for managing The Oak booking system.</p>
            </div>

            @if ($errors->any())
                <div class="form-error">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form class="auth-form" method="POST" action="{{ route('register.store') }}">
                @csrf
                <label>
                    Full Name
                    <input name="name" type="text" value="{{ old('name') }}" placeholder="Admin name" required autofocus>
                </label>
                <label>
                    Email Address
                    <input name="email" type="email" value="{{ old('email') }}" placeholder="admin@example.com" required>
                </label>
                <label>
                    Password
                    <input name="password" type="password" placeholder="Minimum 8 characters" required>
                </label>
                <label>
                    Confirm Password
                    <input name="password_confirmation" type="password" placeholder="Repeat password" required>
                </label>
                <button class="primary-action form-action" type="submit">Create Account</button>
            </form>

            <p class="auth-switch">Already have an account? <a href="{{ route('login') }}">Login</a></p>
        </section>
    </main>
</x-layouts.app>
