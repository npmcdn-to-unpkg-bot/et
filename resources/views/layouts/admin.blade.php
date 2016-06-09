<?xml version="1.0" encoding="UTF-8" ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
            <title>
                @yield('title')
            </title>
            @include('layouts.libs')
        </meta>
    </head>
    <body>
        <div class="navbar navbar-default navbar-fixed-top">
            <div class="navbar-header">
                <button class="navbar-toggle" data-target=".navbar-inverse-collapse" data-toggle="collapse" type="button">
                    <span class="icon-bar">
                    </span>
                    <span class="icon-bar">
                    </span>
                    <span class="icon-bar">
                    </span>
                </button>
                <a class="navbar-brand" href="http://www.3ex.asia" target="_blank">
                    <!-- <img src="{{asset('images/3exlogo.png')}}" style="vertical-align: text-bottom; margin-top: 0px; height: 20px"/> -->
                    ExampTest
                </a>
            </div>
            <div class="navbar-collapse collapse navbar-inverse-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/admin/home">
                            Hệ thống quản trị nội dung website
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="/admin/users/item?id=7">
                            admin2
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <span class="glyphicon glyphicon-th-large">
                            </span>
                            Thiết lập
                            <b class="caret">
                            </b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#">
                                    Thiết lập hệ thống website
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Đổi mật khẩu
                                </a>
                            </li>
                            <li class="divider">
                            </li>
                            <li>
                                <a href="#">
                                    Thoát
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                @include('layouts.menu')
                @yield('content')
            </div>
        </div>
        <div class="clear" style="height: 40px;">
        </div>
        <!-- <div class="mastfoot">
            <div class="inner pull-right">
                <p>
                    Công cụ quản trị website được phát triển bởi 3EX Solutions.
    Website:
                    <a href="http://www.3ex.asia" target="_blank">
                        www.3ex.asia
                    </a>
                </p>
            </div>
        </div> -->
    </body>
</html>
