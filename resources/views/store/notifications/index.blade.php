@extends('store.layouts.master')

@section('page_title')
@lang('title.Notifications')
@endsection

@section('page_content')

<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">@lang('seller.Notifications')</h2>
        </div>
    </div>

    <div wire:id="tG6jH8fMaJatb2ndvohv">
        <div class="card mb-4">

            <div class="card-body">
              <div class="row flex-row-reverse">

                <div class="col-lg-6">
                    <img src="{{ asset('store_assets\assets\imgs\seller-dashboard/notifications.png')}}" alt="Notifications" class="img-responsive ">
                </div>

                <div class="col-lg-6">
                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="align-middle" scope="col">@lang('seller.Title')</th>
                                    <th class="align-middle" scope="col">@lang('seller.View')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notifications as $index=>$notification)
                                    <tr>
                                        <!-- <td>{{ $index++ }}</td> -->
                                        <td>{{ $notification->title }}</td>
                                        <td>
                                            <div class="col-lg-2 col-sm-2 col-4 col-action text-end d-inline">
                                                <a href="{{ route('notification.show', $notification->id) }}" class="btn btn-sm font-sm rounded btn-brand">
                                                    <i class="material-icons md-edit"></i>@lang('seller.View')
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div> <!-- table-responsive end// -->
              </div>

            </div>
        </div>
        <div class="pagination-area mt-30 mb-50">
              @include('paginations.Notifications',$notifications)
        </div>
    </div>


</section>


</section> <!-- content-main end// -->

@endsection
