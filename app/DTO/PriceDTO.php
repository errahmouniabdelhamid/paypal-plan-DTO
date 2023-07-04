<?php

namespace App\DTO;

class PriceDTO
{
    public function __construct(
        public string $value,
        public string $currency_code,
    )
    {}
}
