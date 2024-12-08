    @foreach ($eventcommunities as $eventcommunity)
    <option value="{{ $eventcommunity->id }}">{{ $eventcommunity->name }}</option>
    @endforeach
