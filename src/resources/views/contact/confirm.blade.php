@extends('layouts.app')

@section('title', 'Confirm')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/contact/confirm.css') }}">
@endpush

@section('content')
    <section class="confirm">
        <div class="confirm__inner">
            <h1 class="confirm__title">Confirm</h1>

            <form class="confirm-form" method="POST">
                {{-- @csrf --}}

                <table class="confirm-table">
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">お名前</th>
                        <td class="confirm-table__data">山田　太郎</td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">性別</th>
                        <td class="confirm-table__data">男性</td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">メールアドレス</th>
                        <td class="confirm-table__data">test@example.com</td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">電話番号</th>
                        <td class="confirm-table__data">080-1234-5678</td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">住所</th>
                        <td class="confirm-table__data">東京都渋谷区千駄ヶ谷1-2-3</td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">建物名</th>
                        <td class="confirm-table__data">千駄ヶ谷マンション101</td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">お問い合わせの種類</th>
                        <td class="confirm-table__data">商品の交換について</td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">お問い合わせ内容</th>
                        <td class="confirm-table__data confirm-table__data--textarea">
                            届いた商品のサイズを交換したいです。
                        </td>
                    </tr>
                </table>

                {{--
                <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
                <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
                <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
                <input type="hidden" name="email" value="{{ $contact['email'] }}">
                <input type="hidden" name="tel" value="{{ $contact['tel'] }}">
                <input type="hidden" name="address" value="{{ $contact['address'] }}">
                <input type="hidden" name="building" value="{{ $contact['building'] }}">
                <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
                <input type="hidden" name="content" value="{{ $contact['content'] }}">
                --}}

                <div class="confirm-form__actions">
                    <button class="button button--primary" type="button">送信</button>
                    <button class="button button--link" type="button">修正</button>
                </div>
            </form>
        </div>
    </section>
@endsection