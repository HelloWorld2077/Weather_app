<html>

    <head>
        <title> Weather app</title>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css' />
    </head>

    <body>  

        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Weather app</a>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" href="/entry_forecast" >Forecast</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" href="/about">About</a>
                        </li>
                    </ul>
                    <span class="navbar-text">
                        My first API related app :D
                    </span>
                </div>
            </div>
        </nav>

        <div class='container'>
            @yield('content')
        </div>

    </body>
    
<footer>
    <!-- work on this -->
</footer>

</html>
