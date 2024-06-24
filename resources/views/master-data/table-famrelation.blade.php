<table class="table table-bordered table-sm" id="tableFamilyRelation">
    <thead style="background-color:black;color:white;">
        <tr>
            <td width="20%">
                <strong>TITLE</strong>
            </td>
            <td width="80%">
                <strong>DESCRIPTION</strong>
            </td>
        </tr>
    </thead>
    <tbody>
        @foreach ($famrelations as $famrelation)
        <tr>
            <td>
                <input style="text-transform:uppercase" class="input-borderless" value="{{ $famrelation->title }}" name="title[]" type="text" readonly>
            </td>
            <td>
                <input style="width: 100%;" class="input-borderless" value="{{ $famrelation->description }}" name="description[]" type="text" readonly>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
