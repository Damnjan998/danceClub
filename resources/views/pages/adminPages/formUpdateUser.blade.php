@extends("layouts.admin")

@section("title")
    Tables USERS
@endsection

@section("sadrzaj")
    <div id="page-wrapper">
        <h2 class="title1">Form USER</h2>
        <div id="formaPost">
            <h4 class="naslovFunkcije">Update USER</h4>
            <form id="insertPostGallery" method="post">
                {{csrf_field()}}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <table id="insertTabelaPost">
                    @isset($oneUser)
                        @foreach($oneUser as $oU)
                            <input type="hidden" id="idUser" name="idUser" value="{{$oU->id}}"/>
                            <tr>
                                <td>
                                    <span><label for="name">Name</label></span>
                                </td>
                                <td>
                            <span><input type="text" id="tbName" name="tbName" required=""
                                         title="Example : Howard" value="{{$oU->name}}"/></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span><label for="name">Last Name</label></span>
                                </td>
                                <td>
                            <span><input type="text" id="tbLastName" name="tbLastName" required=""
                                         title="Example : Web" value="{{$oU->lastname}}"/></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span><label for="email">Email</label></span>
                                </td>
                                <td>
                            <span><input type="email" id="tbEmail" name="tbEmail" required=""
                                         title="Example : example123@gmail.com" value="{{$oU->email}}"/></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span><label for="password">New Password</label></span>
                                </td>
                                <td>
                            <span><input type="password" id="tbPass" name="tbPass" required
                                         title="Example : loz123"/></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                        <input class="submit-btn"
                                               id="btnUpdate"
                                               value="Update" type="submit"
                                               name="btnUpdate"></td>
                            </tr>
                        @endforeach
                    @endisset
                </table>
            </form>
        </div>
    </div>
@endsection

@section("js")
    @parent
    <script type="text/javascript" src="{{ asset("/js/adminJs/adminUpdateUser.js") }}"></script>
@endsection
