@php
    use App\Models\Contact;
    use Carbon\Carbon;
    $notifications = Contact::latest()->orderby('created_at', 'DESC')->limit(4)->get();
@endphp
<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <div class="navbar-brand-box">
                <a href="/dashboard" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('logo/logo-light.png') }}" alt="logo-sm" height="20">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('logo/logo-light.png') }}" alt="logo-dark" height="40">
                    </span>
                </a>
                <a href="/dashboard" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('logo/logo-light.png') }}" alt="logo-sm" height="20">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('logo/logo-light.png') }}" alt="logo-dark" height="40">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="ri-menu-2-line align-middle"></i>
            </button>

        </div>

        <div class="d-flex">
            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ri-search-line"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-search-dropdown">
        
                    <form class="p-3">
                        <div class="mb-3 m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ...">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="ri-search-line"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @php
                /*
                 <div class="dropdown d-none d-sm-inline-block">
                    <button type="button" class="btn header-item waves-effect"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="" src="{{ asset('backend/assets/images/flags/us.jpg') }}" alt="Header Language" height="16">
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="{{ asset('backend/assets/images/flags/italy.jpg') }}" alt="user-image" class="me-1" height="12"> <span class="align-middle">Italian</span>
                        </a>
                    </div>
                </div>
                */
            @endphp
           
            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="ri-fullscreen-line"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                      data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ri-notification-3-line"></i>
                    <span class="noti-dot"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0"> Notifications </h6>
                            </div>
                            <div class="col-auto">
                                <a href="/contact/message" class="small"> View All</a>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        @foreach ($notifications as $item)
                            <a href="#" class="text-reset notification-item">
                                <div class="d-flex">
                                    <div class="flex-1">
                                        <h6 class="mb-1">{{$item->name}}</h6>
                                        <div class="font-size-12 text-muted">
                                            <p class="mb-1">{{$item->subject}}</p>
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i>{{ Carbon::parse($item->created_at)->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>  
                        @endforeach
                    </div>
                    <div class="p-2 border-top">
                        <div class="d-grid">
                            <a class="btn btn-sm btn-link font-size-14 text-center" href="/contact/message">
                                <i class="mdi mdi-arrow-right-circle me-1"></i> View More..
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            @php
                $id = Auth::user()->id;
                $data = App\Models\User::find($id);
            @endphp

            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   
                    <div class="rounded-circle overflow-hidden d-xl-inline-block header-img-top">
                        <img class="h-100 w-auto justify-content-center" src="{{ (!empty($data->profile_image)) ? url('upload/admin/'.$data->profile_image) : url('upload/no_image.jpg') }}" alt="profile">                                   
                    </div>
                    <div class="d-xl-inline-block" style="verical-align:middle;margin-top:-10px">
                        <span class="d-none d-xl-inline-block ms-2">
                            {{ $data->name }}
                        </span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </div>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="{{ route('admin.profile')}}">
                        <i class="ri-user-line align-middle me-1"></i> Profile
                    </a>
                    <a class="dropdown-item" href="{{ route('change.password') }}">
                        <i class="ri-wallet-2-line align-middle me-1"></i> 
                        Change password
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{ route('admin.logout')}}"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
                </div>
            </div>

        </div>
    </div>
</header>