<table class="table table-bordered table-sm" id="tableSegmentAttendance">
    <thead style="background-color:black;color:white;">
        <tr>
            <td width="20%">
                <strong>TITLE</strong>
            </td>
            <td width="80%">
                <strong>DESCRIPTION</strong>
            </td>
            <td style="display: none;">
                <strong>ID</strong>
            </td>
        </tr>
    </thead>
    <tbody>
        @foreach ($segments as $segment)
        <tr>
            <td>
                <input style="text-transform:uppercase" class="input-borderless" value="{{ $segment->title }}" name="title[]" type="text" readonly>
            </td>
            <td>
                <input style="width: 100%;" class="input-borderless" value="{{ $segment->description }}" name="description[]" type="text" readonly>
            </td>
            <td style="display: none;">
                <input class="input-borderless" value="{{ $segment->id }}" name="id[]" type="hidden" readonly>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
