<?php

namespace App\Domain\Price\DTO;

use Spatie\LaravelData\Attributes\Validation\After;
use Spatie\LaravelData\Attributes\Validation\Date;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;

class PriceDTO extends Data
{
    public function __construct(
        #[Required, Date]
        public string $start_at,
        #[Required, Date, After('start_at')]
        public string $end_at,
    )
    {
    }
}
