<div>
    @php
    $properties = json_decode($properties);
    @endphp
    @if(isset($properties->old))
    <div class="text-xs px-3 bg-yellow-200 p-1 text-yellow-800 w-full">Old Data</div>
    @foreach($properties->old as $key => $value)
        {{str_replace('_',' ',$key)}} : {{$value}} <br>
    @endforeach
    <div class="text-xs px-3 bg-green-200 p-1 text-green-800 w-full mt-2">New Data</div>
    @foreach($properties->attributes as $key => $attributes)
            {{str_replace('_',' ',$key)}} : {{$attributes}} <br>
        @endforeach
    @else
    <div class="text-xs px-3 bg-green-200 p-1 text-green-800 w-full mt-2">New Data</div>
        @foreach($properties->attributes as $key => $attributes)
        {{str_replace('_',' ',$key)}} : {{$attributes}} <br>
        @endforeach
    @endif
</div>
