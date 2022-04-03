<div class="mb-3">
    <label for="method">Which Method Exist</label>
    <select class="form-select" name="method" id="">
        <option selected disabled value="{{ $event->method->id }}">{{ $event->method->name }}</option>
        @foreach ($methods as $method)
            <option value={{ $method->id }}>{{ $method->name }}</option>
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
