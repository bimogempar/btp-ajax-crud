@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>

                <div id="notification" class="my-3"></div>
            </div>
        </div>
    </div>

    {{-- laravel echo --}}
    <script>
        window.laravel_echo_port = '{{ env('LARAVEL_ECHO_PORT') }}';
    </script>
    <script src="//{{ Request::getHost() }}:{{ env('LARAVEL_ECHO_PORT') }}/socket.io/socket.io.js"></script>
    <script src="{{ url('/js/laravel-echo-setup.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        var i = 0;
        window.Echo.channel('message-channel')
            .listen('.MessageEvent', (listen) => {
                i++;
                $("#notification").append('<div class="alert alert-success">' + i + '.' + listen.message + '</div>');
            });
    </script>
@endsection
