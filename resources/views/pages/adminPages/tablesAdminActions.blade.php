@extends("layouts.admin")

@section("title")
    Actions
@endsection

@section("sadrzaj")
    <div id="page-wrapper">
        <h2 class="title1">Tables Actions</h2>
        <div class="table-responsive bs-example widget-shadow">
            <div class="proba">
                <h4 id="naslovTabele">Latest Requests</h4>
            </div>
            <table id="tabelaPostovi" class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Created At</th>
                    <th>Ip Adress</th>
                    <th>Route</th>
                </tr>
                </thead>
                <tbody>
                @isset($logRequests)
                    @foreach($logRequests as $lr)
                        <tr>
                            <th scope="row">{{$lr->id}}</th>
                            <td>{{$lr->created_at}}</td>
                            <td>{{$lr->ip}}</td>
                            <td>{{$lr->route_name}}</td>
                        </tr>
                    @endforeach
                @endisset
                </tbody>
            </table>
        </div>
        <div class="table-responsive bs-example widget-shadow">
            <div class="proba">
                <h4 id="naslovTabele">Latest Actions</h4>
            </div>
            <table id="tabelaPostovi" class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Action</th>
                    <th>Created At</th>
                </tr>
                </thead>
                <tbody>
                @isset($actions)
                    @foreach($actions as $a)
                        <tr>
                            <th scope="row">{{$a->id}}</th>
                            <td>{{$a->action}}</td>
                            <td>{{$a->created_at}}</td>
                        </tr>
                    @endforeach
                @endisset
                </tbody>
            </table>
        </div>
    </div>
@endsection
