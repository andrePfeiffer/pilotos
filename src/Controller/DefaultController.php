<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DefaultController extends AbstractController
{
  /**
   * @Route("/")
   */
  public function homepage()
  {
    return new Response("Olá mundo");
  }

  /**
   * @Route("pilotos/{nome_do_piloto}")
   */
  public function show($nome_do_piloto)
  {
    $corridas = [
      0 => ['1201', 'Réplica', '19/01/2019', 1],
      1 => ['1202', 'Réplica', '03/02/2019', 2],
      2 => ['1203', 'Réplica', '10/02/2019', 7],
    ];
    return $this->render('pilotos/piloto.html.twig',[
      'title' => ucwords(str_replace('-',' ', $nome_do_piloto)),
      'corridas' => $corridas,
    ]);
  }
}