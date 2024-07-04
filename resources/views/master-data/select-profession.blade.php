<select class="form-select select2" style="width:100%; heigth:100%; display:block;" aria-placeholder="--- Choose Profession ---" id="selectProfession" name="profession">
    <option value="" selected></option>
    @foreach ($professions as $profession)
    <option value="{{ $profession->id }}">{{ $profession->title }}</option>
    @endforeach
</select>
