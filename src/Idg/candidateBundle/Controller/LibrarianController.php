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

use Idg\candidateBundle\Model\BookQuery;
use Idg\candidateBundle\Model\AuthorQuery;
use Idg\candidateBundle\Model\LanguageQuery;


class LibrarianController extends Controller
{
	
    public function listbooksAction()
	{
		$books = BookQuery::create()->find();
			return $this->render('IdgcandidateBundle:Book:listbooks.html.twig', array(
            	'books' => $books,
        	));
		
	}
	public function addauthorAction()
    {
        $author = new Author();
        $form = $this->createForm(new AuthorType(), $author);
		$authors = AuthorQuery::create()->find();
        return $this->render('IdgcandidateBundle:Author:add.html.twig', array(
            'form' => $form->createView(),
			'authors' => $authors,
        ));
    }


    public function addlanguageAction()
    {
        $language = new Language();
        $form = $this->createForm(new LanguageType(), $language);
		$languages = LanguageQuery::create()->find();
        return $this->render('IdgcandidateBundle:Language:add.html.twig', array(
            'form' => $form->createView(),
			'language' => $languages,
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
	
	
	
	public function saveauthorAction(Request $request)
    {
        $author = new Author();
        $form = $this->createForm(new AuthorType(), $author);
            $form->handleRequest($request);

            if ($form->isValid()) {
                $author->save();
				$this->get('session')->getFlashBag()->add(
					'notice',
					'Your changes were saved!'
				);
				return $this->redirect($this->generateUrl('author_add'));
            }
		return $this->redirect($this->generateUrl('author_add'));
    }
	
	
	public function savelanguageAction(Request $request)
    {
        $language = new Language();
        $form = $this->createForm(new LanguageType(), $language);
            $form->handleRequest($request);

            if ($form->isValid()) {
                $language->save();
				$this->get('session')->getFlashBag()->add(
					'notice',
					'Your changes were saved!'
				);
				return $this->redirect($this->generateUrl('language_add'));
            }
		return $this->redirect($this->generateUrl('langauge_add'));
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
	
	
	public function trashbookAction(Request $request, $id){
		$book = BookQuery::create()->findPk($id);
		$book->delete();

         $json=json_encode(array(
			'title' => $book->getTitle()
	    ));
	    $response = new Response($json);
	    $response->headers->set('Content-Type','application/json');
	    return $response;
        
	}
	
	
}

?>