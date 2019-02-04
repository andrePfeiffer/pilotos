<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 04/02/19
 * Time: 19:08
 */

namespace App\Controller;

use App\Entity\Piloto;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class PilotoController extends AbstractController
{
  /**
   * @Route("pilotos/add")
   */
  public function add(EntityManagerInterface $em)
  {
    $piloto = new Piloto();
    $piloto->setNome("André Pfeiffer");
    $piloto->setEmail("andre.pfeiffer@gmail.com");
    $em->persist($piloto);
    $em->flush();
    return new Response(
      sprintf('Novo piloto cadastrado com o id  %d', $piloto->getId())
    );
  }

  /**
   * @Route("pilotos/verTodos", name="app_piloto_verTodos")
   */
  public function showAll(EntityManagerInterface $em)
  {
    $repository = $em->getRepository(Piloto::class);
    $pilotos = $repository->findAll();
    return $this->render('pilotos/verTodos.html.twig', [
      'pilotos'  => $pilotos
    ]);
  }

  /**
   * @Route("pilotos/ver/{id}", name="app_piloto_ver_id")
   */
  public function showId($id, EntityManagerInterface $em)
  {
    $repository = $em->getRepository(Piloto::class);
    /** @var Piloto $pilotos */
    $piloto= $repository->findOneBy(['id' => $id]);
    if(!$piloto){
      throw $this->createNotFoundException('Não tem piloto com o id %d', $id);
    }
    return $this->render('pilotos/ver.html.twig', [
      'piloto'  => $piloto
    ]);
  }

  /**
   * @Route("pilotos/ver/{nome_do_piloto}")
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