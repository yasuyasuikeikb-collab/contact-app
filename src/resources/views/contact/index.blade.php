@extends('layouts.app')

@section('title', 'Contact')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/contact/index.css') }}">
@endpush

@section('content')
<section class="contact">
    <div class="contact__inner">
        <h1 class="contact__title">Contact</h1>

        <form class="contact-form" method="POST">
            {{-- @csrf --}}

            <div class="contact-form__row">
                <div class="contact-form__label-wrap">
                    <label class="contact-form__label">お名前<span class="contact-form__required">※</span></label>
                </div>
                <div class="contact-form__field contact-form__field--split">
                    <input class="contact-form__input contact-form__input--name"
                        type="text" name="last_name"
                        placeholder="例: 山田">

                    <input class="contact-form__input contact-form__input--name"
                        type="text" name="first_name"
                        placeholder="例: 太郎">
                </div>
            </div>

            <div class="contact-form__row">
                <div class="contact-form__label-wrap">
                    <span class="contact-form__label">性別<span class="contact-form__required">※</span></span>
                </div>
                <div class="contact-form__field contact-form__field--radio">
                    <label>
                        <input type="radio" name="gender" value="1" checked> 男性
                    </label>
                    <label>
                        <input type="radio" name="gender" value="2"> 女性
                    </label>
                    <label>
                        <input type="radio" name="gender" value="3"> その他
                    </label>
                </div>
            </div>

            <div class="contact-form__row">
                <div class="contact-form__label-wrap">
                    <label class="contact-form__label">メールアドレス<span class="contact-form__required">※</span></label>
                </div>
                <div class="contact-form__field">
                    <input class="contact-form__input"
                        type="email" name="email"
                        placeholder="例: test@example.com">
                </div>
            </div>

            <div class="contact-form__row">
                <div class="contact-form__label-wrap">
                    <label class="contact-form__label">電話番号<span class="contact-form__required">※</span></label>
                </div>
                <div class="contact-form__field contact-form__field--tel">
                    <input class="contact-form__input contact-form__input--tel"
                        type="text" name="tel1" placeholder="080">
                    <span>-</span>
                    <input class="contact-form__input contact-form__input--tel"
                        type="text" name="tel2" placeholder="1234">
                    <span>-</span>
                    <input class="contact-form__input contact-form__input--tel"
                        type="text" name="tel3" placeholder="5678">
                </div>
            </div>

            <div class="contact-form__row">
                <div class="contact-form__label-wrap">
                    <label class="contact-form__label">住所<span class="contact-form__required">※</span></label>
                </div>
                <div class="contact-form__field">
                    <input class="contact-form__input"
                        type="text" name="address"
                        placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3">
                </div>
            </div>

            <div class="contact-form__row">
                <div class="contact-form__label-wrap">
                    <label class="contact-form__label">建物名</label>
                </div>
                <div class="contact-form__field">
                    <input class="contact-form__input"
                        type="text" name="building"
                        placeholder="例: 千駄ヶ谷マンション101">
                </div>
            </div>

        </form>
    </div>
</section>
@endsection

