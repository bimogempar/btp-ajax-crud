<div class="mb-3">
    <label for="method">Which Method Exist</label>
    <select class="form-select" name="method" id="methodExist">
        @foreach ($methods as $method)
            <option value={{ $method->id }} {{ $method->id == $event->method->id ? 'selected' : '' }}>
                {{ $method->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label for="event">Event</label>
    <input type="text" class="form-control" id="event" placeholder="Create new event" value="{{ $event->name }}">
</div>
<div class="mb-3">
    <label for="start_date">Start Date</label>
    <input type="date" class="form-control" id="start_date" value="{{ $event->start_date }}">
</div>
<div class="mb-3">
    <label for="end_date">End Date</label>
    <input type="date" class="form-control" id="end_date" value="{{ $event->end_date }}">
</div>

<script>
    function update() {
        var method_id = $('#methodExist').val();
        var event = $('#event').val()
        var start_date = $('#start_date').val()
        var end_date = $('#end_date').val()
        $.ajax({
            url: '/update/{{ $event->id }}',
            type: 'PATCH',
            data: {
                "_token": "{{ csrf_token() }}",
                method_id: method_id,
                name: event,
                start_date: start_date,
                end_date: end_date,
                id: {{ $event->id }}
            },
            dataType: 'json',
            success: function(data) {
                // console.log(data);
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
