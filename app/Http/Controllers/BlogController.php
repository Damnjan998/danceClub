<?php

    namespace App\Http\Controllers;

    use App\Models\Blog;
    use Illuminate\Http\Request;
    use Intervention\Image\Facades\Image;
    use Psy\Util\Json;

    class BlogController extends Controller {
        function getBlog(Request $request) {
            $start = 0;
            $numberPerPage = 3;

            $page = $request->get("page");
            $katId = $request->get("katId");
            $poljePretraga = $request->get("poljePretraga");

            if ($page > 0) {
                $start = $page * $numberPerPage;
            }

            $blog = new Blog();
            $blogsToShow = null;

            if ($katId != 0) {
                $blogsToShow = $blog->getBlogsByCategory($katId, $start, $numberPerPage, $poljePretraga);
            } else {
                $blogsToShow = $blog->getBlogs($start, $numberPerPage, $poljePretraga);
            }
            return response()->json($blogsToShow, 200);

        }

        function getPagination(Request $request) {
            $blog = new Blog();
            $katId = $request->get("katId");
            $poljePretraga = $request->get("poljePretraga");
            if ($katId != 0) {
                return response()->json($blog->getNumbersFiltred($katId, $poljePretraga), 200);
            } else {
                return response()->json($blog->getNumbers($poljePretraga), 200);
            }
        }

        function insertBlog(Request $request) {
            if ($request->session()->has("user")) {
                $userFromSession = $request->session()->get("user");
                $userId = $userFromSession->id;

                if ($request->has("btnInsertBlog")) {
                    $titleBlog = $request->input("tbNameBlog");
                    $textBlog = $request->input("taDescription");
                    $categoryId = $request->input("ddlCategory");
                    $errors = [];

                    $reTitle = "/\w*[a-zA-Z]\w*/";

                    if (!preg_match($reTitle, $titleBlog)) {
                        array_push($errors, "Your title is not correct!");
                    }

                    if (empty($textBlog)) {
                        array_push($errors, "Your description is empty!");
                    }

                    $file = $request->file("image")->getClientOriginalName();

                    $directory = public_path("images/blog/");
                    $request->file("image")->move($directory, $file);
                    $blog = new Blog();
                    $stringToInsert = "images/blog/" . $file;
                    try {
                        $blog->insertBlog($titleBlog, $textBlog, $stringToInsert, $categoryId, $userId);
                        $adminController = new AdminController();
                        $adminController->insertAction("INSERT_BLOG");
                        return redirect("/blog");
                    } catch (\PDOException $e) {
                        return response()->json("Error: " . $e->getMessage(), "500");
                    }
                }
            }
        }
    }
