<?php

namespace App\DTO;

class TaxesDTO
{
    public function __construct(
        public string $percentage,
        public bool $inclusive
    )
    {}
}
