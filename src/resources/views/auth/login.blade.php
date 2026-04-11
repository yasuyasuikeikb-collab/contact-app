@extends('layouts.app')

@section('title', 'Login')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
@endsection

@section('content')
    <section class="auth auth--login">
        <div class="auth__inner">
            <h1 class="auth__title">Login</h1>

            <div class="auth-card auth-card--login">
                <form class="auth-form" action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="auth-form__group">
                        <label class="auth-form__label" for="email">メールアドレス</label>
                        <input
                            class="auth-form__input"
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="例: test@example.com"
                        >
                        {{-- バリデーションエラーメッセージ --}}
                        {{-- @error('email')
                            <p class="auth-form__error">{{ $message }}</p>
                        @enderror --}}
                    </div>

                    <div class="auth-form__group">
                        <label class="auth-form__label" for="password">パスワード</label>
                        <input
                            class="auth-form__input"
                            id="password"
                            type="password"
                            name="password"
                            placeholder="例: coachtech1106"
                        >
                        {{-- バリデーションエラーメッセージ --}}
                        {{-- @error('password')
                            <p class="auth-form__error">{{ $message }}</p>
                        @enderror --}}
                    </div>

                    <div class="auth-form__actions">
                        <button class="button button--primary auth-form__submit" type="submit">
                            ログイン
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection