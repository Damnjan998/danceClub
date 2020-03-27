<?php


	namespace App\Models;

	use Carbon\Carbon;
    use Illuminate\Support\Facades\DB;


	class Gallery {
        public function getGallery($start, $numberPerPage) {
            return DB::table("post")
                ->select("name", "image_src", "image_alt")
                ->offset($start)
                ->limit($numberPerPage)
                ->get();
        }

        public function getGalleryAsc($start, $numberPerPage) {
            return DB::table("post")
                ->select("name", "image_src", "image_alt")
                ->orderBy("name", "asc")
                ->offset($start)
                ->limit($numberPerPage)
                ->get();
        }

        public function getGalleryDesc($start, $numberPerPage) {
            return DB::table("post")
                ->select("name", "image_src", "image_alt")
                ->orderBy("name", "desc")
                ->offset($start)
                ->limit($numberPerPage)
                ->get();
        }

        function getNumbers() {
            return DB::table("post")->count("*");
        }

        function insertPostGallery($name, $description, $special, $stringToInsert) {
            $current_timestamp = Carbon::now()->toDateTimeString();

            DB::table("post")->insert([
                "name" => $name,
                "description" => $description,
                "special" => $special,
                "image_src" => $stringToInsert,
                "image_alt" => "Post",
                "created_at" => $current_timestamp,
                "updated_at" => ""
            ]);
        }
	}
