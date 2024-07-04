<select class="form-select select2" style="width:100%; display:block;" aria-placeholder="--- Choose Gender ---" id="selectGender" name="gender">
    <option value="" selected></option>
    @foreach ($genders as $gender)
    <option value="{{ $gender->id }}">{{ $gender->title }}</option>
    @endforeach
</select>
