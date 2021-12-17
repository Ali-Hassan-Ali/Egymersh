<div>
<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Products grid</h2>
            <p>Lorem ipsum dolor sit amet.</p>
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
                            <option selected value="10" >10</option>
                            <option value="1" > 1</option>
                            <option value="15" > 15</option>
                            <option value="20" > 20</option>
                            <option value="30" > 30</option>
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
                            <a href="#" class="img-wrap"> <img src="{{ $product->image_path }}" alt="Product"> </a>
                            <div class="info-wrap">
                                <a href="#" class="title text-truncate">{{ $product->title }}</a>
                                <div class="price mb-2">{{ $product->price }}</div> <!-- price.// -->
                                <a href="#" class="btn btn-sm font-sm rounded btn-brand">
                                    <i class="material-icons md-edit"></i> Edit
                                </a>
                                <a href="#" class="btn btn-sm font-sm btn-light rounded">
                                    <i class="material-icons md-delete_forever"></i> Delete
                                </a>
                            </div>
                        </div> <!-- card-product  end// -->
                    </div> <!-- col.// -->
                    
                @endforeach

            </div> <!-- row.// -->
        </div> <!-- card-body end// -->
    </div> <!-- card end// -->
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
</div>