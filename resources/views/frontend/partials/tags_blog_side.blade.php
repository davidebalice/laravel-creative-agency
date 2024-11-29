<div class="widget">
    <h4 class="widget-title">{{ __('messages.PopularTags') }}</h4>
    <ul class="sidebar__tags">
        @foreach ($allTags as $tag)
            <li><a href="/blog/?tag={{$tag}}">{{$tag}}</a></li>
        @endforeach
    </ul>
</div>