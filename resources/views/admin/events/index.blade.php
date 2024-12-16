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
                                <div class="d-flex">
                                    <div class="select-event-category col-md-10">
                                        <select class="form-select select2" style="width:100%; heigth:100%; display:block;" aria-placeholder="--- Choose Event Category ---" id="selectEventCategory" name="event_category">
                                        @include('master-data.select-event-category')
                                        </select>
                                    </div>
                                    <button type="button" class="border-0" data-bs-uuid="" data-bs-name="" data-bs-toggle="modal" data-bs-target="#eventCategoryModal">
                                        <span style="width:25px;height:25px;" data-feather="info"></span>
                                    </button>
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
                                <label>Venue</label>
                                <div class="event-venue col-md-10">
                                    <input type="text" class="form-control" id="event-venue" placeholder="" name="venue" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12">
                                <label>Budget</label>
                                <div class="event-budget col-md-10">
                                    <input type="number" class="form-control" id="event-budget" placeholder="" name="budget" value="0" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12">
                                <label>Facility/Resource</label>
                                <div class="d-flex">
                                    <div class="select-event-facility col-md-10">
                                        <select class="form-select input-select2 select2" style="width:100%; heigth:100%; display:block;" aria-placeholder="--- Choose Facility ---" id="selectEventFacility" name="facility">
                                        @include('master-data.select-event-facility')
                                        </select>
                                    </div>
                                    <button type="button" class="border-0" data-bs-uuid="" data-bs-name="" data-bs-toggle="modal" data-bs-target="#eventFacilityModal">
                                        <span style="width:25px;height:25px;" data-feather="info"></span>
                                    </button>
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

<!-- Modal: Table Event Category -->
<div class="modal fade" id="eventCategoryModal" tabindex="-1" role="dialog" aria-labelledby="eventCategoryModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="formEventCategory" method="POST" action="/admin/event-categories" class="mb-5">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eventCategoryModalLabel"><span style="width:25px;height:25px;" data-feather="info"></span> Event Category
                    <button type="button" onclick="refreshTableEventCategory()" class="btn btn-light"><span style="width:20px;height:20px;" data-feather="refresh-ccw"></span></button>
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

<!-- Modal: Table Event Facility -->
<div class="modal fade" id="eventFacilityModal" tabindex="-1" role="dialog" aria-labelledby="eventFacilityModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="formEventFacility" method="POST" action="" class="mb-5">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eventFacilityModalLabel"><span style="width:25px;height:25px;" data-feather="info"></span> Facility
                    <button type="button" onclick="refreshTableEventFacility()" class="btn btn-light"><span style="width:20px;height:20px;" data-feather="refresh-ccw"></span></button>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @method('post')
            @csrf
            <div class="modal-body border-0">
                <div class="table-responsive table-event-facility overflow-x col-lg-12" style="overflow-x: auto; height:200px;">
                    @include('master-data.table-event-facility')
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" onclick="deleteRow('tableEventFacility',active_selRow)" class="btn btn-danger"><span style="width:20px;height:20px;" data-feather="trash"></span> Delete</button>
                <button type="button" onclick="insertRow('tableEventFacility',active_selRow)" class="btn btn-primary"><span style="width:20px;height:20px;" data-feather="plus"></span> Add</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><span style="width:20px;height:20px;" data-feather="x"></span> Close</button>
                <button type="button" onclick="postMdEventFacility()" class="btn btn-dark"><span style="width:20px;height:20px;" data-feather="save"></span> Save</button>
            </div>
        </div>
      </form>
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
            placeholder: '--- Choose Event Category ---',
            dropdownParent: $('.select-event-community')
        });
        $('#selectEventFacility').select2({
            placeholder: '--- Choose Facility ---',
            dropdownParent: $('.select-event-facility')
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
        console.log(tableId);
        console.log(selectId);
        console.log(selectUrl);
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

        if(selectId!=null && selectId=='selectEventDuty' && selectUrl!=null){
            $('#selectMinisterDuty').load(selectUrl, function(data) {
            });
            $('#selectCommunityDuty').load(selectUrl, function(data) {
            });
        } else if(selectId!=null && selectUrl!=null){
            $('#'+selectId).load(selectUrl, function(data) {
            });
        }
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

    window.onload = function() {
        initMdEvent("tableEventCategory");
        initMdEvent("tableEventFacility");
    }

    function handleKey(e){
        if(e.keyCode === 13){
            e.preventDefault(); // Ensure it is only this code that runs
            element = event.srcElement;
            element.blur();
        }
    }

    function postMdEventCategory(){
        console.log(333);
        var frmData = $("#formEventCategory").serialize()
        $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });

         $.ajax({
            type:'POST',
            data: frmData,
            dataType: 'json',
            url:'/admin/event-categories',
            success:function(data) {
                if(data==1){
                    refreshTableEventCategory();
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

    function postMdEventFacility(){
        var frmData = $("#formEventFacility").serialize()
        $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });

         $.ajax({
            type:'POST',
            data: frmData,
            dataType: 'json',
            url:'/admin/event-facilities',
            success:function(data) {
                if(data==1){
                    refreshTableEventFacility();
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

    function refreshTableEventCategory() {
        $('div.table-event-category').fadeOut();
        $('div.table-event-category').load('/admin/table-event-categories', function() {
            $('div.table-event-category').fadeIn();
            initMdEvent("tableEventCategory", "selectEventCategory", "/admin/select-event-categories");
        });
    }

    function refreshTableEventFacility() {
        $('div.table-event-facility').fadeOut();
        $('div.table-event-facility').load('/admin/table-event-facilities', function() {
            $('div.table-event-facility').fadeIn();
            initMdEvent("tableEventFacility", "selectEventFacility", "/admin/select-event-facilities");
        });
    }
</script>

@endsection
