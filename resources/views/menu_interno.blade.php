<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a href="http://dev.unimedvr.com.br/apiRestaurante" class="navbar-brand"> Home Page </a> 
        <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler">
            <span class="navbar-toggler-icon">
            </span>
        </button> 
        <div id="navbarSupportedContent" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
            </ul> 
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ $nome_logado }}
                        <span class="caret"></span>
                    </a>
                    <div aria-labelledby="navbarDropdown" class="dropdown-menu dropdown-menu-right">
                        <a href="http://dev.unimedvr.com.br/apiRestaurante/logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item">
                            Deslogar
                        </a> 
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>