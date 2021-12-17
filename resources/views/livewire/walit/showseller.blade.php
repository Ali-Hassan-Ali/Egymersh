<div>
    <div class="card mb-4">
        <header class="card-header">
            <div class="row align-items-center">
                <h4 class="content-title card-title">@lang('seller.Wallet')</h4>
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
                    <th class="align-middle" scope="col">ID</th>
                    <th class="align-middle" scope="col">@lang('seller.Amount')</th>
                    <th class="align-middle" scope="col">@lang('seller.Phone')</th>
                    <!-- final product name 'by the seller' -->
                    <th class="align-middle" scope="col">@lang('seller.Wallet')</th>
                    <th class="align-middle" scope="col">@lang('seller.Payment Status')</th>
                    <th class="align-middle" scope="col">@lang('seller.Notes')</th>
                  </tr>
                </thead>
                <tbody>
                @php
                $i = 1;
                @endphp
                @foreach($wallets as $wallet)
                  <tr>
                    <td>{{$wallet->id}}<a href="#" class="fw-bold"></a> </td>
                    <td>{{$wallet->price}}<a href="#" class="fw-bold"></a> </td>
                    <td>{{$wallet->phone}}</td>
                    <td>
                    {{$wallet->payway}}
                    </td>

                    <td>
                      <span class="badge badge-pill badge-soft-success">{{$wallet->status_en}}</span>
                    </td>
                    <td>
                    {{$wallet->message}}
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
          {{ $wallets->links() }}
    </div>
</div>

