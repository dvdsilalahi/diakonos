@extends('dashboard.layouts.main')

@section('container')
<div class="row my-3">
    <div class="col-lg-12">
        <a type="button" href="{{ url()->previous() }}" class="btn btn-link mb-3" style="text-decoration: none;"><i data-feather="arrow-left" style="width: 20px; height: 20px;"></i>Back</a>
        <h2 class="h2 px-3">Create New Community</h2>
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
                                        <select class="form-select input-select2" style="width:100%; heigth:100%; display:block;" aria-placeholder="--- Choose Category ---" id="selectCommunityCategory" name="category">
                                        @include('master-data.select-community-category')
                                        </select>
                                    </div>
                                    <button type="button" class="border-0" data-bs-uuid="" data-bs-name="" data-bs-toggle="modal" data-bs-target="#categoryModal">
                                        <span style="width:25px;height:25px;" data-feather="info"></span>
                                    </button>
                                    @error('category')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card border-0">
                            <div class="card-body p-2">
                                <label for="profession" class="form-label"><h6>Segment</h6></label>
                                <div class="d-flex">
                                    <div class="select-community-segment col-md-10">
                                        <select class="form-select input-select2" style="width:100%; heigth:100%; display:block;" aria-placeholder="--- Choose Segment ---" id="selectCommunitySegment" name="segment">
                                        @include('master-data.select-community-segment')
                                        </select>
                                    </div>
                                    <button type="button" class="border-0" data-bs-uuid="" data-bs-name="" data-bs-toggle="modal" data-bs-target="#communitySegmentModal">
                                        <span style="width:25px;height:25px;" data-feather="info"></span>
                                    </button>
                                    @error('segment')
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
                                <label for="community-area" class="form-label"><h6>Area</h6></label>
                                <div class="d-flex">
                                    <div class="select-community-area col-md-10">
                                        <select class="form-select input-select2" style="width:100%; heigth:100%; display:block;" aria-placeholder="--- Choose Area ---" id="selectCommunityArea" name="area">
                                        @include('master-data.select-community-area')
                                        </select>
                                    </div>
                                    <button type="button" class="border-0" data-bs-uuid="" data-bs-name="" data-bs-toggle="modal" data-bs-target="#communityAreaModal">
                                        <span style="width:25px;height:25px;" data-feather="info"></span>
                                    </button>
                                    @error('area')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card border-0">
                            <div class="card-body p-2">
                              <label for="name" class="form-label"><h6>Community Name</h6></label>
                              <div class="d-flex">
                                <input type="text" maxlength="50" size="10" class="form-control @error('name') is-invalid @enderror" id="name" name="name"  autofocus value="{{ old('name') }}" >
                                @error('name')
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
                                <label for="leader" class="form-label"><h6>Leaders</h6></label>
                                <div class="d-flex">
                                <div class="select-community-leader col-md-10">
                                    <select class="form-select input-select2 select2" style="width:100%; heigth:100%; display:block;" aria-placeholder="--- Choose one of more leaders ---" id="selectLeader" name="leaders[]" multiple="multiple">
                                    @include('master-data.select-community-leader')
                                    </select>
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
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" style="height: 100px" value="{{ old('description') }}"></textarea>
                                    @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
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
                            <div class="card-body p-2">
                                <label for="social_media" class="form-label"><h6>Social Media</h6></label>
                                <div class="d-flex">
                                    <select multiple="true" name="social_media[]" id="selectSocialMedia" class="form-control token-select2 select2">
                                        <!-- if tags are loaded over AJAX, no need for <option> elments -->
                                    </select>
                                    @error('social_media')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card border-0">
                            <div class="card-body p-2">
                                <label for="gmap_link" class="form-label"><h6>Gmap Link</h6></label>
                                <div class="d-flex">
                                    <input type="text" maxlength="50" size="10" class="form-control @error('gmap_link') is-invalid @enderror" id="gmap_link" name="gmap_link"  autofocus value="{{ old('gmap_link') }}" >
                                    @error('gmap_link')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
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
                <button type="submit" class="col-lg-2 col-md-4 col-sm-6 btn btn-primary">Add Community</button>
            </div>
        </li>
        </ul>
    </div>
    </form>
</div>

<!-- Modal: Table Community Category -->
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="formCommunityCategory" method="POST" action="/admin/communities" class="mb-5">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="categoryModalLabel"><span style="width:25px;height:25px;" data-feather="info"></span> Category
                    <button type="button" onclick="refreshTableCommunityCategory()" class="btn btn-light"><span style="width:20px;height:20px;" data-feather="refresh-ccw"></span></button>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @method('post')
            @csrf
            <div class="modal-body border-0">
                <div class="table-responsive table-community-category overflow-x col-lg-12" style="overflow-x: auto; height:200px;">
                    @include('master-data.table-community-category')
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" onclick="deleteRow('tableCommunityCategory',active_selRow)" class="btn btn-danger"><span style="width:20px;height:20px;" data-feather="trash"></span> Delete</button>
                <button type="button" onclick="insertRow('tableCommunityCategory',active_selRow)" class="btn btn-primary"><span style="width:20px;height:20px;" data-feather="plus"></span> Add</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><span style="width:20px;height:20px;" data-feather="x"></span> Close</button>
                <button type="button" onclick="postMdCommunityCategory()" class="btn btn-dark"><span style="width:20px;height:20px;" data-feather="save"></span> Save</button>
            </div>
        </div>
      </form>
  </div>
</div>

<!-- Modal: Table Community Segment -->
<div class="modal fade" id="communitySegmentModal" tabindex="-1" role="dialog" aria-labelledby="communitySegmentModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="formCommunitySegment" method="POST" action="/admin/segments" class="mb-5">
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
                <div class="table-responsive table-community-segment overflow-x col-lg-12" style="overflow-x: auto; height:200px;">
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

<!-- Modal: Table Community Area -->
<div class="modal fade" id="communityAreaModal" tabindex="-1" role="dialog" aria-labelledby="communityAreaModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="formCommunityArea" method="POST" action="/admin/areas" class="mb-5">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="communityAreaModalLabel"><span style="width:25px;height:25px;" data-feather="info"></span> Area
                    <button type="button" onclick="refreshTableCommunityArea()" class="btn btn-light"><span style="width:20px;height:20px;" data-feather="refresh-ccw"></span></button>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @method('post')
            @csrf
            <div class="modal-body border-0">
                <div class="table-responsive table-community-area overflow-x col-lg-12" style="overflow-x: auto; height:200px;">
                      @include('master-data.table-community-area')
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" onclick="deleteRow('tableCommunityArea',active_selRow)" class="btn btn-danger"><span style="width:20px;height:20px;" data-feather="trash"></span> Delete</button>
                <button type="button" onclick="insertRow('tableCommunityArea',active_selRow)" class="btn btn-primary"><span style="width:20px;height:20px;" data-feather="plus"></span> Add</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><span style="width:20px;height:20px;" data-feather="x"></span> Close</button>
                <button type="button" onclick="postMdCommunityArea()" class="btn btn-dark"><span style="width:20px;height:20px;" data-feather="save"></span> Save</button>
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
    var json_community_category = [];
    var json_community_segment = [];
    var json_community_area = [];
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

        focusLastRow(tableId);
        if(selectId!=null && selectUrl!=null){
            $('#'+selectId).load(selectUrl, function(data) {
            });
        }
    }

    function insertRow(tableId, row){
        if(row!=0){
            var tbodyRef = document.getElementById(tableId).getElementsByTagName('tbody')[0];
            var newRow = tbodyRef.insertRow();

            var newCell = newRow.insertCell(0); // Insert a cell at the end of the row
            newCell.innerHTML = '<input onkeyup="handleKey(event)" style="text-transform:uppercase" class="input-borderless" name="title[]" type="text" readonly>';
            var newCell = newRow.insertCell(1); // Insert a cell at the end of the row
            newCell.innerHTML = '<input onkeyup="handleKey(event)" class="input-borderless" name="description[]" type="text" readonly>';
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
//        var tbodyContent = document.getElementById('tableCitizenship').getElementsByTagName('tbody')[0].innerHTML;
//        citizenshipTbodyContent = tbodyContent;
        initMdEvent("tableCommunityCategory");
        initMdEvent("tableCommunitySegment");
        initMdEvent("tableCommunityArea");
    };

    function handleKey(e){
        if(e.keyCode === 13){
            e.preventDefault(); // Ensure it is only this code that runs
            element = event.srcElement;
            element.blur();
        }
    }

    function postMdCommunityCategory(){
        var frmData = $("#formCommunityCategory").serialize()
        $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });

         $.ajax({
            type:'POST',
            data: frmData,
            dataType: 'json',
            url:'/admin/community-categories',
            success:function(data) {
                if(data==1){
                    refreshTableCommunityCategory();
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

    function postMdCommunityArea(){
        var frmData = $("#formCommunityArea").serialize()
        $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });

         $.ajax({
            type:'POST',
            data: frmData,
            dataType: 'json',
            url:'/admin/community-areas',
            success:function(data) {
                if(data==1){
                    refreshTableCommunityArea();
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

    function refreshTableCommunityCategory() {
        $('div.table-community-category').fadeOut();
        $('div.table-community-category').load('/admin/table-community-categories', function() {
            $('div.table-community-category').fadeIn();
            initMdEvent("tableCommunityCategory", "selectCommunityCategory", "/admin/select-community-categories");
        });
      }

      function refreshTableCommunitySegment() {
        $('div.table-community-segment').fadeOut();
        $('div.table-community-segment').load('/admin/table-community-segments', function() {
            $('div.table-community-segment').fadeIn();
            initMdEvent("tableCommunitySegment", "selectCommunitySegment", "/admin/select-community-segments");
        });
      }

      function refreshTableCommunityArea() {
        $('div.table-community-area').fadeOut();
        $('div.table-community-area').load('/admin/table-community-areas', function() {
            $('div.table-community-area').fadeIn();
            initMdEvent("tableCommunityArea", "selectCommunityArea", "/admin/select-community-areas");
        });
      }

</script>

<script>
    $(document).ready(function() {
        var select2elms = document.querySelectorAll('.input-select2');

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

    $('.token-select2').select2({
        tags: true,
        // automatically creates tag when user hit space or comma:
        tokenSeparators: [",", " "],
    });

    var arrCtyName = [];
    var categoryIndex = -1;
    var segmentIndex = -1;
    var areaIndex = -1;
    var nx=0;
    $('#selectCommunityCategory').on("change", function (e) {
        if(nx>2) nx = 0;
        if(categoryIndex == -1){
            categoryIndex = nx;
            nx++;
        }
        var data = $(this).select2('data');
        var text = $.trim(data[0].text);
        arrCtyName[categoryIndex] = text;
        $('#name').val($.trim(arrCtyName.join(" ")));
    });

    $('#selectCommunitySegment').on("change", function (e) {
        if(nx>2) nx = 0;
        if(segmentIndex == -1){
            segmentIndex = nx;
            nx++;
        }
        var data = $(this).select2('data');
        var text = $.trim(data[0].text);
        arrCtyName[segmentIndex] = text;
        $('#name').val($.trim(arrCtyName.join(" ")));
    });

    $('#selectCommunityArea').on("change", function (e) {
        if(nx>2) nx = 0;
        if(areaIndex == -1){
            areaIndex = nx;
            nx++;
        }
        var data = $(this).select2('data');
        var text = $.trim(data[0].text);
        arrCtyName[areaIndex] = text;
        $('#name').val($.trim(arrCtyName.join(" ")));
    });

    $('#name').on("input", function(e){
        if($('#name').val().length==0){
            arrCtyName = [];
            categoryIndex = -1;
            segmentIndex = -1;
            areaIndex = -1;
            nx=0;
        }
    })

    function focusLastRow(tableId) {
        console.log(tableId);

        const table = document.getElementById(tableId);
        const lastRow = table.rows[table.rows.length - 1];
        lastRow.scrollIntoView({ behavior: 'smooth' });

        lastRow.addEventListener('click', () => {
        });

        lastRow.click();
    }
</script>
@endsection

