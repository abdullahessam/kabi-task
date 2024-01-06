<?php

namespace App\Http\Controllers;

use App\Domain\Price\DTO\PriceDTO;
use App\Domain\Price\Service\PriceService;
use App\Http\Requests\Price\PriceRequest;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    /**
     * init the controller with the price service
     * @param PriceService $priceService
     */
    public function __construct(protected PriceService $priceService)
    {
    }


    /**
     * Handle the incoming request.
     */
    public function __invoke(PriceRequest $request)
    {
        // validate the request and create the DTO
        $priceDTO=PriceDTO::from($request->validated());
        // calculate the price
        return response()->json([
            'price' => $this->priceService->calculatePrice($priceDTO)
        ]);
    }
}
