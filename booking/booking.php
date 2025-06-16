<?php
session_start();
$selectedPackage = isset($_GET['package']) ? $_GET['package'] : 'Lunar';
$selectedPrice = isset($_GET['price']) ? intval($_GET['price']) : 899;
?>

<?php include '../header.php'; ?>
<?php include '../navbar.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../css/style.css">

<style>
    .addon-label {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .price-summary {
        background-color: #fff0f5;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        position: sticky;
        top: 20px;
    }

    .booking-form-container {
        border-radius: 20px;
        padding: 30px;
    }

    .form-check-input:checked {
        border-color: #ff69b4;
    }

    .btn-book {
        background-color: #ff69b4;
        border: none;
    }

    .btn-book:hover {
        background-color: #ff4d94;
    }
</style>

<!-- Inject selected package data -->
<div id="booking-data" data-package="<?= $selectedPackage ?>" data-price="<?= $selectedPrice ?>"></div>
<div class="container my-5">
    <a href="../user/userBooking.php" class="btn btn-link text-black text-decoration-none mb-3">
        ← Back to Packages
    </a>
    <div class="container my-5">
        <div class="row g-5">

            <!-- Booking Form -->
            <div class="col-lg-8">
                <div class="booking-form-container shadow-sm">
                    <h3 class="mb-4">📸 Booking Form - <?= htmlspecialchars($selectedPackage) ?> Package</h3>
                    <form id="bookingForm" method="POST" action="processBooking.php">

                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name *</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number *</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="branch" class="form-label">Select Branch *</label>
                            <select class="form-select" id="branch" name="branch" required>
                                <option disabled selected>Select a branch</option>
                                <option>Victory Mall Tanauan</option>
                                <option>SM City Sto. Tomas</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="booking_date" class="form-label">📅 Booking Date *</label>
                            <input type="date" class="form-control" id="booking_date" name="booking_date" required>
                        </div>

                        <h5 class="mt-4">🎁 Add-Ons</h5>
                        <div class="row" id="addons">
                            <!-- Add-ons will be injected here via JS -->
                        </div>
                        <!-- Hidden fields to store selected add-ons, base price, total price -->
                        <input type="hidden" name="selected_addons" id="selectedAddons">
                        <input type="hidden" name="base_price" id="basePriceInput">
                        <input type="hidden" name="total_price" id="totalPriceInput">
                        <input type="hidden" name="selected_package" id="selectedPackageInput">
                        <input type="hidden" name="payment_status" id="payment_status" value="unpaid">


                        <h5 class="mt-4">🎨 Choose Your Preferred Backdrop *</h5>
                        <select class="form-select" id="backdrop" name="backdrop" required>
                            <option disabled selected>Select a color</option>
                            <option>Yellow</option>
                            <option>Blue</option>
                            <option>Red</option>
                            <option>Beige</option>
                        </select>
                        <div class="form-text">* Colors are subject to availability on the day of your session</div>

                        <div class="form-check mt-4">
                            <input class="form-check-input" type="checkbox" id="agree" required>
                            <label class="form-check-label" for="agree">
                                I have read and agree to the <strong>Annyeong Studio Booking Policy</strong>
                            </label>
                        </div>

                    </form>
                </div>
            </div>


            <!-- Booking Summary -->
            <div class="col-lg-4">
                <div class="price-summary">
                    <h5 class="fw-bold mb-3">🧾 Booking Summary</h5>
                    <p class="mb-1">Base Package (<span
                            id="packageName"><?= htmlspecialchars($selectedPackage) ?></span>):
                        <span id="basePrice">₱<?= $selectedPrice ?></span>
                    </p>
                    <ul id="addonList" class="list-unstyled small"></ul>
                    <hr>
                    <h5>Total: <span id="totalPrice">₱<?= $selectedPrice ?></span></h5>

                    <button type="submit" form="bookingForm" class="btn btn-book w-100 mt-3 fw-bold text-white">Book
                        Now</button>
                    <div id="paypal-button-container" class="mt-4"></div>

                </div>
            </div>

        </div>
    </div>
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1100">
        <div id="toastMessage" class="toast align-items-center text-bg-primary border-0" role="alert"
            aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body" id="toastBody">
                    <!-- Message will go here -->
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>

    <script
        src="https://www.paypal.com/sdk/js?client-id=AV3z1FFmDkzfI2snV5beLJCszk2joou2sP6Tv13MwEB8Lx9Z_WRQ_By09ZMs9cnvwbtX3CVLoUSlrcvX&currency=PHP"></script>


    <script>
        paypal.Buttons({
            createOrder: function (data, actions) {
                const totalPrice = document.getElementById('totalPriceInput').value || '100';
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: totalPrice
                        }
                    }]
                });
            },
            onApprove: function (data, actions) {
                return actions.order.capture().then(function (details) {
                    document.getElementById('payment_status').value = 'paid';
                    showToast("✅ Payment successful! Submitting your booking...");
                    setTimeout(() => {
                        document.getElementById('bookingForm').submit();
                    }, 2000);
                });
            },
            onCancel: function () {
                showToast("⚠️ Payment was cancelled.");
            },
            onError: function (err) {
                console.error(err);
                showToast("❌ Error processing the payment. Please try again.");
            }
        }).render('#paypal-button-container');

        // Helper to show toast
        function showToast(message) {
            const toastBody = document.getElementById('toastBody');
            toastBody.textContent = message;
            const toastElement = new bootstrap.Toast(document.getElementById('toastMessage'));
            toastElement.show();
        }

    </script>
    <script>
        const bookingData = document.getElementById('booking-data');
        let packageName = bookingData.dataset.package;
        let basePrice = parseInt(bookingData.dataset.price);

        const addons = [
            { name: "Additional Pax", price: 299 },
            { name: "Additional Photo Strips", price: 220 },
            { name: "Extra Pet", price: 100 },
            { name: "Annyeong Mini", price: 80 },
            { name: "Additional 10 mins", price: 399 },
            { name: "Film Strips", price: 80 },
            { name: "Soft Copy", price: 399 },
            { name: "Film Strips (High Quality)", price: 220 },
            { name: "Additional Backdrop", price: 120 },
            { name: "Enhanced Photo", price: 60 },
            { name: "Backdrop Floor Extension", price: 400 },
            { name: "5R Photo with Frame", price: 500 },
            { name: "Additional 4R Print", price: 80 },
            { name: "A4 Photo with Frame", price: 1000 },
            { name: "Additional Photo Strips (Extra)", price: 80 },
            { name: "A3 Photo with Frame", price: 1200 },
        ];

        const addonContainer = document.getElementById('addons');
        const addonList = document.getElementById('addonList');
        const basePriceEl = document.getElementById('basePrice');
        const totalPriceEl = document.getElementById('totalPrice');
        const packageNameEl = document.getElementById('packageName');

        function renderAddons() {
            addons.forEach((addon, index) => {
                const id = `addon-${index}`;
                addonContainer.innerHTML += `
                <div class="col-md-6 mb-3">
                    <div class="form-check">
                        <input class="form-check-input addon-checkbox" type="checkbox" id="${id}" data-price="${addon.price}" data-name="${addon.name}">
                        <label class="form-check-label addon-label" for="${id}">
                            ${addon.name}
                            <span>₱${addon.price}</span>
                        </label>
                    </div>
                </div>
            `;
            });
        }

        function updateTotal() {
            const checked = document.querySelectorAll('.addon-checkbox:checked');
            let total = basePrice;
            addonList.innerHTML = '';

            let selectedAddons = [];

            checked.forEach(item => {
                const price = parseInt(item.getAttribute('data-price'));
                const name = item.getAttribute('data-name');
                total += price;

                selectedAddons.push(`${name}|${price}`);
                addonList.innerHTML += `<li>+ ${name}: ₱${price}</li>`;
            });

            totalPriceEl.textContent = `₱${total}`;

            // Fill hidden inputs for PHP
            document.getElementById('selectedAddons').value = selectedAddons.join(', ');
            document.getElementById('basePriceInput').value = basePrice;
            document.getElementById('totalPriceInput').value = total;
            document.getElementById('selectedPackageInput').value = packageName;
        }

        document.addEventListener('DOMContentLoaded', () => {
            basePriceEl.textContent = `₱${basePrice}`;
            packageNameEl.textContent = packageName;
            totalPriceEl.textContent = `₱${basePrice}`;

            renderAddons();
            document.querySelectorAll('.addon-checkbox').forEach(cb => {
                cb.addEventListener('change', updateTotal);
            });

            updateTotal(); // initialize hidden fields
        });

    </script>

    <?php include '../footer.php'; ?>