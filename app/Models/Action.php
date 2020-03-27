<?php


	namespace App\Models;

    use Illuminate\Support\Facades\DB;
	class Action {
        public function getRequests() {
            return DB::table("requests")
                ->orderBy("created_at", "DESC")
                ->limit(15)->get();
        }

        public function addAction($action) {
            DB::table("actions")->insert([
                'action' => $action
            ]);
        }

        public function getAction() {
            return DB::table("actions")
                ->orderBy("created_at", "DESC")
                ->limit(15)->get();
        }
	}
