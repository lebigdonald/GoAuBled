@extends('layouts.master')

@section('content')
    <section id="testimonials" class="w-100" style="background-color: rgb(233, 236, 239);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="">
                        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>  Mon profile public
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 mb-3">
                    <div class="card">
                        <div class="card-header">Mon Profile</div>
                        <div class="list-group list-group-flush">
                            <a href="{{ route('users.profile', $user) }}" class="list-group-item {{ ($tab == 'profile') ? 'active' : '' }}">
                                <i class="fa fa-user" aria-hidden="true"></i> Mon Profile
                            </a>

                            <a href="{{ route('users.password.index', $user) }}" class="list-group-item {{ ($tab == 'security') ? 'active' : '' }}">
                                <i class="fa fa-lock" aria-hidden="true"></i> Password
                            </a>

                            <a href="{{ route('user.travels', $user) }}" class="list-group-item {{ ($tab == 'travel') ? 'active' : '' }}">
                                <i class="fa fa-key" aria-hidden="true"></i> Voyages
                            </a>

                            <a href="{{ route('user.packets', $user) }}" class="list-group-item {{ ($tab == 'packet') ? 'active' : '' }}">
                                <i class="fa fa-key" aria-hidden="true"></i> Packets
                            </a>

                            <a href="{{ route('user.reservations', $user) }}" class="list-group-item {{ ($tab == 'packet') ? 'active' : '' }}">
                                <i class="fa fa-key" aria-hidden="true"></i> Mes reservations
                            </a>

                            <a href="{{ route('users.password.update', $user) }}" class="list-group-item {{ ($tab == 'notifification') ? 'active' : '' }}">
                                <i class="fa fa-key" aria-hidden="true"></i> Notifications
                            </a>

                            <a href="{{ route('users.password.update', $user) }}" class="list-group-item {{ ($tab == 'messages') ? 'active' : '' }}">
                                <i class="fa fa-key" aria-hidden="true"></i> Messages
                            </a>

                            <a href="{{ route('users.invitation') }}" class="list-group-item {{ ($tab == 'user') ? 'active' : '' }}">
                                <i class="fa fa-key" aria-hidden="true"></i> inviter un ami
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-9">
                    @yield('main_content')
                </div>
            </div>
        </div>
    </section>
@endsection
