<?php

namespace App\DTO;

class PaymentPreferencesDTO
{
    public function __construct(
        public bool $auto_bill_outstanding,
        public PriceDTO $setup_fee,
        public string $setup_fee_failure_action,
        public int $payment_failure_threshold,
    )
    {}
}
