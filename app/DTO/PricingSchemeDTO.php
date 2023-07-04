<?php

namespace App\DTO;

class PricingSchemeDTO
{
    public function __construct(
        public PriceDTO $fixedPrice,
        public string $pricing_model = 'TIERED',
    )
    {}
}
