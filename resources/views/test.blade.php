<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="m-5">
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
                                        <li>{{ $event->name }} - <span
                                                class="text-danger">{{ date('F', strtotime($event->start_date)) }}</span>
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
