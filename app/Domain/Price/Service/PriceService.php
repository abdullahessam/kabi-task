<?php

namespace App\Domain\Price\Service;

use App\Domain\Price\DTO\PriceDTO;
use App\Domain\Price\Repository\PriceRepository;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;

class PriceService
{
    public function __construct(protected PriceRepository $priceRepository)
    {
        $this->priceRepository = $priceRepository;
    }

    /**
     * this function used for calculate price between two dates
     * @param $start
     * @param $end
     * @return float|int
     */
    public function calculatePrice(PriceDTO $priceDTO)
    {
        //get all prices in the range
        $prices = $this->priceRepository->getPrices($priceDTO);
        //generate a range of days to help us calculate the price
        $days = CarbonPeriod::since($priceDTO->start_at)->until($priceDTO->end_at);
        $total = 0;
        //loop on days and calculate the price for each day
        foreach ($days as $day) {
            $total += $this->calculatePriceForDay($day, $prices);
        }
        return $total;
    }

    /**
     * this function accept day and prices and return the price for this day depaends on the list of prices sorted by start date asc
     * @param Carbon $day
     * @param Collection $prices
     * @return mixed
     * @throws \Throwable
     */
    private function calculatePriceForDay(Carbon $day, Collection $prices)
    {
        //get the price for the day
        $price = $prices->where('start_at', '<=', $day->toDateString())->where('end_at', '>=', $day->toDateString());

        //if the day is not in the range of prices throw exception
        throw_unless($price, ValidationException::withMessages(['date' => "the date {$day->toDateString()} is not in the range of prices"]));
        //return the price
        return $price->first()->price;

    }
}
