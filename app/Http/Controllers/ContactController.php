<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\Contact;

    class ContactController extends Controller {

        public function insertContactMessage(Request $request) {
                if ($request->has("send")) {

                    $title = $request->get("title");
                    $subject = $request->get("subject");
                    $name = $request->get("name");

                    $reTitle = "/\w*[a-zA-Z]\w*/";
                    $greske = [];

                    if (!preg_match($reTitle, $name)) {
                        $greske[] = "Wrong format of Name";
                    }
                    if (!preg_match($reTitle, $title)) {
                        $greske[] = "Wrong format of Title";
                    }
                    if (empty($subject)) {
                        $greske[] = "Wrong format of Message";
                    }

                    if (count($greske) == 0) {
                        $contact = new Contact();
                        try {
                            $contact->insertContact($title, $subject, $name);

                            $adminController = new AdminController();
                            $adminController->insertAction("INSERT_MESSAGE");

                            return response()->json('Your message has been sent', 200);
                        } catch (\PDOException $e) {
                            return response()->json('Error occurred while trying to send message!', 409);
                        }
                    } else {
                        return response()->json('Title or Subject are not valid!', 422);
                    }
                }
            }
//        }
    }
