<select class="form-select select2" style="width:100%; heigth:100%; display:block;" aria-placeholder="--- Choose Ministry ---" id="selectMinistry" name="ministry" multiple="multiple">
    @foreach ($ministries as $ministry)
    <option value="{{ $ministry->id }}">{{ $ministry->title }}</option>
    @endforeach
</select>
