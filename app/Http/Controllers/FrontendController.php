<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meni;
use App\Models\Footer;
use App\Models\Post;
use App\Models\Category;
use App\Models\About;
use App\Models\Blog;

class FrontendController extends Controller {

    private $data = [];

    public function __construct() {
        $meni = new Meni();
        $this->data['menus'] = $meni->getAllFromMenu();

        $footer = new Footer();
        $this->data['social_medias'] = $footer->getSocialMedia();

        $this->data['information'] = $footer->getInformation();
    }

    public function index() {
        $post = new Post();
        $this->data['posts'] = $post->getSpecialPost();
        return view("pages.home", $this->data);
    }

    public function gallery() {
        $post = new Post();
        $this->data['allPosts'] = $post->getAllPost();
        return view("pages.gallery", $this->data);
    }

    public function blog() {
        $category = new Category();
        $this->data['categories'] = $category->getAllFromCategory();

        return view("pages.blog", $this->data);
    }

    public function contact() {
        return view("pages.contact", $this->data);
    }

    public function login() {
        return view("pages.login", $this->data);
    }

    public function register() {
        return view("pages.register", $this->data);
    }

    public function about() {
        $about = new About();
        $this->data["autor"] = $about->getAbout();
        return view("pages.about", $this->data);
    }
}
