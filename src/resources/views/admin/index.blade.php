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
                <form class="admin-search__form" action="{{ route('admin.search') }}" method="GET">
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
                                    <option
                                        value="{{ $category->id }}"
                                        {{ request('category_id') == $category->id ? 'selected' : '' }}
                                    >
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
                        <button class="admin-search__button admin-search__button--search" type="submit">
                            検索
                        </button>
                    </div>

                    <div class="admin-search__action">
                        <a class="admin-search__button admin-search__button--reset" href="{{ route('admin.reset') }}">
                            リセット
                        </a>
                    </div>
                </form>

                <div class="admin-search__sub-content">
                    <a class="admin-search__export-button" href="{{ route('admin.export', request()->query()) }}">
                      エクスポート
                    </a>

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
                                    <button
                                        class="admin-table__detail-button"
                                        type="button"
                                        data-modal-open="admin-modal-{{ $contact->id }}"
                                    >
                                        詳細
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @foreach ($contacts as $contact)
            <div class="admin-modal" id="admin-modal-{{ $contact->id }}">
                <div class="admin-modal__overlay" data-modal-close></div>

                <div class="admin-modal__content">
                    <button class="admin-modal__close-button" type="button" data-modal-close>
                        ×
                    </button>

                    <div class="admin-modal__body">
                        <dl class="admin-modal__detail-list">
                            <div class="admin-modal__detail-item">
                                <dt class="admin-modal__detail-term">お名前</dt>
                                <dd class="admin-modal__detail-description">
                                    {{ $contact->last_name }}　{{ $contact->first_name }}
                                </dd>
                            </div>

                            <div class="admin-modal__detail-item">
                                <dt class="admin-modal__detail-term">性別</dt>
                                <dd class="admin-modal__detail-description">
                                    @if ($contact->gender == 1)
                                        男性
                                    @elseif ($contact->gender == 2)
                                        女性
                                    @else
                                        その他
                                    @endif
                                </dd>
                            </div>

                            <div class="admin-modal__detail-item">
                                <dt class="admin-modal__detail-term">メールアドレス</dt>
                                <dd class="admin-modal__detail-description">
                                    {{ $contact->email }}
                                </dd>
                            </div>

                            <div class="admin-modal__detail-item">
                                <dt class="admin-modal__detail-term">電話番号</dt>
                                <dd class="admin-modal__detail-description">
                                    {{ $contact->tel }}
                                </dd>
                            </div>

                            <div class="admin-modal__detail-item">
                                <dt class="admin-modal__detail-term">住所</dt>
                                <dd class="admin-modal__detail-description">
                                    {{ $contact->address }}
                                </dd>
                            </div>

                            <div class="admin-modal__detail-item">
                                <dt class="admin-modal__detail-term">建物名</dt>
                                <dd class="admin-modal__detail-description">
                                    {{ $contact->building }}
                                </dd>
                            </div>

                            <div class="admin-modal__detail-item">
                                <dt class="admin-modal__detail-term">お問い合わせの種類</dt>
                                <dd class="admin-modal__detail-description">
                                    {{ $contact->category->content ?? '' }}
                                </dd>
                            </div>

                            <div class="admin-modal__detail-item admin-modal__detail-item--textarea">
                                <dt class="admin-modal__detail-term">お問い合わせ内容</dt>
                                <dd class="admin-modal__detail-description admin-modal__detail-description--textarea">
                                    {{ $contact->detail }}
                                </dd>
                            </div>
                        </dl>

                        <form
                            class="admin-modal__delete-form"
                            action="{{ route('admin.delete', ['id' => $contact->id]) }}"
                            method="POST"
                        >
                            @csrf
                            @method('DELETE')

                            <button class="admin-modal__delete-button" type="submit">
                                削除
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const openButtons = document.querySelectorAll('[data-modal-open]');
            const closeButtons = document.querySelectorAll('[data-modal-close]');

            openButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    const modalId = button.getAttribute('data-modal-open');
                    const modal = document.getElementById(modalId);

                    if (!modal) {
                        return;
                    }

                    modal.classList.add('admin-modal--open');
                    document.body.classList.add('is-fixed');
                });
            });

            closeButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    const modal = button.closest('.admin-modal');

                    if (!modal) {
                        return;
                    }

                    modal.classList.remove('admin-modal--open');
                    document.body.classList.remove('is-fixed');
                });
            });

            document.addEventListener('keydown', function (event) {
                if (event.key !== 'Escape') {
                    return;
                }

                const openedModal = document.querySelector('.admin-modal.admin-modal--open');

                if (!openedModal) {
                    return;
                }

                openedModal.classList.remove('admin-modal--open');
                document.body.classList.remove('is-fixed');
            });
        });
    </script>
@endsection