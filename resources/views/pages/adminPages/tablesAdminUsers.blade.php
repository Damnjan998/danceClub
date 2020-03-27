@extends("layouts.admin")

@section("title")
    Tables USERS
@endsection

@section("sadrzaj")
    <div id="page-wrapper">
        <h2 class="title1">Tables Users</h2>
        <div class="table-responsive bs-example widget-shadow">
            <div class="proba">
                <h4 id="naslovTabele">Users</h4>
            </div>
            <table id="tabelaPostovi" class="table table-bordered">
                <thead>
                @csrf
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Date of Registration</th>
                    <th>Role Id</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @isset($users)
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->lastname}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->date_of_registration}}</td>
                            <td>{{$user->role_id}}</td>
                            <td><a href="{{url("/admin/updateUser/$user->id")}}" class="upd" data-id="{{$user->id}}">
                                    <button type="button" class="btn btn-primary">Update</button>
                                </a></td>
                            <td><a href="#" class="del" data-id="{{$user->id}}">
                                    <button type="button" class="btn btn-primary">Delete</button>
                                </a></td>
                        </tr>
                    @endforeach
                @endisset
                </tbody>
            </table>
        </div>
        <div class="table-responsive bs-example widget-shadow">
            <div class="proba">
                <h4 id="naslovTabele">Active Users</h4>
            </div>
            <table id="tabelaPostovi" class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Date of Registration</th>
                    <th>Role Id</th>
                </tr>
                </thead>
                <tbody>
                @isset($activeUsers)
                    @foreach($activeUsers as $au)
                        <tr>
                            <th scope="row">{{$au->id}}</th>
                            <td>{{$au->name}}</td>
                            <td>{{$au->lastname}}</td>
                            <td>{{$au->email}}</td>
                            <td>{{$au->date_of_registration}}</td>
                            <td>{{$au->role_id}}</td>
                        </tr>
                    @endforeach
                @endisset
                </tbody>
            </table>
        </div>
        <div id="kategorijeTabela" class="table-responsive bs-example widget-shadow">
            <div class="proba">
                <h4 id="naslovTabele">Roles</h4>
            </div>
            <table id="tabelaKategorije" class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>
                </thead>
                <tbody>
                @isset($roles)
                    @foreach($roles as $role)
                        <tr>
                            <th scope="row">{{$role->id}}</th>
                            <td>{{$role->name}}</td>
                        </tr>
                    @endforeach
                @endisset
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section("js")
    @parent
    <script type="text/javascript" src="{{ asset("/js/adminJs/adminUsers.js") }}"></script>
@endsection
