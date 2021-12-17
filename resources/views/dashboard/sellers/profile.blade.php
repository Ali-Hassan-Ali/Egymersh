@extends('dashboard.layouts.master')

@section('page_content')

<section class="content-main">
    <div class="content-header">
        <h2 class="content-title">All Sellers</h2>
    </div>
    <div class="card mb-4">
        <header class="card-header">
            <div class="row gx-3">
                <div class="col-lg-4 col-md-6 me-auto">
                    <form action="{{ route('seller.prfile') }}" method="get">

                        <div class="row">

                            <div class="col-md-8">
                                <input type="text" name="search" class="form-control" placeholder="@lang('dashboard.search')" value="{{ request()->search }}">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </div>

                        </div>
                    </form><!-- end of form -->
                </div>
                <div class="col-lg-2 col-6 col-md-3">
                    <select class="form-select">
                        <option>Show 20</option>
                        <option>Show 30</option>
                        <option>Show 40</option>
                        <option>Show all</option>
                    </select>
                </div>
                <div class="col-lg-2 col-6 col-md-3">
                    <select class="form-select">
                        <option>Status: all</option>
                        <option>Active only</option>
                        <option>Disabled</option>
                    </select>
                </div>
            </div>
        </header> <!-- card-header end// -->
        <div class="card-body">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4">
                @if ($sellers->count() > 0)
                    {{-- expr --}}
                @foreach ($sellers as $index => $seller)

                <div class="col">
                    <div class="card card-user">
                        <div class="card-header">
                            <img class="img-md img-avatar" src="{{ $seller->image_path }}" alt="User pic">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mt-50">{{ $seller->name }}</h5>
                            <div class="card-text text-muted">
                                <p class="m-0">{{ $seller->user_name }}</p>
                                <p class="m-0">Products: {{ $seller->sellerProduct->count() }}</p>
                                <p>{{ $seller->email }}</p>
                                <a href="{{ route('seller.stores',$seller->id) }}" class="btn btn-sm btn-brand rounded font-sm mt-15">View details</a>
                            </div>
                        </div>
                    </div>
                </div> <!-- col.// -->

                @endforeach
                @else

                    <h2>@lang('dashboard.no_data_found')</h2>

                @endif
            </div> <!-- row.// -->
        </div> <!-- card-body end// -->
    </div> <!-- card end// -->
    <div class="pagination-area mt-15 mb-50">
        <nav aria-label="Page navigation example">
            {{ $sellers->links() }}
        </nav>
    </div>
</section>

@endsection


@section('scripts')


@endsection
