<select class="form-select select2" style="width:100%; heigth:100%; display:block;" aria-placeholder="--- Choose Blood Type ---" id="selectBloodType" name="fr_bloodtype">
    <option value="" selected></option>
    @foreach ($bloodtypes as $bloodtype)
    <option value="{{ $bloodtype->id }}">{{ $bloodtype->title }}</option>
    @endforeach
</select>
