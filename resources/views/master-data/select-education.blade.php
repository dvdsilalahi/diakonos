<select class="form-select select2" style="width:100%; heigth:100%; display:block;" aria-placeholder="--- Choose Education ---" id="selectEducation" name="education">
    <option value="" selected></option>
    @foreach ($educations as $education)
    <option value="{{ $education->id }}">{{ $education->title }}</option>
    @endforeach
</select>
