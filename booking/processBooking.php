<?php
require '../configure/conn.php'; // Your DB connection

// Check if form is submitted with payment status
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['payment_status']) && $_POST['payment_status'] === 'paid') {

    // Collect and sanitize form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $branch = $_POST['branch'];
    $backdrop = $_POST['backdrop'];
    $selected_package = $_POST['selected_package'];
    $base_price = floatval($_POST['base_price']);
    $total_price = floatval($_POST['total_price']);
    $selected_addons = $_POST['selected_addons'];
    $payment_status = $_POST['payment_status']; // should be "paid"
    $booking_date = date('Y-m-d H:i:s'); // timestamp of booking

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO bookings (name, email, phone, branch, backdrop, package, base_price, addons, total_price, payment_status, booking_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssdssss", $name, $email, $phone, $branch, $backdrop, $selected_package, $base_price, $selected_addons, $total_price, $payment_status, $booking_date);

    if ($stmt->execute()) {
        echo "<script>
                Swal.fire({
                    title: 'Success!',
                    text: 'Your booking and payment have been received!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = '../user/userBooking.php';
                });
              </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

} else {
    echo "<script>alert('Payment not completed. Booking was not saved.'); window.history.back();</script>";
}
?>