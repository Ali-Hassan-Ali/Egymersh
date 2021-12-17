@extends('dashboard.layouts.master')

@section('page_content')

<!-- this page when you click view details on a seller -->
<section class="content-main">
    <div class="card mb-4">
        <div class="card-header bg-primary" style="height:150px">
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xl col-lg flex-grow-0" style="flex-basis:230px">
                    <div class="img-thumbnail shadow w-100 bg-white position-relative text-center" style="height:190px; width:200px; margin-top:-120px">
                        <img src="{{ $seller->image_path }}" class="center-xy img-fluid" alt="Seller Logo">
                    </div>
                </div> <!--  col.// -->
                <div class="col-xl col-lg">
                    <h3>Name: {{ $seller->name }}</h3>
                    <p>Since: {{ $seller->created_at }}</p>
                </div> <!--  col.// -->
                <div class="col-xl-4 text-md-end">
                    <select class="form-select w-auto d-inline-block" data-id="{{ $seller->id }}" id="status-seller">
                        <option data-val="false" {{ $seller->status == 'false' ? 'selected' : '' }}>inactive</option>
                        <option data-val="true" {{ $seller->status == 'true' ? 'selected' : '' }}>Active</option>
                    </select>
                </div> <!--  col.// -->
            </div> <!-- card-body.// -->
            <hr>

            <div class="row">
              <div class="col-md-8 col-lg-4 col-xl-3">
                <article class="box">
                  <p class="mb-0 text-muted">Stores:</p>
                  <h5 class="text-success">{{ $seller->store->count() }}</h5>
                  <p class="mb-0 text-muted">Products:</p>
                  <h5 class="text-success mb-0">{{ $seller->sellerProduct->count() }}</h5>
                  <p class="mb-0 text-muted">Sales:</p>
                  <h5 class="text-success">-</h5>
                </article>
              </div> <!--  col.// -->
                <div class="col-md-8 col-lg-4 col-xl-3">
                    <article class="box">
                      <p class="mb-0 text-muted">Manual Orders:</p>
                      <h5 class="text-success mb-0">-</h5>
                        <p class="mb-0 text-muted">Revenue:</p>
                        <h5 class="text-success">-</h5>
                        <p class="mb-0 text-muted">His Profit:</p>
                        <h5 class="text-success mb-0">-</h5>
                    </article>
                </div> <!--  col.// -->
                <div class="col-sm-6 col-lg-4 col-xl-2">

                    <h6>Username:</h6>
                    <p>{{ $seller->user_name }} </p>
                    <h6>Email:</h6>
                    <p>{{ $seller->email }} </p>
                    <h6>Phone:</h6>
                    <p>{{ $seller->phone }} </p>
                </div> <!--  col.// -->
                <div class="col-sm-6 col-lg-4 col-xl-4">
                    <h6>Address:</h6>
                    <p>{{ $seller->address }} </p>
                    <h6>Country:</h6>
                    <p>{{ $seller->country }} </p>

                </div> <!--  col.// -->
            </div> <!--  row.// -->
        </div> <!--  card-body.// -->
    </div> <!--  card.// -->
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Stores .. </h5>
            <div class="row">
                @if ($stores->count() > 0)
                    {{-- expr --}}
                @foreach ($stores as $index=>$store)

                <div class="col">
                    <div class="card card-user">
                      <img src="{{ $store->banner_path }}" alt="Store banner" style="height:120px;">
                        <div class="card-header p-0" style="height:0">
                            <img class="img-md img-avatar" src="{{ $store->logo_path }}" alt="Store Logo" width="10">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mt-50">{{ $store->name }}</h5>
                            <div class="card-text text-muted">
                                <p class="m-0">Products: {{ $store->product->count() }}</p>
                                <p>Bio: {{ $store->bio }}</p>
                                <a href="{{ url('Dashboard/stores/'.$store->id) }}" class="btn btn-sm btn-brand rounded font-sm mt-15">View</a>
                            </div>
                        </div>
                    </div>
                </div> <!-- col.// -->

                @endforeach

                @else

                    <h2>@lang('dashboard.no_data_found')</h2>

                @endif
            </div> <!-- row.// -->
        </div> <!--  card-body.// -->
    </div> <!--  card.// -->
    <div class="pagination-area mt-30 mb-50">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-start">
                <li class="page-item active"><a class="page-link" href="#">01</a></li>
                <li class="page-item"><a class="page-link" href="#">02</a></li>
                <li class="page-item"><a class="page-link" href="#">03</a></li>
                <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                <li class="page-item"><a class="page-link" href="#">16</a></li>
                <li class="page-item"><a class="page-link" href="#"><i class="material-icons md-chevron_right"></i></a></li>
            </ul>
        </nav>
    </div>
</section>

@endsection

@section('scripts')

<script type="text/javascript">
    $(document).ready(function() {

        $(document).on('change','#status-seller', function (e) {
            e.preventDefault();

            var $option = $(this).find(":selected");
            var state   = $option.data('val');
            var id      = "{{ $seller->id }}";
            var url     = "{{ route('status.sellering') }}";
            var method  = "post";

            $.ajax({
                url: url,
                method: method,
                data: {
                    id : id,
                    status : state,
                },
                success: function (data) {

                   if (data.success == true) {

                         new Noty({
                            layout: 'topRight',
                            text: "@lang('dashboard.added_successfully')",
                            killer: true,
                            timeout: 2000,
                        }).show();
                   }

                }//end of success
            });//end of ajax

        });//end pf on change

    });//end pf document redy
</script>

@endsection
