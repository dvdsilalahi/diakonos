@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Events Calendar</h1>
</div>
<div class="container">
    <div id='ec'></div>
</div>

<div class="modal fade add-form" id="eventAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title" id="modal-title">Add Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="/admin/events" class="mb-5" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="alert alert-danger " role="alert" id="danger-alert" style="display: none;">
                        End date should be greater than start date.
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12">
                                <label>Category</label>
                                <div class="select-event-category col-md-10">
                                    <select class="form-select select2" style="width:100%; heigth:100%; display:block;" aria-placeholder="--- Choose Event Category ---" id="selectEventCategory" name="event_category">
                                    @include('master-data.select-event-category')
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12">
                                <label>Event Name</label>
                                <div class="event-title col-md-10">
                                    <input type="text" class="form-control" id="event-title" placeholder="" name="title" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-xs-6 col-sm-6">Start Date</label>
                            <label class="col-xs-6 col-sm-6">End Date</label>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6">
                                <input type="date" class="form-control" id="start-date" placeholder="start date" name="start_date" required>
                            </div>
                            <div class="col-xs-6 col-sm-6">
                                <input type="date" class="form-control" id="end-date" placeholder="end date" name="end_date" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-xs-6 col-sm-6">Start Time</label>
                            <label class="col-xs-6 col-sm-6">End Time</label>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6">
                                <input type="time" class="form-control" id="start-time" placeholder="start time" name="start_time" required>
                            </div>
                            <div class="col-xs-6 col-sm-6">
                                <input type="time" class="form-control" id="end-time" placeholder="end time" name="end_time" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12">
                                <label>Community</label>
                                <div class="select-event-community col-md-10">
                                    <select class="form-select input-select2 select2" style="width:100%; heigth:100%; display:block;" aria-placeholder="--- Choose Community ---" id="selectEventCommunity" name="communities[]" multiple="multiple">
                                    @include('master-data.select-event-community')
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12">
                                <label>Facility/Resource</label>
                                <div class="select-event-facility col-md-10">
                                    <select class="form-select input-select2 select2" style="width:100%; heigth:100%; display:block;" aria-placeholder="--- Choose Facility ---" id="selectEventFacility" name="facility">
                                    include('master-data.select-event-facility')
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pic" class="form-label"><h6>Flyer</h6></label>
                        <img style="width: 10em" class="img-preview img-fluid mb-3 col-sm-5">
                        <input class="form-control @error('pic') is-invalid @enderror" type="file" id="flyer" name="flyer" onchange="previewImage()">
                        @error('pic')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="event-color">Color</label>
                        <input type="color" class="m-left
                        form-control form-control-color" id="event-color" name="color" value="#3788d8">
                    </div>
                </div>
                <div class="modal-footer border-top-0 d-flex justify-content-center">
                    <button type="submit" class="btn btn-success" id="submit-button">Add</button>
                  </div>
            </form>
        </div>
    </div>
</div>

<script>
    var dataArray = [];
    $.ajax({
        url: "event-list",
        async: false,
        dataType: 'json',
        success: function (data) {
            $.each(data, function( idx, value ) {
                if(data[idx].start_time!=null && data[idx].end_time!=null){
                    var dataItem = {};
                    dataItem.start = data[idx].date + " " + data[idx].start_time;
                    dataItem.end = data[idx].date + " " + data[idx].end_time;
                    dataItem.resourceId = data[idx].id;
                    dataItem.title = data[idx].title;
                    dataItem.color = data[idx].color;
                    dataArray.push(dataItem);
                }
            });
        }
    });

    $(document).ready(function() {
        $('#selectEventCategory').select2({
            placeholder: '--- Choose Event Category ---',
            dropdownParent: $('.select-event-category')
        });

        $('#selectEventCommunity').select2({
            placeholder: '--- Choose Community ---',
            dropdownParent: $('.select-event-community')
        });
    });
</script>
<script>
    let ec = new EventCalendar(document.getElementById('ec'), {
        view: 'dayGridMonth',
        customButtons: {
            eventAddButton: {
                text: 'Add Event',
                click: function() {
//                    alert('clicked the custom button!');
                    eventAdd();
                }
            }
        },
        headerToolbar: {
            start: 'eventAddButton prev,next,today',
            center: 'title',
            end: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek resourceTimeGridWeek,resourceTimelineWeek'
//            end: 'dayGridMonth,timeGridWeek,listWeek,resourceTimelineWeek'
        },
        events: createEvents(),
        selectable: true,
        dayMaxEvents: false,
        nowIndicator: true,
        dateClick: function (info) {
            console.log("dateClick");
            console.log(info);
          },
        eventClick: function (info) {
            console.log("eventClick");
            console.log(info);
            eventEdit();
          },
    });

    ec.setOption('slotDuration', '01:00');

    function createEvents() {
        return dataArray;
    }

    function _pad(num) {
        let norm = Math.floor(Math.abs(num));
        return (norm < 10 ? '0' : '') + norm;
    }

    function eventAdd(){
        var eventAddModal = new bootstrap.Modal(document.getElementById('eventAddModal'), {
            keyboard: false
          });
          eventAddModal.show();
        };

    function eventEdit(){
        var eventEditModal = new bootstrap.Modal(document.getElementById('eventEditModal'), {
            keyboard: false
          });
          eventEditModal.show();
        };

</script>
@endsection
