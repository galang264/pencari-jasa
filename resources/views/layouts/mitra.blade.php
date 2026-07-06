<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeJasa Kita - Mitra</title>

    <link rel="icon" href="{{ asset('images/logo.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f5f7fb;
            margin:0;
        }

        .sidebar{
            width:250px;
            min-height:100vh;
            background:white;
            border-right:1px solid #ddd;
        }

        .menu-item{
            padding:12px 20px;
            border-radius:10px;
            margin-bottom:10px;
            text-decoration:none;
            color:black;
            display:block;
            transition:.3s;
        }

        .menu-item:hover{
            background:#e9f2ff;
            color:#0d6efd;
        }

        .menu-item.active{
            background:#0d6efd;
            color:white;
        }

        .card-stat{
            border:none;
            border-radius:15px;
            box-shadow:0 0 10px rgba(0,0,0,.05);
        }

        .header{
            background:white;
            border-bottom:1px solid #ddd;
            padding:15px 25px;
        }

        .avatar{
            width:45px;
            height:45px;
            background:#0d6efd;
            color:white;
            border-radius:50%;
            display:flex;
            align-items:center;
            justify-content:center;
            font-weight:bold;
            cursor:pointer;
        }
    </style>
</head>
<body>

<div class="d-flex">

    <!-- Sidebar -->
    <div class="sidebar p-3">

        <div class="text-center mb-4">

            <img
                src="{{ asset('images/logo.png') }}"
                alt="Logo SeJasa Kita"
                class="img-fluid"
                style="max-width:230px;">

        </div>

        <p>
            Login sebagai
            <br>
            <strong>{{ auth()->user()->name }}</strong>
        </p>

        <a href="/mitra/dashboard"
        class="menu-item {{ request()->is('mitra/dashboard') ? 'active' : '' }}">
            Dashboard
        </a>

        <a href="/mitra/services"
        class="menu-item {{ request()->is('mitra/services*') ? 'active' : '' }}">
            Kelola Jasa
        </a>

        <a href="/mitra/orders"
        class="menu-item {{ request()->is('mitra/orders*') ? 'active' : '' }}">
            Pesanan Masuk
        </a>

        <a href="/mitra/income"
        class="menu-item {{ request()->is('mitra/income*') ? 'active' : '' }}">
            Pendapatan
        </a>
        
        <div class="mt-5">

        </div>

    </div>

    <script>

    document.addEventListener('DOMContentLoaded', function(){

        const price = document.getElementById('price');

        if(price){

            price.addEventListener('input', function(){

                let value = this.value.replace(/\D/g,'');

                this.value = new Intl.NumberFormat('id-ID')
                    .format(value);});

        }

    });

    </script>

    <!-- Content -->
    <div class="flex-grow-1">

        <!-- Header -->
        <div class="header d-flex justify-content-between align-items-center">

            <div>
                <small class="text-muted">
                    Dashboard Mitra
                </small>

                <h5 class="mb-0">
                    Beranda
                </h5>
            </div>

            <div class="d-flex align-items-center gap-3">

                <div class="dropdown">

    <div
        class="avatar"
        data-bs-toggle="dropdown">

        {{ strtoupper(substr(auth()->user()->name,0,1)) }}

    </div>

        <ul class="dropdown-menu dropdown-menu-end">

            <li>
                <span class="dropdown-item-text fw-bold">
                    {{ auth()->user()->name }}
                </span>
            </li>

            <li>
                <hr class="dropdown-divider">
            </li>

            <li>
                <a class="dropdown-item" href="/profile">
                    Pengaturan Akun
                </a>
            </li>

            <li>
                <hr class="dropdown-divider">
            </li>

            <li>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="dropdown-item text-danger">

                        Logout

                    </button>
                </form>

            </li>

        </ul>

    </div>

            </div>

        </div>

        <!-- Main Content -->
        <div class="p-4">

            @yield('content')

            <footer class="text-center mt-5 pt-4 border-top">

                <small class="text-muted">

                    © 2026 SeJasa Kita
                    <br>

                    Marketplace Jasa Profesional dan Terpercaya

                </small>

            </footer>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>