<?php


	namespace App\Models;
    use Carbon\Carbon;
    use Illuminate\Support\Facades\DB;


	class Post {

	    public function getAllPost() {
	        $result = DB::table("post")->get();
	        return $result;
        }

        public function getSpecialPost() {
            $result = DB::table("post")->where("special", "=", "1")->get();
            return $result;
        }

        public function deletePost($id) {
            DB::table("post")
                ->where("id", "=", $id)
                ->delete();
        }

        public function getOnePost($id) {
	        return DB::table("post")
                ->where("id", "=", $id)
                ->get();
        }

        public function updatePostWithoutPicture($name, $description, $special, $imageAlt, $idPost) {
            $current_timestamp = Carbon::now()->toDateTimeString();

	        DB::table("post")
                ->where("id", "=", $idPost)
                ->update([
                    'name' => $name,
                    'description' => $description,
                    'special' => $special,
                    'image_alt' => $imageAlt,
                    'updated_at' => $current_timestamp
                ]);
        }

        public function updatePostWithPicture($name, $description, $special, $stringToInsert, $imageAlt, $idPost) {
            $current_timestamp = Carbon::now()->toDateTimeString();

            DB::table("post")
                ->where("id", "=", $idPost)
                ->update([
                    'name' => $name,
                    'description' => $description,
                    'special' => $special,
                    'image_src' => $stringToInsert,
                    'image_alt' => $imageAlt,
                    'updated_at' => $current_timestamp
                ]);
        }
	}
