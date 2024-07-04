<select class="form-select select2" style="width:100%; heigth:100%; display:block;" aria-placeholder="--- Choose Hobby or Activity ---" id="selectHobbyActivity" name="hobbies_activities" multiple="multiple">
    @foreach ($hobbiesactivities as $hobbyactivity)
    <option value="{{ $hobbyactivity->id }}">{{ $hobbyactivity->title }}</option>
    @endforeach
</select>
