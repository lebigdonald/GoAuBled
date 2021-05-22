@extends('layouts.master')

@section('content')
    <section id="about" class="wow fadeInUp text-left">
        <div class="container">
            <div class="row my-2">
                <div class="col-lg-10 order-lg-2">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="" data-target="#messages" data-toggle="tab" class="nav-link">Notifications</a>
                        </li>
                        <li class="nav-item">
                            <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Editer votre profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="" data-target="#tchat" data-toggle="tab" class="nav-link">mes tchats</a>
                        </li>
                    </ul>
                    <div class="tab-content py-4">
                        <div class="tab-pane active" id="profile">
                            <h5 class="mb-3 quigo-title">{{ Auth::user()->name }}</h5>
                            <div class="row">
                                <div class="col-md-6 quigo-subtitle">
                                    <p><strong>Email : </strong> {{ Auth::user()->email }}</p>
                                </div>
                                <div class="col-md-6">
                                </div>
                                <div class="col-md-12">
                                    <table class="table table-sm table-hover table-striped">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <strong>Menbre verifié
                                                    : </strong> <span
                                                    class="profil-info">{{ Auth::user()->email_verified_at ? 'Oui':'Non' }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Date de creation du compte : </strong> <span
                                                    class="profil-info">le   {{ Carbon\Carbon::parse(Auth::user()->created_at)->format('d.m.Y')}}   á
                                                {{Carbon\Carbon::parse(Auth::user()->created_at)->format('H:i') }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Nombres de Posts
                                                    : </strong><span
                                                    class="profil-info">{{ Auth::user()->travels()->count() }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Adresse : </strong> <span class="profil-info">Lorem ipsum</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Postal : </strong> <span class="profil-info">Lorem ipsum</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Pays : </strong> <span class="profil-info">Lorem ipsum</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Telephone : </strong> <span
                                                    class="profil-info">124235657268292</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Portable : </strong> <span
                                                    class="profil-info">12543655376383763</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Compte google ? : </strong>
                                                <span
                                                    class="profil-info">{{ Auth::user()->google_id ? 'Oui':'Non' }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Compte Facebook ? : </strong>
                                                <span
                                                    class="profil-info">{{ Auth::user()->facebook_id ? 'Oui':'Non' }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>IBAN : </strong> <span
                                                    class="profil-info">DE12543655376383763</span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--/row-->
                        </div>
                        <div class="tab-pane" id="messages">
                            <div class="alert alert-info alert-dismissable">
                                <a class="panel-close close" data-dismiss="alert">×</a> This is an
                                <strong>.alert</strong>. Use this to show important messages to the user.
                            </div>
                            <table class="table table-hover table-striped">
                                <tbody>
                                <tr>
                                    <td>
                                        <span class="float-right font-weight-bold">3 hrs ago</span> Here is your a link
                                        to the latest summary report from the..
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="float-right font-weight-bold">Yesterday</span> There has been a
                                        request on your account since that was..
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="float-right font-weight-bold">9/10</span> Porttitor vitae ultrices
                                        quis, dapibus id dolor. Morbi venenatis lacinia rhoncus.
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="float-right font-weight-bold">9/4</span> Vestibulum tincidunt
                                        ullamcorper eros eget luctus.
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="float-right font-weight-bold">9/4</span> Maxamillion ais the fix
                                        for tibulum tincidunt ullamcorper eros.
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="edit">
                            <form role="form">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">First name</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="Jane">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="Bishop">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="email" value="email@gmail.com">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Company</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Website</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="url" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Address</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="" placeholder="Street">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-6">
                                        <input class="form-control" type="text" value="" placeholder="City">
                                    </div>
                                    <div class="col-lg-3">
                                        <input class="form-control" type="text" value="" placeholder="State">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Time Zone</label>
                                    <div class="col-lg-9">
                                        <select id="user_time_zone" class="form-control" size="0">
                                            <option value="Hawaii">(GMT-10:00) Hawaii</option>
                                            <option value="Alaska">(GMT-09:00) Alaska</option>
                                            <option value="Pacific Time (US &amp; Canada)">(GMT-08:00) Pacific Time (US
                                                &amp; Canada)
                                            </option>
                                            <option value="Arizona">(GMT-07:00) Arizona</option>
                                            <option value="Mountain Time (US &amp; Canada)">(GMT-07:00) Mountain Time
                                                (US &amp; Canada)
                                            </option>
                                            <option value="Central Time (US &amp; Canada)" selected="selected">
                                                (GMT-06:00) Central Time (US &amp; Canada)
                                            </option>
                                            <option value="Eastern Time (US &amp; Canada)">(GMT-05:00) Eastern Time (US
                                                &amp; Canada)
                                            </option>
                                            <option value="Indiana (East)">(GMT-05:00) Indiana (East)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Username</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="janeuser">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Password</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="password" value="11111122333">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="password" value="11111122333">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input type="reset" class="btn btn-secondary" value="Cancel">
                                        <input type="button" class="btn btn-primary" value="Save Changes">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="tchat">
                            <div class="messaging">
                                <div class="inbox_msg">
                                    <div class="inbox_people">
                                        <div class="headind_srch">
                                            <div class="quigo-subtitle">
                                                <h4 class="quigo-subtitle text-indigo">Messages recents</h4>
                                            </div>
                                        </div>
                                        <div class="inbox_chat">
                                            <div class="chat_list active_chat">
                                                <div class="chat_people">
                                                    <div class="chat_img"><img
                                                            src="{{asset('/img/logo.png')}}"
                                                            alt="sunil"></div>
                                                    <div class="chat_ib">
                                                        <h5>{{Auth::user()->name}} <span class="chat_date">Dec 25</span></h5>
                                                        <p>Test, which is a new approach to have all solutions
                                                            astrology under one roof.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chat_list">
                                                <div class="chat_people">
                                                    <div class="chat_img"><img
                                                            src="{{asset('/img/logo.png')}}"
                                                            alt="sunil"></div>
                                                    <div class="chat_ib">
                                                        <h5>{{Auth::user()->name}} <span class="chat_date">Dec 25</span></h5>
                                                        <p>Test, which is a new approach to have all solutions
                                                            astrology under one roof.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chat_list">
                                                <div class="chat_people">
                                                    <div class="chat_img"><img
                                                            src="{{asset('/img/logo.png')}}"
                                                            alt="sunil"></div>
                                                    <div class="chat_ib">
                                                        <h5>{{Auth::user()->name}} <span class="chat_date">Dec 25</span></h5>
                                                        <p>Test, which is a new approach to have all solutions
                                                            astrology under one roof.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chat_list">
                                                <div class="chat_people">
                                                    <div class="chat_img"><img
                                                            src="{{asset('/img/logo.png')}}"
                                                            alt="sunil"></div>
                                                    <div class="chat_ib">
                                                        <h5>{{Auth::user()->name}} <span class="chat_date">Dec 25</span></h5>
                                                        <p>Test, which is a new approach to have all solutions
                                                            astrology under one roof.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chat_list">
                                                <div class="chat_people">
                                                    <div class="chat_img"><img
                                                            src="{{asset('/img/logo.png')}}"
                                                            alt="sunil"></div>
                                                    <div class="chat_ib">
                                                        <h5>{{Auth::user()->name}} <span class="chat_date">Dec 25</span></h5>
                                                        <p>Test, which is a new approach to have all solutions
                                                            astrology under one roof.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chat_list">
                                                <div class="chat_people">
                                                    <div class="chat_img"><img
                                                            src="{{asset('/img/logo.png')}}"
                                                            alt="sunil"></div>
                                                    <div class="chat_ib">
                                                        <h5>{{Auth::user()->name}} <span class="chat_date">Dec 25</span></h5>
                                                        <p>Test, which is a new approach to have all solutions
                                                            astrology under one roof.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chat_list">
                                                <div class="chat_people">
                                                    <div class="chat_img"><img
                                                            src="{{asset('/img/logo.png')}}"
                                                            alt="sunil"></div>
                                                    <div class="chat_ib">
                                                        <h5>{{Auth::user()->name}} <span class="chat_date">Dec 25</span></h5>
                                                        <p>Test, which is a new approach to have all solutions
                                                            astrology under one roof.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mesgs">
                                        <div class="msg_history">
                                            <div class="incoming_msg">
                                                <div class="incoming_msg_img"><img
                                                        src="{{asset('/img/logo.png')}}"
                                                        alt="sunil"></div>
                                                <div class="received_msg">
                                                    <div class="received_withd_msg">
                                                        <p>Test which is a new approach to have all
                                                            solutions</p>
                                                        <span class="time_date"> 11:01 AM    |    June 9</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="outgoing_msg">
                                                <div class="sent_msg">
                                                    <p>Test which is a new approach to have all
                                                        solutions</p>
                                                    <span class="time_date"> 11:01 AM    |    June 9</span></div>
                                            </div>
                                            <div class="incoming_msg">
                                                <div class="incoming_msg_img"><img
                                                        src="{{asset('/img/logo.png')}}"
                                                        alt="sunil"></div>
                                                <div class="received_msg">
                                                    <div class="received_withd_msg">
                                                        <p>Test, which is a new approach to have</p>
                                                        <span class="time_date"> 11:01 AM    |    Yesterday</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="outgoing_msg">
                                                <div class="sent_msg">
                                                    <p>Apollo University, Delhi, India Test</p>
                                                    <span class="time_date"> 11:01 AM    |    Today</span></div>
                                            </div>
                                            <div class="incoming_msg">
                                                <div class="incoming_msg_img"><img
                                                        src="{{asset('/img/logo.png')}}"
                                                        alt="sunil"></div>
                                                <div class="received_msg">
                                                    <div class="received_withd_msg">
                                                        <p>We work directly with our designers and suppliers,
                                                            and sell direct to you, which means quality, exclusive
                                                            products, at a price anyone can afford.</p>
                                                        <span class="time_date"> 11:01 AM    |    Today</span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="type_msg">
                                            <div class="input_msg_write">
                                                <input type="text" class="write_msg" placeholder="Type a message"/>
                                                <button class="msg_send_btn" type="button"><i
                                                        class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 order-lg-1 text-center">
                    <img src="{{ Auth::user()->avatar_original }}" class="mx-auto img-fluid img-circle d-block"
                         alt="avatar" width="100" height="100">
                    <label class="custom-file">
                        <input type="file" id="file" class="custom-file-input">
                        <input type="button" class="btn-recherche mt-0 mb-9 text-white" value="choississer l'image">
                    </label>
                </div>
            </div>
        </div>
    </section>
@endsection
