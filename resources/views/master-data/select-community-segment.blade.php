    <option value="" selected></option>
    @foreach ($segments as $segment)
        @isset($old)
            <option value="{{ $segment->id}}" {{ (old("segment") == $segment->id ? "selected":"") }}>{{ $segment->title }}</option>
        @else
            @isset($community)
                <option value="{{ $segment->id}}" {{ ($community['segment'] == $segment->id ? "selected":"") }}>{{ $segment->title }}</option>
            @else
                <option value="{{ $segment->id}}">{{ $segment->title }}</option>
            @endisset
        @endisset()
    @endforeach
