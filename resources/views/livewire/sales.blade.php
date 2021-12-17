<div>
    <div class="card mb-4">
        <header class="card-header">
            <div class="row align-items-center">
<h4 class="card-title">@lang('seller.Latest Sales')</h4>
                <div class="col-md-2 col-6">
                    <input wire:model.debounce.300ms="search" type="text" placeholder="Search BY order number" wire:model="search" class="form-control">
                </div>
                <div class="col-md-2 col-6">
                    <div class="custom_select">
                        <select wire:model="perPage" class="form-select">
                            <option selected value="10" >10</option>
                            <option value="15" > 15</option>
                            <option value="20" > 20</option>
                            <option value="30" > 30</option>
                        </select>
                    </div>
                </div>
            </div>
        </header>
      <div class="card mb-4">
        <header class="card-header">
          
          <!-- sales made by customers on the site (not related to manual orders!) -->
          <div class="row align-items-center">


          </div>
        </header>
        <div class="card-body">
          <div class="table-responsive">
            <div class="table-responsive">
              <table class="table align-middle table-nowrap mb-0">
                <thead class="table-light">
                  <tr>
                    <th class="align-middle" scope="col">@lang('seller.Sale ID')</th>
                    <th class="align-middle" scope="col">@lang('seller.Product')</th>
                    <!-- final product name 'by the seller' -->
                    <th class="align-middle" scope="col">@lang('seller.Date')</th>

                    <th class="align-middle" scope="col">@lang('seller.Payment Status')</th>
                    <th class="align-middle" scope="col">@lang('seller.Profit')</th>
                  </tr>
                </thead>
                <tbody>
                @php
                $i = 1;
                @endphp
              @foreach($sales as $sale)
                  <tr>
                    <td><a href="#" class="fw-bold">R{{$sale['order_id']}} /S{{$sale['id']}}</a> </td>
                    <td>{{$sale->product['title']}}</td>
                    <td>
                      {{ date('d-m-Y', strtotime($sale['created_at'])); }}
                    </td>
                      
                    <td>
                      <?php $getstatus= App\Models\Order::where('id',$sale->order_id)->pluck('order_status_id')->toarray();
                      $status= App\Models\OrderStatus::wherein('id',$getstatus)->select('name_en','name_ar')->first(); 
                      ?>
                        {{$status->name_en}}

                  
                    </td>
                    <td>
                     {{$sale->product['selling_price'] *$sale->quantity}}@lang('seller.price sympol')
                    </td>
                    
                    
                  </tr>
                @endforeach
                </tbody>
                </tbody>
              </table>
            </div>
          </div> <!-- table-responsive end// -->
        </div>
      </div>
    <div class="pagination-area mt-30 mb-50">
          {{ $sales->links() }}
    </div>
</div>

