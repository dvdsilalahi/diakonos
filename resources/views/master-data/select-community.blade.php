<select class="form-select select2" style="width:100%; heigth:100%; display:block;" aria-placeholder="--- Choose One or More Community ---" id="selectCommunity" name="communities" multiple="multiple">
    @foreach ($communities as $community)
    <option value="{{ $community->id }}">{{ $community->category . ' ' . $community->segment . ' - '. $community->area }}</option>
    @endforeach
</select>
