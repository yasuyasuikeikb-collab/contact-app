@extends('layouts.app')

@section('title', 'Thanks')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/contact/thanks.css') }}">
@endpush

@section('content')
    <section class="thanks">
        <div class="thanks__background-text">Thank you</div>

        <div class="thanks__inner">
            <p class="thanks__message">お問い合わせありがとうございました</p>
            <a class="button button--primary thanks__button" href="#">
                HOME
            </a>
        </div>
    </section>
@endsection