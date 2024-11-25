<select class="form-select select2" style="width:100%; heigth:100%; display:block;" aria-placeholder="--- Choose Segment Attendance---" id="selectSegmentAttendance" name="segment_attendances[]" multiple="multiple">
    @foreach ($segments as $segment)
        @isset($old)
        <option value="{{ $segment->id }}" {{ (collect(old('segment_attendances'))->contains( $segment->id )) ? 'selected':'' }}>{{ $segment->title }}</option>
        @else
            @isset($eventTemplate)
                <option value="{{ $segment->id }}" {{ (collect($eventTemplate['segment_attendances']['items'])->contains( $segment->id )) ? 'selected':'' }}>{{ $segment->title }}</option>
            @else
                <option value="{{ $segment->id }}">{{ $segment->title }}</option>
            @endisset
        @endisset
    @endforeach
</select>
