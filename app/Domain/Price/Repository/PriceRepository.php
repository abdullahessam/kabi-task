<?php

namespace App\Domain\Price\Repository;

use App\Domain\Price\DTO\PriceDTO;
use App\Domain\Price\Interface\PriceInterface;
use App\Models\Price;

class PriceRepository implements PriceInterface
{
    public function __construct(protected Price $price)
    {
    }

    /**
     * this function used for get price between two dates with all cases sorted by the start date
     * @param PriceDTO $priceDTO
     * @return Price[]|\LaravelIdea\Helper\App\Models\_IH_Price_C
     */
    public function getPrices(PriceDTO $priceDTO)
    {
        return $this->price->whereRaw("{$priceDTO->start_at} between start_at and end_at")
            ->orWhereRaw("{$priceDTO->end_at} between start_at and end_at")
            ->orWhereRaw("start_at between '{$priceDTO->start_at}' and '{$priceDTO->end_at}'")
            ->orWhereRaw("end_at between '{$priceDTO->start_at}' and '{$priceDTO->end_at}'")
            ->orderBy('start_at')
            ->get();
    }
}
