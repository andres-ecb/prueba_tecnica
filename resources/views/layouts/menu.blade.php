
<header>
    <style>
        .cuerpodelmenu {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #1F2937;
            padding: 10px 30px;
            color: white;
            font-family: 'Segoe UI', sans-serif;
        }

        .menu-logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .menu-logo img {
            height: 60px;
        }

        .menu-nav {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .menu-item {
            position: relative;
        }

        .menu-link {
            color: white;
            border-radius: 8px;
            text-decoration: none;
            padding: 10px 15px;
            display: inline-block;
            transition: background-color 0.5s ease, color 0.5s ease;
        }

        .menu-link:hover,
        .menu-item.active > .menu-link {
            background-color: rgb(126, 124, 124);
            border-radius: 8px;
            color: white;
            text-decoration: none;
        }

        .active > .menu-link,
        .submenu a.active-sub {
            background-color: #800000;
            color: white;
            border-radius: 8px;
        }

        .submenu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #455266;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            min-width: 180px;
            z-index: 1000;
            border-radius: 8px;
        }

        .submenu a {
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            display: block;
        }

        .submenu a:hover {
            background-color: #586374;
            border-radius: 8px;
        }

        .menu-item:hover .submenu {
            display: block;
        }
    </style>
    <div class="cuerpodelmenu">
        <div class="menu-logo">
            <a href="/">
            <img src="{{ asset('imgs_proy/logo1.png') }}" alt="Logo">
            </a>
        </div>

        <nav class="menu-nav">
            <div class="menu-item {{ request()->routeIs('stock_critico.ordenes') || request()->routeIs('gestion_productos.index') || request()->routeIs('stock_critico.index') ? 'active' : '' }}">
                <a href="#" class="menu-link">Gestión de Bodega</a>
                <div class="submenu">
                    <a href="{{ route('gestion_productos.index') }}" class="{{ request()->routeIs('gestion_productos.index') ? 'active-sub' : '' }}">Inventario</a>
                    <a href="{{ route('stock_critico.index') }}" class="{{ request()->routeIs('stock_critico.index') ? 'active-sub' : '' }}">Stock Crítico</a>
                    <a href="{{ route('stock_critico.ordenes') }}" class="{{ request()->routeIs('stock_critico.ordenes') ? 'active-sub' : '' }}">Órdenes de Reposición</a>
                </div>
            </div>
            <div class="menu-item {{ request()->is('/') ? 'active' : '' }}">
                <a href="/" class="menu-link">Inicio</a>
            </div>
        </nav>
    </div>
</header>