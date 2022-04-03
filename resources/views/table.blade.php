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
