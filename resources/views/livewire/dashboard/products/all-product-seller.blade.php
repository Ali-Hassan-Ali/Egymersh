<div>
<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">All Products</h2>
        </div>
    </div>
    <div class="card mb-4">
        <header class="card-header">
            <div class="row gx-3">
                <div class="col-lg-4 col-md-6 me-auto">
                    <input type="text" placeholder="Search BY Name" wire:model="search" class="form-control">
                </div>
                <div class="col-md-2 col-6">
                    <div class="custom_select">
                        <select wire:model="rows" class="form-select">
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option selected value="100">100</option>
                            <option value="200">200</option>
                            <option value="300">300</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2 col-6">
                    <div class="custom_select">
                        <select wire:model="category_id" class="form-select">
                            @foreach (App\Models\Category::all() as $category)
                                <option value="{{ $category->id }}" >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </header> <!-- card-header end// -->
        <div class="card-body">
            <div class="row gx-3 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-5">

                @foreach ($product_seller as $product)

                    <div class="col">
                        <div class="card card-product-grid">
                            <a href="{{ route('product.details' ,$product->id) }}" target="_blank" class="img-wrap"> <img src="{{ $product->image_path }}" alt="Product"> </a>
                            <div class="info-wrap">
                              <form action="{{ route('sellers.destroy.product', $product->id) }}" method="post" style="display: inline-block; float:right">
                                  {{ csrf_field() }}
                                  {{ method_field('delete') }}
                                  <a href="#" class="btn btn-sm font-sm btn-light rounded delete">
                                      <i class="fas fa-trash"></i>
                                  </a>
                              </form>
                                <a href="{{ route('product.details' ,$product->id) }}" target="_blank" class="title text-truncate">{{ $product->title }}</a>
                                <div class="price mb-2">{{ $product->price }} {{ app()->getLocale() == 'ar' ? '?? ??' : 'LE'}} <span style="color:green">({{ $product->selling_price }}  {{ app()->getLocale() == 'ar' ? '?? ??' : 'LE'}})</span> </div> <!-- price.// -->

                            </div>
                        </div> <!-- card-product  end// -->
                    </div> <!-- col.// -->

                @endforeach

            </div> <!-- row.// -->
        </div> <!-- card-body end// -->
    </div> <!-- card end// -->
    <div class="pagination-area mt-30 mb-50">
        <nav aria-label="Page navigation example">
            {{ $product_seller->links() }}
        </nav>
    </div>
</section>
</div>
