<?php
include_once (__DIR__ . '/../header.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="display-1 text-center">Checkout</h1>
        </div>
    </div>
    <div class="d-flex justify-content-center maxheigt rounded text-dark">
        <div class="d-flex w-80 bg-light p-3 justify-content-between rounded" id = "bigdiv">
            <div class="p-5 w-45 bg-purple rounded">
                <form action="/payment/action" method = "POST">
                    <input type="hidden" name="checkoutOrder">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <span><br>e.x Jhon Doe</span>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <span><br> e.x Bijdroplaan 15</span>
                        <input type="text" name="address" id="address" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <span><br> e.x 0612345678</span>
                        <input type="tel" pattern = "[0-9]{10}" name="phone" id="phone" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <span><br> e.x jhondoe@festival.com</span>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>

            </div>
            <div class="p-5 bg-purple w-45 rounded">
                <h3>Order Review</h3>
                <hr>
                <?php
                foreach($shoppingCart as $cartItem):

                    ?>
                    <div class="d-flex justify-content-between align-items-baseline">
                        <div>
                            <?php echo $cartItem['product_name'] . " x " . $cartItem['quantity']; ?>
                        </div>
                        <div>
                            <?php echo "$" . $cartItem['product_price'] * $cartItem['quantity']; ?>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div class="d-flex justify-content-between align-items-baseline mt-3">
                    <h4>Total Price:</h4>
                    <h4><?php echo "$" . $totalPrice; ?></h4>
                </div>

                <button class="btn-pay display-1" type="submit">
                    Pay
                </button>
                <input type="hidden" name="totalPrice" value="<?php echo $totalPrice; ?>">
                </form>
                <!-- Back button -->
                <div class="d-flex justify-content-start mb-3 w-100">
                    <a href="javascript:history.back()" class="btn btn-danger btn-pay mt-3">Back</a>
                </div>
            </div>
        </div>
    </div>

    <style>
        .w-80 {
            width: 80%;
        }

        .w-45 {
            width: 45%;
        }

        .bg-purple {
            background-color: #b0b0b0;
            color: #000000; /* Dark color text */
        }

        .maxheigt {
            margin-bottom: 200px;
        }

        .btn-pay{
            margin-left: 50px;
            background-color: #ffffff;
            color: #1D3588;
            border: 3px solid #1D3588;
            border-radius: 5px;
            padding: 10px;
            width: 80%;
            font-size: 20px;
            font-weight: bold;
            filter: drop-shadow(2px 2px 2px #4444dd);
            transition: all 0.3s ease-in-out;
        }

        .btn-pay:hover {
            background-color: #1D3588;
            color: #ffffff;
        }

        .btn-pay:active {
            background-color: #0b1c48; /* Darker shade of the border color */
            color: #ffffff;
        }

        .rounded{
            filter: drop-shadow(10px 5px 4px #8a8f97);
            filter: drop-shadow(0 0 5px #8a8f97);
        }
        span{
            font-size: 12px;
        }
    </style>


    <?php
    include_once (__DIR__ . '/../footer/footer.php');
    ?>
