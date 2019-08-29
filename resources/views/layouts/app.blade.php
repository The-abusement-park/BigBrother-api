<html>
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" rel="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Budget BV Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/locations">Locaties</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/users">Gebruikers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/projects">Projecten</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/items">Items</a>
            </li>
        </ul>
        @if(isset(Auth::user()->id))
        <a href="{{ route('logout') }}">
            <button class="btn btn-danger">Uitloggen</button>
        </a>
        @endif
    </div>
</nav>
@if(isset(Auth::user()->id))
    <data style="display: none" data-id="{{Auth::user()->id}}" id="userId"></data>
@endif
<script type="text/javascript">
    function getValueFromInput(id) {
        return document.getElementById(id).value;
    }

    function a() {
        return {{get_user_id()}};
    }
</script>
@yield('content')
</body>
</html>
