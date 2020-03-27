<?php

    namespace App\Models;
    use Illuminate\Support\Facades\DB;

    class Meni {
        public function getAllFromMenu () {
            $result = DB::select("SELECT * FROM menu");
            return $result;
        }
    }
