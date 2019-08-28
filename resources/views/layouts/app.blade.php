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
        <!-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
        </form> -->
    </div>
</nav>
@if(isset(Auth::user()->id))
    <data style="display: none" data-id="{{}}" id="userId"></data>
@endif
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
