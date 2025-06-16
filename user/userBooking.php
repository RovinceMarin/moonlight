<?php session_start(); ?>

<?php include '../header.php'; ?>
<?php include '../navbar.php'; ?>
<style>
    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .btn-pink {
        background-color: #ff6fa7;
        border: none;
        color: white;
        transition: background-color 0.3s ease;
    }

    .btn-pink:hover {
        background-color: #ff4d91;
        color: white;
    }

    .welcome-box {
        background: linear-gradient(135deg, #ffe6f0, #ffeef8);
        border-radius: 1rem;
        padding: 2rem;
        box-shadow: 0 8px 18px rgba(0, 0, 0, 0.1);
    }
</style>

<?php
if (isset($_SESSION['username'])):
    $username = htmlspecialchars($_SESSION['username']);
    ?>
    <div class="container my-4">
        <div class="welcome-box text-center">
            <h2 class="fw-bold">Welcome, <?= $username ?>! 👋</h2>
            <p class="lead">We're glad to have you at <strong>Moonlight Studio</strong>.</p>
        </div>
    </div>

<?php endif; ?>

<div class="container my-5">
    <div class="row g-4">

        <!-- Lunar Package -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 shadow-sm border-0 text-center">
                <img src="../img/lunar.png" class="card-img-top" alt="Lunar Package">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Lunar Package</h5>
                    <p class="card-text">Perfect for individuals and couples</p>
                    <p class="text-muted fw-bold">₱899</p>
                    <a href="../booking/booking.php?package=Lunar&price=1" class="btn btn-pink rounded-pill px-4">Book
                        Now</a>
                </div>
            </div>
        </div>

        <!-- Nocturnal Package -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 shadow-sm border-0 text-center">
                <img src="../img/nocturnal.png" class="card-img-top" alt="Nocturnal Package">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Nocturnal Package</h5>
                    <p class="card-text">Great for small groups of 3–4</p>
                    <p class="text-muted fw-bold">₱1,199</p>
                    <a href="../booking/booking.php?package=Nocturnal&price=1199"
                        class="btn btn-pink rounded-pill px-4">Book Now</a>
                </div>
            </div>
        </div>

        <!-- Twilight Package -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 shadow-sm border-0 text-center">
                <img src="../img/twilight.png" class="card-img-top" alt="Twilight Package">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Twilight Package</h5>
                    <p class="card-text">Perfect for groups of 5–6</p>
                    <p class="text-muted fw-bold">₱1,599</p>
                    <a href="../booking/booking.php?package=Twilight&price=1599"
                        class="btn btn-pink rounded-pill px-4">Book Now</a>
                </div>
            </div>
        </div>

        <!-- Celestial Package -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 shadow-sm border-0 text-center">
                <img src="../img/celestial.png" class="card-img-top" alt="Celestial Package">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Celestial Package</h5>
                    <p class="card-text">Ideal for large groups of 7–8</p>
                    <p class="text-muted fw-bold">₱1,999</p>
                    <a href="../booking/booking.php?package=Twilight&price=1599"
                        class="btn btn-pink rounded-pill px-4">Book Now</a>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if (isset($_GET['success']) && $_GET['success'] == '1'): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Booking Successful!',
            text: 'Thank you for booking with us.',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        });
    </script>
<?php endif; ?>

<?php include '../footer.php'; ?>