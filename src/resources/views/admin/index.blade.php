@extends('layouts.app')

@section('title', 'Admin')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/index.css') }}">
@endpush

@section('content')
<section class="admin">
    <div class="admin__inner">
        <div class="admin__header">
            <h1 class="admin__title">Admin</h1>

            <form method="POST">
                {{-- @csrf --}}
                <button class="admin__logout" type="button">logout</button>
            </form>
        </div>

        <form class="admin-search" method="GET">
            <div class="admin-search__row">
                <input class="admin-search__input"
                    type="text"
                    name="keyword"
                    placeholder="名前やメールアドレスを入力してください">

                <select class="admin-search__select" name="gender">
                    <option value="">性別</option>
                    <option value="1">男性</option>
                    <option value="2">女性</option>
                    <option value="3">その他</option>
                </select>

                <select class="admin-search__select admin-search__select--wide" name="category_id">
                    <option value="">お問い合わせの種類</option>
                    <option value="1">商品の交換について</option>
                    <option value="2">商品のお届けについて</option>
                    <option value="3">その他</option>
                </select>

                <input class="admin-search__date"
                    type="date"
                    name="created_at">

                <button class="button button--search" type="button">検索</button>
                <a class="button button--reset" href="#">リセット</a>
            </div>

            <div class="admin-search__sub-row">
                <a class="button button--export" href="#">エクスポート</a>
            </div>
        </form>

        <div class="admin-table-wrap">
            <table class="admin-table">
                <thead class="admin-table__head">
                    <tr class="admin-table__row">
                        <th class="admin-table__header">お名前</th>
                        <th class="admin-table__header">性別</th>
                        <th class="admin-table__header">メールアドレス</th>
                        <th class="admin-table__header">お問い合わせの種類</th>
                        <th class="admin-table__header"></th>
                    </tr>
                </thead>
                <tbody class="admin-table__body">

                    {{-- ダミーデータ --}}
                    <tr class="admin-table__row">
                        <td class="admin-table__data">山田 太郎</td>
                        <td class="admin-table__data">男性</td>
                        <td class="admin-table__data">test@example.com</td>
                        <td class="admin-table__data">商品の交換について</td>
                        <td class="admin-table__data admin-table__data--button">
                            <button class="admin-table__detail-button" type="button">
                                詳細
                            </button>
                        </td>
                    </tr>

                    <tr class="admin-table__row">
                        <td class="admin-table__data">佐藤 花子</td>
                        <td class="admin-table__data">女性</td>
                        <td class="admin-table__data">hanako@example.com</td>
                        <td class="admin-table__data">商品のお届けについて</td>
                        <td class="admin-table__data admin-table__data--button">
                            <button class="admin-table__detail-button" type="button">
                                詳細
                            </button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection