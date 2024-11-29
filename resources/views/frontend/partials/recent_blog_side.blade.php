<div class="widget">
    <h4 class="widget-title">{{ __('messages.RecentBlog') }}</h4>
    <ul class="rc__post">
        @if ($recent_blogs->count() === 0)
            <p>{{ __('messages.Noresult') }}</p>
        @else
            @foreach ($recent_blogs as $item)
                <li class="rc__post__item">
                    <div class="rc__post__thumb">
                        <a href="{{ route('blog.details',$item->id) }}">
                            @if (file_exists($item->image_home))
                                <img src="{{ asset($item->image)}}" alt="">
                            @else
                                <img src="{{ asset('upload/no_image_blog.jpg')}}" alt="">
                            @endif
                        </a>
                    </div>
                    <div class="rc__post__content">
                        <h5 class="title">
                            <a href="{{ route('blog.details',$item->id) }}">
                                {{ $item->title }}
                            </a>
                        </h5>
                        <span class="post-date"><i class="fal fa-calendar-alt"></i> 
                            {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                        </span>
                    </div>
                </li>
            @endforeach
        @endif
    </ul>
</div>