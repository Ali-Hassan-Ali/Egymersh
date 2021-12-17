@extends('dashboard.layouts.master')

@section('page_content')

<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">All Stores</h2> 
        </div>
        <div>
        </div>
    </div>

    @include('dashboard.layouts.messages')

    @livewire('dashboard.stores.list-all-stores')


</section>


</section> <!-- content-main end// -->
@endsection


@section('scripts')


@endsection
