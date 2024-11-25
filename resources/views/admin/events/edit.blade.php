@extends('dashboard.layouts.main')

@section('container')
<div class="row my-3">
    <div class="col-lg-12">
        <a type="button" href="{{ url()->previous() }}" class="btn btn-link mb-3" style="text-decoration: none;"><i data-feather="arrow-left" style="width: 20px; height: 20px;"></i>Back</a>
        <h2 class="h2 px-3"><i data-feather="edit" style="width:25px; height:25px;"></i> Edit Member</h2>
    </div>
</div>
<div class="">
    <form method="POST" action="/dashboard/members/{{ $member->uuid }}" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
    <div class="flex-shrink-0 p-3">
        <ul class="list-unstyled ps-0">
        <li class="mb-1 d-grid gap-2">
            <button type="button" class="col-lg-12 btn btn-secondary rounded-0 border-dark d-inline-flex align-items-center" data-bs-toggle="collapse" data-bs-target="#profile-collapse" aria-expanded="true">
            Profile
            </button>
            <div class="col-lg-12 collapse show" id="profile-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                <li>
                    <div class="card-group">
                        <div class="card border-0">
                            <div class="card-body p-2">
                                <label for="first_name" class="form-label"><h6>First Name<h6></label>
                                <div class="d-flex">
                                    <input type="text" onkeydown="return /[a-zA-Z ]/i.test(event.key)" maxlength="50" size="50" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name"  autofocus value="{{ old('first_name', $member->first_name) }}" required autocomplete="off">
                                    @error('first_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card border-0">
                            <div class="card-body p-2">
                                <label for="last_name" class="form-label"><h6>Last Name</h6></label>
                                <div class="d-flex">
                                </div>

                                <input type="text" onkeydown="return /[a-zA-Z ]/i.test(event.key)" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name"  autofocus value="{{ old('last_name', $member->last_name) }}">
                                @error('last_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                          </div>
                        </div>
                        <div class="card border-0">
                            <div class="card-body p-2">
                                <label for="nickname" class="form-label"><h6>Nickname</h6></label>
                                <div class="d-flex">
                                </div>

                                <input type="text" onkeydown="return /[a-zA-Z ]/i.test(event.key)" class="form-control @error('nickname') is-invalid @enderror" id="nickname" name="nickname"  autofocus value="{{ old('nickname', $member->nickname) }}">
                                @error('nickname')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                          </div>
                        </div>
                      </div>
                </li>
                <li>
                    <div class="card-group">
                        <div class="card border-0">
                            <div class="card-body p-2">
                              <label for="member_code" class="form-label"><h6>Member Code</h6></label>
                              <div class="d-flex">
                            </div>

                              <input type="text" maxlength="10" size="10" class="form-control @error('member_code') is-invalid @enderror" id="member_code" name="member_code"  autofocus value="{{ old('member_code', $member->member_code) }}" >
                              @error('member_code')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                              @enderror
                            </div>
                          </div>
                        <div class="card border-0">
                          <div class="card-body p-2">
                            <label for="email" class="form-label"><h6>Email</h6></label>
                            <div class="d-flex">
                            </div>

                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"  autofocus value="{{ old('email', $member->email) }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                          </div>
                        </div>
                        <div class="card border-0">
                            <div class="card-body p-2">
                                <label for="phone_number" class="form-label"><h6>Phone Number</h6></label>
                                <div class="d-flex">
                                </div>

                                <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number"  autofocus value="{{ old('phone_number', $member->phone_number) }}" >
                                @error('phone_number')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                      </div>
                </li>
                <li>
                    <div class="card-group">
                        <div class="card border-0">
                            <div class="card-body p-2">
                                <label for="address" class="form-label"><h6>Address</h6></label>
                                <div class="d-flex">
                                </div>

                                <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address" style="height: 100px">{{ old('address', $member->address) }}</textarea>
                                @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                      </div>
                </li>
                <li>
                    <div class="card-group">
                        <div class="card border-0">
                            <div class="card-body p-2">
                                <label for="pic" class="form-label"><h6>Picture</h6></label>
                                    <input type="hidden" name="oldPic" value="{{ $member->pic }}">

                                    @if($member->pic)
                                    <img src="{{ asset('storage/'. $member->pic) }}" style="width: 10em" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                    @else
                                    <img class="img-preview img-fluid mb-3 col-sm-5">
                                    @endif
                                    <input class="form-control @error('pic') is-invalid @enderror" type="file" id="pic" name="pic" onchange="previewImage()">
                                    @error('pic')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                            </div>
                        </div>
                      </div>
                </li>
            </ul>
            </div>
        </li>
        <li class="mb-1 d-grid gap-2">
            <button type="button" class="col-lg-12 btn btn-secondary rounded-0 border-dark d-inline-flex align-items-center collapsed" data-bs-toggle="collapse" data-bs-target="#personal-collapse" aria-expanded="false">
            Personal
            </button>
            <div class="collapse" id="personal-collapse" style="">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                <li>
                    <div class="card-group">
                        <div class="card border-0">
                            <div class="card-body p-2">
                                <label for="nin" class="form-label"><h6>National ID No.</h6></label>
                                <div class="d-flex">
                                </div>

                                <input type="text" onkeydown="return /^[0-9]|Backspace+$/.test(event.key)" maxlength="16" size="16" class="form-control @error('nin') is-invalid @enderror" id="nin" name="nin"  autofocus value="{{ old('nin', $member->nin) }}">
                                @error('nin')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="card-group">
                        <div class="card border-0">
                            <div class="card-body p-2">
                                <label for="gender" class="form-label"><h6>Gender</h6></label>
                                <div class="d-flex">
                                </div>

                                <select class="form-select" name="gender">
                                    <option value="" selected>--- Choose Gender ---</option>
                                    <option value="Male" @if($member->gender==='Male') selected @endif>Male</option>
                                    <option value="Female" @if($member->gender==='Female') selected @endif>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="card border-0">
                            <div class="card-body p-2">
                                <label for="citizenship" class="form-label"><h6>Warga Negara</h6></label>
                                <div class="d-flex">
                                    <select class="form-select" name="citizenship">
                                        <option value="" selected>--- Choose Citizenship ---</option>
                                        <option value="Indonesian Citizenship" @if($member->citizenship=='Indonesian Citizenship') selected @endif>Indonesian Citizenship</option>
                                        <option value="Foreign Citizenship" @if($member->citizenship=='Foreign Citizenship') selected @endif>Foreign Citizenship</option>
                                    </select>
                                    <button type="button" class="btn btn-light pull-right" style="border-color:#d3d4d5;">
                                        <i data-feather="plus" style="width: 20px; height: 20px;"></i>
                                    </button>
                                    @error('citizenship')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="card-group">
                        <div class="card border-0">
                            <div class="card-body p-2">
                                <label for="place_of_birth" class="form-label"><h6>Place of Birth</h6></label>
                                <div class="d-flex">
                                </div>
                                <input type="text" onkeydown="return /[a-zA-Z ]/i.test(event.key)" class="form-control @error('place_of_birth') is-invalid @enderror" id="place_of_birth" name="place_of_birth"  autofocus value="{{ old('place_of_birth', $member->place_of_birth) }}">
                                @error('place_of_birth')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card border-0">
                            <div class="card-body p-2">
                                <label for="date_of_birth" class="form-label"><h6>Date of Birth</h6></label>
                                <div class="d-flex">
                                </div>
                                <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth" name="date_of_birth" autofocus value="{{ old('date_of_birth', $member->date_of_birth) }}" >
                                @error('date_of_birth')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="card-group">
                        <div class="card border-0">
                            <div class="card-body p-2">
                                <label for="education" class="form-label"><h6>Education</h6></label>
                                <div class="d-flex">
                                    <select class="form-select" name="education">
                                        <option value="" selected>--- Choose Education ---</option>
                                        <option value="Elementary School" @if($member->education=='Elementary School') selected @endif>Elementary School</option>
                                        <option value="Junior High School" @if($member->education=='Junior High School') selected @endif>Junior High School</option>
                                        <option value="Senior High School" @if($member->education=='Senior High School') selected @endif>Senior High School</option>
                                        <option value="Bachelor Degree" @if($member->education=='Bachelor Degree') selected @endif>Bachelor Degree</option>
                                        <option value="Master Degree" @if($member->education=='Master Degree') selected @endif>Master Degree</option>
                                        <option value="Doctoral Degree" @if($member->education=='Doctoral Degree') selected @endif>Doctoral Degree</option>
                                </select>
                                <button type="button" class="btn btn-light pull-right" style="border-color:#d3d4d5;">
                                    <i data-feather="plus" style="width: 20px; height: 20px;"></i>
                                </button>
                                  @error('education')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                                  @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card border-0">
                            <div class="card-body p-2">
                                <label for="profession" class="form-label"><h6>Profession</h6></label>
                                <div class="d-flex">
                                    <select class="form-select" name="profession">
                                        <option value="" selected>--- Choose Profession ---</option>
                                        <option value="Civil Affairs Steward" @if($member->profession=='Civil Affairs Steward') selected @endif>Civil Affairs Steward</option>
                                        <option value="Private Entrepreneur" @if($member->profession=='Private Entrepreneur') selected @endif>Private Entrepreneur</option>
                                        <option value="Private Employee" @if($member->profession=='Private Employee') selected @endif>Private Employee</option>
                                        <option value="College Student" @if($member->profession=='College Student') selected @endif>College Student</option>
                                        <option value="Student" @if($member->profession=='Student') selected @endif>Student</option>
                                        <option value="Soldier/Police" @if($member->profession=='Soldier/Police') selected @endif>Soldier/Police</option>
                                        <option value="Farmer" @if($member->profession=='Farmer') selected @endif>Farmer</option>
                                        <option value="Laborer" @if($member->profession=='Laborer') selected @endif>Laborer</option>
                                        <option value="Pensioner" @if($member->profession=='Pensioner') selected @endif>Pensioner</option>
                                        <option value="Housewife" @if($member->profession=='Housewife') selected @endif>Housewife</option>
                                    </select>
                                    <button type="button" class="btn btn-light pull-right" style="border-color:#d3d4d5;">
                                        <i data-feather="plus" style="width: 20px; height: 20px;"></i>
                                    </button>
                                    @error('profession')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            </div>
        </li>
        <li class="mb-1  d-grid gap-2">
            <button type="button" class="col-lg-12 btn btn-secondary rounded-0 border-dark d-inline-flex align-items-center collapsed" data-bs-toggle="collapse" data-bs-target="#family-collapse" aria-expanded="false">
            Family
            </button>
            <div class="collapse" id="family-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                <li>
                    <div class="card-group">
                        <div class="card border-0">
                            <div class="card-body p-2">
                                <label for="fr_no" class="form-label"><h6>Family Register No.</h6></label>
                                <div class="d-flex">
                                <input type="text"  onkeydown="return /^[0-9]|Backspace+$/.test(event.key)" maxlength="16" size="16" class="form-control @error('fr_no') is-invalid @enderror" id="fr_no" name="fr_no"  autofocus value="{{ old('fr_no', $member->fr_no) }}" >
                                @error('fr_no')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="card-group">
                        <div class="card border-0">
                            <div class="card-body p-2">
                                <label for="fam_relation" class="form-label"><h6>Family Relation</h6></label>
                                <div class="d-flex">
                                <select class="form-select" name="fam_relation">
                                        <option value="" selected>--- Choose Family Relation ---</option>
                                        <option value="Head" @if($member->fam_relation=='Head') selected @endif>Head</option>
                                        <option value="Wife" @if($member->fam_relation=='Wife') selected @endif>Wife</option>
                                        <option value="Child" @if($member->fam_relation=='Child') selected @endif>Child</option>
                                        <option value="Parent" @if($member->fam_relation=='Parent') selected @endif>Parent</option>
                                        <option value="Child in-law" @if($member->fam_relation=='Child in-law') selected @endif>Child in-law</option>
                                        <option value="Parent in-law" @if($member->fam_relation=='Parent in-law') selected @endif>Parent in-law</option>
                                        <option value="Other Family" @if($member->fam_relation=='Other Family') selected @endif>Other Family</option>
                                        <option value="Others" @if($member->fam_relation=='Others') selected @endif>Others</option>
                                </select>
                                <button type="button" class="btn btn-light pull-right" style="border-color:#d3d4d5;">
                                    <i data-feather="plus" style="width: 20px; height: 20px;"></i>
                                </button>
                                    @error('education')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="card-group">
                        <div class="card border-0">
                            <div class="card-body p-2">
                                <label for="father_name" class="form-label"><h6>Father&#39s Name</h6></label>
                                <div class="d-flex">
                                    <input type="text" onkeydown="return /[a-zA-Z ]/i.test(event.key)" class="form-control @error('father_name') is-invalid @enderror" id="father_name" name="father_name"  autofocus value="{{ old('father_name', $member->father_name) }}">
                                    @error('father_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card border-0">
                            <div class="card-body p-2">
                                <label for="mother_name" class="form-label"><h6>Mother&#39s</h6></label>
                                <div class="d-flex">
                                    <input type="text" onkeydown="return /[a-zA-Z ]/i.test(event.key)" class="form-control @error('mother_name') is-invalid @enderror" id="mother_name" name="mother_name"  autofocus value="{{ old('mother_name', $member->mother_name) }}">
                                    @error('mother_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            </div>
        </li>
        <li class="mb-1 d-grid gap-2">
            <button type="button" class="col-lg-12 btn btn-secondary rounded-0 border-dark d-inline-flex align-items-center collapsed" data-bs-toggle="collapse" data-bs-target="#ministry-collapse" aria-expanded="false">
            Ministry
            </button>
            <div class="collapse" id="ministry-collapse" style="">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                <li>
                    <span>Not available now</span>
                </li>
            </ul>
        </li>
        <li class="mb-1 d-grid gap-2">
            <button type="button" class="col-lg-12 btn btn-secondary rounded-0 border-dark d-inline-flex align-items-center collapsed" data-bs-toggle="collapse" data-bs-target="#personality-collapse" aria-expanded="false">
            Personality
            </button>
            <div class="collapse" id="personality-collapse" style="">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                <li>
                    <span>Not available now</span>
                </li>
            </ul>
        </li>
        <li class="mb-1 d-grid gap-2">
            <button type="button" class="col-lg-12 btn btn-secondary rounded-0 border-dark d-inline-flex align-items-center collapsed" data-bs-toggle="collapse" data-bs-target="#history-collapse" aria-expanded="false">
            History
            </button>
            <div class="collapse" id="history-collapse" style="">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                <li>
                    <span>Not available now</span>
                </li>
            </ul>
        </li>
        <li class="mb-1 mt-4 d-grid gap-2">
            <div class="row justify-content-center">
                <button type="submit" class="col-lg-2 col-md-4 col-sm-6 btn btn-primary">Save</button>
            </div>
        </li>
        </ul>
    </div>
    </form>
</div>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    function previewImage (){
        const image = document.querySelector('#pic');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
<script>
  //--Phone number validation
  const inputElement = document.getElementById('phone_number');
  inputElement.addEventListener('keyup', function () {
    // Replace any non-numeric characters with an empty string
    this.value = this.value.replace(/[^0-9+\- ]/g, '');

    if (this.value.length == 1) {
        const modifiedValue = '+62 ' + this.value.slice(6) ;
        this.value = modifiedValue;
    }

    if (this.value.length == 7) {
        const modifiedValue = this.value.slice(0, 7) + '-' + this.value.slice(7) ;
        this.value = modifiedValue;
    }

    if (this.value.length == 12) {
        const modifiedValue = this.value.slice(0, 12) + '-' + this.value.slice(12) ;
        this.value = modifiedValue;
    }

  });

</script>

@endsection

