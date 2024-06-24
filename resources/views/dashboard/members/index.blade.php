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

<div class="table-responsive col-lg-12">
    <a href="/dashboard/members/create" class="btn btn-primary mb-3"><i data-feather="plus" style="width: 20px; height: 20px;"></i>Member</a>
    <table class="table table-striped table-sm">
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
