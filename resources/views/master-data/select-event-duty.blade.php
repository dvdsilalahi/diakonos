<select class="form-select input-select2" style="width:100%; heigth:100%; display:block;" aria-placeholder="--- Choose Duty ---" id="selectEventDuty" name="area">
    <option value="" selected></option>
      @foreach ($event_duties as $event_duty)
    <option value="{{ $event_duty->id }}">{{ $event_duty->title }}</option>
    @endforeach
</select>
