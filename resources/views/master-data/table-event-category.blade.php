<table class="table table-bordered table-sm" id="tableEventCategory">
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
        @foreach ($eventcategories as $eventcategory)
        <tr>
            <td>
                <input onkeydown="return /[a-zA-Z -]|Backspace+$/i.test(event.key)" style="text-transform:uppercase" class="input-borderless" value="{{ $eventcategory->title }}" name="title[]" type="text" readonly>
            </td>
            <td>
                <input style="width: 100%;" class="input-borderless" value="{{ $eventcategory->description }}" name="description[]" type="text" readonly>
            </td>
            <td style="display: none;">
                <input class="input-borderless" value="{{ $eventcategory->id }}" name="id[]" type="hidden" readonly>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>