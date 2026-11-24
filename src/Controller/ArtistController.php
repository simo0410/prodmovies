<?php

namespace App\Controller;

use App\Repository\ArtistRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Artist;

#[Route('/artist')]

final class ArtistController extends AbstractController
{
    #[Route('/', name: 'app_artist_index', methods: ['GET'])]
    //Méthode index
    public function index(ArtistRepository $artistRepository): Response
    {
        $artists = $artistRepository->findAll();

        return $this->render('artist/index.html.twig', [
            'artists' => $artists,
            'title' => 'Liste des artistes',
        ]);
    }

    //Méthode show
    #[Route('/{id}', name: 'app_artist_show', methods: ['GET'])]
    public function show(int $id, ArtistRepository $repository): Response
    {
        $artist = $repository->find($id);

        return $this->render('artist/show.html.twig', [
            'artist' => $artist,
            'title' => 'Fiche d\'un artiste',
        ]);
    }


}
