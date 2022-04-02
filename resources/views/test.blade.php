<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>SOAL TEST LARAVEL DEVELOPER BTP</title>
</head>

<body>
    <div class="m-5">

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Create New Event
        </button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create New Method and Event</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="method">Which Method Exist</label>
                            <select class="form-select" name="method" id="">
                                <option disabled selected>Open this select menu</option>
                                @foreach ($methods as $method)
                                    <option value={{ $method->id }}>{{ $method->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-striped">
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
                                        <li type="button" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{ $event->id }}">
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

        {{-- modal using attribute --}}
        @foreach ($methods as $method)
            @foreach ($method->events as $event)
                <div class="modal fade" id="exampleModal{{ $event->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{ $method->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                {{ $event->name }} <br>
                                <span class="text-primary">({{ $event->start_date }} -
                                    {{ $event->end_date }})</span>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
