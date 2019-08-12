<?php

namespace App\Service;


use App\Data\EditOfferDTO;
use App\Data\FullOfferDTO;
use App\Data\OfferDTO;
use App\Data\MyOfferDTO;
use App\Repository\OfferRepositoryInterface;

class OfferService implements OfferServiceInterface
{
    /**
     * @var OfferRepositoryInterface
     */
    private $offerRepository;

    /**
     * OfferService constructor.
     * @param OfferRepositoryInterface $offerRepository
     */
    public function __construct(OfferRepositoryInterface $offerRepository)
    {
        $this->offerRepository = $offerRepository;
    }


    public function create(OfferDTO $offer)
    {
        $this->offerRepository->add($offer);
    }

    /**
     * @param int $userId
     * @return MyOfferDTO[]|\Generator
     */
    public function getByUserId(int $userId): \Generator
    {
        return $this->offerRepository->findByUserId($userId);
    }

    /**
     * @return FullOfferDTO[]|\Generator
     */
    public function getAll(): \Generator
    {
        return $this->offerRepository->findAll();
    }

    public function edit(EditOfferDTO $offer, int $userId)
    {
       $offers = $this->offerRepository->findByUserId($userId);
       $hasOffer = false;
       foreach ($offers as $userOffer) {
           if ($userOffer->getId() == $offer->getId()) {
               $hasOffer = true;
               break;
           }
       }

       if (!$hasOffer) {
           throw new \Exception('Not an owner');
       }

       $this->offerRepository->edit($offer);
    }

    public function getOne(int $id): FullOfferDTO
    {
        return $this->offerRepository->findOne($id);
    }

    public function delete(int $offerId, int $userId)
    {
        $offer = $this->getOne($offerId);

        if ($offer->getUserId() != $userId) {
            throw new \Exception('Not an owner');
        }

        $this->offerRepository->delete($offerId);
    }
}