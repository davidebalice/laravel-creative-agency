<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu" style="display:none">
                <li class="menu-title">Menù</li>

                <li>
                    <a href="/dashboard" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
               
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Home</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route ('home.slide') }}">{{ __('messages.Options') }}</a></li>
                    </ul>
                </li>
               
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>{{ __('messages.Pagebanner') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route ('page.banner') }}">Banner</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-account-box-fill"></i>
                        <span>{{ __('messages.About') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route ('about.page') }}">{{ __('messages.Options') }}</a></li>
                        <li><a href="{{ route ('gallery') }}">Gallery</a></li>
                        <li><a href="{{ route ('add.gallery') }}">Upload</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-inbox-multiple"></i>
                        <span>Portfolio</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route ('admin.portfolio') }}">Portfolio</a></li>
                        <li><a href="{{ route ('portfolio.add') }}">{{ __('messages.Addwork') }}</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-lightbulb-flash-line"></i>
                        <span>{{ __('messages.Services') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route ('admin.services') }}">{{ __('messages.Services') }}</a></li>
                        <li><a href="{{ route ('services.add') }}">{{ __('messages.Addservice') }}</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-menu-fill"></i>
                        <span>{{ __('messages.BlogCategory') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.blog.category') }}">{{ __('messages.Category') }}</a></li>
                        <li><a href="{{ route('blog.category.add') }}">{{ __('messages.Addcategory') }}</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-profile-line"></i>
                        <span>Blog</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.blog') }}">Blog</a></li>
                        <li><a href="{{ route('blog.add') }}">{{ __('messages.Addarticle') }}</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-dock-bottom"></i>
                        <span>Footer</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('footer') }}">Footer</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-contacts-book-2-line"></i>
                        <span>{{ __('messages.Contact') }}</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('contact.message') }}">{{ __('messages.Messages') }}</a></li>
                    </ul>
                </li>
        
            </ul>
        </div>
    </div>
</div>
