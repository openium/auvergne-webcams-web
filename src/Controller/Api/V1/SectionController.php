<?php

namespace App\Controller\Api\V1;

use App\Repository\SectionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/sections')]
class SectionController extends AbstractController
{
    public function __construct(
        protected SectionRepository $repository,
        protected SerializerInterface $serializer
    ) {
    }

    #[Route('', name: 'api_v1_get_sections', methods: ["GET"])]
    public function index(): JsonResponse
    {
        $sections = $this->repository->findAll();
        $json = $this->serializer->serialize($sections, 'json');
        return JsonResponse::fromJsonString($json);
    }
}
