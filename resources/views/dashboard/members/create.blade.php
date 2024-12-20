@extends('dashboard.layouts.main')

@section('container')
<div class="row my-3">
    <div class="col-lg-12">
        <a type="button" href="{{ url()->previous() }}" class="btn btn-link mb-3" style="text-decoration: none;"><i data-feather="arrow-left" style="width: 20px; height: 20px;"></i>Back</a>
        <h2 class="h2 px-3">Create New Member</h2>
    </div>
</div>

<div class="row my-3">
    <form method="POST" action="/dashboard/members" class="mb-5" enctype="multipart/form-data">
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
                                    <input type="text" onkeydown="return /[a-zA-Z ]/i.test(event.key)" maxlength="50" size="50" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name"  autofocus value="{{ old('first_name') }}" required autocomplete="off">
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
                                    <input type="text" onkeydown="return /[a-zA-Z ]/i.test(event.key)" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name"  autofocus value="{{ old('last_name') }}">
                                    @error('last_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                          </div>
                        </div>
                        <div class="card border-0">
                            <div class="card-body p-2">
                                <label for="nickname" class="form-label"><h6>Nickname</h6></label>
                                <div class="d-flex">
                                    <input type="text" onkeydown="return /[a-zA-Z ]/i.test(event.key)" class="form-control @error('nickname') is-invalid @enderror" id="nickname" name="nickname"  autofocus value="{{ old('nickname') }}">
                                    @error('nickname')
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
                              <label for="member_code" class="form-label"><h6>Member Code</h6></label>
                              <div class="d-flex">
                                <input type="text" maxlength="10" size="10" class="form-control @error('member_code') is-invalid @enderror" id="member_code" name="member_code"  autofocus value="{{ old('member_code') }}" >
                                @error('member_code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                              </div>
                            </div>
                          </div>
                        <div class="card border-0">
                          <div class="card-body p-2">
                            <label for="email" class="form-label"><h6>Email</h6></label>
                            <div class="d-flex">
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"  autofocus value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                          </div>
                        </div>
                        <div class="card border-0">
                            <div class="card-body p-2">
                                <label for="phone_number" class="form-label"><h6>Phone Number</h6></label>
                                <div class="d-flex">
                                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number"  autofocus value="{{ old('phone_number') }}" >
                                    @error('phone_number')
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
                                <label for="address" class="form-label"><h6>Address</h6></label>
                                <div class="d-flex">
                                    <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address" style="height: 100px" value="{{ old('address') }}"></textarea>
                                    @error('address')
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
                            <div class="card-group">
                                <div class="card border-0">
                                    <div class="card-body p-2">
                                        <label for="member_code" class="form-label"><h6>Neighbourhood</h6></label>
                                        <div class="d-flex">
                                          <input type="text" maxlength="10" size="10" class="form-control @error('member_code') is-invalid @enderror" id="member_code" name="member_code"  autofocus value="{{ old('member_code') }}" >
                                          @error('member_code')
                                              <div class="invalid-feedback">
                                                  {{ $message }}
                                              </div>
                                          @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card border-0">
                                    <div class="card-body p-2">
                                        <label for="member_code" class="form-label"><h6>Hamlet</h6></label>
                                        <div class="d-flex">
                                          <input type="text" maxlength="10" size="10" class="form-control @error('member_code') is-invalid @enderror" id="member_code" name="member_code"  autofocus value="{{ old('member_code') }}" >
                                          @error('member_code')
                                              <div class="invalid-feedback">
                                                  {{ $message }}
                                              </div>
                                          @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card border-0">
                          <div class="card-body p-2">
                            <label for="admindiv" class="form-label"><h6>Village</h6></label>
                            <div class="d-flex">
                                <div class="select-village col-md-10">
                                    @include('master-data.select-village')
                                </div>
                                <button type="button" class="border-0" data-bs-uuid="" data-bs-name="" data-bs-toggle="modal" data-bs-target="#admindivModal">
                                    <span style="width:25px;height:25px;" data-feather="info"></span>
                                </button>
                                @error('village')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                          </div>
                        </div>
                        <div class="card border-0">
                            <div class="card-body p-2">
                                <label for="district" class="form-label"><h6>District</h6></label>
                                <div class="d-flex">
                                    <input type="text" class="form-control @error('district') is-invalid @enderror" id="district" name="district"  autofocus value="{{ old('district') }}" >
                                    @error('district')
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
                              <label for="municipality" class="form-label"><h6>Municipality</h6></label>
                              <div class="d-flex">
                                <input type="text" maxlength="10" size="10" class="form-control @error('municipality') is-invalid @enderror" id="municipality" name="municipality"  autofocus value="{{ old('municipality') }}" >
                                @error('municipality')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                              </div>
                            </div>
                          </div>
                        <div class="card border-0">
                          <div class="card-body p-2">
                            <label for="province" class="form-label"><h6>Province</h6></label>
                            <div class="d-flex">
                                <input type="text" class="form-control @error('province') is-invalid @enderror" id="province" name="province"  autofocus value="{{ old('province') }}">
                                @error('province')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                          </div>
                        </div>
                        <div class="card border-0">
                            <div class="card-body p-2">
                                <label for="country" class="form-label"><h6>Country</h6></label>
                                <div class="d-flex">
                                    <input type="text" class="form-control @error('country') is-invalid @enderror" id="country" name="country"  autofocus value="{{ old('country') }}" >
                                    @error('country')
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
                                <label for="pic" class="form-label"><h6>Picture</h6></label>
                                <img style="width: 10em" class="img-preview img-fluid mb-3 col-sm-5">
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
                                    <input type="text" onkeydown="return /^[0-9]|Backspace+$/.test(event.key)" maxlength="16" size="16" class="form-control @error('nin') is-invalid @enderror" id="nin" name="nin"  autofocus value="{{ old('nin') }}">
                                    @error('nin')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card border-0">
                            <div class="card-body p-2">
                                <label for="gender" class="form-label"><h6>Gender</h6></label>
                                <div class="d-flex">
{{--                                      <input id="selectGender" class="form-control select-input" data-input="{{ $genders->pluck('title')->implode(',') }}" placeholder="--- Choose gender ---" />
  --}}                              <div class="select-gender col-md-10">
                                        @include('master-data.select-gender')
                                    </div>

                                    <button type="button" class="border-0" data-bs-uuid="" data-bs-name="" data-bs-toggle="modal" data-bs-target="#genderModal">
                                        <span style="width:25px;height:25px;" data-feather="info"></span>
                                    </button>
                                    @error('gender')
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
                                <label for="bloodtype" class="form-label"><h6>Blood Type</h6></label>
                                <div class="d-flex">
{{--                                      <input id="selectBloodType" class="form-control select-input" data-input="{{ $bloodtypes->pluck('title')->implode(',') }}" name='blood_type' placeholder="--- Choose blood type ---" />
  --}}
                                    <div class="select-bloodtype col-md-10">
                                        @include('master-data.select-bloodtype')
                                    </div>
                                    <button type="button" class="border-0" data-bs-uuid="" data-bs-name="" data-bs-toggle="modal" data-bs-target="#bloodtypeModal">
                                        <span style="width:25px;height:25px;" data-feather="info"></span>
                                    </button>
                                    @error('blood_type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>                            </div>
                        </div>
                        <div class="card border-0">
                            <div class="card-body p-2">
                                <label for="citizenship" class="form-label"><h6>Citizenship</h6></label>
                                <div class="d-flex">
{{--                                      <input id="selectCitizenship" class="form-control select-input" data-input="{{ $citizenships->pluck('title')->implode(',') }}" name='citizenship' placeholder="--- Choose citizenship ---" />
  --}}
                                        <div class="select-citizenship col-md-10">
                                            @include('master-data.select-citizenship')
                                        </div>
                                        <button type="button" class="border-0" data-bs-uuid="" data-bs-name="" data-bs-toggle="modal" data-bs-target="#citizenshipModal">
                                        <span style="width:25px;height:25px;" data-feather="info"></span>
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
                                    <input type="text" onkeydown="return /[a-zA-Z ]/i.test(event.key)" class="form-control @error('place_of_birth') is-invalid @enderror" id="place_of_birth" name="place_of_birth"  autofocus value="{{ old('place_of_birth') }}">
                                    @error('place_of_birth')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card border-0">
                            <div class="card-body p-2">
                                <label for="date_of_birth" class="form-label"><h6>Date of Birth</h6></label>
                                <div class="d-flex">
                                    <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth" name="date_of_birth"  autofocus value="{{ old('date_of_birth') }}" >
                                    @error('date_of_birth')
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
                                <label for="education" class="form-label"><h6>Education</h6></label>
                                <div class="d-flex">
{{--                                      <input id="selectEducation" class="form-control select-input" data-input="{{ $educations->pluck('title')->implode(',') }}" name='education' placeholder="--- Choose education ---" />
  --}}
                                <div class="select-education col-md-10">
                                    @include('master-data.select-education')
                                </div>

                                <button type="button" class="border-0" data-bs-uuid="" data-bs-name="" data-bs-toggle="modal" data-bs-target="#educationModal">
                                        <span style="width:25px;height:25px;" data-feather="info"></span>
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
 {{--                                     <input id="selectProfession" class="form-control select-input" data-input="{{ $professions->pluck('title')->implode(',') }}" name='profession' placeholder="--- Choose profession ---" />
   --}}
                                    <div class="select-profession col-md-10">
                                        @include('master-data.select-profession')
                                    </div>

                                    <button type="button" class="border-0" data-bs-uuid="" data-bs-name="" data-bs-toggle="modal" data-bs-target="#professionModal">
                                        <span style="width:25px;height:25px;" data-feather="info"></span>
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
                                <label for="fr_no" class="form-label"><h6>Family Register No.</h6>(<i>Spouse and Child wil be related for the same Family Register No.</i>)</label>
                                <div class="d-flex">
                                    <input type="text"  onkeydown="return /^[0-9]|Backspace+$/.test(event.key)" maxlength="16" size="16" class="form-control @error('fr_no') is-invalid @enderror" id="fr_no" name="fr_no"  autofocus value="{{ old('fr_no') }}" >
                                    @error('fr_no')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card border-0">
                            <div class="card-body p-2">
                                <label for="fam_relation" class="form-label"><h6>Family Relation</h6><br></label>
                                <div class="d-flex">
{{--                                      <input id="selectFamilyRelation" class="form-control select-input" data-input="{{ $famrelations->pluck('title')->implode(',') }}" name='fam_relation' placeholder="--- Choose family relation ---" />
  --}}
                                    <div class="select-famrelation col-md-10">
                                        @include('master-data.select-famrelation')
                                    </div>

                                    <button type="button" class="border-0" data-bs-uuid="" data-bs-name="" data-bs-toggle="modal" data-bs-target="#famrelationModal">
                                        <span style="width:25px;height:25px;" data-feather="info"></span>
                                    </button>
                                    @error('famrelation')
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
                                <label for="father_name" class="form-label"><h6>Father&#39s Name</h6>(<i>Only for head of household and wife</i>)</label>
                                <div class="d-flex">
                                    <input type="text" onkeydown="return /[a-zA-Z ]/i.test(event.key)" class="form-control @error('father_name') is-invalid @enderror" id="father_name" name="father_name"  autofocus value="{{ old('father_name') }}">
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
                                <label for="mother_name" class="form-label"><h6>Mother&#39s</h6>(<i>Only for head of household and wife</i>)</label>
                                <div class="d-flex">
                                    <input type="text" onkeydown="return /[a-zA-Z ]/i.test(event.key)" class="form-control @error('mother_name') is-invalid @enderror" id="mother_name" name="mother_name"  autofocus value="{{ old('mother_name') }}">
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
                    <div class="card-group">
                        <div class="card border-0">
                            <div class="card-body p-2">
                                <label for="ministry" class="form-label"><h6>Ministry</h6></label>
                                <div class="d-flex">
{{--                                      <input name="ministries" id="Ministry" class="form-control tags-input" data-input="DEACON,PASTOR,TEACHER,EVANGELIST" placeholder="Type a ministry" value="" data-blacklist="" writingsuggestions="false">
  --}}
                                    <div class="select-ministry col-md-10">
                                        @include('master-data.select-ministry')
                                    </div>

                                    <button type="button" class="border-0" data-bs-uuid="" data-bs-name="" data-bs-toggle="modal" data-bs-target="#ministryModal">
                                        <span style="width:25px;height:25px;" data-feather="info"></span>
                                    </button>
                                    @error('ministries')
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
                                <label for="spritual_gifts" class="form-label"><h6>Spiritual Gifts</h6></label>
                                <div class="d-flex">
{{--                                      <input type="text" class="form-control tags-input" id="SpiritualGift" name="spiritual_gifts"  data-input="TEACHING,PROPHECY,EXHORTATION,MERCY,GIVING,LEADERSHIP,SERVICE" placeholder="Type a ministry" value="" data-blacklist="" writingsuggestions="false">
  --}}
                                    <div class="select-spiritualgift col-md-10">
                                        @include('master-data.select-spiritualgift')
                                    </div>

                                    <button type="button" class="border-0" data-bs-uuid="" data-bs-name="" data-bs-toggle="modal" data-bs-target="#spiritualGiftModal">
                                        <span style="width:25px;height:25px;" data-feather="info"></span>
                                    </button>
                                    @error('spiritual_gifts')
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
                                <label for="communities" class="form-label"><h6>Communities</h6></label>
                                <div class="d-flex">
{{--                                      <input type="text" class="form-control tags-input" id="Community" name="communities"  data-input="Komsel Kamjet-Anak,Komsel Kamjet-Pemuda,Komsel Kamjet-Ortu" placeholder="Type a ministry" value="" data-blacklist="" writingsuggestions="false">
  --}}
                                <div class="select-community col-md-10">
                                    @include('master-data.select-community')
                                </div>
                                <button type="button" class="border-0" data-bs-uuid="" data-bs-name="" data-bs-toggle="modal" data-bs-target="#communityModal">
                                    <span style="width:25px;height:25px;" data-feather="info"></span>
                                </button>
                                @error('communities')
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
        </li>
        <li class="mb-1 d-grid gap-2">
            <button type="button" class="col-lg-12 btn btn-secondary rounded-0 border-dark d-inline-flex align-items-center collapsed" data-bs-toggle="collapse" data-bs-target="#personality-collapse" aria-expanded="false">
            Personality
            </button>
            <div class="collapse" id="personality-collapse" style="">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                <li>
                    <div class="card-group">
                        <div class="card border-0">
                            <div class="card-body p-2">
                                <label for="personality_types" class="form-label"><h6>Personality Types</h6></label>
                                <div class="d-flex">
{{--                                      <input type="text" class="form-control tags-input" id="PersonalityType" name="personality_types"  data-input="DOMINAN, INTIM, CERMAT, STABIL" placeholder="Type a ministry" value="" data-blacklist="" writingsuggestions="false">
  --}}
                                    <div class="select-personalitytype col-md-10">
                                        @include('master-data.select-personalitytype')
                                    </div>

                                    <button type="button" class="border-0" data-bs-uuid="" data-bs-name="" data-bs-toggle="modal" data-bs-target="#personalityTypeModal">
                                        <span style="width:25px;height:25px;" data-feather="info"></span>
                                    </button>
                                    @error('personalitytypes')
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
                                <label for="skills_talents" class="form-label"><h6>Skills and Talents</h6></label>
                                <div class="d-flex">
{{--                                      <input type="text" class="form-control tags-input" id="SkillTalent" name="skills_talents"  data-input="painting,composing music,knitting,leather-working" placeholder="Type a ministry" value="" data-blacklist="" writingsuggestions="false">
  --}}
                                    <div class="select-skilltalent col-md-10">
                                        @include('master-data.select-skilltalent')
                                    </div>
                                    <button type="button" class="border-0" data-bs-uuid="" data-bs-name="" data-bs-toggle="modal" data-bs-target="#skillTalentModal">
                                        <span style="width:25px;height:25px;" data-feather="info"></span>
                                    </button>
                                    @error('skillstalents')
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
                                <label for="hobbies" class="form-label"><h6>Hobbies and Activities</h6></label>
                                <div class="d-flex">
{{--                                      <input type="text" class="form-control tags-input" id="HobbyActivity" name="hobbies_activities"  data-input="basketball,golf,running,walking" placeholder="Type a ministry" value="" data-blacklist="" writingsuggestions="false">
  --}}
                                <div class="select-hobbyactivity col-md-10">
                                    @include('master-data.select-hobbyactivity')
                                </div>

                                <button type="button" class="border-0" data-bs-uuid="" data-bs-name="" data-bs-toggle="modal" data-bs-target="#hobbyActivityModal">
                                    <span style="width:25px;height:25px;" data-feather="info"></span>
                                </button>
                                @error('hobbiesactivities')
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
                <button type="submit" class="col-lg-2 col-md-4 col-sm-6 btn btn-primary">Add Member</button>
            </div>
        </li>
        </ul>
    </div>
    </form>
</div>

<!-- Modal: Table Administrative Division -->
<div class="modal fade" id="admindivModal" tabindex="-1" role="dialog" aria-labelledby="admindivModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="formAdminDiv" method="POST" action="/admin/admindivs" class="mb-5">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="admindivModalLabel"><span style="width:25px;height:25px;" data-feather="info"></span> Administrative Division
                    <button type="button" onclick="refreshTableAdminDiv()" class="btn btn-light"><span style="width:20px;height:20px;" data-feather="refresh-ccw"></span></button>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @method('post')
            @csrf
            <div class="modal-body border-0">
                <div class="table-responsive table-admindiv overflow-x col-lg-12">
                    @include('master-data.table-admindiv')
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" onclick="deleteRow('tableAdminDiv',active_selRow)" class="btn btn-danger"><span style="width:20px;height:20px;" data-feather="trash"></span> Delete</button>
                <button type="button" onclick="insertRow('tableAdminDiv',active_selRow)" class="btn btn-primary"><span style="width:20px;height:20px;" data-feather="plus"></span> Add</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><span style="width:20px;height:20px;" data-feather="x"></span> Close</button>
                <button type="button" onclick="postMdAdminDiv()" class="btn btn-dark"><span style="width:20px;height:20px;" data-feather="save"></span> Save</button>
            </div>
        </div>
      </form>
  </div>
</div>
<!-- Modal: Table Citizenship -->
<div class="modal fade" id="citizenshipModal" tabindex="-1" role="dialog" aria-labelledby="citizenshipModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="formCitizenship" method="POST" action="/admin/citizenships" class="mb-5">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="citizenshipModalLabel"><span style="width:25px;height:25px;" data-feather="info"></span> Citizenship
                    <button type="button" onclick="refreshTableCitizenship()" class="btn btn-light"><span style="width:20px;height:20px;" data-feather="refresh-ccw"></span></button>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @method('post')
            @csrf
            <div class="modal-body border-0">
                <div class="table-responsive table-citizenship overflow-x col-lg-12">
                    @include('master-data.table-citizenship')
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" onclick="deleteRow('tableCitizenship',active_selRow)" class="btn btn-danger"><span style="width:20px;height:20px;" data-feather="trash"></span> Delete</button>
                <button type="button" onclick="insertRow('tableCitizenship',active_selRow)" class="btn btn-primary"><span style="width:20px;height:20px;" data-feather="plus"></span> Add</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><span style="width:20px;height:20px;" data-feather="x"></span> Close</button>
                <button type="button" onclick="postMdCitizenship()" class="btn btn-dark"><span style="width:20px;height:20px;" data-feather="save"></span> Save</button>
            </div>
        </div>
      </form>
  </div>
</div>

<!-- Modal: Table Blood Type -->
<div class="modal fade" id="bloodtypeModal" tabindex="-1" role="dialog" aria-labelledby="bloodtypeModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="formBloodType" method="POST" action="/admin/bloodtypes" class="mb-5">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bloodtypeModalLabel"><span style="width:25px;height:25px;" data-feather="info"></span> Blood Type
                    <button type="button" onclick="refreshTableBloodType()" class="btn btn-light"><span style="width:20px;height:20px;" data-feather="refresh-ccw"></span></button>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @method('post')
            @csrf
            <div class="modal-body border-0">
                <div class="table-responsive table-bloodtype overflow-x col-lg-12">
                    @include('master-data.table-bloodtype')
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" onclick="deleteRow('tableBloodType',active_selRow)" class="btn btn-danger"><span style="width:20px;height:20px;" data-feather="trash"></span> Delete</button>
                <button type="button" onclick="insertRow('tableBloodType',active_selRow)" class="btn btn-primary"><span style="width:20px;height:20px;" data-feather="plus"></span> Add</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><span style="width:20px;height:20px;" data-feather="x"></span> Close</button>
                <button type="button" onclick="postMdBloodType()" class="btn btn-dark"><span style="width:20px;height:20px;" data-feather="save"></span> Save</button>
            </div>
        </div>
      </form>
  </div>
</div>

<!-- Modal: Table Education -->
<div class="modal fade" id="educationModal" tabindex="-1" role="dialog" aria-labelledby="educationModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="formEducation" method="POST" action="/admin/educations" class="mb-5">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="educationModalLabel"><span style="width:25px;height:25px;" data-feather="info"></span> Education
                    <button type="button" onclick="refreshTableEducation()" class="btn btn-light"><span style="width:20px;height:20px;" data-feather="refresh-ccw"></span></button>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @method('post')
            @csrf
            <div class="modal-body border-0">
                <div class="table-responsive table-education overflow-x col-lg-12">
                    @include('master-data.table-education')
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" onclick="deleteRow('tableEducation',active_selRow)" class="btn btn-danger"><span style="width:20px;height:20px;" data-feather="trash"></span> Delete</button>
                <button type="button" onclick="insertRow('tableEducation',active_selRow)" class="btn btn-primary"><span style="width:20px;height:20px;" data-feather="plus"></span> Add</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><span style="width:20px;height:20px;" data-feather="x"></span> Close</button>
                <button type="button" onclick="postMdEducation()" class="btn btn-dark"><span style="width:20px;height:20px;" data-feather="save"></span> Save</button>
            </div>
        </div>
      </form>
  </div>
</div>

<!-- Modal: Table Profession -->
<div class="modal fade" id="professionModal" tabindex="-1" role="dialog" aria-labelledby="professionModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="formProfession" method="POST" action="/admin/professions" class="mb-5">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="professionModalLabel"><span style="width:25px;height:25px;" data-feather="info"></span> Profession
                    <button type="button" onclick="refreshTableProfession()" class="btn btn-light"><span style="width:20px;height:20px;" data-feather="refresh-ccw"></span></button>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @method('post')
            @csrf
            <div class="modal-body border-0">
                <div class="table-responsive table-profession overflow-x col-lg-12">
                    @include('master-data.table-profession')
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" onclick="deleteRow('tableProfession',active_selRow)" class="btn btn-danger"><span style="width:20px;height:20px;" data-feather="trash"></span> Delete</button>
                <button type="button" onclick="insertRow('tableProfession',active_selRow)" class="btn btn-primary"><span style="width:20px;height:20px;" data-feather="plus"></span> Add</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><span style="width:20px;height:20px;" data-feather="x"></span> Close</button>
                <button type="button" onclick="postMdProfession()" class="btn btn-dark"><span style="width:20px;height:20px;" data-feather="save"></span> Save</button>
            </div>
        </div>
      </form>
  </div>
</div>

<!-- Modal: Table Family Relation -->
<div class="modal fade" id="famrelationModal" tabindex="-1" role="dialog" aria-labelledby="famrelationModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="formFamilyRelation" method="POST" action="/admin/famrelations" class="mb-5">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="famrelationModalLabel"><span style="width:25px;height:25px;" data-feather="info"></span> Family Relation
                    <button type="button" onclick="refreshTableFamilyRelation()" class="btn btn-light"><span style="width:20px;height:20px;" data-feather="refresh-ccw"></span></button>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @method('post')
            @csrf
            <div class="modal-body border-0">
                <div class="table-responsive table-famrelation overflow-x col-lg-12">
                    @include('master-data.table-famrelation')
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" onclick="deleteRow('tableFamilyRelation',active_selRow)" class="btn btn-danger"><span style="width:20px;height:20px;" data-feather="trash"></span> Delete</button>
                <button type="button" onclick="insertRow('tableFamilyRelation',active_selRow)" class="btn btn-primary"><span style="width:20px;height:20px;" data-feather="plus"></span> Add</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><span style="width:20px;height:20px;" data-feather="x"></span> Close</button>
                <button type="button" onclick="postMdFamilyRelation()" class="btn btn-dark"><span style="width:20px;height:20px;" data-feather="save"></span> Save</button>
            </div>
        </div>
      </form>
  </div>
</div>

<!-- Modal: Table Gender -->
<div class="modal fade" id="genderModal" tabindex="-1" role="dialog" aria-labelledby="genderModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="formGender" method="POST" action="/admin/genders" class="mb-5">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="genderModalLabel"><span style="width:25px;height:25px;" data-feather="info"></span> Gender
                    <button type="button" onclick="refreshTableGender()" class="btn btn-light"><span style="width:20px;height:20px;" data-feather="refresh-ccw"></span></button>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @method('post')
            @csrf
            <div class="modal-body border-0">
                <div class="table-responsive table-gender overflow-x col-lg-12">
                    @include('master-data.table-gender')
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><span style="width:20px;height:20px;" data-feather="x"></span> Close</button>
                <button type="button" onclick="postMdGender()" class="btn btn-dark"><span style="width:20px;height:20px;" data-feather="save"></span> Save</button>
            </div>
        </div>
      </form>
  </div>
</div>

<!-- Modal: Table Ministry -->
<div class="modal fade" id="ministryModal" tabindex="-1" role="dialog" aria-labelledby="ministryModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="formMinistry" method="POST" action="/admin/ministries" class="mb-5">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ministryModalLabel"><span style="width:25px;height:25px;" data-feather="info"></span> Ministry
                    <button type="button" onclick="refreshTableMinistry()" class="btn btn-light"><span style="width:20px;height:20px;" data-feather="refresh-ccw"></span></button>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @method('post')
            @csrf
            <div class="modal-body border-0">
                <div class="table-responsive table-ministry overflow-x col-lg-12">
                    @include('master-data.table-ministry')
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" onclick="deleteRow('tableMinistry',active_selRow)" class="btn btn-danger"><span style="width:20px;height:20px;" data-feather="trash"></span> Delete</button>
                <button type="button" onclick="insertRow('tableMinistry',active_selRow)" class="btn btn-primary"><span style="width:20px;height:20px;" data-feather="plus"></span> Add</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><span style="width:20px;height:20px;" data-feather="x"></span> Close</button>
                <button type="button" onclick="postMdMinistry()" class="btn btn-dark"><span style="width:20px;height:20px;" data-feather="save"></span> Save</button>
            </div>
        </div>
      </form>
  </div>
</div>

<!-- Modal: Table Spiritual Gift -->
<div class="modal fade" id="spiritualGiftModal" tabindex="-1" role="dialog" aria-labelledby="spiritualGiftModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="formSpiritualGift" method="POST" action="/admin/spiritualgifts" class="mb-5">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="spiritualGiftModalLabel"><span style="width:25px;height:25px;" data-feather="info"></span> Spiritual Gift
                    <button type="button" onclick="refreshTableSpiritualGift()" class="btn btn-light"><span style="width:20px;height:20px;" data-feather="refresh-ccw"></span></button>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @method('post')
            @csrf
            <div class="modal-body border-0">
                <div class="table-responsive table-spiritualgift overflow-x col-lg-12">
                    @include('master-data.table-spiritualgift')
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" onclick="deleteRow('tableSpiritualGift',active_selRow)" class="btn btn-danger"><span style="width:20px;height:20px;" data-feather="trash"></span> Delete</button>
                <button type="button" onclick="insertRow('tableSpiritualGift',active_selRow)" class="btn btn-primary"><span style="width:20px;height:20px;" data-feather="plus"></span> Add</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><span style="width:20px;height:20px;" data-feather="x"></span> Close</button>
                <button type="button" onclick="postMdSpiritualGift()" class="btn btn-dark"><span style="width:20px;height:20px;" data-feather="save"></span> Save</button>
            </div>
        </div>
      </form>
  </div>
</div>

<!-- Modal: Table Community -->
<div class="modal fade" id="communityModal" tabindex="-1" role="dialog" aria-labelledby="communityModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="formCommunity" method="POST" action="/admin/communities" class="mb-5">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="communityModalLabel"><span style="width:25px;height:25px;" data-feather="info"></span> Community
                    <button type="button" onclick="refreshTableCommunity()" class="btn btn-light"><span style="width:20px;height:20px;" data-feather="refresh-ccw"></span></button>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @method('post')
            @csrf
            <div class="modal-body border-0">
                <div class="table-responsive table-community overflow-x col-lg-12">
                    @include('master-data.table-community')
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" onclick="deleteRow('tableCommunity',active_selRow)" class="btn btn-danger"><span style="width:20px;height:20px;" data-feather="trash"></span> Delete</button>
                <button type="button" onclick="insertRow('tableCommunity',active_selRow)" class="btn btn-primary"><span style="width:20px;height:20px;" data-feather="plus"></span> Add</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><span style="width:20px;height:20px;" data-feather="x"></span> Close</button>
                <button type="button" onclick="postMdCommunity()" class="btn btn-dark"><span style="width:20px;height:20px;" data-feather="save"></span> Save</button>
            </div>
        </div>
      </form>
  </div>
</div>

<!-- Modal: Table Personality Type -->
<div class="modal fade" id="personalityTypeModal" tabindex="-1" role="dialog" aria-labelledby="personalityTypeModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="formPersonalityType" method="POST" action="/admin/personalitytypes" class="mb-5">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="personalityTypeModalLabel"><span style="width:25px;height:25px;" data-feather="info"></span> Personality Type
                    <button type="button" onclick="refreshTablePersonalityType()" class="btn btn-light"><span style="width:20px;height:20px;" data-feather="refresh-ccw"></span></button>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @method('post')
            @csrf
            <div class="modal-body border-0">
                <div class="table-responsive table-personalitytype overflow-x col-lg-12">
                    @include('master-data.table-personalitytype')
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" onclick="deleteRow('tablePersonalityType',active_selRow)" class="btn btn-danger"><span style="width:20px;height:20px;" data-feather="trash"></span> Delete</button>
                <button type="button" onclick="insertRow('tablePersonalityType',active_selRow)" class="btn btn-primary"><span style="width:20px;height:20px;" data-feather="plus"></span> Add</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><span style="width:20px;height:20px;" data-feather="x"></span> Close</button>
                <button type="button" onclick="postMdPersonalityType()" class="btn btn-dark"><span style="width:20px;height:20px;" data-feather="save"></span> Save</button>
            </div>
        </div>
      </form>
  </div>
</div>
<!-- Modal: Table Skill Talent -->
<div class="modal fade" id="skillTalentModal" tabindex="-1" role="dialog" aria-labelledby="skillTalentModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="formSkillTalent" method="POST" action="/admin/skillstalents" class="mb-5">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="skillTalentModalLabel"><span style="width:25px;height:25px;" data-feather="info"></span> Skill and Talent
                    <button type="button" onclick="refreshTableSkillTalent()" class="btn btn-light"><span style="width:20px;height:20px;" data-feather="refresh-ccw"></span></button>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @method('post')
            @csrf
            <div class="modal-body border-0">
                <div class="table-responsive table-skilltalent overflow-x col-lg-12">
                    @include('master-data.table-skilltalent')
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" onclick="deleteRow('tableSkillTalent',active_selRow)" class="btn btn-danger"><span style="width:20px;height:20px;" data-feather="trash"></span> Delete</button>
                <button type="button" onclick="insertRow('tableSkillTalent',active_selRow)" class="btn btn-primary"><span style="width:20px;height:20px;" data-feather="plus"></span> Add</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><span style="width:20px;height:20px;" data-feather="x"></span> Close</button>
                <button type="button" onclick="postMdSkillTalent()" class="btn btn-dark"><span style="width:20px;height:20px;" data-feather="save"></span> Save</button>
            </div>
        </div>
      </form>
  </div>
</div>
<!-- Modal: Table Hobby Activity -->
<div class="modal fade" id="hobbyActivityModal" tabindex="-1" role="dialog" aria-labelledby="hobbyActivityModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="formHobbyActivity" method="POST" action="/admin/hobbiesactivities" class="mb-5">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hobbyActivityModalLabel"><span style="width:25px;height:25px;" data-feather="info"></span> Hobby and Activity
                    <button type="button" onclick="refreshTableHobbyActivity()" class="btn btn-light"><span style="width:20px;height:20px;" data-feather="refresh-ccw"></span></button>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @method('post')
            @csrf
            <div class="modal-body border-0">
                <div class="table-responsive table-hobbyactivity overflow-x col-lg-12">
                    @include('master-data.table-hobbyactivity')
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" onclick="deleteRow('tableHobbyActivity',active_selRow)" class="btn btn-danger"><span style="width:20px;height:20px;" data-feather="trash"></span> Delete</button>
                <button type="button" onclick="insertRow('tableHobbyActivity',active_selRow)" class="btn btn-primary"><span style="width:20px;height:20px;" data-feather="plus"></span> Add</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><span style="width:20px;height:20px;" data-feather="x"></span> Close</button>
                <button type="button" onclick="postMdHobbyActivity()" class="btn btn-dark"><span style="width:20px;height:20px;" data-feather="save"></span> Save</button>
            </div>
        </div>
      </form>
  </div>
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

<script>
    var count = 0;
    var counter;
    var clickCount = 0;

    function editTask(e) {
        clickCount++;
        if (clickCount === 1) {
            singleClickTimer = setTimeout(function() {
                clickCount = 0;
            }, 400);
        } else if (clickCount === 2) {
            count++;
            clearTimeout(singleClickTimer);
            clickCount = 0;
            this.removeAttribute('readonly');
            this.style.backgroundColor = "#fff";
        }
    }

    function readonlyTask(e){
        this.setAttribute('readonly',true);
        this.style.backgroundColor = "";
    }

    var active_selRow = 0;
    function initMdEvent(tableId, selectId=null, selectUrl=null){
        var theTable = document.getElementById(tableId);
        const recordInputs = theTable.getElementsByClassName("input-borderless");

        for (let i = 0; i < recordInputs.length; i++) {
            recordInputs[i].removeEventListener('click', function(){});
            recordInputs[i].removeEventListener('blur', function(){});
            recordInputs[i].addEventListener("click", editTask);
            recordInputs[i].addEventListener("blur", readonlyTask);
        }

        const table = document.getElementById(tableId); // Replace with your table ID
        const rows = table.getElementsByTagName("tr");

        rows[0].getElementsByTagName("td")[0].style.backgroundColor = "#000";
        rows[0].getElementsByTagName("td")[1].style.backgroundColor = "#000";

        rows[0].getElementsByTagName("td")[0].style.color = "#fff";
        rows[0].getElementsByTagName("td")[1].style.color = "#fff";

        if(tableId == "tableAdminDiv"){
            rows[0].getElementsByTagName("td")[2].style.backgroundColor = "#000";
            rows[0].getElementsByTagName("td")[3].style.backgroundColor = "#000";
            rows[0].getElementsByTagName("td")[4].style.backgroundColor = "#000";

            rows[0].getElementsByTagName("td")[2].style.color = "#fff";
            rows[0].getElementsByTagName("td")[3].style.color = "#fff";
            rows[0].getElementsByTagName("td")[4].style.color = "#fff";
        }

        for (let row = 1; row < rows.length; row++) {
            rows[row].addEventListener("click", function () {
                // Remove highlight from other rows
                for (let r = 1; r < rows.length; r++) {
                    if(rows[r].getElementsByTagName("td")[0]){
                        rows[r].getElementsByTagName("td")[0].style.backgroundColor = "";
                    }
                    if(rows[r].getElementsByTagName("td")[1]){
                        rows[r].getElementsByTagName("td")[1].style.backgroundColor = "";
                    }

                    if(tableId == "tableAdminDiv"){
                        if(rows[r].getElementsByTagName("td")[2]){
                            rows[r].getElementsByTagName("td")[2].style.backgroundColor = "";
                        }
                        if(rows[r].getElementsByTagName("td")[3]){
                            rows[r].getElementsByTagName("td")[3].style.backgroundColor = "";
                        }
                        if(rows[r].getElementsByTagName("td")[4]){
                            rows[r].getElementsByTagName("td")[4].style.backgroundColor = "";
                        }
                    }
                }
                // Highlight the clicked row
                active_selRow = row;
                if(rows[row].getElementsByTagName("td")[0]){
                    rows[row].getElementsByTagName("td")[0].style.backgroundColor = "#dee2e6";
                }
                if(rows[row].getElementsByTagName("td")[1]){
                    rows[row].getElementsByTagName("td")[1].style.backgroundColor = "#dee2e6";
                }
                if(tableId == "tableAdminDiv"){
                    if(rows[row].getElementsByTagName("td")[2]){
                        rows[row].getElementsByTagName("td")[2].style.backgroundColor = "#dee2e6";
                    }
                    if(rows[row].getElementsByTagName("td")[3]){
                        rows[row].getElementsByTagName("td")[3].style.backgroundColor = "#dee2e6";
                    }
                    if(rows[row].getElementsByTagName("td")[4]){
                        rows[row].getElementsByTagName("td")[4].style.backgroundColor = "#dee2e6";
                    }
                }
            });
        }

        if(selectId!=null && selectUrl!=null){
            $('#'+selectId).load(selectUrl, function(data) {
            });
        }

{{--          if(selectId!=null && selectUrl!=null){
            $('#'+selectId).load(selectUrl, function(data) {
                elm = document.getElementById(selectId);
                elm.setAttribute('data-input',data);
                var selectify = new Tagify(elm, {
                    enforceWhitelist: true,
                    mode : "select",
                    whitelist: elm.getAttribute("data-input").trim().split(','), // Array of values. stackoverflow.com/a/43375571/104380
                    blacklist: [],
                })
                var newWhitelist = elm.getAttribute("data-input").trim().split(',');
                selectify.settings.whitelist.length = 0;
                selectify.settings.whitelist.push(...newWhitelist)
            });

        }  --}}
    }

    function insertRow(tableId, row){
        if(row!=0){
            var tbodyRef = document.getElementById(tableId).getElementsByTagName('tbody')[0];
            var newRow = tbodyRef.insertRow();

            if(tableId=='tableAdminDiv'){
                var newCell = newRow.insertCell(0); // Insert a cell at the end of the row
                newCell.innerHTML = '<input onkeyup="handleKey(event)" style="text-transform:uppercase" class="input-borderless" name="village[]" type="text" readonly>';
                var newCell = newRow.insertCell(1); // Insert a cell at the end of the row
                newCell.innerHTML = '<input onkeyup="handleKey(event)" style="text-transform:uppercase" class="input-borderless" name="district[]" type="text" readonly>';
                var newCell = newRow.insertCell(2); // Insert a cell at the end of the row
                newCell.innerHTML = '<input onkeyup="handleKey(event)" style="text-transform:uppercase" class="input-borderless" name="municipality[]" type="text" readonly>';
                var newCell = newRow.insertCell(3); // Insert a cell at the end of the row
                newCell.innerHTML = '<input onkeyup="handleKey(event)" style="text-transform:uppercase" class="input-borderless" name="province[]" type="text" readonly>';
                var newCell = newRow.insertCell(4); // Insert a cell at the end of the row
                newCell.innerHTML = '<input onkeyup="handleKey(event)" style="text-transform:uppercase" class="input-borderless" name="country[]" type="text" readonly>';

            } else {
                var newCell = newRow.insertCell(0); // Insert a cell at the end of the row
                newCell.innerHTML = '<input onkeyup="handleKey(event)" style="text-transform:uppercase" class="input-borderless" name="title[]" type="text" readonly>';
                var newCell = newRow.insertCell(1); // Insert a cell at the end of the row
                newCell.innerHTML = '<input onkeyup="handleKey(event)" class="input-borderless" name="description[]" type="text" readonly>';
            }
            initMdEvent(tableId);
        }
    }

    function deleteRow(tableId, row){
        if(row!=0){
            var table = document.getElementById(tableId);
            table.deleteRow(row);
            initMdEvent(tableId);
        }
    }

    var citizenshipTbodyContent = "";
    window.onload = function() {
//        var tbodyContent = document.getElementById('tableCitizenship').getElementsByTagName('tbody')[0].innerHTML;
//        citizenshipTbodyContent = tbodyContent;
        initMdEvent("tableAdminDiv");
        initMdEvent("tableCitizenship");
        initMdEvent("tableBloodType");
        initMdEvent("tableEducation");
        initMdEvent("tableProfession");
        initMdEvent("tableFamilyRelation");
        initMdEvent("tableGender");
        initMdEvent("tableMinistry");
        initMdEvent("tableSpiritualGift");
        initMdEvent("tablePersonalityType");
        initMdEvent("tableSkillTalent");
        initMdEvent("tableHobbyActivity");

        $("#selectVillage").on('change', function(){
            var district = $(this).find(":selected")[0].attributes['district'].value;
            var municipality = $(this).find(":selected")[0].attributes['municipality'].value;
            var province = $(this).find(":selected")[0].attributes['province'].value;
            var country = $(this).find(":selected")[0].attributes['country'].value;

            document.getElementById('district').value = district;
            document.getElementById('municipality').value = municipality;
            document.getElementById('province').value = province;
            document.getElementById('country').value = country;

        })
    };

    function handleKey(e){
        if(e.keyCode === 13){
            e.preventDefault(); // Ensure it is only this code that runs
            element = event.srcElement;
            element.blur();
        }
    }

    function postMdCitizenship(){
        var frmData = $("#formCitizenship").serialize()
        $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });

         $.ajax({
            type:'POST',
            data: frmData,
            dataType: 'json',
            url:'/admin/citizenships',
            success:function(data) {
                if(data==1){
                    refreshTableCitizenship();
                } else {
                    var info = data[Object.keys(data)[0]][0];
                    alert(info);
                }
            },
            error: function (msg) {
                var errors = msg.responseJSON;
            }
         });
    }

    function postMdBloodType(){
        var frmData = $("#formBloodType").serialize()
        $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });

         $.ajax({
            type:'POST',
            data: frmData,
            dataType: 'json',
            url:'/admin/bloodtypes',
            success:function(data) {
                if(data==1){
                    refreshTableBloodType();
                } else {
                    var info = data[Object.keys(data)[0]][0];
                    alert(info);
                }
            },
            error: function (msg) {
                var errors = msg.responseJSON;
            }
         });
    }

    function postMdEducation(){
        var frmData = $("#formEducation").serialize()
        $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });

         $.ajax({
            type:'POST',
            data: frmData,
            dataType: 'json',
            url:'/admin/educations',
            success:function(data) {
                if(data==1){
                    refreshTableEducation();
                } else {
                    var info = data[Object.keys(data)[0]][0];
                    alert(info);
                }
            },
            error: function (msg) {
                var errors = msg.responseJSON;
            }
         });
    }
    function postMdProfession(){
        var frmData = $("#formProfession").serialize()
        $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });

         $.ajax({
            type:'POST',
            data: frmData,
            dataType: 'json',
            url:'/admin/professions',
            success:function(data) {
                if(data==1){
                    refreshTableProfession();
                } else {
                    var info = data[Object.keys(data)[0]][0];
                    alert(info);
                }
            },
            error: function (msg) {
                var errors = msg.responseJSON;
            }
         });
    }

    function postMdFamilyRelation(){
        var frmData = $("#formFamilyRelation").serialize()
        $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });

         $.ajax({
            type:'POST',
            data: frmData,
            dataType: 'json',
            url:'/admin/famrelations',
            success:function(data) {
                if(data==1){
                    refreshTableFamilyRelation();
                } else {
                    var info = data[Object.keys(data)[0]][0];
                    alert(info);
                }
            },
            error: function (msg) {
                var errors = msg.responseJSON;
            }
         });
    }

    function postMdGender(){
        var frmData = $("#formGender").serialize()
        $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });

         $.ajax({
            type:'POST',
            data: frmData,
            dataType: 'json',
            url:'/admin/genders',
            success:function(data) {
                if(data==1){
                    refreshTableGender();
                } else {
                    var info = data[Object.keys(data)[0]][0];
                    alert(info);
                }
            },
            error: function (msg) {
                var errors = msg.responseJSON;
            }
         });
    }

    function postMdMinistry(){
        var frmData = $("#formMinistry").serialize()
        $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });

         $.ajax({
            type:'POST',
            data: frmData,
            dataType: 'json',
            url:'/admin/ministries',
            success:function(data) {
                if(data==1){
                    refreshTableMinistry();
                } else {
                    var info = data[Object.keys(data)[0]][0];
                    alert(info);
                }
            },
            error: function (msg) {
                var errors = msg.responseJSON;
            }
         });
    }

    function postMdSpiritualGift(){
        var frmData = $("#formSpiritualGift").serialize()
        $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });

         $.ajax({
            type:'POST',
            data: frmData,
            dataType: 'json',
            url:'/admin/spiritualgifts',
            success:function(data) {
                if(data==1){
                    refreshTableSpiritualGift();
                } else {
                    var info = data[Object.keys(data)[0]][0];
                    alert(info);
                }
            },
            error: function (msg) {
                var errors = msg.responseJSON;
            }
         });
    }

    function postMdPersonalityType(){
        var frmData = $("#formPersonalityType").serialize()
        $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });

         $.ajax({
            type:'POST',
            data: frmData,
            dataType: 'json',
            url:'/admin/personalitytypes',
            success:function(data) {
                if(data==1){
                    refreshTablePersonalityType();
                } else {
                    var info = data[Object.keys(data)[0]][0];
                    alert(info);
                }
            },
            error: function (msg) {
                var errors = msg.responseJSON;
            }
         });
    }
    function postMdSkillTalent(){
        var frmData = $("#formSkillTalent").serialize()
        $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });

         $.ajax({
            type:'POST',
            data: frmData,
            dataType: 'json',
            url:'/admin/skillstalents',
            success:function(data) {
                if(data==1){
                    refreshTableSkillTalent();
                } else {
                    var info = data[Object.keys(data)[0]][0];
                    alert(info);
                }
            },
            error: function (msg) {
                var errors = msg.responseJSON;
            }
         });
    }

    function postMdHobbyActivity(){
        var frmData = $("#formHobbyActivity").serialize()
        $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });

         $.ajax({
            type:'POST',
            data: frmData,
            dataType: 'json',
            url:'/admin/hobbiesactivities',
            success:function(data) {
                if(data==1){
                    refreshTableHobbyActivity();
                } else {
                    var info = data[Object.keys(data)[0]][0];
                    alert(info);
                }
            },
            error: function (msg) {
                var errors = msg.responseJSON;
            }
         });
    }

    function postMdAdminDiv(){
        var frmData = $("#formAdminDiv").serialize()
        $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });

         $.ajax({
            type:'POST',
            data: frmData,
            dataType: 'json',
            url:'/admin/admindivs',
            success:function(data) {
                if(data==1){
                    refreshTableAdminDiv();
                }
            },
            error: function (msg) {
                var errors = msg.responseJSON;
            }
         });
    }

    function refreshTableCitizenship() {
        $('div.table-citizenship').fadeOut();
        $('div.table-citizenship').load('/admin/table-citizenships', function() {
            $('div.table-citizenship').fadeIn();
            initMdEvent("tableCitizenship", "selectCitizenship", "/admin/select-citizenships");
        });
      }

      function refreshTableBloodType() {
        $('div.table-bloodtype').fadeOut();
        $('div.table-bloodtype').load('/admin/table-bloodtypes', function() {
            $('div.table-bloodtype').fadeIn();
            initMdEvent("tableBloodType", "selectBloodType", "/admin/select-bloodtypes");
        });
      }

      function refreshTableEducation() {
        $('div.table-education').fadeOut();
        $('div.table-education').load('/admin/table-educations', function() {
            $('div.table-education').fadeIn();
            initMdEvent("tableEducation","selectEducation", "/admin/select-educations");
        });
      }

      function refreshTableProfession() {
        $('div.table-profession').fadeOut();
        $('div.table-profession').load('/admin/table-professions', function() {
            $('div.table-profession').fadeIn();
            initMdEvent("tableProfession", "selectProfession", "/admin/select-professions");
        });
      }

      function refreshTableFamilyRelation() {
        $('div.table-famrelation').fadeOut();
        $('div.table-famrelation').load('/admin/table-famrelations', function() {
            $('div.table-famrelation').fadeIn();
            initMdEvent("tableFamilyRelation", "selectFamilyRelation", "/admin/select-famrelations");
        });
      }

      function refreshTableGender() {
        $('div.table-gender').fadeOut();
        $('div.table-gender').load('/admin/table-genders', function() {
            $('div.table-gender').fadeIn();
            initMdEvent("tableGender", "selectGender", "/admin/select-genders");
        });
      }

      function refreshTableMinistry() {
        $('div.table-ministry').fadeOut();
        $('div.table-ministry').load('/admin/table-ministries', function() {
            $('div.table-ministry').fadeIn();
            initMdEvent("tableMinistry");
        });

//        $('#selectMinistry').select2("destroy");
//        return false;
        $('div.select-ministry').load('/admin/select-ministries', function() {
            refreshSelect2('#selectMinistry');
        });
      }

      function refreshTableSpiritualGift() {
        $('div.table-spiritualgift').fadeOut();
        $('div.table-spiritualgift').load('/admin/table-spiritualgifts', function() {
            $('div.table-spiritualgift').fadeIn();
            initMdEvent("tableSpiritualGift");
        });

        $('div.select-spiritualgift').load('/admin/select-spiritualgifts', function() {
            refreshSelect2('#selectSpiritualGift');
        });
      }

      function refreshTablePersonalityType() {
        $('div.table-personalitytype').fadeOut();
        $('div.table-personalitytype').load('/admin/table-personalitytypes', function() {
            $('div.table-personalitytype').fadeIn();
            initMdEvent("tablePersonalityType");
        });

        $('div.select-personalitytype').load('/admin/select-personalitytypes', function() {
            refreshSelect2('#selectPersonalityType');
        });
      }

      function refreshTableSkillTalent() {
        $('div.table-skilltalent').fadeOut();
        $('div.table-skilltalent').load('/admin/table-skillstalents', function() {
            $('div.table-skilltalent').fadeIn();
            initMdEvent("tableSkillTalent");
        });

        $('div.select-skilltalent').load('/admin/select-skillstalents', function() {
            refreshSelect2('#selectSkillTalent');
        });
      }

      function refreshTableHobbyActivity() {
        $('div.table-hobbyactivity').fadeOut();
        $('div.table-hobbyactivity').load('/admin/table-hobbiesactivities', function() {
            $('div.table-hobbyactivity').fadeIn();
            initMdEvent("tableHobbyActivity");
        });

        $('div.select-hobbyactivity').load('/admin/select-hobbiesactivities', function() {
            refreshSelect2('#selectHobbyActivity');
        });
      }

      function refreshTableAdminDiv() {
        $('div.table-admindiv').fadeOut();
        $('div.table-admindiv').load('/admin/table-admindivs', function() {
            $('div.table-admindiv').fadeIn();
            initMdEvent("tableAdminDiv");
        });

        $('div.select-village').load('/admin/select-admindivs', function() {
            document.getElementById("selectVillage").addEventListener("change", function() {
                var district = this.options[this.selectedIndex].getAttribute("district");
                var municipality = this.options[this.selectedIndex].getAttribute("municipality");
                var province = this.options[this.selectedIndex].getAttribute("province");
                var country = this.options[this.selectedIndex].getAttribute("country");

                document.getElementById('district').value = district;
                document.getElementById('municipality').value = municipality;
                document.getElementById('province').value = province;
                document.getElementById('country').value = country;
            });

            initMdEvent("tableAdminDiv");
        });
      }

</script>

{{--  <script>
    inputElms_list = document.querySelectorAll('.tags-input');
    var inputElms_array = [...inputElms_list];
        inputElms_array.forEach(inputElm => {
            var tagify = new Tagify(inputElm, {
                enforceWhitelist: true,
                whitelist: inputElm.value.trim().split(/\s*,\s*/) // Array of values. stackoverflow.com/a/43375571/104380
            });

// Chainable event listeners
            tagify.on('add', onAddTag)
                .on('remove', onRemoveTag)
                .on('input', onInput)
                .on('edit', onTagEdit)
                .on('invalid', onInvalidTag)
                .on('click', onTagClick)
                .on('focus', onTagifyFocusBlur)
                .on('blur', onTagifyFocusBlur)
                .on('dropdown:hide dropdown:show', e => console.log(e.type))
                .on('dropdown:select', onDropdownSelect)

            var mockAjax = (function mockAjax(){
                var timeout;
                return function(duration){
                    clearTimeout(timeout); // abort last request
                    return new Promise(function(resolve, reject){
                        timeout = setTimeout(resolve, duration || 100, inputElm.getAttribute("data-input").trim().split(','))
                    })
                }
            })()

            function onAddTag(e){
                console.log("onAddTag: ", e.detail);
                console.log("original input value: ", inputElm.value)
                tagify.off('add', onAddTag) // exmaple of removing a custom Tagify event
            }

            // tag remvoed callback
            function onRemoveTag(e){
                console.log("onRemoveTag:", e.detail, "tagify instance value:", tagify.value)
            }

            // on character(s) added/removed (user is typing/deleting)
            function onInput(e){
                console.log("onInput: ", e.detail);
                tagify.whitelist = null; // reset current whitelist
                tagify.loading(true) // show the loader animation

                // get new whitelist from a delayed mocked request (Promise)
                mockAjax()
                    .then(function(result){
                        tagify.settings.whitelist = result.concat(tagify.value) // add already-existing tags to the new whitelist array

                        tagify
                            .loading(false)
                            // render the suggestions dropdown.
                            .dropdown.show(e.detail.value);
                    })
                    .catch(err => tagify.dropdown.hide())
            }

            function onTagEdit(e){
                console.log("onTagEdit: ", e.detail);
            }

            // invalid tag added callback
            function onInvalidTag(e){
                console.log("onInvalidTag: ", e.detail);
            }

            // invalid tag added callback
            function onTagClick(e){
                console.log(e.detail);
                console.log("onTagClick: ", e.detail);
            }

            function onTagifyFocusBlur(e){
                console.log(e.type, "event fired")
            }

            function onDropdownSelect(e){
                console.log("onDropdownSelect: ", e.detail)
            }
        });

</script>  --}}

{{--  <script>
    selectElms_list = document.querySelectorAll('.select-input');
    var selectElms_array = [...selectElms_list];
        selectElms_array.forEach(selectElm => {
            var selectify = new Tagify(selectElm, {
                enforceWhitelist: true,
                mode : "select",
                whitelist: selectElm.getAttribute("data-input").trim().split(','), // Array of values. stackoverflow.com/a/43375571/104380
                blacklist: [],
            });

            // bind events
            selectify.on('add', onAddTag)
            selectify.DOM.input.addEventListener('focus', onSelectFocus)

            function onAddTag(e){
                console.log(e.detail)
            }

            function onSelectFocus(e){
                console.log(e)
            }
        });

</script>  --}}

<script>
    $(document).ready(function() {
        var select2elms = document.querySelectorAll('.select2');

        [].forEach.call(select2elms, function(select2elm) {
          // do whatever
          var select2Id = select2elm.getAttribute('id');
          var placeHolder = select2elm.getAttribute('aria-placeholder');
            if(select2Id){
                $('#'+select2Id).select2({
                    containerCss : {"display":"block"},
                    placeholder: placeHolder,
                    allowClear: true
                });
            }
        });
    });

    function refreshSelect2(select2Id) {
        var select2elm = document.querySelector(select2Id);
        var placeHolder = select2elm.getAttribute('aria-placeholder');
        if(select2Id){
            $(select2Id).select2({
                containerCss : {"display":"block"},
                placeholder: placeHolder,
                allowClear: true
            });
        }
    }
</script>
@endsection

