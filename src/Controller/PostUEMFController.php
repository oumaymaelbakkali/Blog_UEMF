<?php

namespace App\Controller;
use App\Entity\PostUEMF;
use App\Entity\CommentUEMF;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\PostUEMFRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Datetime;
class PostUEMFController extends AbstractController
{   //route comment
    #[Route('/addComment', name: 'add')]
public function add(EntityManagerInterface $entityManager,
PostUEMFRepository $postUEMFRepository): Response
{
$post=$postUEMFRepository->find(51);
if($post)
{
$comment = new CommentUEMF();
$comment->setContent('Commentaire 1');
$comment->setAuthor('Meriem HNIDA');
$comment->setDate(new \DateTimeImmutable());
$post->addCommentsUEMF($comment);
$entityManager->persist($post);
$entityManager->persist($comment);
$entityManager->flush();
$this->addFlash('added', 'Le comment au post  51 a été ajoutee avec succès.');
}
$posts = $postUEMFRepository->findAll();

return $this->render('post_uemf/index.html.twig',
['posts' => $posts]);
}   
    //route /blog/all
    #[Route('/blog/all', name: 'blogAll')]
    public function all(EntityManagerInterface $entityManager,
    PostUEMFRepository $postUEMFRepository): Response
    {  
            $posts = $postUEMFRepository-> findAll();
            //$posts = $postUEMFRepository->findByAuthor("Othmane");
            return $this->render('post_uemf/index.html.twig',
            ['posts' => $posts]);
            
       
    }

    // route /blog/{id}
    #[Route('/blog/{id}', name: 'blogAll')]
    public function blogId($id,EntityManagerInterface $entityManager,
    PostUEMFRepository $postUEMFRepository): Response
    {      
            $posts = $postUEMFRepository-> find($id);
            //$posts = $postUEMFRepository->findByAuthor("Othmane");
            return $this->render('post_uemf/index.html.twig',
            ['posts' => $posts]);
            
       
    }
    //route /blog/author/{id}
    // route /blog/{id}/comments 
    //route /blog/remove/{id}/{comment} 
    //route /blog/removeComments

    //route des post
    #[Route('/post', name: 'app_post_u_e_m_f')]
    public function index1(EntityManagerInterface $entityManager,
    PostUEMFRepository $postUEMFRepository): Response
    {    $post=new PostUEMF();
        $post->setTitle("Annonces diverses");
        $post->setContent("L’UEMF reçoit le prix de l’égalité professionnelle");
        $post->setImage("new1.jpg");
        $post->setsummary("L’Université Euromed de Fès (UEMF) a reçu le prix régional Fes-Meknes lors de la 7 ème édition du Trophée de l’Egalité́ Professionnelle présidée par M. Younes Sekkouri, Ministre de l’Inclusion Economique, de la Petite Entreprise, de l’Emploi et des Compétences.");
        $post2=new PostUEMF();
        $post2->setTitle("Visite");
        $post2->setContent("Pr. Mostapha BOUSMINA accueille son Excellence M. l’Ambassadeur de Suisse M. Guillaume SCHEURER
        ");
        $post2->setImage("new2.jpg");
        $post2->setsummary("Le Président de l’Université a reçu le 29 mars son Excellence Monsieur l’Ambassadeur de Suisse M. Guillaume SCHEURER, accompagné de Madame Christine PIRINOLI, Vice Rectrice de HES-SO, la plus grande haute école spécialisée de Suisse ainsi que d’autre responsables de l’ambassade.");
        $date = new DateTime("2023-04-02");

        $post->setCreatedAt($date);
        $date = new DateTime("2023-03-22");

        $post2->setCreatedAt($date);
        $post->setAuthor("Oumayma");
        $post2->setAuthor("Othmane");
        $entityManager->persist($post);
        $entityManager->flush();
        $this->addFlash('success', 'Le post 1 a été enregistré avec succès.');
        $entityManager->persist($post2);
        $entityManager->flush();
        $this->addFlash('success', 'Le post 2 a été enregistré avec succès.');
         
         $where = [
            'Author' => 'Oumayma',
            ];
            $order = [
            'Created_at' => 'DESC',
            ];
            $limit = 10;
            $offset = 0;
            //$posts = $postUEMFRepository->findBy($where, $order, $limit, $offset);
            $post = $postUEMFRepository->find(49); 
            
$entityManager->flush(); 
$this->addFlash('delete', 'Le post 49 a été supprime avec succès.');
$post = $postUEMFRepository->find(51); 
$post->setTitle("NEWS");
$entityManager->flush(); 
$this->addFlash('Update', 'Le post 51 a été modifie avec succès.');
         
            $posts = $postUEMFRepository-> findAll();
            //$posts = $postUEMFRepository->findByAuthor("Othmane");
            return $this->render('post_uemf/index.html.twig',
            ['posts' => $posts]);
            
       
    }
}
