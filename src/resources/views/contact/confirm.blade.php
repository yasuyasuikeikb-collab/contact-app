@extends('layouts.app')

@section('title', 'Confirm')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact/confirm.css') }}">
@endsection

@section('content')
<section class="confirm-page">
    <div class="confirm-page__inner">
        <h2 class="confirm-page__heading">Confirm</h2>

        <div class="confirm-table">
            <table class="confirm-table__inner">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前</th>
                    <td class="confirm-table__text">
                        {{ $contact['last_name'] }} {{ $contact['first_name'] }}
                    </td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__text">
                        @if ($contact['gender'] == 1)
                            男性
                        @elseif ($contact['gender'] == 2)
                            女性
                        @else
                            その他
                        @endif
                    </td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__header">メールアドレス</th>
                    <td class="confirm-table__text">{{ $contact['email'] }}</td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__header">電話番号</th>
                    <td class="confirm-table__text">{{ $contact['tel'] }}</td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__header">住所</th>
                    <td class="confirm-table__text">{{ $contact['address'] }}</td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__header">建物名</th>
                    <td class="confirm-table__text">{{ $contact['building'] }}</td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせの種類</th>
                    <td class="confirm-table__text">{{ $category->content ?? '' }}</td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせ内容</th>
                    <td class="confirm-table__text confirm-table__text--detail">
                        {{ $contact['detail'] }}
                    </td>
                </tr>
            </table>
        </div>

        <div class="confirm-page__actions">
            <form action="{{ route('contact.store') }}" method="post" class="confirm-page__form">
                @csrf
                <button class="confirm-page__submit" type="submit">送信</button>
            </form>

            <button class="confirm-page__back" type="button" onclick="history.back()">修正</button>
        </div>
    </div>
</section>
@endsection