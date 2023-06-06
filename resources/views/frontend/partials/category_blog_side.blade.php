<div class="widget">
    <h4 class="widget-title">Categories</h4>
    <ul class="sidebar__cat">
        @foreach ($categories as $item)
            <li class="sidebar__cat__item">
                <a href="{{ route('category.post',$item->id) }}">{{ $item->category }}</a>
            </li>
        @endforeach
    </ul>
</div>