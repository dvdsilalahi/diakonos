    <option value="" selected></option>
        @foreach ($eventcategories as $eventcategory)
            @isset($old)
                <option value="{{ $eventcategory->id}}" {{ (old("event_category") == $eventcategory->id ? "selected":"") }}>{{ $eventcategory->title }}</option>
            @else
                @isset($eventTemplate)
                    <option value="{{ $eventcategory->id}}" {{ ($eventTemplate['event_category'] == $eventcategory->id ? "selected":"") }}>{{ $eventcategory->title }}</option>
                @else
                    <option value="{{ $eventcategory->id}}">{{ $eventcategory->title }}</option>
                @endisset
            @endisset()
        @endforeach
