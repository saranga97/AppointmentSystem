<!DOCTYPE html>
<html>
<head>
    <title>Treatment History</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .content-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .treatment-item {
            margin-bottom: 20px;
            padding: 20px;
            background-color: #e9ecef;
            border-radius: 5px;
        }
        .btn-payment {
            background-color: #ffcccb;
            border: none;
            color: white;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 12px;
        }
        .btn-payment.paid {
            background-color: #90ee90;
        }
        .payment-modal .modal-content {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content-container">
            <h2 class="text-center">Treatment History</h2>
            <?php if (!empty($treatments)): ?>
                <div class="list-group">
                    <?php foreach ($treatments as $treatment): ?>
                        <div class="list-group-item treatment-item">
                            <p><?= $treatment['description']; ?> <br><small>(<?= $treatment['created_at']; ?>)</small></p>
                            <p>Price: LKR <?= number_format($treatment['price'], 2); ?></p>
                            <button class="btn btn-payment <?= $treatment['payment_status'] == 'paid' ? 'paid' : ''; ?>" 
                                    data-id="<?= $treatment['id']; ?>" 
                                    <?= $treatment['payment_status'] == 'paid' ? 'disabled' : ''; ?>>
                                <?= $treatment['payment_status'] == 'paid' ? 'Paid' : 'Proceed Payment'; ?>
                            </button>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p class="text-center">No treatment history found.</p>
            <?php endif; ?>
            <a href="<?= base_url('/patient/dashboard'); ?>" class="btn btn-secondary btn-block mt-3">Back to Dashboard</a>
        </div>
    </div>

    <!-- Payment Modal -->
    <div class="modal fade payment-modal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Proceed Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="paymentForm">
                        <input type="hidden" id="treatment_id" name="treatment_id">
                        <div class="form-group">
                            <label for="full_name">Full Name:</label>
                            <input type="text" class="form-control" id="full_name" name="full_name" required>
                        </div>
                        <div class="form-group">
                            <label for="mobile_number">Mobile Number:</label>
                            <input type="text" class="form-control" id="mobile_number" name="mobile_number" required>
                        </div>
                        <div class="form-group">
                            <label for="bank_account_no">Bank Account No.:</label>
                            <input type="text" class="form-control" id="bank_account_no" name="bank_account_no" required>
                        </div>
                        <div class="form-group">
                            <label for="cvv">CVV:</label>
                            <input type="text" class="form-control" id="cvv" name="cvv" required>
                        </div>
                        <div class="form-group">
                            <label for="expiry_date">Expiry Date:</label>
                            <input type="text" class="form-control" id="expiry_date" name="expiry_date" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Proceed Payment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.btn-payment').on('click', function() {
                var treatmentId = $(this).data('id');
                $('#treatment_id').val(treatmentId);
                $('.payment-modal').modal('show');
            });

            $('#paymentForm').on('submit', function(e) {
                e.preventDefault();
                
                var formData = $(this).serialize();

                $.ajax({
                    url: '<?= base_url("/patient/process_payment"); ?>',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.status == 'success') {
                            $('.payment-modal').modal('hide');
                            var treatmentId = $('#treatment_id').val();
                            var button = $('.btn-payment[data-id="' + treatmentId + '"]');
                            button.removeClass('btn-payment').addClass('paid').text('Paid').attr('disabled', true);
                        } else {
                            console.log("Payment failed.");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("Error: " + error);
                    }
                });
            });
        });
    </script>
</body>
</html>
