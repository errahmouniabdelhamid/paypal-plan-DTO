<?php 

$paypalPlan = new \App\DTO\PayPalPlanDTO(
   product_id: 'XXXXXXXXXXXXX',
   name: 'XXXXXXXXXXXXX',
   description: '',
   status: 'Active',
   billing_cycles: [],
   payment_preferences: null,
   taxes: null,
);

$setup_fee =  new \App\DTO\PriceDTO(
   value: '10.00',
   currency_code: 'USD',
);

$paypalPlan->addPaymentPreferences(
   auto_bill_outstanding: true,
   payment_failure_threshold: 0,
   setup_fee: $setup_fee,
   setup_fee_failure_action: 'CONTINUE'
);

$paypalPlan->addTaxes(
   percentage: '0.00',
   inclusive: false
);

/*************************/

$fixedPrice = new \App\DTO\PriceDTO(
   value: '10.00',
   currency_code: "USD"
);

$pricing_scheme =  new \App\DTO\PricingSchemeDTO(
   fixedPrice: $fixedPrice,
);

$billing_cycle = new \App\DTO\BillingCycleDTO(
   frequency: null,
   tenure_type: 'TRIAL',
   sequence: 2,
   total_cycles: 3,
   pricing_scheme: $pricing_scheme,
);

$paypalPlan->addBillingCycle($billing_cycle);

json_decode(json_encode ( $paypalPlan ) , true);
