<?php


	namespace App\Models;

    use Illuminate\Support\Facades\DB;
	class About {
        public function getAbout() {
            return DB::table("about")->get();
        }
	}
