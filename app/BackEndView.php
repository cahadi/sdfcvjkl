<?php
declare(strict_types=1);


namespace App;


class BackEndView
{
    public $twig;

    public function __construct($twig)
    {
        $this->twig = $twig;
    }

    public function index()
    {
        return $this->twig->render('index.twig');
    }

    public function showSignInForm()
    {
        return $this->twig->render('signin.twig');
    }


    public function showSignUpForm()
    {
        return $this->twig->render('signup.twig');
    }
    public function showUserList($users)
    {
        return $this->twig->render('userlist.twig',['users' => $users]);
    }


    public function showArticlesList($articles, $categories)
    {
        return $this->twig->render('articleslist.twig',['articles' => $articles, 'categories'=>$categories]);
    }
    public function showAddArticleForm($article, $categories, $target)
    {
        return $this->twig->render('add-article.twig',['article' => $article, 'categories'=>$categories, 'target'=> $target]);
    }


    public function showTagsList($tags)
    {
        return $this->twig->render('tagslist.twig',['tags' => $tags]);
    }
    public function showAddTagForm($tag, $target)
    {
        return $this->twig->render('add-tag.twig',['tag' => $tag, 'target'=> $target]);
    }


    public function showCategoriesList($categories)
    {
        return $this->twig->render('categorieslist.twig',['categories' => $categories]);
    }
    public function showAddCategoryForm($category, $target)
    {
        return $this->twig->render('add-category.twig',['category' => $category, 'target'=> $target]);
    }
}