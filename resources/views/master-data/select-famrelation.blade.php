<select class="form-select select2" style="width:100%; heigth:100%; display:block;" aria-placeholder="--- Choose Family Relation ---" id="selectFamRelation" name="fam_relation">
    <option value="" selected>--- Choose Family Relation ---</option>
    @foreach ($famrelations as $famrelation)
    <option value="{{ $famrelation->title }}">{{ $famrelation->title }}</option>
    @endforeach
</select>
