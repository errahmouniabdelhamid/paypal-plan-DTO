<?php

namespace App\DTO;

class PayPalPlanDTO
{
    public function __construct(
        public string                $product_id,
        public string                $name,
        public string                $description,
        public string                $status,
        public array                 $billing_cycles,
        public PaymentPreferencesDTO|null $payment_preferences,
        public TaxesDTO|null         $taxes,
    )
    {
        if ($this->payment_preferences === null) {

            $this->payment_preferences = new PaymentPreferencesDTO(
                auto_bill_outstanding: true,
                setup_fee: new PriceDTO(
                    value: 0,
                    currency_code: env("PAYPAL_CURRENCY"),
                ),
                setup_fee_failure_action: "CONTINUE",
                payment_failure_threshold: 3,
            );
        }

        if ($this->taxes === null) {
            $this->taxes = new TaxesDTO(
                percentage: 0,
                inclusive: false,
            );
        }
    }

    public function addBillingCycle(BillingCycleDTO $billingCycle)
    {
        $this->billing_cycles[] = $billingCycle;
    }

    public function addPaymentPreferences(
        bool $auto_bill_outstanding,
        int $payment_failure_threshold,
        PriceDTO $setup_fee,
        string $setup_fee_failure_action,
    )
    {
        $this->payment_preferences = new \App\DTO\PaymentPreferencesDTO(
            auto_bill_outstanding: $auto_bill_outstanding,
            setup_fee: $setup_fee,
            setup_fee_failure_action: $setup_fee_failure_action,
            payment_failure_threshold: $payment_failure_threshold,
        );
    }

    public function addTaxes(
        string $percentage,
        bool $inclusive
    )
    {
        $this->taxes = new \App\DTO\TaxesDTO(
            percentage: '0.00',
            inclusive: false,
        );
    }
}
