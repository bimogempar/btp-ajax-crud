<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <title>SOAL TEST LARAVEL DEVELOPER BTP</title>
</head>

<body>
    <div class="m-5">
        {{-- create button method and event --}}
        <button type="button" class="btn btn-primary" onclick="create()">
            Create New Event
        </button>

        {{-- table --}}
        <table class="table table-striped" id="tableData">
            <thead>
                <tr>
                    <th>Method</th>
                    @foreach ($dates as $date)
                        <th>{{ $date }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($methods as $method)
                    <tr>
                        <td>
                            {{ $method->name }}
                        </td>
                        @foreach ($dates as $date)
                            <td>
                                @foreach ($method->events as $event)
                                    @if ($date === date('F', strtotime($event->start_date)))
                                        <li onclick="show({{ $event->id }})" style="cursor: pointer">
                                            {{ $event->name }} <br>
                                            <span class="text-primary">({{ $event->start_date }} -
                                                {{ $event->end_date }})</span>
                                        </li>
                                    @endif
                                @endforeach
                            </td>
                        @endforeach
                    <tr>
                @endforeach
                <tr>
                    <td>Job Assignment</td>
                    <td colspan={{ count($dates) }} style="text-align:center;">Sesuai Penugasan</td>
                </tr>
            </tbody>
        </table>

        {{-- modal --}}
        <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="showBodyModal">
                        {{-- dynamic modal --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="btnSubmmit"></button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- jquery ajax --}}
    <script>
        function create() {
            const url = '/create'
            $.get(url, function(data) {
                $('#modalLabel').text('Create Event')
                $('#showBodyModal').html(data);
                $('#showModal').modal('show');
                $('#btnSubmmit').text('Save Event').attr('onclick', 'store()');
            });
        }

        function show(id) {
            const url = '/show/' + id
            $.get(url, function(data) {
                $('#modalLabel').text('Update Event')
                $('#showBodyModal').html(data);
                $('#showModal').modal('show');
                $('#btnSubmmit').text('Update Event').attr('onclick', 'update()');
            });
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
