<select class="form-select" name="gender">
    <option value="" selected>--- Choose Citizenship ---</option>
    @foreach ($genders as $gender)
    <option value="{{ $gender->title }}">{{ $gender->title }}</option>
    @endforeach
</select>
