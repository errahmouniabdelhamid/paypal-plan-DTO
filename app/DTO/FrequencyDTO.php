<?php

namespace App\DTO;

class FrequencyDTO
{
    public function __construct(
        public string $interval_unit,
        public int $interval_count,
    )
    {}
}
