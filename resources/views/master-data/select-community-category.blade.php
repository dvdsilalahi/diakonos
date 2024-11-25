    <option value="" selected></option>
    @foreach ($categories as $category)
        @isset($old)
            <option value="{{ $category->id}}" {{ (old("category") == $category->id ? "selected":"") }}>{{ $category->title }}</option>
        @else
            @isset($community)
                <option value="{{ $category->id}}" {{ ($community['category'] == $category->id ? "selected":"") }}>{{ $category->title }}</option>
            @else
                <option value="{{ $category->id}}">{{ $category->title }}</option>
            @endisset
        @endisset()
    @endforeach
