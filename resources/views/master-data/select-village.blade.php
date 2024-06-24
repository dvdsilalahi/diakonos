<select class="form-select" id="villageId" name="village">
    <option value="" selected>--- Choose Village ---</option>
    @foreach ($admindivs as $admindiv)
        @if($admindiv->village!="")
        <option country="{{ $admindiv->country }}" province="{{ $admindiv->province }}" municipality="{{ $admindiv->municipality }}" district="{{ $admindiv->district }}" value="{{ $admindiv->village }}">{{ $admindiv->village }}</option>
        @endif
    @endforeach
</select>


