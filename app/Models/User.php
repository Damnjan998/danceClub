<?php


	namespace App\Models;

	use Illuminate\Support\Facades\DB;
	use Carbon\Carbon;


	class User {
        public function getAllUsers() {
            return DB::table("user")->get();
        }

        public function getActiveUsers() {
            return DB::table("user")
                ->where("active", "=", 1)
                ->get();
        }

        public function getRoles() {
            return DB::table("role")->get();
        }

	    public function checkUser($email, $passMd5) {
            return DB::table('user')
            ->where([
                ["email", "=", $email],
                ["password", "=", $passMd5]
            ])
            ->get()
            ->first();
        }

        public function insertUser($firstName, $lastName, $email, $password, $active, $role) {
	        $current_timestamp = Carbon::now()->toDateTimeString();

	        DB::table('user')->insert([
	            'name' => $firstName,
                'lastname' => $lastName,
                'email' => $email,
                'password' => $password,
                'date_of_registration' => $current_timestamp,
                'active' => $active,
                'role_id' => $role
            ]);
        }

        public function updateUser($aktivan, $id) {
	        return DB::table("user")
                ->where("id", "=", $id)
                ->update(["active" => $aktivan]);
        }

        public function deleteUser($id) {
            DB::table("user")
                ->where("id", "=", $id)
                ->delete();
        }

        public function getOneUser($id) {
            return DB::table("user")
            ->where("id", "=", $id)
            ->get();
        }

        public function updateUserAdmin($name, $lastName, $email, $md5Password, $id) {
            DB::table("user")
            ->where("id", "=", $id)
            ->update([
                'name' => $name,
                'lastname' => $lastName,
                'email' => $email,
                'password' => $md5Password
            ]);
        }

	}
