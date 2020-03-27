<?php


	namespace App\Models;

    use Carbon\Carbon;
    use Illuminate\Support\Facades\DB;

	class Contact {
        public function insertContact($title, $subject, $name) {
            $current_timestamp = Carbon::now()->toDateTimeString();

            DB::table("contact")->insert([
                'name' => $name,
                'title' => $title,
                'subject' => $subject,
                'sentAt' => $current_timestamp
            ]);
        }

        public function getAll() {
            return DB::table("contact")->get();
        }

        public function deleteMessage($id) {
            DB::table("contact")
                ->where("id", "=", $id)
                ->delete();
        }
	}
