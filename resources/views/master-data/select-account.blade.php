<select class="form-select select2" style="width:100%; display:block;" aria-placeholder="--- Choose Account ---" id="selectAccount" name="account">
    <option value="" selected></option>
    @foreach ($accounts as $account)
    <option value="{{ $account->id }}">{{ $account->name }}</option>
    @endforeach
</select>
