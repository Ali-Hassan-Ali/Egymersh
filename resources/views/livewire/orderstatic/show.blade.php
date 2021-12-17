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
                    <th class="align-middle" scope="col">@lang('seller.Order ID')</th>
                    <th class="align-middle" scope="col">@lang('seller.Client Name')</th>
                    <th class="align-middle" scope="col">@lang('seller.Date')</th>
                    <th class="align-middle" scope="col">@lang('seller.Status')</th>
                    <th class="align-middle" scope="col">@lang('seller.Total')</th>
                    <th class="align-middle" scope="col">@lang('seller.Profit')</th>
                    <th class="align-middle" scope="col">@lang('seller.View')</th>
                    <th class="align-middle" scope="col" style="color:#088178">@lang('seller.Delete')</th>
                  </tr>
                </thead>
                <tbody>
                @php
                $i = 1;
                @endphp
               @foreach($orders as $order)
                  <tr>
                    <td><a href="#" class="fw-bold">M{{$order->id}}</a> </td>
                    <td>{{$order->name}}</td>
                    <td>
                    {{ date('d-m-Y', strtotime($order['created_at'])); }}
                    </td>
                    <td>
                      <span class="badge badge-pill badge-soft-success">{{$order->status}}</span>
                    </td>
                    <td>
                     {{$order->total_price}}
                    </td>
                    <td>
                    {{$order->profit}} @lang('seller.price sympol')
                    </td>
                    <td>
                    <a href="{{ route('show-order'  , $order->id ) }}" class="btn btn-xs"> <i class="far fa-eye"></i> </a>

                    </td>
                    @if($order->status=='Pending')
                    <td>

                    <form action="{{ route('delete.order', $order->id ) }}" style="display:inline;" method="POST"  >
                                @method('delete')
                                        @csrf
                            <button class="btn btn-xs btn-danger delete"> <i class="fas fa-trash-alt"></i> </button>
                    </td>
                    </form>

                    @endif


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
          {{ $orders->links() }}
    </div>
</div>

