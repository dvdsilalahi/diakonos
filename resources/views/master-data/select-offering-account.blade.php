<select class="form-select select2" style="width:100%; heigth:100%; display:block;" aria-placeholder="--- Choose Offering Accounts ---" id="selectOfferingAccount" name="offering_accounts[]" multiple="multiple">
    @foreach ($accounts as $account)
        @isset($old)
        <option value="{{ $account->id }}" {{ (collect(old('offering_accounts'))->contains( $account->id )) ? 'selected':'' }}>{{ $account->account_name }}</option>
        @else
            @isset($eventTemplate)
                <option value="{{ $account->id }}" {{ (collect($eventTemplate['offering_accounts']['items'])->contains( $account->id )) ? 'selected':'' }}>{{ $account->account_name }}</option>
            @else
                <option value="{{ $account->id }}">{{ $account->account_name }}</option>
            @endisset
        @endisset
    @endforeach
</select>
