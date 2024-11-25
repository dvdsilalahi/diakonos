@extends('dashboard.layouts.main')

@section('container')
<div class="row my-3">
    <div class="col-lg-12">
        <a type="button" href="/dashboard/members/" class="btn btn-link mb-3" style="text-decoration: none;"><i data-feather="arrow-left" style="width: 20px; height: 20px;"></i>Back</a>
        <h1 class="h2">Family Members</h1>
    </div>
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
          <th scope="col"></th>
          <th scope="col">Name</th>
          <th scope="col">Relation</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($fam_members as $fam_member)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
                @if($fam_member->pic)
                <div style="max-height: 250px; overflow:hidden;">
                    <a href="/dashboard/members/{{ $fam_member->uuid }}" class="p-0"><img src="{{ asset('/storage/' . $fam_member->pic) }}" width="200" alt="{{ $fam_member->first_name }}" class="img-fluid"></a>
                </div>
            @else
            &nbsp;
            @endif
            </td>
            <td>
                {{ $fam_member->first_name . ' ' . $fam_member->last_name}}
            </td>
            <td>{{ $fam_member->fam_relation}}</td>
            <td class="col-sm-4">
                <a href="/dashboard/members/{{ $fam_member->uuid }}" class="badge bg-primary"><span data-feather="eye"></span></a>
                <a href="/dashboard/members/{{ $fam_member->uuid }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <button type="button" class="badge bg-danger border-0" data-bs-uuid="{{ $fam_member->uuid }}" data-bs-name="{{ $fam_member->first_name . ' ' . $fam_member->last_name}}" data-bs-toggle="modal" data-bs-target="#confirmModal">
                    <span data-feather="x-circle"></span>
                </button>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <!-- Modal: Delete Confirmation -->
  <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmModalLabel"><span style="width:25px;height:25px;" data-feather="alert-octagon"></span> Delete Confirmation</h5>
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
    var confirmModal = document.getElementById('confirmModal')
    confirmModal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var member_uuid = button.getAttribute('data-bs-uuid')
        var member_name = button.getAttribute('data-bs-name')

        var modalBody = confirmModal.querySelector('.modal-body')
        var modalForm = confirmModal.querySelector('.modal-form')
        modalBody.textContent = 'Member "' + member_name + '" will be removed. Are you sure?';
        modalForm.action = "/dashboard/members/" + member_uuid;

    });
  </script>
@endsection
