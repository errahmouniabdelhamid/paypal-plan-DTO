<?php

namespace App\DTO;

class BillingCycleDTO
{
    public function __construct(
        public FrequencyDTO|null     $frequency,
        public string                $tenure_type,
        public int                   $sequence,
        public int                   $total_cycles,
        public PricingSchemeDTO|null $pricing_scheme,
    )
    {
        if ($this->frequency === null) {
            $this->frequency = new \App\DTO\FrequencyDTO(
                interval_unit: "MONTH",
                interval_count: 1
            );
        }
    }
}
