@extends("layouts.admin")

@section("title")
    Tables POSTS
@endsection

@section("sadrzaj")
    <div id="page-wrapper">
        <h2 class="title1">Form POST</h2>
        <div id="formaPost">
            <h4 class="naslovFunkcije">Update POST</h4>
            <form action="{{url("/admin/doUpdatePost")}}" enctype="multipart/form-data" id="insertPostGallery" method="post">
                {{csrf_field()}}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <table id="insertTabelaPost">
                    @isset($onePost)
                        @foreach($onePost as $oP)
                            <input type="hidden" id="idUser" name="idPost" value="{{$oP->id}}"/>
                            <tr>
                                <td>
                                    <span><label for="name">Name</label></span>
                                </td>
                                <td>
                            <span><input type="text" id="tbName" name="tbName" required=""
                                         title="Example : Lifetime" value="{{$oP->name}}"/></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span><label for="name">Description</label></span>
                                </td>
                                <td>
                            <span><input type="text" id="tbLastName" name="tbDescription" required=""
                                         title="Example : Web" value="{{$oP->description}}"/></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span><label for="email">Special</label></span>
                                </td>
                                <td>
                            <span><input type="text" id="tbSpecial" name="tbSpecial" required=""
                                         title="Example : 0 or 1" value="{{$oP->special}}"/></span>
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
                                                 title="Example : Post picture" value="{{$oP->image_alt}}"/></span>
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
