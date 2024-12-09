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
            <form id="myForm">
                <div class="modal-body">
                    <div class="alert alert-danger " role="alert" id="danger-alert" style="display: none;">
                        End date should be greater than start date.
                    </div>
                    <div class="form-group col-xs-6">
                        <div class="row">
                            <label for="event-title">Event name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="event-title" placeholder="Enter event name" required>
                        </div>
                    </div>
                    <div class="form-group col-xs-6">
                        <div class="row">
                            <label class="col-xs-12">Start</label>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <input type="date" class="form-control" id="start-date" placeholder="start-date" required>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <input type="time" class="form-control" id="start-time" placeholder="start-time" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-xs-6">
                        <div class="row">
                            <label class="col-xs-12">End</label>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <input type="date" class="form-control" id="end-date" placeholder="end-date" required>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <input type="time" class="form-control" id="end-time" placeholder="end-time" required>
                            </div>
                        </div>
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
                        <label for="pic" class="form-label"><h6>Flyer</h6></label>
                        <img style="width: 10em" class="img-preview img-fluid mb-3 col-sm-5">
                        <input class="form-control @error('pic') is-invalid @enderror" type="file" id="pic" name="pic" onchange="previewImage()">
                        @error('pic')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="event-color">Color</label>
                        <input type="color" class="m-left
                        form-control form-control-color" id="event-color" value="#3788d8">
                    </div>
                </div>
                <div class="modal-footer border-top-0 d-flex justify-content-center">
                    <button type="submit" class="btn btn-success" id="submit-button">Add</button>
                  </div>
            </form>
        </div>
    </div>
</div>

{{--  <div class="modal fade edit-form" id="eventEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title" id="modal-title">Edit Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="myForm">
                <div class="modal-body">
                    <div class="alert alert-danger " role="alert" id="danger-alert" style="display: none;">
                        End date should be greater than start date.
                      </div>
                    <div class="form-group col-xs-12">
                        <label for="event-title">Event name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="event-title" placeholder="Enter event name" required>
                    </div>
                    <div class="col-xs-6">
                        <div class="row">
                            <label class="col-xs-12">Start</label>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <input type="date" class="form-control" id="start-date" placeholder="start-date" required>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <input type="time" class="form-control" id="start-time" placeholder="start-time" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="event-title">Category a<span class="text-danger">*</span></label>
                        <select class="form-select input-select2 select2" style="width:100%; heigth:100%; display:block;" aria-placeholder="--- Choose Category ---" id="selectLeader" name="leader" multiple="multiple">
                            <option value="">test</option>
                        </select>
                    </div>
                    <div class="form-group col-xs-12">
                        <label for="event-title">Community <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="event-title" placeholder="Enter event name" required>
                    </div>
                    <div class="form-group">
                        <label for="event-color">Color</label>
                        <input type="color" class="form-control" id="event-color" value="#3788d8">
                      </div>
                </div>
                <div class="modal-footer border-top-0 d-flex justify-content-center">
                    <button type="submit" class="btn btn-success" id="submit-button">Update</button>
                  </div>
            </form>
        </div>
    </div>
</div>
  --}}

<!-- Modal: Table Event Category -->
{{--
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="formCategory" method="POST" action="/admin/event-categories" class="mb-5">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="categoryModalLabel"><span style="width:25px;height:25px;" data-feather="info"></span> Category
                    <button type="button" onclick="refreshTableCategory()" class="btn btn-light"><span style="width:20px;height:20px;" data-feather="refresh-ccw"></span></button>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @method('post')
            @csrf
            <div class="modal-body border-0">
                <div class="table-responsive table-event-category overflow-x col-lg-12">
                    @include('master-data.table-event-category')
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" onclick="deleteRow('tableEventCategory',active_selRow)" class="btn btn-danger"><span style="width:20px;height:20px;" data-feather="trash"></span> Delete</button>
                <button type="button" onclick="insertRow('tableEventCategory',active_selRow)" class="btn btn-primary"><span style="width:20px;height:20px;" data-feather="plus"></span> Add</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><span style="width:20px;height:20px;" data-feather="x"></span> Close</button>
                <button type="button" onclick="postMdEventCategory()" class="btn btn-dark"><span style="width:20px;height:20px;" data-feather="save"></span> Save</button>
            </div>
        </div>
      </form>
  </div>
</div>
  --}}
<script>
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


/*
    $(document).ready(function() {
        var select2elms = document.querySelectorAll('.select2');

        [].forEach.call(select2elms, function(select2elm) {
          // do whatever
          var select2Id = select2elm.getAttribute('id');
          var placeHolder = select2elm.getAttribute('aria-placeholder');
            if(select2Id){
                Settimeout(function(){
                    $('#'+select2Id).select2({
                        containerCss : {"display":"block"},
                        placeholder: placeHolder,
                        allowClear: true
                    });
                }, 2000)
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
*/
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
            end: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek,resourceTimeGridWeek,resourceTimelineWeek'
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
        let days = [];
        for (let i = 0; i < 7; ++i) {
            let day = new Date();
            let diff = i - day.getDay();
            day.setDate(day.getDate() + diff);
            days[i] = day.getFullYear() + "-" + _pad(day.getMonth()+1) + "-" + _pad(day.getDate());
        }

        return [
            {start: days[0] + " 00:00", end: days[0] + " 09:00", resourceId: 1, display: "background"},
            {start: days[1] + " 12:00", end: days[1] + " 14:00", resourceId: 2, display: "background"},
            {start: days[2] + " 17:00", end: days[2] + " 24:00", resourceId: 1, display: "background"},
            {start: days[0] + " 10:00", end: days[0] + " 14:00", resourceId: 1, title: "The calendar can display background and regular events", color: "#FE6B64"},
            {start: days[1] + " 16:00", end: days[2] + " 08:00", resourceId: 2, title: "An event may span to another day", color: "#B29DD9"},
            {start: days[2] + " 09:00", end: days[2] + " 13:00", resourceId: 2, title: "Events can be assigned to resources and the calendar has the resources view built-in", color: "#779ECB"},
            {start: days[3] + " 14:00", end: days[3] + " 20:00", resourceId: 1, title: "", color: "#FE6B64"},
            {start: days[3] + " 15:00", end: days[3] + " 18:00", resourceId: 1, title: "Overlapping events are positioned properly", color: "#779ECB"},
            {start: days[5] + " 10:00", end: days[5] + " 16:00", resourceId: 2, title: {html: "You have complete control over the <i><b>display</b></i> of events…"}, color: "#779ECB"},
            {start: days[5] + " 14:00", end: days[5] + " 19:00", resourceId: 2, title: "…and you can drag and drop the events!", color: "#FE6B64"},
            {start: days[5] + " 18:00", end: days[5] + " 21:00", resourceId: 2, title: "", color: "#B29DD9"},
            {start: days[1], end: days[3], resourceId: 1, title: "All-day events can be displayed at the top", color: "#B29DD9", allDay: true}
        ];
    }

    console.log(createEvents());
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
