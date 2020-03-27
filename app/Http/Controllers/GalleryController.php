<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Psy\Util\Json;

class GalleryController extends Controller {

    function getGallery(Request $request) {
        $start = 0;
        $numberPerPage = 6;

        $sortBy = $request->get("sortBy");
        $page = $request->get("page");

        if ($page > 0) {
            $start = $page * $numberPerPage;
        }
        $gallery = new Gallery();
        $posts = null;

        switch ($sortBy) {
            case 1 :
                $posts = $gallery->getGalleryAsc($start, $numberPerPage);
                break;
            case 2 :
                $posts = $gallery->getGalleryDesc($start, $numberPerPage);
                break;
            default :
                $posts = $gallery->getGallery($start, $numberPerPage);
                break;
        }
        return response()->json($posts, 200);
    }

    function getPagination() {
        $gallery = new Gallery();
        return response()->json($gallery->getNumbers(), 200);
    }

    function insertPost (Request $request) {
        if ($request->has("insertPost")) {
            $name = $request->input("tbNamePostInsert");
            $description = $request->input("tbDescriptionPost");
            $special = $request->input("tbSpecialPostInsert");

            $file = $request->file("slika")->getClientOriginalName();

            $directory = public_path("/images/post/");
            $request->file("slika")->move($directory, $file);
            $gallery = new Gallery();
            $stringToInsert = "/images/post/" . $file;

            try {
                $gallery->insertPostGallery($name, $description, $special, $stringToInsert);
                $adminController = new AdminController();
                $adminController->insertAction("INSERT_POST_GALLERY");
                return redirect("/gallery");
            } catch (\PDOException $e) {
                return response()->json("Error: " . $e->getMessage(), "500");
            }
        }
    }
}
