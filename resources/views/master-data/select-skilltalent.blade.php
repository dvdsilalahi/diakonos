<select class="form-select select2" style="width:100%; heigth:100%; display:block;" aria-placeholder="--- Choose Skill or Talent ---" id="selectSkillTalent" name="skills_talents" multiple="multiple">
    @foreach ($skillstalents as $skilltalent)
    <option value="{{ $skilltalent->id }}">{{ $skilltalent->title }}</option>
    @endforeach
</select>
