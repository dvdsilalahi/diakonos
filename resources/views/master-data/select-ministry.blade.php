<select class="form-select" name="ministry">
    <option value="" selected>--- Choose Ministry ---</option>
    @foreach ($ministries as $ministry)
    <option value="{{ $ministry->title }}">{{ $ministry->title }}</option>
    @endforeach
</select>
