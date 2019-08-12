<?php

namespace App\Http;


use App\Data\EditOfferDTO;
use App\Data\ErrorDTO;
use App\Data\OfferDTO;
use App\Service\TownServiceInterface;
use App\Service\OfferServiceInterface;
use App\Service\RoomServiceInterface;
use Core\DataBinderInterface;
use Core\TemplateInterface;

class OfferHttpHandler extends HttpHandlerAbstract
{
    /**
     * @var RoomServiceInterface
     */
    private $roomService;
    /**
     * @var TownServiceInterface
     */
    private $townService;
    /**
     * @var OfferServiceInterface
     */
    private $offerService;

    public function __construct(TemplateInterface $template,
                                DataBinderInterface $dataBinder,
                                RoomServiceInterface $roomService,
                                TownServiceInterface $townService,
                                OfferServiceInterface $offerService)
    {
        parent::__construct($template, $dataBinder);
        $this->roomService = $roomService;
        $this->townService = $townService;
        $this->offerService = $offerService;
    }

    public function add(array $formData = [])
    {
        if (isset($formData['add'])) {
            $this->handleAddProcess($formData);
        } else {
            $this->render("offers/add",
                [
                    'towns' => $this->townService->getAll(),
                    'rooms' => $this->roomService->getAll()
                ]
            );
        }
    }

    public function myOffers()
    {
        $this->render("offers/mine", $this->offerService->getByUserId($_SESSION['id']));
    }

    public function all()
    {
        $this->render("offers/all", $this->offerService->getAll());
    }

    public function edit(array $formData = [])
    {
        if (isset($formData['edit'])) {
            $this->handleEditProcess($formData);
        } else {
            $dto = $this->getEditDTO();
            $this->render("offers/edit", $dto);
        }
    }

    private function handleAddProcess(array $formData)
    {
        try {
            /** @var OfferDTO $dto */
            $dto = $this->dataBinder->bind($formData, OfferDTO::class);
            $dto->setUserId($_SESSION['id']);
            $dto->setUserId($_SESSION['id']);
            $this->offerService->create($dto);
            $this->redirect("my_offers.php");
        } catch (\Exception $ex) {
            $this->render("offers/add",
                [
                    'towns' => $this->townService->getAll(),
                    'rooms' => $this->roomService->getAll()
                ],
                [$ex->getMessage()]);
        }
    }


    private function handleEditProcess(array $formData)
    {

        try {
            /** @var EditOfferDTO $dto */
            $dto = $this->dataBinder->bind($formData, EditOfferDTO::class);
            $dto->setUserId($_SESSION['id']);
            $dto->setId($_GET['id']);
            $this->offerService->edit($dto, $_SESSION['id']);
            $this->redirect("my_offers.php");
        } catch (\Exception $ex) {
            $dto = $this->getEditDTO();

            $this->render("offers/edit", $dto,
                [$ex->getMessage()]);
        }
    }

    public function delete(array $queryData = [])
    {
        $this->offerService->delete($queryData['id'], $_SESSION['id']);
        $this->redirect('my_offers.php');
    }

    public function view(array $queryData = [])
    {
        $offer = $this->offerService->getOne($queryData['id']);
        $this->render('offers/view', $offer);
    }

    /**
     * @return EditOfferDTO
     * @throws \Exception
     */
    private function getEditDTO(): EditOfferDTO
    {
        $offer = $this->offerService->getOne($_GET['id']);
        $towns = $this->townService->getAll();
        $rooms = $this->roomService->getAll();

        $dto = new EditOfferDTO();
        $dto->setId($_GET['id']);
        $dto->setPrice($offer->getPrice());
        $dto->setDays($offer->getDays());
        $dto->setDescription($offer->getDescription());
        $dto->setPictureUrl($offer->getPictureUrl());
        $dto->setRoomId($offer->getRoomId());
        $dto->setTownId($offer->getTownId());
        $dto->setIsOccupied($offer->getIsOccupied());
        $dto->setRooms($rooms);
        $dto->setTowns($towns);
        return $dto;
    }


}