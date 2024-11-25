@extends('dashboard.layouts.main')

@section('container')
<div class="row my-3">
    <div class="col-lg-12">
        <a type="button" href="{{ url()->previous() }}" class="btn btn-link mb-3" style="text-decoration: none;"><i data-feather="arrow-left" style="width: 20px; height: 20px;"></i>Back</a>
        <h2 class="h2 px-3">Create Event Template</h2>
    </div>
</div>

<div class="row my-3">
    <form method="POST" action="/admin/event-templates" class="mb-5" enctype="multipart/form-data">
        @csrf
    <div class="flex-shrink-0 p-3">
        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
            <li>
                <div class="card-group">
                    <div class="card border-0">
                        <div class="card-body p-2">
                            <label for="event_categories" class="form-label"><h6>Event Category</h6></label>
                            <div class="d-flex">
                                <div class="select-ministry col-md-10">
                                    @include('master-data.select-event-category')
                                </div>
                                <button type="button" class="border-0" data-bs-uuid="" data-bs-name="" data-bs-toggle="modal" data-bs-target="#eventCategoryModal">
                                    <span style="width:25px;height:25px;" data-feather="info"></span>
                                </button>
                            </div>
                            @error('event_category')
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
                            <label for="minister_duties" class="form-label"><h6>Minister Duties</h6></label>
                            <div class="d-flex">
                                <div class="select-minister-duty col-md-10">
                                    @include('master-data.select-minister-duty')
                                </div>
                                <button type="button" class="border-0" data-bs-uuid="" data-bs-name="" data-bs-toggle="modal" data-bs-target="#eventDutyModal">
                                    <span style="width:25px;height:25px;" data-feather="info"></span>
                                </button>
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
                                    @include('master-data.select-community-duty')
                                </div>
                                <button type="button" class="border-0" data-bs-uuid="" data-bs-name="" data-bs-toggle="modal" data-bs-target="#eventDutyModal">
                                    <span style="width:25px;height:25px;" data-feather="info"></span>
                                </button>
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
                                @include('master-data.select-segment-attendance')
                            </div>
                            <button type="button" class="border-0" data-bs-uuid="" data-bs-name="" data-bs-toggle="modal" data-bs-target="#communitySegmentModal">
                                <span style="width:25px;height:25px;" data-feather="info"></span>
                            </button>
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
                                    @include('master-data.select-template-offering-account')
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
            <li class="mb-1 mt-4 d-grid gap-2">
                <div class="row justify-content-center">
                    <button type="submit" class="col-lg-2 col-md-4 col-sm-6 btn btn-primary">Add Template</button>
                </div>
            </li>
        </ul>
    </form>
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


<!-- Modal: Table Event Duty -->
<div class="modal fade" id="eventDutyModal" tabindex="-1" role="dialog" aria-labelledby="eventDutyModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="formEventDuty" method="POST" action="/admin/event-duties" class="mb-5">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eventDutyModalLabel"><span style="width:25px;height:25px;" data-feather="info"></span> Event Duty
                    <button type="button" onclick="refreshTableEventDuty()" class="btn btn-light">
                    <span style="width:20px;height:20px;" data-feather="refresh-ccw"></span></button>
                </h5>(For minister and community)
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @method('post')
            @csrf
            <div class="modal-body border-0">
                <div class="table-responsive table-event-duty overflow-x col-lg-12">
                    @include('master-data.table-event-duty')
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" onclick="deleteRow('tableEventDuty',active_selRow)" class="btn btn-danger"><span style="width:20px;height:20px;" data-feather="trash"></span> Delete</button>
                <button type="button" onclick="insertRow('tableEventDuty',active_selRow)" class="btn btn-primary"><span style="width:20px;height:20px;" data-feather="plus"></span> Add</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><span style="width:20px;height:20px;" data-feather="x"></span> Close</button>
                <button type="button" onclick="postMdEventDuty()" class="btn btn-dark"><span style="width:20px;height:20px;" data-feather="save"></span> Save</button>
            </div>
        </div>
      </form>
  </div>
</div>

<!-- Modal: Table Community Segment -->
<div class="modal fade" id="communitySegmentModal" tabindex="-1" role="dialog" aria-labelledby="communitySegmentModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="formCommunitySegment" method="POST" action="/admin/community-segments" class="mb-5">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="communitySegmentModalLabel"><span style="width:25px;height:25px;" data-feather="info"></span> Segment
                    <button type="button" onclick="refreshTableCommunitySegment()" class="btn btn-light"><span style="width:20px;height:20px;" data-feather="refresh-ccw"></span></button>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @method('post')
            @csrf
            <div class="modal-body border-0">
                <div class="table-responsive table-community-segment overflow-x col-lg-12">
                    @include('master-data.table-community-segment')
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" onclick="deleteRow('tableCommunitySegment',active_selRow)" class="btn btn-danger"><span style="width:20px;height:20px;" data-feather="trash"></span> Delete</button>
                <button type="button" onclick="insertRow('tableCommunitySegment',active_selRow)" class="btn btn-primary"><span style="width:20px;height:20px;" data-feather="plus"></span> Add</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><span style="width:20px;height:20px;" data-feather="x"></span> Close</button>
                <button type="button" onclick="postMdCommunitySegment()" class="btn btn-dark"><span style="width:20px;height:20px;" data-feather="save"></span> Save</button>
            </div>
        </div>
      </form>
  </div>
</div>

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
        initMdEvent("tableEventDuty");
        initMdEvent("tableCommunitySegment");
    }

    function handleKey(e){
        if(e.keyCode === 13){
            e.preventDefault(); // Ensure it is only this code that runs
            element = event.srcElement;
            element.blur();
        }
    }

    function postMdEventCategory(){
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

    function postMdEventDuty(){
        var frmData = $("#formEventDuty").serialize()
        $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });

         $.ajax({
            type:'POST',
            data: frmData,
            dataType: 'json',
            url:'/admin/event-duties',
            success:function(data) {
                if(data==1){
                    refreshTableEventDuty();
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

    function postMdCommunitySegment(){
        var frmData = $("#formCommunitySegment").serialize()
        $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });

         $.ajax({
            type:'POST',
            data: frmData,
            dataType: 'json',
            url:'/admin/community-segments',
            success:function(data) {
                if(data==1){
                    refreshTableCommunitySegment();
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

    function refreshTableEventDuty() {
        $('div.table-event-duty').fadeOut();
        $('div.table-event-duty').load('/admin/table-event-duties', function() {
            $('div.table-event-duty').fadeIn();
            initMdEvent("tableEventDuty", "selectMinisterDuty", "/admin/select-minister-duties");
            initMdEvent("tableEventDuty", "selectCommunityDuty", "/admin/select-community-duties");
        });
    }

    function refreshTableCommunitySegment() {
        $('div.table-community-segment').fadeOut();
        $('div.table-community-segment').load('/admin/table-community-segments', function() {
            $('div.table-community-segment').fadeIn();
            initMdEvent("tableCommunitySegment", "selectSegmentAttendance", "/admin/select-segment-attendances");
        });
    }

</script>

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

