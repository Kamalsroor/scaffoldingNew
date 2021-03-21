<li>

@if(isset($tree) && is_array($tree) && count($tree))
<?php $id = generateRandomString() ;?>

<a href="#{{ $id ?? '#' }}" data-toggle="collapse">
@else
<a href="{{ $url ?? '#' }}" >
@endif
    @if(isset($icon))
        {!! $icon ?? "" !!}
    @endif
    {{ $name ?? ""}}
</a>
@if(isset($tree) && is_array($tree) && count($tree))
<div class="hide-dropdown collapse multi-collapse" id="{{ $id ?? '#' }}">
    <ul>
        @foreach($tree as $item)
            <li>
                <a href="{{ $item['url'] }}"> @if (array_key_exists('img' , $item)) {!! $item['img'] ?? "" !!}  @endif
                    {{ $item['name'] }}</a>
            </li>
        @endforeach

    </ul>
</div>

@endif


</li>
