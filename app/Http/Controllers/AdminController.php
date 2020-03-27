<?php

    namespace App\Http\Controllers;

    use App\Models\Action;
    use App\Models\Blog;
    use App\Models\Category;
    use App\Models\Contact;
    use App\Models\Footer;
    use App\Models\Post;
    use App\Models\User;
    use Illuminate\Http\Request;

    class AdminController extends Controller {

        private $data = [];

        public function index() {
            $footer = new Footer();
            $this->data["information"] = $footer->getInformation();
            return view("pages.adminPages.homeAdmin", $this->data);
        }

        public function tablesPosts() {
            $post = new Post();
            $this->data["allPosts"] = $post->getAllPost();

            $blog = new Blog();
            $this->data["blogs"] = $blog->getAllBlogs();

            $category = new Category();
            $this->data["categories"] = $category->getAllFromCategory();
            return view("pages.adminPages.tablesAdminPosts", $this->data);
        }

        public function tablesUsers() {
            $user = new User();
            $this->data["users"] = $user->getAllUsers();
            $this->data["activeUsers"] = $user->getActiveUsers();
            $this->data["roles"] = $user->getRoles();
            return view("pages.adminPages.tablesAdminUsers", $this->data);
        }

        public function tablesContact() {
            $contact = new Contact();
            $this->data["messages"] = $contact->getAll();
            return view("pages.adminPages.tablesAdminMail", $this->data);
        }

        public function getActionsLog() {
            $action = new Action();
            $this->data["logRequests"] = $action->getRequests();
            $this->data["actions"] = $action->getAction();
            return view("pages.adminPages.tablesAdminActions", $this->data);
        }

        public function insertAction($akcija) {
            $action = new Action();
            $action->addAction($akcija);
        }

        public function deleteUser($id) {
            $user = new User();
            $user->deleteUser($id);
            $adminController = new AdminController();
            $adminController->insertAction("DELETE_USER");
            return response()->json('Successfully deleted!', 200);
        }

        public function deletePost($id) {
            $post = new Post();
            $post->deletePost($id);
            $adminController = new AdminController();
            $adminController->insertAction("DELETE_POST");
            return response()->json('Successfully deleted!', 200);
        }

        public function deleteBlog($id) {
            $blog = new Blog();
            $blog->deleteBlog($id);
            $adminController = new AdminController();
            $adminController->insertAction("DELETE_BLOG");
            return response()->json('Successfully deleted!', 200);
        }

        public function deleteCategory($id) {
            $category = new Category();
            $category->deleteCategory($id);
            $adminController = new AdminController();
            $adminController->insertAction("DELETE_CATEGORY");
            return response()->json('Successfully deleted!', 200);
        }

        public function deleteMessage($id) {
            $contact = new Contact();
            $contact->deleteMessage($id);
            $adminController = new AdminController();
            $adminController->insertAction("DELETE_MESSAGE");
            return response()->json('Successfully deleted!', 200);
        }

        public function formPostInsert() {
            $category = new Category();
            $this->data['categories'] = $category->getAllFromCategory();
            return view("pages.adminPages.formAdminPosts", $this->data);
        }

        public function formUserInsert() {
            return view("pages.adminPages.formAdminUser");
        }

        public function updateFormUser($id) {
            $user = new User();
            $this->data["oneUser"] = $user->getOneUser($id);
            return view("pages.adminPages.formUpdateUser", $this->data);
        }

        public function updateFormPost($id) {
            $post = new Post();
            $this->data["onePost"] = $post->getOnePost($id);
            return view("pages.adminPages.formUpdatePost", $this->data);
        }

        public function updateFormBlog($id) {
            $blog = new Blog();
            $this->data["oneBlog"] = $blog->getOneBlog($id);
            $category = new Category();
            $this->data["categories"] = $category->getAllFromCategory();
            return view("pages.adminPages.formUpdateBlog", $this->data);
        }

        public function updateUser(Request $request) {
            if ($request->has("send")) {

                $firstName = $request->get("firstName");
                $lastName = $request->get("lastName");
                $email = $request->get("email");
                $password = $request->get("password");
                $idUser = $request->get("idUser");
                $md5Password = md5($password);

                $reFirstName = "/^[A-Z][a-z]{2,20}/";
                $reLastName = "/^[A-Z][a-z]{2,20}/";
                $rePassword = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d!$%@#£€*?&]{3,}$/";

                $errors = [];

                if (!preg_match($reFirstName, $firstName)) {
                    $errors[] = "Wrong format of First Name!";
                }
                if (!preg_match($reLastName, $lastName)) {
                    $errors[] = "Wrong format of Last Name!";
                }
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors[] = "Wrong format of Email!";
                }
                if (!preg_match($rePassword, $password)) {
                    $errors[] = "Wrong format of Password!";
                }

                if (count($errors) == 0) {
                    $user = new User();
                    try {
                        $user->updateUserAdmin($firstName, $lastName, $email, $md5Password, $idUser);
                        $adminController = new AdminController();
                        $adminController->insertAction("UPDATE_USER");
                        return response()->json('Successfully updated!', 200);
                    } catch (\PDOException $e) {
                        return response()->json('Error: ' . $e->getMessage(), 409);
                    }
                }
            }
        }

        public function updatePost(Request $request) {
            if ($request->has("btnUpdate")) {
                $idPost = $request->input("idPost");
                $name = $request->input("tbName");
                $description = $request->input("tbDescription");
                $special = $request->input("tbSpecial");
                $imageAlt = $request->input("tbAlt");

                $file = $request->file("fileImage");

                if ($file == null) {
                    $post = new Post();
                    try {
                        $post->updatePostWithoutPicture($name, $description, $special, $imageAlt, $idPost);
                        $adminController = new AdminController();
                        $adminController->insertAction("UPDATE_POST_WITHOUT_PICTURE");
                        return redirect("/admin/tablesPostsAdmin");
                    } catch (\PDOException $e) {
                        return response()->json("Error: " . $e, "500");
                    }
                } else {
                    $imageName = $file->getClientOriginalName();
                    $directory = public_path("/images/post/");
                    $file->move($directory, $imageName);
                    $post = new Post();
                    $stringToInsert = "/images/post/" . $imageName;
                    try {
                        $post->updatePostWithPicture($name, $description, $special, $stringToInsert, $imageAlt, $idPost);
                        $adminController = new AdminController();
                        $adminController->insertAction("UPDATE_POST_WITH_PICTURE");
                        return redirect("/admin/tablesPostsAdmin");
                    } catch (\PDOException $e) {
                        return response()->json("Error: " . $e, "500");
                    }
                }
            }
        }

        public function updateBlog(Request $request) {
            if ($request->session()->has("user")) {
                $userFromSession = $request->session()->get("user");
                $userId = $userFromSession->id;

                if ($request->has("btnUpdate")) {

                    $idBlog = $request->input("idBlog");
                    $name = $request->input("tbName");
                    $description = $request->input("tbDescription");
                    $category = $request->input("ddlCategory");
                    $imageAlt = $request->input("tbAlt");

                    if ($category == 0) {
                        return response("Your category cant be 0!");
                    }

                    $file = $request->file("fileImage");

                    if ($file == null) {
                        $blog = new Blog();
                        try {
                            $blog->updateBlogWithoutPicture($name, $description, $imageAlt, $category, $idBlog, $userId);
                            $adminController = new AdminController();
                            $adminController->insertAction("UPDATE_BLOG_WITHOUT_PICTURE");
                            return redirect("/admin/tablesPostsAdmin");
                        } catch (\PDOException $e) {
                            return response()->json("Error: " . $e, "500");
                        }
                    } else {
                        $imageName = $file->getClientOriginalName();
                        $directory = public_path("/images/blog/");
                        $file->move($directory, $imageName);
                        $blog = new Blog();
                        $stringToInsert = "/images/blog/" . $imageName;
                        try {
                            $blog->updateBlogWithPicture($name, $description, $stringToInsert, $imageAlt, $category, $userId, $idBlog);
                            $adminController = new AdminController();
                            $adminController->insertAction("UPDATE_BLOG_WITH_PICTURE");
                            return redirect("/admin/tablesPostsAdmin");
                        } catch (\PDOException $e) {
                            return response()->json("Error: " . $e->getMessage(), "500");
                        }
                    }
                }
            }
        }

        public function insertCategory(Request $request) {
            if ($request->has("btnInsertCategory")) {
                $name = $request->input("tbName");

                $category = new Category();
                $category->insertCategory($name);
                $adminController = new AdminController();
                $adminController->insertAction("INSERT_CATEGORY");
                return redirect("/admin/tablesPostsAdmin");
            }
        }
    }
