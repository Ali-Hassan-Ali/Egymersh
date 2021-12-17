<div>

 <div class="content-header">
        <div>
            <h2 class="content-title card-title">@lang('seller.All Products')</h2>
            <p>@lang('seller.all products msg')</p>
        </div>
        <div>
            @php
                $count_product = App\Models\SellerProduct::count();
            @endphp

            @if ($count_product >= 50)
                <a href="" class="btn btn-primary btn-sm rounded">@lang('seller.product limit msg')</a>
            @else
                <a href="{{ route('add-product-seller') }}" class="btn btn-primary btn-sm rounded">@lang('seller.Create new product')</a>
            @endif
        </div>
    </div>

    <div class="card mb-4">
        <header class="card-header">
            <div class="row gx-3">
                <div class="col-lg-4 col-md-6 me-auto">
                    <input type="text" placeholder="Search BY Name" wire:model="search" class="form-control">
                </div>
            </div>
        </header>
        <!-- card-header end// -->
        <div class="card-body">
            <div class="row gx-3 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-5">

                @foreach ($seller_product as $product)

                    <div class="col">
                        <div class="card card-product-grid">
                            <a href="{{ route('product.details' ,$product->id) }}" target="_blank"  class="img-wrap"> <img src="{{ $product->image_path }}" alt="Product"> </a>
                            <div class="info-wrap">
                                <a href="{{ route('product.details' ,$product->id) }}" target="_blank"  class="title text-truncate">{{ $product->title }}</a>
                                <div class="price mb-2">{{ $product->price }} {{ app()->getLocale() == 'ar' ? 'ج م' : 'LE'}}</div> <!-- price.// -->
                                <a href="{{ route('product.details' ,$product->id) }}" target="_blank" class="btn btn-sm font-sm rounded btn-brand">
                                  <i class="fas fa-eye mx-1"></i>@lang('seller.View')
                                </a>
                                <a href="{{ route('sellers.edit.product',$product->id) }}" class="btn btn-sm font-sm rounded btn-brand">
                                    <i class="fas fa-pen"></i> @lang('seller.Edit')
                                </a>
                                <form action="{{ route('sellers.destroy.product', $product->id) }}" method="post" style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <a href="#" class="btn btn-sm font-sm btn-light rounded delete">
                                        <i class="fa fa-trash mx-1"></i>
                                    </a>
                                </form><!-- end of form -->
                            </div>
                        </div> <!-- card-product  end// -->
                    </div>

                @endforeach

            </div> <!-- row.// -->
        </div> <!-- card-body end// -->
    </div> <!-- card end// -->

    <div class="pagination-area mt-30 mb-50">
<<<<<<< HEAD
        <nav aria-label="Page navigation example">
            {{ $seller_product->links() }}
        </nav>
=======
          {{ $seller_product->links() }}
>>>>>>> 77fddcc5f445876117bcc57c172276abd22d9fa3
    </div>

</div>
