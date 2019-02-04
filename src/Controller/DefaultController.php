<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DefaultController
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
    return new Response(sprintf('Nome do piloto: %s', $nome_do_piloto));
  }
}