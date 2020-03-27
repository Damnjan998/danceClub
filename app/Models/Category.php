<?php


	namespace App\Models;
    use Carbon\Carbon;
    use Illuminate\Support\Facades\DB;

	class Category {
        public function getAllFromCategory() {
            $result = DB::table("category")->get();
            return $result;
        }

        public function deleteCategory($id) {
            DB::table("category")
                ->where("id", "=", $id)
                ->delete();
        }

        public function insertCategory($name) {
            $current_timestamp = Carbon::now()->toDateTimeString();

            DB::table("category")
                ->insert([
                    'name' => $name,
                    'created_at' => $current_timestamp
                ]);
        }
	}
