@extends("layouts.admin")

@section("title")
    Tables POSTS
@endsection

@section("sadrzaj")
    <div id="page-wrapper">
        <h2 class="title1">Form BLOG</h2>
        <div id="formaPost">
            <h4 class="naslovFunkcije">Update BLOG</h4>
            <form action="{{url("/admin/doUpdateBlog")}}" id="insertPostGallery" enctype="multipart/form-data" method="post">
                {{csrf_field()}}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <table id="insertTabelaPost">
                    @isset($oneBlog)
                        @foreach($oneBlog as $oB)
                            <input type="hidden" id="idUser" name="idBlog" value="{{$oB->id}}"/>
                            <tr>
                                <td>
                                    <span><label for="name">Name</label></span>
                                </td>
                                <td>
                            <span><input type="text" id="tbName" name="tbName" required=""
                                         title="Example : Lifetime" value="{{$oB->name}}"/></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span><label for="name">Description</label></span>
                                </td>
                                <td>
                            <span><input type="text" id="tbLastName" name="tbDescription" required=""
                                         title="Example : Web" value="{{$oB->description}}"/></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span><label for="ddlCategory">Category</label></span>
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
                                <td>
                                    <span><label for="image">Image</label></span>
                                </td>
                                <td>
                                    <span><input type="file" id="fileImage" name="fileImage"/></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span><label for="image">Image Alt</label></span>
                                </td>
                                <td>
                                    <span><input type="text" id="tbAlt" name="tbAlt" required=""
                                                 title="Example : Post picture" value="{{$oB->image_alt}}"/></span>
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
