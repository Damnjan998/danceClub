@extends("layouts.admin")
@section("title")
    Mail
@endsection

@section("sadrzaj")
    <div id="page-wrapper">
        <h2 class="title1">Mail Page</h2>
        <div id="poruke" class="col-md-8 compose-right widget-shadow">
            <div class="panel-default">
                <div class="panel-heading">
                    Inbox
                </div>
                <div class="inbox-page">
                    @csrf
                    @isset($messages)
                        @foreach($messages as $m)
                            <div class="inbox-row widget-shadow" id="accordion" role="tablist"
                                 aria-multiselectable="true">
                                <div class="mail "><input type="checkbox" class="checkbox"></div>
                                <div class="mail mail-name"><h6>{{$m->name}}</h6></div>
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                   aria-expanded="true" aria-controls="collapseOne">
                                    <div class="mail"><p>{{$m->title}}</p></div>
                                    <div class="mail"><p>{{$m->subject}}</p></div>
                                </a>
                                <div class="mail-right dots_drop">
                                    <div class="dropdown">
                                        <a href="#" data-toggle="dropdown" aria-expanded="false">
                                            <p><i class="fa fa-ellipsis-v mail-icon"></i></p>
                                        </a>
                                        <ul class="dropdown-menu float-right">
                                            <li>
                                                <a role="button" data-toggle="collapse" data-parent="#accordion"
                                                   href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    <i class="fa fa-reply mail-icon"></i>
                                                    Reply
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="delMessage" data-id="{{$m->id}}" class="font-red" title="">
                                                    <i class="fa fa-trash-o mail-icon"></i>
                                                    Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="mail-right"><p>{{$m->sentAt}}</p></div>
                                <div class="clearfix"></div>
                                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel"
                                     aria-labelledby="headingOne">
                                    <div class="mail-body">
                                        <p>{{$m->subject}}</p>
                                        <form>
                                            <input type="text" placeholder="Reply to sender" required="">
                                            <input type="submit" value="Send">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endisset
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
@endsection

@section("js")
    @parent
    <script type="text/javascript" src="{{ asset("/js/adminJs/adminMessage.js") }}"></script>
@endsection
