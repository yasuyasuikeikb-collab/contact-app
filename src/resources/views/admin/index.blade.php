@extends('layouts.app')

@section('title', 'Admin')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/index.css') }}">
@endsection

@section('content')
<section class="admin-page">
    <div class="admin-page__inner">
        <h2 class="admin-page__heading">Admin</h2>

        <div class="admin-search">
            <form class="admin-search__form" action="{{ route('admin.search') }}" method="get">
                <div class="admin-search__group admin-search__group--keyword">
                    <input
                        class="admin-search__input"
                        type="text"
                        name="keyword"
                        value="{{ request('keyword') }}"
                        placeholder="名前やメールアドレスを入力してください"
                    >
                </div>

                <div class="admin-search__group admin-search__group--gender">
                    <div class="admin-search__select-wrapper">
                        <select class="admin-search__select" name="gender">
                            <option value="">性別</option>
                            <option value="0" {{ request('gender') === '0' ? 'selected' : '' }}>全て</option>
                            <option value="1" {{ request('gender') === '1' ? 'selected' : '' }}>男性</option>
                            <option value="2" {{ request('gender') === '2' ? 'selected' : '' }}>女性</option>
                            <option value="3" {{ request('gender') === '3' ? 'selected' : '' }}>その他</option>
                        </select>
                    </div>
                </div>

                <div class="admin-search__group admin-search__group--category">
                    <div class="admin-search__select-wrapper">
                        <select class="admin-search__select" name="category_id">
                            <option value="">お問い合わせの種類</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->content }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="admin-search__group admin-search__group--date">
                    <div class="admin-search__date-wrapper">
                        <input
                            class="admin-search__date"
                            type="date"
                            name="created_at"
                            value="{{ request('created_at') }}"
                        >
                    </div>
                </div>

                <div class="admin-search__action">
                    <button class="admin-search__button admin-search__button--search" type="submit">検索</button>
                </div>

                <div class="admin-search__action">
                    <a class="admin-search__button admin-search__button--reset" href="{{ route('admin.reset') }}">リセット</a>
                </div>
            </form>

            <div class="admin-search__sub-content">
                <a class="admin-search__export-button" href="#">エクスポート</a>

                <div class="admin-search__pagination">
                    {{ $contacts->onEachSide(1)->links('vendor.pagination.admin') }}
                </div>
            </div>
        </div>

        <div class="admin-table">
            <table class="admin-table__inner">
                <thead>
                    <tr class="admin-table__row admin-table__row--head">
                        <th class="admin-table__header">お名前</th>
                        <th class="admin-table__header">性別</th>
                        <th class="admin-table__header">メールアドレス</th>
                        <th class="admin-table__header">お問い合わせの種類</th>
                        <th class="admin-table__header admin-table__header--button"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($contacts as $contact)
                        <tr class="admin-table__row">
                            <td class="admin-table__data">
                                {{ $contact->last_name }}　{{ $contact->first_name }}
                            </td>
                            <td class="admin-table__data">
                                @if ($contact->gender == 1)
                                    男性
                                @elseif ($contact->gender == 2)
                                    女性
                                @else
                                    その他
                                @endif
                            </td>
                            <td class="admin-table__data">{{ $contact->email }}</td>
                            <td class="admin-table__data">{{ $contact->category->content ?? '' }}</td>
                            <td class="admin-table__data admin-table__data--button">
                                <button class="admin-table__detail-button" type="button">詳細</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection