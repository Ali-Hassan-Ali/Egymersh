<header class="main-header navbar">
    <div class="col-search">

    </div>
    <div class="col-nav">
        <button class="btn btn-icon btn-mobile me-auto" data-trigger="#offcanvas_aside"> <i class="material-icons md-apps"></i> </button>
        <ul class="nav">
            <!-- <li class="nav-item">
                <a class="nav-link btn-icon" href="#">
                    <i class="material-icons md-notifications animation-shake"></i>
                    <span class="badge rounded-pill">4</span>
                </a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link btn-icon darkmode" data-dark="{{ session()->get('darkmode') == 'dark' ? 'dark' : 'nodark'}}" data-method='post' data-url="{{ route('darkmode') }}" href="#"> <i class="material-icons md-nights_stay"></i> </a>
            </li>
            <!-- <li class="nav-item">
                <a href="#" class="requestfullscreen nav-link btn-icon"><i class="material-icons md-cast"></i></a>
            </li> -->
            <li class="dropdown nav-item">
                <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownLanguage" aria-expanded="false"><i class="material-icons md-public"></i></a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownLanguage">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a class="dropdown-item text-brand" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            <img src="{{ asset('site_assets/assets/imgs/lang') }}/{{ $properties['native'] == 'English' ? 'en.png' : 'egy.png' }}" alt="English">
                            {{ $properties['native'] }}
                        </a>
                    @endforeach
                </div>
            </li>
            <li class="dropdown nav-item">
              <!-- <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownAccount" aria-expanded="false">
              <img class="img-xs rounded-circle" src="{{ asset('uploads/admin_images/default.png') }}" alt="Admin Logo">
              </a> -->
                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownAccount">
                    <a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="material-icons md-perm_identity"></i>Edit Profile</a>
                    <a class="dropdown-item" href="#"><i class="material-icons md-settings"></i>Account Settings</a>
                    <div class="dropdown-divider"></div>
                    <form action="{{ route('logout') }}" method="POST" >
                        @csrf
                        <button class="dropdown-item text-danger" ><i class="material-icons md-exit_to_app"></i>Logout </button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</header>
