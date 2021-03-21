<li class='{{ $class ?? '' }} main-navbar__links__menu__item  @if(isset($tree) && is_array($tree) && count($tree)) contain-angle @endif'>
    <a class="main-navbar__links__menu__item__link" href="{{ $url ?? '#' }}">

        @if(isset($icon))
             {!! $icon ?? "" !!}
        @endif
        {{ $name ?? ""}}</a>

    @if(isset($tree) && is_array($tree) && count($tree))
        <div class="nav-dropdown">
            <div>
                <ul>
                    @foreach($tree as $item)
                        <li>
                            <a href="{{ $item['url'] }}"> @if (array_key_exists('img' , $item)) {!! $item['img'] ?? "" !!}  @endif
                                {{ $item['name'] }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
</li>




