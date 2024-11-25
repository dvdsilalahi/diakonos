@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Event Templates</h1>
</div>

@if(session()->has('success'))
    <div class="alert alert-success col-lg-12" role="alert">
        {{ session('success') }}
    </div>
@endif

Toggle column visibility: <div id="toggleMemberColumns"></div>

<div class="table-responsive col-lg-12">
    <table id="eventTemplateList" class="display table table-striped table-sm">
        <thead>
        </thead>
        <tfoot>
        </tfoot>
    </table>
  </div>

  <!-- Modal: Archive Confirmation -->
  <div class="modal fade" id="archiveModal" tabindex="-1" aria-labelledby="archiveModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="archiveModalLabel"><span style="width:25px;height:25px;" data-feather="alert-octagon"></span> Archive/Inactivation Confirmation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          'Member "" will be archived/inactivated. Are you sure?'
        </div>
        <div class="modal-footer">
            <form action="/admin/event-templates/archive/" method="POST" class="d-inline modal-form">
                @method('post')
                @csrf
                <input type="hidden" name="is_active" value="0">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-dark"><span style="width: 25px;height:25px;" data-feather="archive"></span>Archive</button>
            </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal: Delete Confirmation -->
  <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmModalModalLabel"><span style="width:25px;height:25px;" data-feather="alert-octagon"></span> Delete Confirmation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          'Member "" will be removed. Are you sure?'
        </div>
        <div class="modal-footer">
            <form action="/dashboard/event-templates" method="POST" class="d-inline modal-form">
                @method('delete')
                @csrf
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger"><span style="width: 25px;height:25px;" data-feather="x-circle"></span>Delete</button>
            </form>
        </div>
      </div>
    </div>
  </div>


  <script>
    var table_members = null;
    var arrColumns = [];

    $(document).ready(function() {
        table_members = new DataTable('#eventTemplateList', {
            "dom":  "<'row'<'col-sm-12'B>>" +
                    "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
                    "r<'row'<'col-sm-12't>>" +
                    "<'row'<'col-sm-6'i><'col-sm-6'p>>",
            "buttons": [
                {
                    text: '<i class="bi bi-plus-square h6"></i>',
                    action: function ( e, dt, node, config ) {
                        window.location.href = "/admin/event-templates/create";
                    }
                },
                {
                    extend: 'copy',
                    text: '<i class="bi bi-clipboard-check h6"></i>',
                    className: 'btn-export',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'csv',
                    text: '<i class="bi bi-filetype-csv h6"></i>',
                    className: 'btn-export',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'excel',
                    text: '<i class="bi bi-filetype-xlsx h6"></i></i>',
                    className: 'btn-export',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdf',
                    text:'<i class="bi bi-filetype-pdf h6"></i>',
                    className: 'btn-export',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    text: '<i class="bi bi-arrow-clockwise h6"></i>',
                    action: function ( e, dt, node, config ) {
                        dt.ajax.reload();
                    }
                }
            ],
            "processing": true,
            "language": {
                "processing": '<div style="border:none; position:absolute; text-align: center; left: 10px; right: 10px; border: 0;">Loading...</div>'
            },
            "serverSide": false,
            "ajax": {
                "type" : "GET",
                "url" : "/admin/event-template-list",
                "dataSrc": function ( json ) {
                    var ncolumns = $('#eventTemplateList').DataTable().columns().nodes().length;
                    var toggleHTML = "";
                    for(var i = 0; i < ncolumns; i++){
                        var columnTitle = table_members.column(i).header().innerHTML;
                        var columnStyle = "";
                        if (table_members.column(i).visible()){
                            columnStyle = "color: #0d6efd;";
                        } else {
                            columnStyle = "color: red;";
                        }
                        if(i==0){
                            toggleHTML = toggleHTML + '<a role="button" class="toggle-vis" data-column="'+i+'" style="'+columnStyle+'">'+columnTitle+'</a>';
                        } else if(i>0) {
                            toggleHTML = toggleHTML + ' - <a role="button" class="toggle-vis" data-column="'+i+'" style="'+columnStyle+'">'+columnTitle+'</a>';
                        }
                        document.getElementById("toggleMemberColumns").innerHTML = toggleHTML;
                    }

                    document.querySelectorAll('a.toggle-vis').forEach((el) => {
                        el.addEventListener('click', function (e) {
                            e.preventDefault();

                            let columnIdx = e.target.getAttribute('data-column');
                            let column = table_members.column(columnIdx);

                            // Toggle the visibility
                            column.visible(!column.visible());
                            if(e.target.style.color=='red'){
                                e.target.style.color = '#0d6efd';
                            } else {
                                e.target.style.color = 'red';
                            }
                        });
                    });

                    for (var key in json.data) {
//                        console.log(json.data[key]['event_category'].title);
                        json.data[key]['event_category'] = json.data[key]['event_category'].title;
//                        json.data[key]['minister_duties'] = JSON.parse(json.data[key]['minister_duties']).items;
//                        json.data[key]['community_duties'] = JSON.parse(json.data[key]['community_duties']).items;
                     }

                    return json.data;
                }
            },
            "columnDefs": [
                {title: '#', targets: 0, width: '5%', visible:true},
                {title: 'Action', targets: 1, width: '15%', visible:true},
                {title: 'Event Category', targets: 2, width: '10%', visible:true},
                {title: 'Minister Duties', targets: 3, width: '10%', visible:true},
                {title: 'Community Duties', targets: 4, width: '10%', visible:true},
                {title: 'Segment Attendances', targets: 5, width: '15%', visible:true},
                {title: 'Offering Accounts', targets: 6, width: '15%', visible:true},
            ],
            "columns": [
                { "data": "#",
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                { "data": "action",
                    render: function (data, type, row, meta) {
                        var html = '<a href="/admin/event-templates/'+row['uuid']+'" class="badge bg-primary" data-bs-toggle="tooltip" title="View"><span style="width:10px;height:10px;" data-feather="eye"></span></a> ' +
                        '<a href="/admin/event-templates/'+row['uuid']+'/edit" class="badge bg-warning"><span style="width:10px;height:10px;" data-feather="edit"></span></a> ' +
                        '<button type="button" class="badge bg-danger border-0" data-bs-uuid="'+row['uuid']+'" data-bs-name="'+row['event_category'] + '" data-bs-toggle="modal" data-bs-target="#confirmModal">' +
                        '    <span style="width:10px;height:10px;" data-feather="x-circle"></span>' +
                        '</button> ';
                        return html;
                    }
                },
                { "data": 'event_category' },
                { "data": 'minister_duties' },
                { "data": 'community_duties' },
                { "data": 'segment_attendances' },
                { "data": 'offering_accounts' },
            ],
            "drawCallback": function( settings ) {
                feather.replace();
            },
            bAutoWidth: false,
        });
    });

    var archiveModal = document.getElementById('archiveModal')
    archiveModal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var member_uuid = button.getAttribute('data-bs-uuid')
        var member_name = button.getAttribute('data-bs-name')

        var modalBody = archiveModal.querySelector('.modal-body')
        var modalForm = archiveModal.querySelector('.modal-form')
        modalBody.textContent = 'Member "' + member_name + '" will be archived. Are you sure?';
        modalForm.action = "/admin/members/"+member_uuid+"/archive";
    });

    var confirmModal = document.getElementById('confirmModal')
    confirmModal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var eventtemplate_uuid = button.getAttribute('data-bs-uuid')
        var eventtemplate_name = button.getAttribute('data-bs-name')

        var modalBody = confirmModal.querySelector('.modal-body')
        var modalForm = confirmModal.querySelector('.modal-form')
        modalBody.textContent = 'Event Template "' + eventtemplate_name + '" will be removed permanently. Are you sure?';
        modalForm.action = "/admin/event-templates/" + eventtemplate_uuid;
    });
  </script>


@endsection
