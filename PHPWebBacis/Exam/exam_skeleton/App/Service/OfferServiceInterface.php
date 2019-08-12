<?php

namespace App\Service;


use App\Data\EditOfferDTO;
use App\Data\FullOfferDTO;
use App\Data\OfferDTO;
use App\Data\MyOfferDTO;

interface OfferServiceInterface
{
    public function create(OfferDTO $offer);

    /**
     * @param int $userId
     * @return MyOfferDTO[]|\Generator
     */
    public function getByUserId(int $userId): \Generator;

    /**
     * @return FullOfferDTO[]|\Generator
     */
    public function getAll(): \Generator;

    public function getOne(int $id): FullOfferDTO;

    public function edit(EditOfferDTO $offer, int $userId);

    public function delete(int $offerId, int $userId);

}