<?php

namespace App\Domain\Price\Interface;

use App\Domain\Price\DTO\PriceDTO;

interface PriceInterface
{
    public function getPrices(PriceDTO $priceDTO);
}
