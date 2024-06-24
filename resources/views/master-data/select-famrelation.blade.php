<select class="form-select" name="fam_relation">
    <option value="" selected>--- Choose Family Relation ---</option>
    @foreach ($famrelations as $famrelation)
    <option value="{{ $famrelation->title }}">{{ $famrelation->title }}</option>
    @endforeach
</select>
