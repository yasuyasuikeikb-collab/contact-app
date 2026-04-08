@extends('layouts.app')

@section('title', 'Register')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
@endpush

@section('content')
    <section class="auth auth--register">
        <div class="auth__inner">
            <h1 class="auth__title">Register</h1>

            <div class="auth-card auth-card--register">
                <form class="auth-form" method="POST">
                    {{-- @csrf --}}

                    <div class="auth-form__group">
                        <label class="auth-form__label" for="name">お名前</label>
                        <input
                            class="auth-form__input"
                            id="name"
                            type="text"
                            name="name"
                            placeholder="例: 山田 太郎"
                        >
                        {{-- バリデーションエラーメッセージ --}}
                        {{--
                        @error('name')
                            <p class="auth-form__error">{{ $message }}</p>
                        @enderror
                        --}}
                    </div>

                    <div class="auth-form__group">
                        <label class="auth-form__label" for="email">メールアドレス</label>
                        <input
                            class="auth-form__input"
                            id="email"
                            type="email"
                            name="email"
                            placeholder="例: test@example.com"
                        >
                        {{-- バリデーションエラーメッセージ --}}
                        {{--
                        @error('email')
                            <p class="auth-form__error">{{ $message }}</p>
                        @enderror
                        --}}
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
                        {{--
                        @error('password')
                            <p class="auth-form__error">{{ $message }}</p>
                        @enderror
                        --}}
                    </div>

                    <div class="auth-form__actions">
                        <button class="button button--primary auth-form__submit" type="button">
                            登録
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection