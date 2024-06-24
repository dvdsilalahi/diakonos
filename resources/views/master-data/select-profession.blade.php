<select class="form-select" name="profession">
    <option value="" selected>--- Choose Profession ---</option>
    @foreach ($professions as $profession)
    <option value="{{ $profession->title }}">{{ $profession->title }}</option>
    @endforeach
</select>
