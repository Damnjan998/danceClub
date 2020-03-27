<?php


	namespace App\Models;

    use Carbon\Carbon;
	use Illuminate\Support\Facades\DB;

	class Blog {
	    public function getAllBlogs() {
	        return DB::table("blog")->get();
        }
        public function getBlogs($start, $numberPerPage, $poljePretraga) {
            return DB::table("blog")
                ->select("name", "image_src", "description", "image_alt")
                ->where("name", "LIKE", "%$poljePretraga%")
                ->offset($start)
                ->limit($numberPerPage)
                ->get();
        }

        public function getBlogsByCategory($katId, $start, $numberPerPage, $poljePretraga) {
            return DB::table("blog")
                ->select("name", "image_src", "description", "image_alt")
                ->where([
                    ["category_id", "=", $katId],
                    ["name", "LIKE", "%$poljePretraga%"]
                ])
                ->offset($start)
                ->limit($numberPerPage)
                ->get();
        }

        function getNumbersFiltred($katId, $poljePretraga) {
            return DB::table("blog")
                ->where([
                    ["category_id", "=", $katId],
                    ["name", "LIKE", "%$poljePretraga%"]
                ])
                ->count();
        }

        function getNumbers($poljePretraga) {
            return DB::table("blog")
                ->where("name", "LIKE", "%$poljePretraga%")
                ->count("*");
        }

        function insertBlog($titleBlog, $textBlog, $stringToInsert, $categoryId, $userId) {
            $current_timestamp = Carbon::now()->toDateTimeString();

            DB::table("blog")->insert([
                "name" => $titleBlog,
                "description" => $textBlog,
                "image_src" => $stringToInsert,
                "image_alt" => "Blog",
                "created_at" => $current_timestamp,
                "updated_at" => "",
                "category_id" => $categoryId,
                "user_id" => $userId
            ]);
        }

        public function deleteBlog($id) {
            DB::table("blog")
                ->where("id", "=", $id)
                ->delete();
        }

        public function getOneBlog($id) {
            return DB::table("blog")
                ->where("id", "=", $id)
                ->get();
        }

        public function updateBlogWithoutPicture($name, $description, $imageAlt, $category, $idBlog, $userId) {
            $current_timestamp = Carbon::now()->toDateTimeString();

            DB::table("blog")
                ->where("id", "=", $idBlog)
                ->update([
                    'name' => $name,
                    'description' => $description,
                    'image_alt' => $imageAlt,
                    'updated_at' => $current_timestamp,
                    'category_id' => $category,
                    'user_id' => $userId
                ]);
        }

        public function updateBlogWithPicture($name, $description, $stringToInsert, $imageAlt, $category, $userId, $idBlog) {
            $current_timestamp = Carbon::now()->toDateTimeString();

            DB::table("blog")
                ->where("id", "=", $idBlog)
                ->update([
                    'name' => $name,
                    'description' => $description,
                    'image_src' => $stringToInsert,
                    'image_alt' => $imageAlt,
                    'updated_at' => $current_timestamp,
                    'category_id' => $category,
                    'user_id' => $userId
                ]);
        }
	}
