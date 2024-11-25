    <option value="" selected></option>
    @foreach ($areas as $area)
        @isset($old)
            <option value="{{ $area->id}}" {{ (old("area") == $area->id ? "selected":"") }}>{{ $area->title }}</option>
        @else
            @isset($community)
                <option value="{{ $area->id}}" {{ ($community['area'] == $area->id ? "selected":"") }}>{{ $area->title }}</option>
            @else
                <option value="{{ $area->id}}">{{ $area->title }}</option>
            @endisset
        @endisset()
    @endforeach
