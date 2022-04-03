<div class="mb-3" id="inputSelect">
    <label for="method">Which Method Exist</label>
    <select class="form-select" onchange="getValOption(this)" id="methodExist">
        <option selected disabled>Select Method</option>
        @foreach ($methods as $method)
            <option value={{ $method->id }}>{{ $method->name }}</option>
        @endforeach
        <option value="">Create New Method</option>
    </select>
</div>
<div class="mb-3" id="inputMethod">
    <label for="method">Method</label>
    <input type="text" class="form-control" id="method" placeholder="Create new method">
</div>
<div class="mb-3">
    <label for="event">Event</label>
    <input type="text" class="form-control" id="event" placeholder="Create new event">
</div>
<div class="mb-3">
    <label for="start_date">Start Date</label>
    <input type="date" class="form-control" id="start_date">
</div>
<div class="mb-3">
    <label for="end_date">End Date</label>
    <input type="date" class="form-control" id="end_date">
</div>

<script>
    $('#method').keyup(function() {
        if ($(this).val().length > 0) {
            $('#inputSelect').hide();
        }
        if ($(this).val().length === 0) {
            $('#inputSelect').show();
        }
    });

    function getValOption(getVal) {
        $('#inputMethod').hide();
        if ($(getVal).val() === '') {
            $('#inputMethod').show();
        }
    }

    function store() {
        // console.log('send')
        var method_id = $('#methodExist').val();
        var method = $('#method').val()
        var event = $('#event').val()
        var start_date = $('#start_date').val()
        var end_date = $('#end_date').val()
        $.ajax({
            url: '/store',
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                method_id: method_id,
                name: method,
                event: event,
                start_date: start_date,
                end_date: end_date,
            },
            dataType: 'json',
            success: function(data) {
                $('.btn-close').click();
                reloadTable()
            }
        });
    }

    function reloadTable() {
        $.get('/reload-table', function(data) {
            $('#tableData').html(data)
        })
    }
</script>
