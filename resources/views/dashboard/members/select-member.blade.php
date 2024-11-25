<select class="form-select select2" style="width:100%; display:block;" aria-placeholder="--- Choose Member ---" id="selectMember">
    <option value="" selected></option>
    @foreach ($members as $member)
    <option value="{{ $member->id }}">{{ $member->title }}</option>
    @endforeach
</select>
