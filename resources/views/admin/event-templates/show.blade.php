@extends('dashboard.layouts.main')

@section('container')
<div class="row my-3">
    <div class="col-lg-12">
        <a type="button" href="{{ url()->previous() }}" class="btn btn-link mb-3" style="text-decoration: none;"><i data-feather="arrow-left" style="width: 20px; height: 20px;"></i>Back</a>
        <h6>
            Event Template
        </h6>
        <h2 class="h2">
        @foreach ($eventcategories as $eventcategory)
            @if($eventTemplate['event_category'] == $eventcategory->id)
                {{ $eventcategory->title }}
            @endif
        @endforeach

        </h2>
    </div>
</div>

<div class="row my-3">
    <div class="flex-shrink-0 p-3">
        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
            <li>
                <div class="card-group">
                    <div class="card border-0">
                        <div class="card-body p-2">
                            <label for="minister_duties" class="form-label"><h6>Minister Duties</h6></label>
                            <div class="d-flex">
                                <div class="select-minister-duty col-md-10">
                                        @php($i = 0)
                                        @foreach ($event_duties as $event_duty)
                                          @if(( $i==0 && collect($eventTemplate['minister_duties']['items'])->contains( $event_duty->id )))
                                              @php($i++)
                                              {{ $event_duty->title }}
                                          @elseif(( $i>0 && collect($eventTemplate['minister_duties']['items'])->contains( $event_duty->id )))
                                              @php($i++)
                                              {{ ', '.$event_duty->title }}
                                          @endif
                                        @endforeach
                                </div>
                            </div>
                            @error('minister_duties')
                            <div class="invalid-feedback d-block" role="alert">
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
                            <label for="community_duties" class="form-label"><h6>Community Duties</h6></label>
                            <div class="d-flex">
                                <div class="select-community-duty col-md-10">
                                    @php($i = 0)
                                    @foreach ($event_duties as $event_duty)
                                      @if(( $i==0 && collect($eventTemplate['community_duties']['items'])->contains( $event_duty->id )))
                                          @php($i++)
                                          {{ $event_duty->title }}
                                      @elseif(( $i>0 && collect($eventTemplate['community_duties']['items'])->contains( $event_duty->id )))
                                          @php($i++)
                                          {{ ', '.$event_duty->title }}
                                      @endif
                                    @endforeach
                                </div>
                            </div>
                            @error('community_duties')
                            <div class="invalid-feedback d-block" role="alert">
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
                            <label for="segment-attendances" class="form-label"><h6>Segment Attendances</h6></label>
                            <div class="d-flex">
                                <div class="select-segment-attendance col-md-10">
                                    @php($i = 0)
                                    @foreach ($segments as $segment)
                                    @if(( $i==0 && collect($eventTemplate['segment_attendances']['items'])->contains( $segment->id )))
                                        @php($i++)
                                        {{ $segment->title }}
                                    @elseif(( $i>0 && collect($eventTemplate['segment_attendances']['items'])->contains( $segment->id )))
                                        @php($i++)
                                        {{ ', '.$segment->title }}
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            @error('segment_attendances')
                            <div class="invalid-feedback d-block" role="alert">
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
                            <label for="offering_accounts" class="form-label"><h6>Offering Accounts</h6></label>
                            <div class="d-flex">
                                <div class="select-offering-accounts col-md-10">
                                    @php($i = 0)
                                    @foreach ($accounts as $account)
                                    @if(( $i==0 && collect($eventTemplate['offering_accounts']['items'])->contains( $account->id )))
                                        @php($i++)
                                        {{ $account->account_name }}
                                    @elseif(( $i>0 && collect($eventTemplate['offering_accounts']['items'])->contains( $account->id )))
                                        @php($i++)
                                        {{ ', '.$segment->account_name }}
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            @error('offering_accounts')
                            <div class="invalid-feedback d-block" role="alert">
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
                            <label for="visibility" class="form-label"><h6>Visibility</h6></label>
                            <div class="d-flex">
                                <div class="event-visibility col-md-10">
                                    @if($eventTemplate['public_visibility'] == 1)
                                        Public
                                    @else
                                        Community Only
                                    @endif
                            @error('offering_accounts')
                            <div class="invalid-feedback d-block" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
@endsection

