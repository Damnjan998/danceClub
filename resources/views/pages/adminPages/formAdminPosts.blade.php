@extends("layouts.admin")

@section("title")
    Form POSTS
@endsection

@section("sadrzaj")
    <div id="page-wrapper">
        <h2 class="title1">Forms Posts</h2>
        <div id="formaPost">
            <h4 class="naslovFunkcije">Gallery</h4>
            <form action="{{url("/insertPost")}}" enctype="multipart/form-data" id="insertPostGallery" method="post">
                {{csrf_field()}}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <table id="insertTabelaPost">
                    <tr>
                        <td>
                            <span><label for="name">Name</label></span>
                        </td>
                        <td>
                            <span><input type="text" id="tbNamePostInsert" name="tbNamePostInsert" required
                                         pattern="^[A-Z][a-z]{1,11}(\s[A-Z][a-z]{1,11})*$"
                                         title="Example : Herald!"/></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span><label for="text">Description</label></span>
                        </td>
                        <td>
                            <span><input type="text" required title="Some Description" id="tbDescriptionPost"
                                         name="tbDescriptionPost"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span><label for="special">Special</label></span>
                        </td>
                        <td>
                            <span><input type="text" id="tbSpecialPostInsert" name="tbSpecialPostInsert" required
                                         pattern="^[0-1]{1}$" title="0 OR 1"/></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span><label for="image">Image</label></span>
                        </td>
                        <td>
                            <span><input type="file" id="slika" name="slika" required></span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input class="submit-btn" id="btnInsert" value="Insert" type="submit"
                                               name="insertPost"></td>
                    </tr>
                </table>
            </form>
        </div>
        <div id="formaBlog">
            <h4 class="naslovFunkcije">Blog</h4>
            <form action="{{url("/insertBlog")}}" enctype="multipart/form-data" id="insertPostGallery" method="post">
                {{csrf_field()}}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <table id="insertTabelaPost">
                    <tr>
                        <td>
                            <span><label for="name">Name</label></span>
                        </td>
                        <td>
                            <span><input type="text" id="tbNamePostInsert" name="tbNameBlog" required
                                         pattern="^[A-Z][a-z]{1,11}(\s[A-Z][a-z]{1,11})*$"
                                         title="Example : Herald!"/></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span><label for="text">Description</label></span>
                        </td>
                        <td>
                            <span><input type="text" required title="Some Description" id="tbDescriptionPost"
                                         name="taDescription"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span><label for="image">Image</label></span>
                        </td>
                        <td>
                            <span><input type="file" id="image" name="image" required></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <spa><label for="category">Category</label></spa>
                        </td>
                        <td>
                           <span><select id="ddlCategory" name="ddlCategory" required="">
                                            <option value="0">Chose category</option>
                                            @isset($categories)
                                       @foreach($categories as $cat)
                                           <option value="{{$cat->id}}">{{$cat->name}}</option>
                                       @endforeach
                                   @endisset
                                        </select>
                                    </span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input class="submit-btn" id="btnInsert" value="Insert" type="submit"
                                               name="btnInsertBlog"></td>
                    </tr>
                </table>
            </form>
        </div>
        <div id="formaPost">
            <h4 id="naslovKategorija">Insert Category</h4>
            <form action="{{url("/admin/insertCategory")}}" id="insertPostGallery" method="post">
                {{csrf_field()}}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <table id="insertTabelaPost">
                    <tr>
                        <td>
                            <span><label for="name">Name</label></span>
                        </td>
                        <td>
                            <span><input type="text" id="tbName" name="tbName" required=""
                                         pattern="^[A-Z][a-z]{1,11}(\s[A-Z][a-z]{1,11})*$"
                                         title="Example : Trance"/></span>
                        </td>
                    <tr>
                        <td colspan="2"><input class="submit-btn" id="btnRegister" value="Insert" type="submit"
                                               name="btnInsertCategory"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
@endsection
