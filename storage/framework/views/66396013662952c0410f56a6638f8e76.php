<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Razorpay Payment</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>

<body>
    <h1>Pay with Razorpay</h1>
    <form action="<?php echo e(route('razor.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <input type="text" name="amount" placeholder="Enter Amount">
        <button type="submit">Pay Now</button>
    </form>

    <?php if(isset($order)): ?>
        <script>
            var options = {
                "key": "<?php echo e(config('services.razorpay.key')); ?>",
                "amount": "<?php echo e($order->amount); ?>",
                "currency": "INR",
                "name": "Your Company",
                "description": "Test Transaction",
                "order_id": "<?php echo e($order->id); ?>", // Order ID from Razorpay
                "handler": function (response) {
                    alert("Payment successful! Payment ID: " + response.razorpay_payment_id);
                },
                "prefill": {
                    "name": "Your Name",
                    "email": "your@example.com",
                    "contact": "9999999999"
                },
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
        </script>
    <?php endif; ?>
</body>

</html><?php /**PATH C:\xampp\htdocs\laravelproject\megamart\resources\views/razorpay.blade.php ENDPATH**/ ?>