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
                    <th class="align-middle" scope="col">Amount</th>
                    <th class="align-middle" scope="col">Phone</th>
                    <th class="align-middle" scope="col">Date</th>
                    <th class="align-middle" scope="col">Payment Way</th>
                    <th class="align-middle" scope="col">Status</th>
                    <th class="align-middle" scope="col">Message</th>
                  </tr>
                </thead>
                <tbody>
                @php
                $i = 1;
                @endphp
                 @foreach($wallets as $walet)
                  <tr>
                  <td>{{$walet->id}}<a href="#" class="fw-bold"></a> </td>
                    <td>{{$walet->price}}<a href="#" class="fw-bold"></a> </td>
                    <td>{{$walet->phone}}</td>
                    <td>
                    {{ date('d-m-Y', strtotime($walet['created_at'])); }}
                    </td>
                    <td>
                    {{$walet->payway}}
                    </td>
                    <td>
                      <span class="badge badge-pill badge-soft-success">{{$walet->status_en}}</span>
                    </td>
                    <td>
                    <button type="button"
                      request_id="{{$walet->id}}" class="change_request btn btn-primary"
                      data-bs-toggle="modal"
                      data-bs-target="#request_id">
                                 Change
                    </button>
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

