@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="user-wrapper">
                    <ul class="users">
                        <li class="user">
                            <span class="pending">1</span>

                            <div class="media">
                                <div class="media-left">
                                    <img src="https://placehold.it/170x200" alt="" class="media-object">
                                </div>

                                <div class="media-body">
                                    <p class="name">Taylor</p>
                                    <p class="email">taylor@mail.com</p>
                                </div>
                            </div>
                        </li>
                        <li class="user">
                            <span class="pending">1</span>

                            <div class="media">
                                <div class="media-left">
                                    <img src="https://via.placeholder.com/150" alt="" class="media-object">
                                </div>

                                <div class="media-body">
                                    <p class="name">Taylor</p>
                                    <p class="email">taylor@mail.com</p>
                                </div>
                            </div>
                        </li>
                        <li class="user">
                            <span class="pending">1</span>

                            <div class="media">
                                <div class="media-left">
                                    <img src="https://via.placeholder.com/150" alt="" class="media-object">
                                </div>

                                <div class="media-body">
                                    <p class="name">Taylor</p>
                                    <p class="email">taylor@mail.com</p>
                                </div>
                            </div>
                        </li>
                        <li class="user">
                            <span class="pending">1</span>

                            <div class="media">
                                <div class="media-left">
                                    <img src="https://via.placeholder.com/150" alt="" class="media-object">
                                </div>

                                <div class="media-body">
                                    <p class="name">Taylor</p>
                                    <p class="email">taylor@mail.com</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-8" id="message">
                <div class="message-wrapper">
                    <ul class="messages">
                        <li class="messages clearfix">
                            <div class="sent">
                                <p>sdkjfksdajf</p>
                                <p class="date">1 sep, 2019</p>
                            </div>
                        </li>

                        <li class="messages clearfix">
                            <div class="received">
                                <p>sdkjfksdajf</p>
                                <p class="date">1 sep, 2019</p>
                            </div>
                        </li>

                        <li class="messages clearfix">
                            <div class="sent">
                                <p>sdkjfksdajf</p>
                                <p class="date">1 sep, 2019</p>
                            </div>
                        </li>

                        <li class="messages clearfix">
                            <div class="received">
                                <p>sdkjfksdajf</p>
                                <p class="date">1 sep, 2019</p>
                            </div>
                        </li>

                        <li class="messages clearfix">
                            <div class="sent">
                                <p>sdkjfksdajf</p>
                                <p class="date">1 sep, 2019</p>
                            </div>
                        </li>

                        <li class="messages clearfix">
                            <div class="received">
                                <p>sdkjfksdajf</p>
                                <p class="date">1 sep, 2019</p>
                            </div>
                        </li>

                        <li class="messages clearfix">
                            <div class="sent">
                                <p>sdkjfksdajf</p>
                                <p class="date">1 sep, 2019</p>
                            </div>
                        </li>

                        <li class="messages clearfix">
                            <div class="received">
                                <p>sdkjfksdajf</p>
                                <p class="date">1 sep, 2019</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="input-text">
                <input type="text" name="message" class="submit">
            </div>
        </div>
    </div>
@endsection
