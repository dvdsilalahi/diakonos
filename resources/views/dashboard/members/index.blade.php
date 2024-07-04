@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Members</h1>
</div>

@if(session()->has('success'))
    <div class="alert alert-success col-lg-12" role="alert">
        {{ session('success') }}
    </div>
@endif

Toggle column visibility: <div id="toggleMembersColumns"></div>

<div class="table-responsive col-lg-12">
    <table id="memberList" class="display table table-striped table-sm">
        <thead>
            <tr>
{{--                  <th scope="col">#</th>
                <th scope="col">member_code</th>
                <th scope="col">first_name</th>
                    <th scope="col">last_name</th>
                <th scope="col">uuid</th>
                <th scope="col">email</th>
                    <th scope="col">phone_number</th>
                <th scope="col">place_of_birth</th>
                    <th scope="col">date_of_birth</th>
                <th scope="col">address</th>
                    <th scope="col">country</th>
                <th scope="col">municipality</th>
                    <th scope="col">district</th>
                <th scope="col">village</th>
                    <th scope="col">hamlet</th>
                <th scope="col">neighbourhood</th>
                    <th scope="col">nin</th>
                <th scope="col">ssn</th>
                    <th scope="col">fr_no</th>
                <th scope="col">gender</th>
                    <th scope="col">bloodtype</th>
                <th scope="col">fam_relation</th>
                    <th scope="col">education</th>
                <th scope="col">profession</th>
                    <th scope="col">citizenship</th>
                <th scope="col">father_name</th>
                    <th scope="col">mother_name</th>
                <th scope="col">pic</th>
                    <th scope="col">ministries</th>
                <th scope="col">spiritual_gifts</th>
                    <th scope="col">personality_types</th>
                <th scope="col">skills</th>
                    <th scope="col">hobbies</th>
                <th scope="col">is_active</th>
                <th scope="col">Action</th>
  --}}            </tr>
        </thead>
        <tfoot>
            <tr>
{{--                  <th>#</th>
                <th>Name</th>
                <th>Action</th>
  --}}            </tr>
        </tfoot>
    </table>

    {{--      <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($members as $member)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $member->first_name . ' ' . $member->last_name}}</td>
            <td class="col-sm-4">
                <a href="/dashboard/members/{{ $member->uuid }}" class="badge bg-primary" data-bs-toggle="tooltip" title="View"><span data-feather="eye"></span></a>
                <a href="/dashboard/family/{{ $member->uuid }}" class="badge bg-info"><span data-feather="heart"></span></a>
                <a href="/dashboard/members/{{ $member->uuid }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <button type="button" class="badge bg-dark border-0" data-bs-uuid="{{ $member->uuid }}" data-bs-name="{{ $member->first_name . ' ' . $member->last_name}}" data-bs-toggle="modal" data-bs-target="#archiveModal">
                    <span data-feather="archive"></span>
                </button>
                <button type="button" class="badge bg-danger border-0" data-bs-uuid="{{ $member->uuid }}" data-bs-name="{{ $member->first_name . ' ' . $member->last_name}}" data-bs-toggle="modal" data-bs-target="#confirmModal">
                    <span data-feather="x-circle"></span>
                </button>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  --}}  </div>

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
            <form action="/dashboard/members/archive/" method="POST" class="d-inline modal-form">
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
            <form action="/dashboard/members" method="POST" class="d-inline modal-form">
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
    var table_postCategories = null;
    var arrColumns = [];

    $(document).ready(function() {
        table_postCategories = new DataTable('#memberList', {
            "dom":  "<'row'<'col-sm-12'B>>" +
                    "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
                    "r<'row'<'col-sm-12't>>" +
                    "<'row'<'col-sm-6'i><'col-sm-6'p>>",
            "buttons": [
                {
                    text: '<i class="bi bi-plus-square h6"></i>',
                    action: function ( e, dt, node, config ) {
                        window.location.href = "/dashboard/members/create";
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
                "url" : "/admin/member-list",
                "dataSrc": function ( json ) {
                    var ncolumns = $('#memberList').DataTable().columns().nodes().length;
                    var toggleHTML = "";
                    for(var i = 0; i < ncolumns; i++){
                        var columnTitle = table_postCategories.column(i).header().innerHTML;
                        var columnStyle = "";
                        if (table_postCategories.column(i).visible()){
                            columnStyle = "color: #0d6efd;";
                        } else {
                            columnStyle = "color: red;";
                        }
                        if(i==0){
                            toggleHTML = toggleHTML + '<a role="button" class="toggle-vis" data-column="'+i+'" style="'+columnStyle+'">'+columnTitle+'</a>';
                        } else if(i>0) {
                            toggleHTML = toggleHTML + ' - <a role="button" class="toggle-vis" data-column="'+i+'" style="'+columnStyle+'">'+columnTitle+'</a>';
                        }
                        document.getElementById("toggleMembersColumns").innerHTML = toggleHTML;
                    }

                    document.querySelectorAll('a.toggle-vis').forEach((el) => {
                        el.addEventListener('click', function (e) {
                            e.preventDefault();

                            let columnIdx = e.target.getAttribute('data-column');
                            let column = table_postCategories.column(columnIdx);

                            // Toggle the visibility
                            column.visible(!column.visible());
                            if(e.target.style.color=='red'){
                                e.target.style.color = '#0d6efd';
                            } else {
                                e.target.style.color = 'red';
                            }
                        });
                    });

                    return json.data;
                }
            },
            "columnDefs": [
                {title: '#', targets: 0, width: '5%', visible:true},
                {title: 'Action', targets: 1, width: '10%', visible:true},
                {title: 'Member Code', targets: 2, width: '10%', visible:false},
                {title: 'First Name', targets: 3, width: '10%', visible:true},
                {title: 'Last Name', targets: 4, width: '10%', visible:true},
                {title: 'Email', targets: 5, width: '15%', visible:true},
                {title: 'Phone', targets: 6, width: '15%', visible:true},
                {title: 'Place of Birth', targets: 7, width: '10%', visible:false},
                {title: 'Date of Birth', targets: 8, width: '10%', visible:false},
                {title: 'Address', targets: 9, width: '15%', visible:false},
                {title: 'Neighbourhood', targets: 10, width: '5%', visible:false},
                {title: 'Hamlet', targets: 11, width: '5%', visible:false},
                {title: 'Village', targets: 12, width: '10%', visible:false},
                {title: 'District', targets: 13, width: '10%', visible:false},
                {title: 'Municipality', targets: 14, width: '10%', visible:false},
                {title: 'Province', targets: 15, width: '10%', visible:false},
                {title: 'Country', targets: 16, width: '10%', visible:false},
                {title: 'NIN', targets: 17, width: '10%', visible:false},
                {title: 'SSN', targets: 18, width: '10%', visible:false},
                {title: 'FRN', targets: 19, width: '10%', visible:false},
            ],
            "columns": [
                { "data": "#",
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                { "data": "action",
                    render: function (data, type, row, meta) {
                        var html = '<a href="/dashboard/categories/'+row['slug']+'" class="badge bg-info"><i data-feather="eye"></i></a>' +
                        '<a href="/dashboard/categories/'+row['slug']+'/edit" class="badge bg-warning"><span data-feather="edit"></span></a>' +
                        '<form action="/dashboard/categories/'+row['slug']+'" method="POST" class="d-inline">' +
                        '    @method("delete") ' +
                        '    @csrf  '+
                        '   <button class="badge bg-danger border-0" onclick="return confirm(&#39;Are you sure?&#39;)">' +
                        '   <span data-feather="x-circle"></span>' +
                        '   </button>' +
                        '</form>';
                        return html;
                    }
                },
                { "data": 'member_code' },
                { "data": 'first_name' },
                { "data": 'last_name' },
                { "data": 'email' },
                { "data": 'phone_number' },
                { "data": 'place_of_birth' },
                { "data": 'date_of_birth' },
                { "data": 'address' },
                { "data": 'neighbourhood' },
                { "data": 'hamlet' },
                { "data": 'village' },
                { "data": 'district' },
                { "data": 'municipality' },
                { "data": 'province' },
                { "data": 'country' },
                { "data": 'nin' },
                { "data": 'ssn' },
                { "data": 'fr_no' },
{{--                { "data": 'gender' },
                { "data": 'bloodtype' },
                { "data": 'fam_relation' },
                { "data": 'education' },
                { "data": 'profession' },
                { "data": 'citizenship' },
                { "data": 'father_name' },
                { "data": 'mother_name' },
                { "data": 'pic' },
                { "data": 'ministries' },
                { "data": 'spiritual_gifts' },
                { "data": 'personality_types' },
                { "data": 'skills' },
                { "data": 'hobbies' },
                { "data": 'is_active' },  --}}
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
        modalForm.action = "/dashboard/members/"+member_uuid+"/archive";
    });

    var confirmModal = document.getElementById('confirmModal')
    confirmModal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var member_uuid = button.getAttribute('data-bs-uuid')
        var member_name = button.getAttribute('data-bs-name')

        var modalBody = confirmModal.querySelector('.modal-body')
        var modalForm = confirmModal.querySelector('.modal-form')
        modalBody.textContent = 'Member "' + member_name + '" will be removed permanently. Are you sure?';
        modalForm.action = "/dashboard/members/" + member_uuid;
    });
  </script>


@endsection
