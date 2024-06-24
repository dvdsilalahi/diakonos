<select class="form-select" name="education">
    <option value="" selected>--- Choose Education ---</option>
    @foreach ($educations as $education)
    <option value="{{ $education->title }}">{{ $education->title }}</option>
    @endforeach
</select>
