<select class="form-select" name="spiritualgift">
    <option value="" selected>--- Choose Ministry ---</option>
    @foreach ($spiritualgifts as $spiritualgift)
    <option value="{{ $spiritualgift->title }}">{{ $spiritualgift->title }}</option>
    @endforeach
</select>
