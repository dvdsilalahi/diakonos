    <option value="" selected></option>
        @foreach ($eventfacilities as $eventfacility)
            @isset($old)
                <option value="{{ $eventfacility->id}}" {{ (old("event_facility") == $eventcategory->id ? "selected":"") }}>{{ $eventcategory->title }}</option>
            @else
                @isset($eventTemplate)
                    <option value="{{ $eventfacility->id}}" {{ ($eventTemplate['event_facility'] == $eventfacility->id ? "selected":"") }}>{{ $eventcategory->title }}</option>
                @else
                    <option value="{{ $eventfacility->id}}">{{ $eventfacility->title }}</option>
                @endisset
            @endisset()
        @endforeach
