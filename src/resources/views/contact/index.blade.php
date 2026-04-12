@extends('layouts.app')

@section('title', 'Contact')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact/index.css') }}">
@endsection

@section('content')
<section class="contact-page">
    <div class="contact-page__inner">
        <h2 class="contact-page__heading">Contact</h2>

        <form class="contact-form" action="{{ route('contact.confirm') }}" method="post" novalidate>
            @csrf

            <div class="contact-form__row">
                <div class="contact-form__label">
                    <label for="last_name">お名前 <span class="contact-form__required">※</span></label>
                </div>
                <div class="contact-form__field">
                    <div class="contact-form__name-group">
                        <div class="contact-form__name-item">
                            <input
                                class="contact-form__input"
                                type="text"
                                name="last_name"
                                id="last_name"
                                value="{{ old('last_name') }}"
                                placeholder="例: 山田"
                            >
                            @error('last_name')
                                <p class="contact-form__error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="contact-form__name-item">
                            <input
                                class="contact-form__input"
                                type="text"
                                name="first_name"
                                id="first_name"
                                value="{{ old('first_name') }}"
                                placeholder="例: 太郎"
                            >
                            @error('first_name')
                                <p class="contact-form__error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="contact-form__row">
                <div class="contact-form__label">
                    <span>性別 <span class="contact-form__required">※</span></span>
                </div>
                <div class="contact-form__field">
                    <fieldset class="contact-form__fieldset">
                        <legend class="contact-form__legend">性別</legend>

                        <label class="contact-form__radio-label">
                            <input
                                class="contact-form__radio-input"
                                type="radio"
                                name="gender"
                                value="1"
                                {{ old('gender', '1') == '1' ? 'checked' : '' }}
                            >
                            <span class="contact-form__radio-text">男性</span>
                        </label>

                        <label class="contact-form__radio-label">
                            <input
                                class="contact-form__radio-input"
                                type="radio"
                                name="gender"
                                value="2"
                                {{ old('gender') == '2' ? 'checked' : '' }}
                            >
                            <span class="contact-form__radio-text">女性</span>
                        </label>

                        <label class="contact-form__radio-label">
                            <input
                                class="contact-form__radio-input"
                                type="radio"
                                name="gender"
                                value="3"
                                {{ old('gender') == '3' ? 'checked' : '' }}
                            >
                            <span class="contact-form__radio-text">その他</span>
                        </label>
                    </fieldset>

                    @error('gender')
                        <p class="contact-form__error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="contact-form__row">
                <div class="contact-form__label">
                    <label for="email">メールアドレス <span class="contact-form__required">※</span></label>
                </div>
                <div class="contact-form__field">
                    <input
                        class="contact-form__input"
                        type="email"
                        name="email"
                        id="email"
                        value="{{ old('email') }}"
                        placeholder="例: test@example.com"
                    >
                    @error('email')
                        <p class="contact-form__error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="contact-form__row">
                <div class="contact-form__label">
                    <span>電話番号 <span class="contact-form__required">※</span></span>
                </div>
                <div class="contact-form__field">
                    <div class="contact-form__tel-group">
                        <div class="contact-form__tel-item">
                            <input
                                class="contact-form__input contact-form__input--tel"
                                type="text"
                                name="tel1"
                                value="{{ old('tel1') }}"
                                placeholder="080"
                            >
                        </div>

                        <span class="contact-form__separator">-</span>

                        <div class="contact-form__tel-item">
                            <input
                                class="contact-form__input contact-form__input--tel"
                                type="text"
                                name="tel2"
                                value="{{ old('tel2') }}"
                                placeholder="1234"
                            >
                        </div>

                        <span class="contact-form__separator">-</span>

                        <div class="contact-form__tel-item">
                            <input
                                class="contact-form__input contact-form__input--tel"
                                type="text"
                                name="tel3"
                                value="{{ old('tel3') }}"
                                placeholder="5678"
                            >
                        </div>
                    </div>

                    @if ($errors->has('tel1') || $errors->has('tel2') || $errors->has('tel3'))
                        <p class="contact-form__error">
                            {{ $errors->first('tel1') ?: ($errors->first('tel2') ?: $errors->first('tel3')) }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="contact-form__row">
                <div class="contact-form__label">
                    <label for="address">住所 <span class="contact-form__required">※</span></label>
                </div>
                <div class="contact-form__field">
                    <input
                        class="contact-form__input"
                        type="text"
                        name="address"
                        id="address"
                        value="{{ old('address') }}"
                        placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3"
                    >
                    @error('address')
                        <p class="contact-form__error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="contact-form__row">
                <div class="contact-form__label">
                    <label for="building">建物名</label>
                </div>
                <div class="contact-form__field">
                    <input
                        class="contact-form__input"
                        type="text"
                        name="building"
                        id="building"
                        value="{{ old('building') }}"
                        placeholder="例: 千駄ヶ谷マンション101"
                    >
                </div>
            </div>

            <div class="contact-form__row">
                <div class="contact-form__label">
                    <label for="category_id">お問い合わせの種類 <span class="contact-form__required">※</span></label>
                </div>
                <div class="contact-form__field">
                    <div class="contact-form__select-wrapper">
                        <select
                            class="contact-form__select"
                            name="category_id"
                            id="category_id"
                        >
                            <option value="" disabled {{ old('category_id') ? '' : 'selected' }} hidden>選択してください</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->content }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    @error('category_id')
                        <p class="contact-form__error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="contact-form__row contact-form__row--textarea">
                <div class="contact-form__label">
                    <label for="detail">お問い合わせ内容 <span class="contact-form__required">※</span></label>
                </div>
                <div class="contact-form__field">
                    <textarea
                        class="contact-form__textarea"
                        name="detail"
                        id="detail"
                        placeholder="お問い合わせ内容をご記載ください"
                    >{{ old('detail') }}</textarea>
                    @error('detail')
                        <p class="contact-form__error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="contact-form__actions">
                <button class="contact-form__submit" type="submit">確認画面</button>
            </div>
        </form>
    </div>
</section>
@endsection