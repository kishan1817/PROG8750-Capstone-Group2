<?php
require_once 'include/config.php'; // Database configuration
require_once 'include/head.php'; // Head content
require_once 'include/header.php'; // Header content
require __DIR__ . "/vendor/autoload.php"; // Stripe SDK

// Check if user is logged in and the membership ID is provided
if (!isset($_SESSION["User_id"]) || !isset($_GET["Membership_id"])) {
    header("Location: signin.php"); // Redirect to login if not logged in
    exit;
}
/*Payment succeeds
4242 4242 4242 4242

Payment requires authentication
4000 0025 0000 3155

Payment is declined
4000000000009995*/

$user_id = $_SESSION["User_id"];
$membership_id = $_GET["Membership_id"];
$_SESSION['membership_id'] = $_GET["Membership_id"];

// Fetch membership details from the database
$sql = "SELECT Name, Description, Price FROM tbl_membership WHERE Membership_id = ? AND Status = 1";
$stmt = $dbconnection->prepare($sql);
$stmt->bind_param("i", $membership_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Membership not found or inactive.";
    exit; // Stop script if no membership found
}

$membership = $result->fetch_assoc();

$stripe_secret_key = "sk_test_51P3iwf01E4zAY5UQvQimu4sBz1nvFlLAAPUIAymNIgMpz4vXfKdhSRBE7Qle88NN59VEOIrRr4lQj0XNZqI0xCnE0044MIchdW";
\Stripe\Stripe::setApiKey($stripe_secret_key);

try {
    $checkout_session = \Stripe\Checkout\Session::create([
        "mode" => "payment",
        "success_url" => "http://localhost/jobnest/success.php?session_id={CHECKOUT_SESSION_ID}",
        "cancel_url" => "http://localhost/membership.php",
        "locale" => "auto",
        "line_items" => [
            [
                "price_data" => [
                    "currency" => "cad",
                    "unit_amount" => $membership['Price'] * 100, 
                    "product_data" => [
                        "name" => $membership['Name'],
                        "description" => $membership['Description'],
                    ],
                ],
                "quantity" => 1,
            ]
        ]
    ]);

    http_response_code(303);
    header("Location: " . $checkout_session->url);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>

<?php
require_once 'include/footer.php'; // Footer content
require_once 'include/script.php'; // Script content
?>
