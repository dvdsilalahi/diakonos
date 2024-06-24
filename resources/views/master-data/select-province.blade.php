<select class="form-select" name="citizenship">
    <option value="" selected>--- Choose Citizenship ---</option>
    @foreach ($citizenships as $citizenship)
    <option value="{{ $citizenship->title }}">{{ $citizenship->title }}</option>
    @endforeach
</select>
