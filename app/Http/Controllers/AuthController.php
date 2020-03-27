<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\User;

    class AuthController extends Controller {

        public function login(Request $request) {
            if ($request->has("send")) {

                $email = $request->get("email");
                $password = $request->get("pass");
                $passMd5 = md5($password);
                $errors = [];

                $rePassword = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d!$%@#£€*?&]{3,}$/";

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    array_push($errors, "Your email is not correct!");
                }

                if (!preg_match($rePassword, $password)) {
                    array_push($errors, "Your password is not correct!");
                }

                if (count($errors) == 0) {
                    try {
                        $user = new User();
                        $userToLog = $user->checkUser($email, $passMd5);

                        if ($userToLog) {

                            $request->session()->put("user", $userToLog);

                            $adminController = new AdminController();
                            $adminController->insertAction("LOGIN_USER");

                            $active = 1;
                            $userFromSession = $request->session()->get("user");
                            $id = $userFromSession->id;

                            if ($id == null) {
                                return response()->json('Internal server error!', 500);
                            } else {
                                $user->updateUser($active, $id);

                                $adminController = new AdminController();
                                $adminController->insertAction("UPDATE_USER");

                                return response()->json('Successfully logged in!', 200);
                            }
                        } else {
                            return response()->json('There is no user with specified email/password.', 404);
                        }
                    } catch (\PDOException $e) {
                        return response()->json('Error occurred: ' . $e->getMessage(), 404);
                    }
                } else {
                    return response()->json('Your email or password are not valid!', 422);
                }
            }
        }

        public function register(Request $request) {
            if ($request->has("send")) {
                $code = 201;

                $firstName = $request->get("firstName");
                $lastName = $request->get("lastName");
                $email = $request->get("email");
                $password = $request->get("password");
                $confirmPassword = $request->get("confirmPassword");
                $role = 1;
                $active = 0;

                $md5Password = md5($password);

                $reFirstName = "/^[A-Z][a-z]{2,20}/";
                $reLastName = "/^[A-Z][a-z]{2,20}/";
                $rePassword = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d!$%@#£€*?&]{3,}$/";
                $greske = [];

                if (!preg_match($reFirstName, $firstName)) {
                    $greske[] = "Wrong format of First Name!";
                }
                if (!preg_match($reLastName, $lastName)) {
                    $greske[] = "Wrong format of Last Name!";
                }
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $greske[] = "Wrong format of Email!";
                }
                if (!preg_match($rePassword, $password)) {
                    $greske[] = "Wrong format of Password!";
                }
                if ($confirmPassword != $password) {
                    $greske[] = "Passwords does not match!";
                }

                if (count($greske) == 0) {
                    $user = new User();
                    try {
                        $user->insertUser($firstName, $lastName, $email, $md5Password, $active, $role);
                        $adminController = new AdminController();
                        $adminController->insertAction("INSERT_USER");
                        return response()->json('Successfully registered!', 200);
                    } catch (\PDOException $e) {
                        return response()->json('Error occurred while trying to register!', 409);
                    }
                }
            }
        }

        public function logout(Request $request) {
            if ($request->session()->has('user')) {

                $userFromSession = $request->session()->get("user");
                $id = $userFromSession->id;
                $active = 0;

                $request->session()->forget('user');
                $request->session()->flush();

                $user = new User();
                $user->updateUser($active,$id);
                return redirect("/");
            }
        }
    }
