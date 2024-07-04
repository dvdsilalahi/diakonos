<select class="form-select select2" style="width:100%; heigth:100%; display:block;"aria-placeholder="--- Choose Citizenship ---" id="selectCitizenship" name="citizenship">
    <option value="" selected></option>
    @foreach ($citizenships as $citizenship)
    <option value="{{ $citizenship->id }}">{{ $citizenship->title }}</option>
    @endforeach
</select>
