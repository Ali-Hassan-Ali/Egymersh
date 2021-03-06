<div>

  <div class="card mb-4">
    <header class="card-header">
        <div class="row gx-3">
            <div class="col-lg-4 mb-lg-0 mb-15 me-auto">
                <input type="text" wire:model="search" placeholder="Search..." class="form-control">
            </div>
            <div class="col-lg-2 col-6">
               {{--  <div class="custom_select">
                    <select class="form-select select-nice">
                        <option selected>Categories</option>
                        <option>Technology</option>
                        <option>Fashion</option>
                        <option>Home Decor</option>
                        <option>Healthy</option>
                        <option>Travel</option>
                        <option>Auto-car</option>
                    </select>
                </div> --}}
            </div>

        </div>
    </header> <!-- card-header end// -->
    <div class="card-body">
        <div class="row gx-3">


         @foreach ($stores as $store)
         <div class="col-xl-2 col-lg-3 col-md-4 col-6">
            <figure class="card border-1">
                <div class="card-header bg-white text-center">
                   <a href="{{ url('Dashboard/stores/'.$store->id) }}" target="_blank">
                        <img height="76" src="{{ $store->logo_path }}" class="img-fluid rounded-circle" alt="Store Logo">
                   </a>
                </div>
                <figcaption class="card-body text-center">
                    <a href="{{ url('Dashboard/stores/'.$store->id) }}" target="_blank">  <h6 class="card-title m-0"> {{ $store->name }} </h6></a>
                    <a href="{{ url('Dashboard/stores/'.$store->id) }}" target="_blank"> {{ $store->product->count() }} Product </a>
                </figcaption>
            </figure>
        </div> <!-- col.// -->
        @endforeach


    </div> <!-- row.// -->
</div> <!-- card-body end// -->
</div> <!-- card end// -->

    <div class="pagination-area mt-30 mb-50">
        <nav aria-label="Page navigation example">
            {{ $stores->links() }}
        </nav>
    </div>
</div>
