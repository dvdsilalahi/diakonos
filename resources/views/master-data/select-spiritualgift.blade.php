<select class="form-select select2" style="width:100%; heigth:100%; display:block;" aria-placeholder="--- Choose Spiritual Gift ---" id="selectSpiritualGift" name="spiritualgift" multiple="multiple">
    @foreach ($spiritualgifts as $spiritualgift)
    <option value="{{ $spiritualgift->id }}">{{ $spiritualgift->title }}</option>
    @endforeach
</select>
