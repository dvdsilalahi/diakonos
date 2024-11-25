<table class="table table-bordered table-sm" id="tableCommunityArea">
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
        @foreach ($areas as $area)
        <tr>
            <td>
                <input style="text-transform:uppercase" class="input-borderless" value="{{ $area->title }}" name="title[]" type="text" readonly>
            </td>
            <td>
                <input style="width: 100%;" class="input-borderless" value="{{ $area->description }}" name="description[]" type="text" readonly>
            </td>
            <td style="display: none;">
                <input class="input-borderless" value="{{ $area->id }}" name="id[]" type="hidden" readonly>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
