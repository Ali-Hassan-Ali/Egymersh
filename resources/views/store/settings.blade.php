@extends('store.layouts.master')

@section('page_title')
@lang('title.Settings')
@endsection

@section('page_content')
 <section class="content-main">
    <div class="content-header">
        <h2 class="content-title">@lang('seller.Account Settings')</h2>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row flex-row-reverse justify-content-center align-items-center">
                <!-- <aside class="col-lg-3 border-end">
                    <nav class="nav nav-pills flex-lg-column mb-4">
                        <a class="nav-link active" aria-current="page" href="{{ url('myStore/settings') }}">@lang('seller.General')</a>
                       <a class="nav-link " aria-current="page" href="{{ url('myStore/settings/verify') }}">@lang('seller.Verification') </a>
                    </nav>
                </aside> -->
                <!-- image section  -->
                <div class="col-lg-5 d-flex justify-content-center">
                  <img src="{{ asset('store_assets\assets\imgs\seller-dashboard/settings.png')}}" alt="settings" class="img-responsive ">
                </div>

                <div class="col-lg-7">
                    <section class="content-body p-xl-4">
                        <form id="save-seeting" method="post" action="{{ route('profile.store') }}" enctype="multipart/form-data">

                            @csrf
                            @method('post')

                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="row gx-3">
                                        <div class="col-6 mb-3">
                                            <label class="form-label">@lang('seller.Name')</label>
                                            <input class="form-control" type="text" id="name-setting" name="name" placeholder="@lang('seller.Type here')" value="{{ Auth::guard('seller')->user()->name }}">
                                            <span class="text-danger" id="name-setting-error"></span>
                                        </div> <!-- col .// -->
                                        <div class="col-6 mb-3">
                                            <label class="form-label">@lang('seller.Username')</label>
                                            <input class="form-control" type="text" id="name-setting" name="user_name" placeholder="@lang('seller.Type here')" value="{{ Auth::guard('seller')->user()->user_name }}">
                                            <span class="text-danger" id="name-setting-error"></span>
                                        </div> <!-- col .// -->
                                        <div class="col-lg-6  mb-3">
                                            <label class="form-label">@lang('seller.Email')</label>
                                            <input class="form-control" id="email-setting" type="email" name="email" value="{{ Auth::guard('seller')->user()->email }}" placeholder="example@gmail.com">
                                            <span class="text-danger" id="email-setting-error"></span>
                                        </div> <!-- col .// -->
                                        <div class="col-lg-6  mb-3">
                                            <label class="form-label">@lang('seller.Phone')</label>
                                            <input class="form-control" name="phone" id="phone-setting" value="{{ Auth::guard('seller')->user()->phone }}" type="tel" placeholder="@lang('seller.Type here')">
                                            <span class="text-danger" id="phone-setting-error"></span>
                                        </div> <!-- col .// -->

                                        <div class="col-lg-12  mb-3">
                                            <label class="form-label">@lang('seller.Country')</label>
                                            <div class="niceCountryInputSelector bg-dark bg-transparent" data-selectedcountry="US" data-showspecial="false" data-showflags="true" data-i18nall="All selected"
                                                data-i18nnofilter="No selection" data-i18nfilter="Filter" data-onchangecallback="onChangeCallback" />
                                            </div>
                                        </div> <!-- col .// -->


                                    </div> <!-- row.// -->
                                </div> <!-- col.// -->
                                <aside class="col-lg-4">
                                    <figure class="text-lg-center">
                                        <img class="img-lg mb-3 img-avatar img-responsive" src="{{  Auth::guard('seller')->user()->image_path  }}" alt="Seller Photo">
                                        <figcaption>
                                            <a class="btn btn-light rounded font-md" href="#" onclick="document.getElementById('profile-image').click();">
                                                <i class="icons material-icons md-backup font-md"></i> @lang('seller.Edit')
                                            </a>
                                            <input type="file" name="image" id="profile-image" hidden>
                                            <input type="text" name="country" id="profile-country" hidden>
                                            <input type="text" name="image_country" id="profile-image-country" hidden>
                                        </figcaption>
                                    </figure>
                                </aside> <!-- col.// -->
                            </div> <!-- row.// -->
                            <br>
                            <div class="text-center">
                            <button class="btn btn-primary text-end" type="submit">@lang('seller.Save')</button>
                            </div>
                        </form>
                        <hr class="my-5">
                        <div class="row" style="max-width:920px">
                            <div class="col-md">
                                <article class="box mb-3 bg-light d-flex flex-row-reverse justify-content-between">
                                    <a class="btn btn-light rounded font-md" href="{{ route('profile.password') }}">@lang('seller.Change')</a>
                                    <div class="w-100">
                                      <h6>@lang('seller.Password')</h6>
                                      <small class="text-muted d-block" style="width:70%">@lang('seller.change password msg')</small>
                                    </div>
                                </article>
                            </div> <!-- col.// -->

                        </div> <!-- row.// -->
                    </section> <!-- content-body .// -->
                </div> <!-- col.// -->
            </div> <!-- row.// -->
        </div> <!-- card body end// -->
    </div> <!-- card end// -->
    
    <div id="seller-country" hidden>{{ Auth::guard('seller')->user()->country }}</div>
    <div id="seller-imageCountry" hidden>{{ Auth::guard('seller')->user()->image_country }}</div>

</section> <!-- content-main end// -->

@endsection