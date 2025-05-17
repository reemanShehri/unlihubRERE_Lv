<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-6" :status="session('status')" />

    <div class="unihub-auth-container">
        <div class="unihub-auth-header">
            <div class="unihub-logo">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M4.913 2.658c2.075-.27 4.19-.408 6.337-.408 2.147 0 4.262.139 6.337.408 1.922.25 3.291 1.861 3.405 3.727a4.403 4.403 0 00-1.032-.211 50.89 50.89 0 00-8.42 0c-2.358.196-4.04 2.19-4.04 4.434v4.286a4.47 4.47 0 002.433 3.984L7.28 21.53A.75.75 0 016 21v-4.03a48.527 48.527 0 01-1.087-.128C2.905 16.58 1.5 14.833 1.5 12.862V6.638c0-1.97 1.405-3.718 3.413-3.979z" />
                    <path d="M15.75 7.5c-1.376 0-2.739.057-4.086.169C10.124 7.797 9 9.103 9 10.609v4.285c0 1.507 1.128 2.814 2.67 2.94 1.243.102 2.5.157 3.768.165l2.782 2.781a.75.75 0 001.28-.53v-2.39l.33-.026c1.542-.125 2.67-1.433 2.67-2.94v-4.286c0-1.505-1.125-2.811-2.664-2.94A49.392 49.392 0 0015.75 7.5z" />
                </svg>
                <h1>UniHub</h1>
            </div>
            <p class="unihub-auth-subtitle">Student Collaboration Platform</p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="unihub-auth-form">
            @csrf

            <!-- Email Address -->
            <div class="unihub-form-group">
                <x-input-label for="email" :value="__('University Email')" class="unihub-label" />
                <div class="unihub-input-container">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z" />
                        <path d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z" />
                    </svg>
                    <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" class="unihub-input" placeholder="your.email@university.edu" />
                </div>
                <x-input-error :messages="$errors->get('email')" class="unihub-error" />
            </div>

            <!-- Password -->
            <div class="unihub-form-group">
                <x-input-label for="password" :value="__('Password')" class="unihub-label" />
                <div class="unihub-input-container">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path fill-rule="evenodd" d="M12 1.5a5.25 5.25 0 00-5.25 5.25v3a3 3 0 00-3 3v6.75a3 3 0 003 3h10.5a3 3 0 003-3v-6.75a3 3 0 00-3-3v-3c0-2.9-2.35-5.25-5.25-5.25zm3.75 8.25v-3a3.75 3.75 0 10-7.5 0v3h7.5z" clip-rule="evenodd" />
                    </svg>
                    <x-text-input id="password" type="password" name="password" required autocomplete="current-password" class="unihub-input" placeholder="••••••••" />
                </div>
                <x-input-error :messages="$errors->get('password')" class="unihub-error" />
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="unihub-options">
                <label for="remember_me" class="unihub-remember">
                    <input id="remember_me" type="checkbox" name="remember" class="unihub-checkbox" />
                    <span>{{ __('Remember me') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="unihub-forgot" href="{{ route('password.request') }}">
                        {{ __('Forgot password?') }}
                    </a>
                @endif
            </div>

            <!-- Submit Button -->
            <button type="submit" class="unihub-button">
                <span>{{ __('Log in') }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm4.28 10.28a.75.75 0 000-1.06l-3-3a.75.75 0 10-1.06 1.06l1.72 1.72H8.25a.75.75 0 000 1.5h5.69l-1.72 1.72a.75.75 0 101.06 1.06l3-3z" clip-rule="evenodd" />
                </svg>
            </button>
        </form>

        <div class="unihub-auth-footer">
            <p>Don't have an account? <a href="{{ route('register') }}" class="unihub-link">Sign up</a></p>
        </div>
    </div>

    <style>
        @tailwind base;
        @tailwind components;
        @tailwind utilities;

        /* UniHub Auth Styles */
        .unihub-auth-container {
            max-width: 420px;
            width: 100%;
            margin: 0 auto;
            padding: 2rem;
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        .unihub-auth-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .unihub-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            margin-bottom: 0.75rem;
        }

        .unihub-logo svg {
            width: 28px;
            height: 28px;
            color: #4f46e5;
        }

        .unihub-logo h1 {
            font-size: 1.75rem;
            font-weight: 700;
            color: #111827;
            margin: 0;
        }

        .unihub-auth-subtitle {
            color: #6b7280;
            font-size: 0.875rem;
            margin: 0;
        }

        .unihub-auth-form {
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
        }

        .unihub-form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .unihub-label {
            font-size: 0.875rem;
            font-weight: 500;
            color: #374151;
        }

        .unihub-input-container {
            position: relative;
        }

        .unihub-input-container svg {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            width: 16px;
            height: 16px;
            color: #9ca3af;
        }

        .unihub-input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 2.25rem;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            font-size: 0.875rem;
            transition: all 0.2s;
            background-color: #f9fafb;
        }

        .unihub-input:focus {
            outline: none;
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
            background-color: white;
        }

        .unihub-error {
            font-size: 0.75rem;
            color: #ef4444;
        }

        .unihub-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: -0.5rem;
        }

        .unihub-remember {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
            color: #4b5563;
            cursor: pointer;
        }

        .unihub-checkbox {
            width: 1rem;
            height: 1rem;
            border: 1px solid #d1d5db;
            border-radius: 4px;
            appearance: none;
            cursor: pointer;
            transition: all 0.2s;
        }

        .unihub-checkbox:checked {
            background-color: #4f46e5;
            border-color: #4f46e5;
            background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3cpath d='M12.207 4.793a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0l-2-2a1 1 0 011.414-1.414L6.5 9.086l4.293-4.293a1 1 0 011.414 0z'/%3e%3c/svg%3e");
            background-position: center;
            background-repeat: no-repeat;
        }

        .unihub-forgot {
            font-size: 0.875rem;
            color: #4f46e5;
            text-decoration: none;
            transition: color 0.2s;
        }

        .unihub-forgot:hover {
            color: #4338ca;
            text-decoration: underline;
        }

        .unihub-button {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            width: 100%;
            padding: 0.75rem 1.25rem;
            background-color: #4f46e5;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
        }

        .unihub-button:hover {
            background-color: #4338ca;
        }

        .unihub-button svg {
            width: 16px;
            height: 16px;
            margin-left: 4px;
        }

        .unihub-auth-footer {
            margin-top: 1.5rem;
            text-align: center;
            font-size: 0.875rem;
            color: #6b7280;
        }

        .unihub-link {
            color: #4f46e5;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }

        .unihub-link:hover {
            color: #4338ca;
            text-decoration: underline;
        }
    </style>
</x-guest-layout>
