<?php
// src/Idg/candidateBundle/Controller/LibrarianController.php

namespace Idg\candidateBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


use Idg\candidateBundle\Model\Book;
use Idg\candidateBundle\Form\Type\BookType;
use Idg\candidateBundle\Model\Author;
use Idg\candidateBundle\Form\Type\AuthorType;
use Idg\candidateBundle\Model\Language;
use Idg\candidateBundle\Form\Type\LanguageType;

class LibrarianController extends Controller
{
	
    public function addauthorAction()
    {
        $author = new Author();
        $form = $this->createForm(new AuthorType(), $author);

        return $this->render('IdgcandidateBundle:Author:add.html.twig', array(
            'form' => $form->createView(),
        ));
    }


    public function addlanguageAction()
    {
        $language = new Language();
        $form = $this->createForm(new LanguageType(), $language);

        return $this->render('IdgcandidateBundle:Language:add.html.twig', array(
            'form' => $form->createView(),
        ));
    }
	
    public function addbookAction()
    {
        $book = new Book();
        $form = $this->createForm(new BookType(), $book);

        return $this->render('IdgcandidateBundle:Book:add.html.twig', array(
            'form' => $form->createView(),
        ));
    }
	
	
	
	public function savebookAction(Request $request)
    {
        $book = new Book();
        $form = $this->createForm(new BookType(), $book);
            $form->handleRequest($request);

            if ($form->isValid()) {
                $book->save();

                return $this->redirect($this->generateUrl('book_add'));
            }
    }
	
	
}

?>