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
                <form action="">
                    <input type="hidden" name="checkoutOrder">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" id="address" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" name="phone" id="phone" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>

            </div>
            <div class="p-5 bg-purple w-45 rounded">
                    <h3>Order Review</h3>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <p>Product</p>
                        <p>Price</p>
                    </div>
                    <button class = "btn-pay display-1" type="submit">
                        Pay
                    </button>

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
    </style>


    <?php
    include_once (__DIR__ . '/../footer/footer.php');
    ?>
