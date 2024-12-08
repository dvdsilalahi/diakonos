@extends('dashboard.layouts.main')

@section('container')
<div class="row my-3">
    <div class="col-lg-12">
        <a type="button" href="{{ url()->previous() }}" class="btn btn-link mb-3" style="text-decoration: none;"><i data-feather="arrow-left" style="width: 20px; height: 20px;"></i>Back</a>
        <h6 class="px-3"> View Community </h6>
        <h2 class="h2 px-3"> {{ $community->name }} </h2>
    </div>
</div>

<div class="row my-3">
    <form method="POST" action="/admin/communities" class="mb-5" enctype="multipart/form-data">
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
                                <label for="community-category" class="form-label"><h6>Category</h6></label>
                                <div class="d-flex">
                                    <div class="select-community-category col-md-10">
                                        {{ $community->communityCategory->title }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card border-0">
                            <div class="card-body p-2">
                                <label for="profession" class="form-label"><h6>Segment</h6></label>
                                <div class="d-flex">
                                    <div class="select-community-segment col-md-10">
                                        {{ $community->communitySegment->title }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="card-group">
                        <div class="card border-0">
                            <div class="card-body p-2">
                                <label for="community-area" class="form-label"><h6>Area</h6></label>
                                <div class="d-flex">
                                    <div class="select-community-area col-md-10">
                                        {{ $community->communityArea->title }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card border-0">
                            <div class="card-body p-2">
                              <label for="name" class="form-label"><h6>Community Name</h6></label>
                              <div class="d-flex">
                                {{ $community->name }}
                              </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="card-group">
                        <div class="card border-0">
                            <div class="card-body p-2">
                                <label for="leader" class="form-label"><h6>Leaders</h6></label>
                                <div class="d-flex">
                                <div class="select-community-leader col-md-10">
                                    {{ $community->leaders }}
                                </div>
                                    @error('leader')
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
                                <label for="description" class="form-label"><h6>Description</h6></label>
                                <div class="d-flex">
                                    {{ $community->description }}
                                </div>
                            </div>
                        </div>
                        <div class="card border-0">
                            <div class="card-body p-2">
                                <label for="address" class="form-label"><h6>Address</h6></label>
                                <div class="d-flex">
                                    {{ $community->address }}
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="card-group">
                        <div class="card border-0">
                            <div class="card-body p-2">
                                <label for="social_media" class="form-label"><h6>Social Media</h6></label>
                                <div class="d-flex">
                                    {{ $community->social_media }}
                                </div>
                            </div>
                        </div>
                        <div class="card border-0">
                            <div class="card-body p-2">
                                <label for="gmap_link" class="form-label"><h6>Gmap Link</h6></label>
                                <div class="d-flex">
                                    {{ $community->gmap_link }}
                                </div>
                                Open Google Map <a href="https://www.google.co.id/maps" target="_blank">here</a>, click the location, on popup that appears click Share, Copy Link, then paste here.
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            </div>
        </li>
        <li class="mb-1 mt-4 d-grid gap-2">
            <div class="row justify-content-center">
                <a type="button" class="col-lg-2 col-md-4 col-sm-6 btn btn-primary" href="/admin/communities/{{ $community->uuid }}/edit">Edit</a>
            </div>
        </li>
        </ul>
    </div>
    </form>
</div>
@endsection

