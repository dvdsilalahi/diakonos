@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Post Categories</h1>
</div>

@if(session()->has('success'))
    <div class="alert alert-success col-lg-6" role="alert">
        {{ session('success') }}
    </div>
@endif

<div class="table-responsive col-lg-6">
{{--      <a href="/dashboard/categories/create" class="btn btn-primary mb-3">Create new category</a>  --}}
    <table id="postCategoryList" class="display table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>
<script>
    $(document).ready(function() {
        table_postCategories = new DataTable('#postCategoryList', {
            "dom":  "<'row'<'col-sm-12'B>>" +
                    "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
                    "r<'row'<'col-sm-12't>>" +
                    "<'row'<'col-sm-6'i><'col-sm-6'p>>",
            "buttons": [
                {
                    text: '<i class="bi bi-plus-square h6"></i>',
                    action: function ( e, dt, node, config ) {
                        window.location.href = "/dashboard/categories/create";
                    }
                },
                {
                    extend: 'copy',
                    text: '<i class="bi bi-clipboard-check h6"></i>',
                    className: 'btn-export'
                },
                {
                    extend: 'csv',
                    text: '<i class="bi bi-filetype-csv h6"></i>',
                    className: 'btn-export'
                },
                {
                    extend: 'excel',
                    text: '<i class="bi bi-filetype-xlsx h6"></i></i>',
                    className: 'btn-export'
                },
                {
                    extend: 'pdf',
                    text:'<i class="bi bi-filetype-pdf h6"></i>',
                    className: 'btn-export'
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
            "ajax": "/admin/post-categories",
            "columns": [
                { "data": "#",
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                { "data": "name" },
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
            ],
            "drawCallback": function( settings ) {
                feather.replace();
            },
            bAutoWidth: false,
            aoColumns : [
            { sWidth: '15%' },
            { sWidth: '40%' },
            { sWidth: '40%' },
            ]
        });
    });

</script>
@endsection
