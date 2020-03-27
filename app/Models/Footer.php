<?php


	namespace App\Models;
	use Illuminate\Support\Facades\DB;


	class Footer {
        public function getSocialMedia() {
            $result = DB::table("social_media")->get();
            return $result;
        }

        public function getInformation() {
            $result = DB::table("information")->get();
            return $result;
        }
	}
