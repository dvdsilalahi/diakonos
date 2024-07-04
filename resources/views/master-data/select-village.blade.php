<select class="form-select select2" style="width:100%; heigth:100%; display:block;" aria-placeholder="--- Choose Village ---" id="selectVillage" name="village">
    <option value="" selected></option>
    @foreach ($admindivs as $admindiv)
        @if($admindiv->village!="")
        <option country="{{ $admindiv->country }}" province="{{ $admindiv->province }}" municipality="{{ $admindiv->municipality }}" district="{{ $admindiv->district }}" value="{{ $admindiv->id }}">{{ $admindiv->village }}</option>
        @endif
    @endforeach
</select>


