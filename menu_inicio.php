<div class="navview-pane">
        <div class="bg-darkCyan d-flex flex-align-center">
            <button class="pull-button m-0 bg-darkCyan-hover">
                <span class="mif-menu fg-white"></span>
            </button>
            <h2 class="text-light m-0 fg-white pl-7" style="line-height: 52px"></h2>
        </div>

        <ul class="navview-menu mt-4" id="side-menu">
            <li class="item-header">MENU PRINCIPAL</li>
            <li>
                <a href="#dashboard">
                    <span class="icon"><span class="mif-meter"></span></span>
                    <span class="caption">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#" class="dropdown-toggle">
                    <span class="icon"><span class="mif-profile"></span></span>
                    <span class="caption">Pacientes</span>
                </a>
                <ul class="navview-menu stay-open" data-role="dropdown">
                    <li class="item-header">Pacientes</li>
                    <li><a href="#cadastrarpaciente">
                        <span class="icon"><span class="mif-user-plus"></span></span>
                        <span class="caption">Cadastrar</span>
                    </a></li>
                </ul>
            </li>
            <li>
                <a href="logout.php">
                    <span class="icon"><span class="mif-exit fg-red"></span></span>
                    <span class="caption">Sair</span>
                </a>
            </li>
        </ul>

        <div class="w-100 text-center text-small data-box p-2 border-top bd-grayMouse" style="position: absolute; bottom: 0">
            <div>&copy; <? echo date("Y"); ?> ODONTOVIDA</div>
        </div>
    </div>

    <div class="navview-content h-100">
        <div data-role="appbar" class="bg-darkCyan pos-absolute fg-white">

            <a href="#" class="app-bar-item d-block d-none-lg" id="paneToggle"><span class="mif-menu"></span></a>

            <div class="app-bar-container ml-auto">
                <a href="#" class="app-bar-item">
                    <span class="mif-bell"></span>
                    <span class="badge bg-orange fg-white mt-2 mr-1">10</span>
                </a>
            </div>
        </div>

        <div id="content-wrapper" class="content-inner h-100" style="overflow-y: auto"></div>

    </div>
</div>