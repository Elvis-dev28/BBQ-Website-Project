<?php

class Payment {
    private $conn;
    private $table = 'payments';

    public function __construct(PDO $db) {
        $this->conn = $db;
    }

    // Method to process a payment
    public function processPayment(array $paymentDetails): bool {
        if (!$this->validatePaymentDetails($paymentDetails)) {
            throw new Exception('Ungültige Zahlungsdetails.');
        }

        switch ($paymentDetails['method']) {
            case 'credit_card':
                return $this->processCreditCardPayment($paymentDetails);
            case 'paypal':
                return $this->processPayPalPayment($paymentDetails);
            case 'bank_transfer':
                return $this->processBankTransfer($paymentDetails);
            default:
                throw new Exception('Nicht unterstützte Zahlungsmethode.');
        }
    }

    // Method to validate payment details
    private function validatePaymentDetails(array $paymentDetails): bool {
        // Basic validation logic (can be extended)
        return isset($paymentDetails['method'], $paymentDetails['amount']) &&
            $paymentDetails['amount'] > 0;
    }

    // Method to process credit card payments
    private function processCreditCardPayment(array $paymentDetails): bool {
        // Simulate credit card processing logic (e.g., API call to a payment gateway)
        // For now, assume payment is successful
        return $this->savePaymentRecord($paymentDetails);
    }

    // Method to process PayPal payments
    private function processPayPalPayment(array $paymentDetails): bool {
        // Simulate PayPal processing logic (e.g., API call to PayPal)
        // For now, assume payment is successful
        return $this->savePaymentRecord($paymentDetails);
    }

    // Method to process bank transfers
    private function processBankTransfer(array $paymentDetails): bool {
        // Simulate bank transfer logic (e.g., initiating a bank transfer)
        // For now, assume payment is successful
        return $this->savePaymentRecord($paymentDetails);
    }

    // Method to save payment record in the database
    private function savePaymentRecord(array $paymentDetails): bool {
        try {
            $query = 'INSERT INTO ' . $this->table . ' (method, amount, status, transaction_date)
                      VALUES (:method, :amount, :status, :transaction_date)';
            $stmt = $this->conn->prepare($query);

            // Assign variables to use with bindParam
            $method = $paymentDetails['method'];
            $amount = $paymentDetails['amount'];
            $status = $paymentDetails['status'] ?? 'completed';
            $transactionDate = $paymentDetails['transaction_date'] ?? date('Y-m-d H:i:s');

            // Use variables with bindParam
            $stmt->bindParam(':method', $method);
            $stmt->bindParam(':amount', $amount);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':transaction_date', $transactionDate);

            return $stmt->execute();
        } catch (PDOException $e) {
            // Log error (e.g., to a file or monitoring system)
            throw new Exception('Zahlungsdatensatz konnte nicht gespeichert werden: ' . $e->getMessage());
        }
    }
}
