<html>
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" rel="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="/">Joden BV Dashboard</a>

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
    </div>
</nav>
@if(isset(Auth::user()->id))
    <data style="display: none" data-id="{{}}" id="userId"></data>
@endif
<a style="position: absolute; bottom: 0; left: 0; margin:0; font-size: 10px; color: white" id="error"></a>
<script type="text/javascript">
    function getValueFromInput(id) {
        return document.getElementById(id).value;
    }

    function getUserId() {
        let id = document.getElementById('userId');

        try {
            id.getAttribute('data-id');
        } catch {
            throw new Error('Not permitted');
        }

        return id;
    }

</script>
@yield('content')
</body>
</html>
