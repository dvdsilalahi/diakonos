<select class="form-select" name="fr_bloodtype">
    <option value="" selected>--- Choose Blood Type ---</option>
    @foreach ($bloodtypes as $bloodtype)
    <option value="{{ $bloodtype->title }}">{{ $bloodtype->title }}</option>
    @endforeach
</select>
