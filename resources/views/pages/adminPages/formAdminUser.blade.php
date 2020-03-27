@extends("layouts.admin")

@section("title")
    Form USERS
@endsection

@section("sadrzaj")
    <div id="page-wrapper">
        <h2 class="title1">Form USER</h2>
        <div id="formaPost">
            <h4 class="naslovFunkcije">Register</h4>
            <form id="insertPostGallery" method="post">
                {{csrf_field()}}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <table id="insertTabelaPost">
                    <tr>
                        <td>
                            <span><label for="name">Name</label></span>
                        </td>
                        <td>
                            <span><input type="text" id="tbName" name="tbName" required=""
                                         title="Example : Howard"/></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span><label for="name">Last Name</label></span>
                        </td>
                        <td>
                            <span><input type="text" id="tbLastName" name="tbLastName" required=""
                                         title="Example : Web"/></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span><label for="email">Email</label></span>
                        </td>
                        <td>
                            <span><input type="email" id="tbEmail" name="tbEmail" required=""
                                         title="Example : example123@gmail.com"/></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span><label for="password">Password</label></span>
                        </td>
                        <td>
                            <span><input type="password" id="tbPassword" name="tbPassword" required=""
                                         title="Example : loz123"/></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span><label for="password">Confirm Password</label></span>
                        </td>
                        <td>
                            <span><input type="password" id="tbConfirmPassword" name="tbConfirmPassword" required=""
                                         title="Must be like previous field!"/></span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input class="submit-btn" id="btnRegister" value="Register" type="submit"
                                               name="btnRegister"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
@endsection

@section("js")
    @parent
    <script type="text/javascript" src="{{ asset("/js/adminJs/adminRegister.js") }}"></script>
@endsection
