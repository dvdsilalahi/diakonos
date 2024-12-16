<table class="table table-bordered table-sm" id="tableEventFacility">
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
        @foreach ($eventfacilities as $eventfacility)
        <tr>
            <td>
                <input onkeydown="return /[a-zA-Z -]|Backspace+$/i.test(event.key)" style="text-transform:uppercase" class="input-borderless" value="{{ $eventfacility->title }}" name="title[]" type="text" readonly>
            </td>
            <td>
                <input style="width: 100%;" class="input-borderless" value="{{ $eventfacility->description }}" name="description[]" type="text" readonly>
            </td>
            <td style="display: none;">
                <input class="input-borderless" value="{{ $eventfacility->id }}" name="id[]" type="hidden" readonly>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
