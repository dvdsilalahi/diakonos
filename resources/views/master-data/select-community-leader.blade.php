    @foreach ($leaders as $leader)
            @isset($old)
                <option value="{{ $leader->id }}" {{ (collect(old('leader'))->contains( $leader->id )) ? 'selected':'' }}>{{ $leader->first_name . ' ' . $leader->last_name }}</option>
            @else
                @isset($community)
                    <option value="{{ $leader->id }}" {{ (collect($community['leaders']['items'])->contains( $leader->id )) ? 'selected':'' }}>{{ $leader->first_name . ' ' . $leader->last_name }}</option>
                @else
                    <option value="{{ $leader->id }}">{{ $leader->first_name . ' ' . $leader->last_name }}</option>
                @endisset
            @endisset
    @endforeach
