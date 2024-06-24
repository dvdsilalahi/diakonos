@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-12">
            <a type="button" href="{{ url()->previous() }}" class="btn btn-link mb-3" style="text-decoration: none;"><i data-feather="arrow-left" style="width: 20px; height: 20px;"></i>Back</a>
            <a type="button" href="/dashboard/members/{{ $member->uuid }}/edit"  class="btn btn-link mb-3"><i data-feather="edit" style="width: 20px; height: 20px;"></i></a>
            <form action="/dashboard/members/{{ $member->uuid }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-link b-1 mb-3" onclick="return confirm('Are you sure?')">
                    <i data-feather="x-circle" style="width: 20px; height: 20px;"></i>
                </button>
            </form>

        </div>
        <div class="col-lg-12 d-flex justify-content-center">
            @if($member->pic)
                <div style="max-height: 350px; overflow:hidden;">
                    <img src="{{ asset('/storage/' . $member->pic) }}" width="200" alt="{{ $member->first_name }}" class="img-fluid rounded-circle">
                </div>
            @else
                <div style="max-height: 350px; overflow:hidden;">
                    <img src="https://source.unsplash.com/random/200x250/?{{ $member->gender }}" width="200" alt="{{ $member->first_name }}" class="img-fluid  rounded-circle">
                </div>
            @endif
        </div>
        <div class="col-lg-12 d-flex justify-content-center mt-3">
            <h5>{{ $member->first_name }}
                @if ($member->last_name)
                    {{ ' ' . $member->last_name  }}
                @endif
            </h5>
        </div>
        <div class="col-lg-12 d-flex justify-content-center">
            {{ $member->profession }}
        </div>
        <div class="col-lg-12 d-flex justify-content-center">
            {{ $member->address }}
        </div>
        <div class="col-lg-12 d-flex justify-content-center">
            <a type="button" href="/dashboard/members/{{ $member->uuid }}/edit"  class="btn btn-link mb-3"><i data-feather="map-pin" style="width: 20px; height: 20px;"></i></a>
            <a type="button" href="/dashboard/members/{{ $member->uuid }}/edit"  class="btn btn-link mb-3"><i data-feather="instagram" style="width: 20px; height: 20px;"></i></a>
            <a type="button" href="/dashboard/members/{{ $member->uuid }}/edit"  class="btn btn-link mb-3"><i data-feather="facebook" style="width: 20px; height: 20px;"></i></a>
            <a type="button" href="/dashboard/members/{{ $member->uuid }}/edit"  class="btn btn-link mb-3"><i data-feather="twitter" style="width: 20px; height: 20px;"></i></a>
            <a type="button" href="/dashboard/members/{{ $member->uuid }}/edit"  class="btn btn-link mb-3"><i data-feather="linkedin" style="width: 20px; height: 20px;"></i></a>
        </div>
        <div class="flex-shrink-0 p-3">
            <ul class="list-unstyled ps-0">
            <li class="mb-1 d-grid gap-2">
                <button type="button" class="col-lg-12 btn btn-secondary rounded-0 border-dark d-inline-flex align-items-center" data-bs-toggle="collapse" data-bs-target="#profile-collapse" aria-expanded="true">
                Profile
                </button>
                <div class="col-lg-12 collapse show" id="profile-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                    <li>
                        <div class="row my-3">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                              <div class="card">
                                <div class="card-body">
                                  <h6 class="card-title">Email:</h6>
                                  <p class="card-text">{{ $member->email }}</p>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="card">
                                <div class="card-body">
                                  <h6 class="card-title">Phone Number:</h6>
                                  <p class="card-text">{{ $member->phone_number }}</p>
                                </div>
                              </div>
                            </div>
                          </div>
                    </li>
                    <li>
                        <div class="row my-3">
                            <div class="col-sm-12 mb-2 mb-sm-0">
                              <div class="card">
                                <div class="card-body">
                                  <h6 class="card-title">Address:</h6>
                                  <p class="card-text">{{ $member->address }}</p>
                                </div>
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
                <div class="col-lg-12 collapse" id="personal-collapse" style="">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                    <li>
                        <div class="row my-3">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                              <div class="card">
                                <div class="card-body">
                                  <h6 class="card-title">National ID No.:</h6>
                                  <p class="card-text">{{ $member->nin }}</p>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="card">
                                <div class="card-body">
                                  <h6 class="card-title">Family Register No.:</h6>
                                  <p class="card-text">{{ $member->fr_no }}</p>
                                </div>
                              </div>
                            </div>
                          </div>
                    </li>
                    <li>
                        <div class="row my-3">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <div class="card">
                                  <div class="card-body">
                                    <h6 class="card-title">Gender:</h6>
                                    <p class="card-text">{{ $member->gender }}</p>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-6">
                              <div class="card">
                                <div class="card-body">
                                  <h6 class="card-title">Citizenship:</h6>
                                  <p class="card-text">{{ $member->citizenship }}</p>
                                </div>
                              </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row my-3">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <div class="card">
                                  <div class="card-body">
                                    <h6 class="card-title">Place of Birth:</h6>
                                    <p class="card-text">{{ $member->place_of_birth }}</p>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-6">
                              <div class="card">
                                <div class="card-body">
                                  <h6 class="card-title">Date of Birth:</h6>
                                  <p class="card-text">{{ $member->date_of_birth }}</p>
                                </div>
                              </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row my-3">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <div class="card">
                                  <div class="card-body">
                                    <h6 class="card-title">Education:</h6>
                                    <p class="card-text">{{ $member->education }}</p>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-6">
                              <div class="card">
                                <div class="card-body">
                                  <h6 class="card-title">Profession:</h6>
                                  <p class="card-text">{{ $member->profession }}</p>
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
                <div class="col-lg-12 collapse" id="family-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                    <li>
                        <div class="row my-3">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <div class="card">
                                  <div class="card-body">
                                    <h6 class="card-title">Family Relation:</h6>
                                    <p class="card-text">{{ $member->fam_relation }}</p>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row my-3">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <div class="card">
                                  <div class="card-body">
                                    <h6 class="card-title">Father&#39s Name:</h6>
                                    <p class="card-text">{{ $member->father_name }}</p>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-6">
                              <div class="card">
                                <div class="card-body">
                                  <h6 class="card-title">Mother&#39s Name:</h6>
                                  <p class="card-text">{{ $member->mother_name }}</p>
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
            </ul>
        </div>
    </div>
</div>
@endsection
