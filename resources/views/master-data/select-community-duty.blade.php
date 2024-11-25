<select class="form-select select2" style="width:100%; heigth:100%; display:block;" aria-placeholder="--- Choose Community Duty ---" id="selectCommunityDuty" name="community_duties[]" multiple="multiple">
    @foreach ($event_duties as $event_duty)
            @isset($old)
                <option value="{{ $event_duty->id }}" {{ (collect(old('community_duties'))->contains( $event_duty->id )) ? 'selected':'' }}>{{ $event_duty->title }}</option>
            @else
                @isset($eventTemplate)
                    <option value="{{ $event_duty->id }}" {{ (collect($eventTemplate['community_duties']['items'])->contains( $event_duty->id )) ? 'selected':'' }}>{{ $event_duty->title }}</option>
                @else
                    <option value="{{ $event_duty->id }}">{{ $event_duty->title }}</option>
                @endisset
            @endisset
    @endforeach
</select>
