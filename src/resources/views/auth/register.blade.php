@extends('layouts.app')

@section('title', 'Register')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
@endsection

@section('content')
<section class="register-page">
    <div class="register-page__inner">
        <h2 class="register-page__heading">Register</h2>

        <div class="register-form-card">
            <form class="register-form" action="{{ route('register') }}" method="post">
                @csrf

                <div class="register-form__group">
                    <div class="register-form__label">
                        <label for="name">お名前</label>
                    </div>
                    <div class="register-form__field">
                        <input
                            class="register-form__input"
                            type="text"
                            name="name"
                            id="name"
                            value="{{ old('name') }}"
                            placeholder="例: 山田　太郎"
                        >
                        @error('name')
                            <p class="register-form__error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="register-form__group">
                    <div class="register-form__label">
                        <label for="email">メールアドレス</label>
                    </div>
                    <div class="register-form__field">
                        <input
                            class="register-form__input"
                            type="email"
                            name="email"
                            id="email"
                            value="{{ old('email') }}"
                            placeholder="例: test@example.com"
                        >
                        @error('email')
                            <p class="register-form__error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="register-form__group">
                    <div class="register-form__label">
                        <label for="password">パスワード</label>
                    </div>
                    <div class="register-form__field">
                        <input
                            class="register-form__input"
                            type="password"
                            name="password"
                            id="password"
                            placeholder="例: coachtech1106"
                        >
                        @error('password')
                            <p class="register-form__error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="register-form__actions">
                    <button class="register-form__submit" type="submit">登録</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection