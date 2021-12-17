@extends('store.layouts.master')

@section('page_title')
@lang('title.My Products')
@endsection

@section('page_content')

    <section class="content-main">

        @livewire('seller.product-seller')

    </section> <!-- content-main end// -->

@endsection
