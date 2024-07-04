<table class="table table-bordered table-sm" id="tableAdminDiv">
    <thead style="background-color:black;color:white;">
        <tr>
            <td width="20%">
                <strong>VILLAGE</strong>
            </td>
            <td>
                <strong>DISTRICT</strong>
            </td>
            <td>
                <strong>MUNICIPALITY</strong>
            </td>
            <td>
                <strong>PROVINCE</strong>
            </td>
            <td>
                <strong>COUNTRY</strong>
            </td>
            <td style="display: none;">
                <strong>ID</strong>
            </td>
        </tr>
    </thead>
    <tbody>
        @foreach ($admindivs as $admindiv)
        <tr>
            <td>
                <input onkeyup="handleKey(event)" style="text-transform:uppercase" class="input-borderless" value="{{ $admindiv->village }}" name="village[]" type="text" readonly>
            </td>
            <td>
                <input onkeyup="handleKey(event)" style="text-transform:uppercase" class="input-borderless" value="{{ $admindiv->district }}" name="district[]" type="text" readonly>
            </td>
            <td>
                <input onkeyup="handleKey(event)" style="text-transform:uppercase" class="input-borderless" value="{{ $admindiv->municipality }}" name="municipality[]" type="text" readonly>
            </td>
            <td>
                <input onkeyup="handleKey(event)" style="text-transform:uppercase" class="input-borderless" value="{{ $admindiv->province }}" name="province[]" type="text" readonly>
            </td>
            <td>
                <input onkeyup="handleKey(event)" style="text-transform:uppercase" class="input-borderless" value="{{ $admindiv->country }}" name="country[]" type="text" readonly>
            </td>
            <td style="display: none;">
                <input class="input-borderless" value="{{ $admindiv->id }}" name="id[]" type="hidden" readonly>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
