<select class="form-select select2" style="width:100%; heigth:100%; display:block;" aria-placeholder="--- Choose Personality Type ---" id="selectPersonalityType" name="personality_types" multiple="multiple">
    @foreach ($personalitytypes as $personalitytype)
    <option value="{{ $personalitytype->id }}">{{ $personalitytype->title }}</option>
    @endforeach
</select>
