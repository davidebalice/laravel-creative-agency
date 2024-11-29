<section class="blog">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="section__title text-center mb-5">
                    <h2 class="title">
                        Blog
                    </h2>
                </div>
            </div>
        </div>
        <div class="row gx-0 justify-content-center">
           @foreach ($blogs as $item)
            <div class="col-lg-4 col-md-6 col-sm-9">
                <div class="blog__post__item">
                    <div class="blog__post__thumb">
                        <a href="{{ route('blog.details',$item->id) }}">
                            @if (file_exists($item->image_home))
                            <img src="{{ asset($item->image_home)}}" alt="">
                            @else
                            <img src="{{ asset('upload/no_image_blog.jpg')}}" alt="">
                            @endif
                        </a>
                        <div class="blog__post__tags">
                            <a href="blog.html">
                                {{ $item->categories->category ?? ''}}
                            </a>
                        </div>
                    </div>
                    <div class="blog__post__content">
                        <span class="date">
                            {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                        </span>
                        <h3 class="title"><a href="{{ route('blog.details',$item->id) }}">{{ $item->title }}</a></h3>
                        <a href="{{ route('blog.details',$item->id) }}" class="read__more">{{ __('messages.Readmore') }}</a>
                    </div>
                </div>
            </div>
           @endforeach
        </div>
    </div>
</section>