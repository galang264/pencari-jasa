<!DOCTYPE html>

<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>SeJasa Kita</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

    body{
        background:#f8fafc;
    }

    .hero{
        background:linear-gradient(135deg,#0d6efd,#4f8cff);
        color:white;
        padding:100px 0;
    }

    .feature-card{
        transition:.3s;
    }

    .feature-card:hover{
        transform:translateY(-5px);
    }

    .category-card{
        border:none;
        transition:.3s;
    }

    .category-card:hover{
        transform:translateY(-5px);
    }

    footer{
        background:#212529;
        color:white;
    }

</style>

</head>
<body>

<!-- Navbar -->

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">

<div class="container">

    <a class="navbar-brand fw-bold text-primary" href="/">
        SeJasa Kita
    </a>

    <div class="ms-auto">

        <a href="/login" class="btn btn-outline-primary me-2">
            Login
        </a>

        <a href="/register" class="btn btn-primary">
            Register
        </a>

    </div>

</div>

</nav>

<!-- Hero -->

<section class="hero">

<div class="container text-center">

    <h1 class="display-4 fw-bold">

        Temukan Jasa Terbaik
        Untuk Kebutuhan Anda

    </h1>

    <p class="lead mt-3">

        Platform marketplace jasa yang mempertemukan pelanggan dengan mitra profesional.

    </p>

    <div class="mt-4">

        <a href="/user/services" class="btn btn-light btn-lg me-2">

            Cari Jasa

        </a>

        <a href="/register" class="btn btn-outline-light btn-lg">

            Jadi Mitra

        </a>

    </div>

</div>

</section>

<!-- Fitur -->

<section class="py-5">

<div class="container">

    <div class="text-center mb-5">

        <h2>Kenapa Memilih SeJasa Kita?</h2>

    </div>

    <div class="row">

        <div class="col-md-3 mb-4">

            <div class="card feature-card shadow-sm h-100">

                <div class="card-body text-center">

                    <h1>🔍</h1>

                    <h5>Cari Jasa</h5>

                    <p>
                        Temukan berbagai layanan sesuai kebutuhan.
                    </p>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-4">

            <div class="card feature-card shadow-sm h-100">

                <div class="card-body text-center">

                    <h1>⭐</h1>

                    <h5>Review</h5>

                    <p>
                        Lihat penilaian pelanggan sebelumnya.
                    </p>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-4">

            <div class="card feature-card shadow-sm h-100">

                <div class="card-body text-center">

                    <h1>🛠</h1>

                    <h5>Mitra Profesional</h5>

                    <p>
                        Penyedia jasa terpercaya dan berpengalaman.
                    </p>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-4">

            <div class="card feature-card shadow-sm h-100">

                <div class="card-body text-center">

                    <h1>⚡</h1>

                    <h5>Pemesanan Mudah</h5>

                    <p>
                        Proses pemesanan cepat dan praktis.
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

</section>

<!-- Kategori -->

<section class="py-5 bg-light">

<div class="container">

    <div class="text-center mb-5">

        <h2>Kategori Populer</h2>

    </div>

    <div class="row">

        <div class="col-md-3 mb-3">

            <div class="card category-card shadow-sm">

                <div class="card-body text-center">

                    <h1>❄️</h1>

                    <h5>Service AC</h5>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-3">

            <div class="card category-card shadow-sm">

                <div class="card-body text-center">

                    <h1>🧹</h1>

                    <h5>Cleaning Service</h5>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-3">

            <div class="card category-card shadow-sm">

                <div class="card-body text-center">

                    <h1>⚡</h1>

                    <h5>Tukang Listrik</h5>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-3">

            <div class="card category-card shadow-sm">

                <div class="card-body text-center">

                    <h1>📚</h1>

                    <h5>Les Privat</h5>

                </div>

            </div>

        </div>

    </div>

</div>

</section>

<!-- Cara Kerja -->

<section class="py-5">

<div class="container">

    <div class="text-center mb-5">

        <h2>Cara Kerja</h2>

    </div>

    <div class="row text-center">

        <div class="col-md-3">

            <h1>1️⃣</h1>

            <h5>Cari Jasa</h5>

        </div>

        <div class="col-md-3">

            <h1>2️⃣</h1>

            <h5>Pilih Mitra</h5>

        </div>

        <div class="col-md-3">

            <h1>3️⃣</h1>

            <h5>Pesan Layanan</h5>

        </div>

        <div class="col-md-3">

            <h1>4️⃣</h1>

            <h5>Beri Review</h5>

        </div>

    </div>

</div>

</section>

<!-- CTA -->

<section class="py-5 bg-primary text-white">

<div class="container text-center">

    <h2>

        Siap Menemukan Jasa Terbaik?

    </h2>

    <p class="mt-3">

        Bergabung sekarang dan nikmati kemudahan mencari layanan profesional.

    </p>

    <a href="/register" class="btn btn-light btn-lg">

        Daftar Sekarang

    </a>

</div>

</section>

<!-- Footer -->

<footer class="py-4">

<div class="container text-center">

    <h5>SeJasa Kita</h5>

    <p class="mb-0">

        Marketplace Jasa Berbasis Web

    </p>

    <small>

        © 2026 SeJasa Kita

    </small>

</div>

</footer>

</body>
</html>
