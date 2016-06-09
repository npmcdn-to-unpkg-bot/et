@extends('layouts.admin')
@section('title', 'Bảng điều khiển | Quản lý Chương')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <ul class="breadcrumb">
        <li>
            <a href="/admin/home">
                Bảng điều khiển
            </a>
        </li>
        <li class="active">
            Quản lý chương
        </li>
    </ul>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <a class="btn btn-info" href="/admin/product/categories?lang=vi">
                    <span class="glyphicon glyphicon-folder-close">
                    </span>
                    Quản lý danh mục
                </a>
            </div>
            <div class="col-md-6 text-right">
                <select class="option-lang" name="lang" onchange="window.location = '/admin/product?lang='+this.value">
                    <option selected="selected" value="vi">
                        Tiếng Việt
                    </option>
                    <option value="en">
                        Tiếng Anh
                    </option>
                </select>
            </div>
        </div>
        <div class="clear10">
        </div>
        <div class="row">
            <form class="form-inline filter-product" role="form">
                <div class="form-group">
                    <label class="sr-only" for="inputCategory">
                        Lọc danh mục
                    </label>
                    <select class="form-control" name="cat">
                        <option value="">
                            -- Danh mục --
                        </option>
                        <option value="6">
                            Quạt điện dân dụng và Công nghiệp
                        </option>
                        <option value="37">
                            +Quạt trần trang trí
                        </option>
                        <option value="36">
                            +Quạt tích điện
                        </option>
                        <option value="35">
                            +Quạt trần điện cơ
                        </option>
                        <option value="34">
                            +Quạt điện dân dụng
                        </option>
                        <option value="33">
                            +Quạt điện công nghiệp
                        </option>
                        <option value="32">
                            +Quạt phun sương
                        </option>
                        <option value="31">
                            +Quạt thông gió
                        </option>
                        <option value="5">
                            Đèn Led
                        </option>
                        <option value="30">
                            +Đèn đường led
                        </option>
                        <option value="29">
                            +Bóng đèn led
                        </option>
                        <option value="28">
                            +Đèn pha Led
                        </option>
                        <option value="27">
                            +Đèn led năng lượng mặt trời
                        </option>
                        <option value="26">
                            +Đèn Led Hibay (Đèn led nhà xưởng)
                        </option>
                        <option value="25">
                            +Đèn led ốp trần
                        </option>
                        <option value="24">
                            +Máng đèn led
                        </option>
                        <option value="23">
                            +Đèn led thể thao
                        </option>
                        <option value="22">
                            +Đèn led downlight
                        </option>
                        <option value="4">
                            Thiết bị chiếu sáng
                        </option>
                        <option value="21">
                            +Máng đèn
                        </option>
                        <option value="20">
                            +Đèn chiếu sáng công cộng
                        </option>
                        <option value="19">
                            +Đèn ốp trần
                        </option>
                        <option value="18">
                            +Đèn downlight
                        </option>
                        <option value="17">
                            +Đèn exit, sự cố
                        </option>
                        <option value="16">
                            +Đèn ngủ cao cấp
                        </option>
                        <option value="15">
                            +Đèn pha lê
                        </option>
                        <option value="14">
                            +Đèn bàn học sinh
                        </option>
                        <option value="13">
                            +Đèn tường
                        </option>
                        <option value="12">
                            +Đèn sạc điện
                        </option>
                        <option value="3">
                            Phong thủy gia - Vật dụng trang trí
                        </option>
                        <option value="11">
                            +Phong thủy gia
                        </option>
                        <option value="10">
                            +Vật dụng trang trí
                        </option>
                        <option value="2">
                            Hệ thống điện năng lượng mặt trời
                        </option>
                        <option value="9">
                            +Hệ thống điện năng lượng mặt trời
                        </option>
                        <option value="8">
                            +Tấm pin năng lượng mặt trời
                        </option>
                        <option value="1">
                            Thiết bị điện dân dụng
                        </option>
                        <option value="7">
                            +Nhóm thiết bị AC-DC
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="inputName">
                        Tên sản phẩm
                    </label>
                    <input class="form-control" name="name" placeholder="Tên sản phẩm" type="text" value="">
                    </input>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="inputFromDate">
                        Từ ngày
                    </label>
                    <input class="form-control datepicker" name="fromdate" placeholder="Từ ngày" type="text" value="">
                    </input>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="inputToDate">
                        Đến ngày
                    </label>
                    <input class="form-control datepicker" name="todate" placeholder="Đến ngày" type="text" value="">
                    </input>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="inputLastChangeBy">
                        Người đăng
                    </label>
                    <select class="form-control" name="lastchangedby">
                        <option value="0">
                            Người đăng
                        </option>
                        <option value="8">
                            thinh_pro1011@yahoo.com
                        </option>
                        <option value="7">
                            admin2
                        </option>
                        <option value="6">
                            thinh2012
                        </option>
                        <option value="5">
                            thinh2011
                        </option>
                        <option value="4">
                            thinh2010
                        </option>
                        <option value="3">
                            thinh
                        </option>
                        <option value="1">
                            superadmin
                        </option>
                        <option value="2">
                            hoangtv
                        </option>
                    </select>
                </div>
                <input class="form-control" name="lang" type="hidden" value="vi">
                    <button class="btn btn-default" type="submit">
                        Lọc
                    </button>
                </input>
            </form>
        </div>
    </div>
    <div class="clear10">
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="btn-group">
                    <a class="btn btn-default" data-toggle="tooltip" href="#" id="btn-ck-all" title="Chọn / bỏ chọn toàn bộ">
                        <span class="glyphicon glyphicon-unchecked">
                        </span>
                    </a>
                    <a class="btn btn-danger" data-toggle="tooltip" href="#" id="btn-del-all" title="Xóa toàn bộ mục đã chọn">
                        <span class="glyphicon glyphicon-trash">
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-md-6 text-right">
                <a class="btn btn-success pull-right" href="/admin/product/detail?lang=vi">
                    <span class="glyphicon glyphicon-plus">
                    </span>
                    Thêm mới
                </a>
            </div>
        </div>
    </div>
    <div class="clear10">
    </div>
    <div class="table-responsive">
        <table cellpadding="1" cellspacing="1" class="table table-striped table-hover" id="table_content" width="100%">
            <thead>
                <tr>
                    <th width="3%">
                    </th>
                    <th style="text-align: center;" width="5%">
                        ID
                    </th>
                    <th width="22%">
                        Tên sản phẩm
                    </th>
                    <th width="10%">
                        Mục
                    </th>
                    <th width="6%">
                        Hiển thị
                    </th>
                    <th width="6%">
                        Nổi bật
                    </th>
                    <th width="5%">
                        Mới
                    </th>
                    <th width="5%">
                        Khuyến mại
                    </th>
                    <th width="12%">
                        Ngày tạo
                    </th>
                    <th width="9%">
                        Người đăng
                    </th>
                    <th style="text-align: center;" width="15%">
                        Thao tác
                    </th>
                </tr>
            </thead>
            <tbody id="sorttable">
                <tr id="item_4">
                    <td width="3%">
                        <input class="checkdel" del-id="4" type="checkbox"/>
                    </td>
                    <td style="text-align: center;" width="5%">
                        4
                    </td>
                    <td class="edit-name" width="22%">
                        <a href="/admin/product/detail?id=4&lang=vi">
                            Bóng đèn Led Vioa 7w
                        </a>
                    </td>
                    <td width="10%">
                        <a href="/admin/product/categoriesdetail?cat=29&lang=vi">
                            Bóng đèn led
                        </a>
                    </td>
                    <td width="6%">
                        <button class="btn btn-info btn-sm editmenu glyphicon glyphicon-ok" cms-change-field="changfield" currentvalue="1" data-toggle="tooltip" field="public" item-id="4" title="Click để tắt">
                        </button>
                    </td>
                    <td width="6%">
                        <button class="btn btn-info btn-sm editmenu glyphicon glyphicon-ok" cms-change-field="changfield" currentvalue="1" data-toggle="tooltip" field="viewhome" item-id="4" title="Click để tắt">
                        </button>
                    </td>
                    <td width="5%">
                        <button class="btn btn-info btn-sm editmenu glyphicon glyphicon-ok" cms-change-field="changfield" currentvalue="1" data-toggle="tooltip" field="new" item-id="4" title="Click để tắt">
                        </button>
                    </td>
                    <td width="5%">
                        <button class="btn btn-info btn-sm editmenu glyphicon glyphicon-ok" cms-change-field="changfield" currentvalue="1" data-toggle="tooltip" field="sale" item-id="4" title="Click để tắt">
                        </button>
                    </td>
                    <td width="12%">
                        2015-06-12 11:52:24
                    </td>
                    <td width="9%">
                        admin2
                    </td>
                    <td style="text-align: center;" width="15%">
                        <div class="btn-group">
                            <a class="btn btn-info btn-sm" data-toggle="tooltip" href="/admin/product/duplicate?cat=29&id=4&lang=vi" title="Sao chép">
                                <span class="glyphicon glyphicon-list-alt">
                                </span>
                            </a>
                            <a class="btn btn-warning btn-sm editmenu" data-toggle="tooltip" href="/admin/product/movetop?cat=29&id=4&lang=vi" title="Đưa lên đầu tiên">
                                <span class="glyphicon glyphicon-arrow-up">
                                </span>
                            </a>
                            <a class="btn btn-primary btn-sm" data-toggle="tooltip" href="/admin/product/detail?id=4&lang=vi" title="Sửa">
                                <span class="glyphicon glyphicon-pencil">
                                </span>
                            </a>
                            <a class="btn btn-danger btn-sm" data-placement="top" data-toggle="tooltip" href="/admin/product/delete?id=4&lang=vi" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" title="Xóa">
                                <span class="glyphicon glyphicon-trash">
                                </span>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr id="item_3">
                    <td width="3%">
                        <input class="checkdel" del-id="3" type="checkbox"/>
                    </td>
                    <td style="text-align: center;" width="5%">
                        3
                    </td>
                    <td class="edit-name" width="22%">
                        <a href="/admin/product/detail?id=3&lang=vi">
                            Bóng đèn Led Vioa 5w
                        </a>
                    </td>
                    <td width="10%">
                        <a href="/admin/product/categoriesdetail?cat=29&lang=vi">
                            Bóng đèn led
                        </a>
                    </td>
                    <td width="6%">
                        <button class="btn btn-info btn-sm editmenu glyphicon glyphicon-ok" cms-change-field="changfield" currentvalue="1" data-toggle="tooltip" field="public" item-id="3" title="Click để tắt">
                        </button>
                    </td>
                    <td width="6%">
                        <button class="btn btn-info btn-sm editmenu glyphicon glyphicon-ok" cms-change-field="changfield" currentvalue="1" data-toggle="tooltip" field="viewhome" item-id="3" title="Click để tắt">
                        </button>
                    </td>
                    <td width="5%">
                        <button class="btn btn-info btn-sm editmenu glyphicon glyphicon-ok" cms-change-field="changfield" currentvalue="1" data-toggle="tooltip" field="new" item-id="3" title="Click để tắt">
                        </button>
                    </td>
                    <td width="5%">
                        <button class="btn btn-info btn-sm editmenu glyphicon glyphicon-ok" cms-change-field="changfield" currentvalue="1" data-toggle="tooltip" field="sale" item-id="3" title="Click để tắt">
                        </button>
                    </td>
                    <td width="12%">
                        2015-06-12 11:52:24
                    </td>
                    <td width="9%">
                        admin2
                    </td>
                    <td style="text-align: center;" width="15%">
                        <div class="btn-group">
                            <a class="btn btn-info btn-sm" data-toggle="tooltip" href="/admin/product/duplicate?cat=29&id=3&lang=vi" title="Sao chép">
                                <span class="glyphicon glyphicon-list-alt">
                                </span>
                            </a>
                            <a class="btn btn-warning btn-sm editmenu" data-toggle="tooltip" href="/admin/product/movetop?cat=29&id=3&lang=vi" title="Đưa lên đầu tiên">
                                <span class="glyphicon glyphicon-arrow-up">
                                </span>
                            </a>
                            <a class="btn btn-primary btn-sm" data-toggle="tooltip" href="/admin/product/detail?id=3&lang=vi" title="Sửa">
                                <span class="glyphicon glyphicon-pencil">
                                </span>
                            </a>
                            <a class="btn btn-danger btn-sm" data-placement="top" data-toggle="tooltip" href="/admin/product/delete?id=3&lang=vi" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" title="Xóa">
                                <span class="glyphicon glyphicon-trash">
                                </span>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr id="item_2">
                    <td width="3%">
                        <input class="checkdel" del-id="2" type="checkbox"/>
                    </td>
                    <td style="text-align: center;" width="5%">
                        2
                    </td>
                    <td class="edit-name" width="22%">
                        <a href="/admin/product/detail?id=2&lang=vi">
                            Bóng đèn Led Vioa 9w
                        </a>
                    </td>
                    <td width="10%">
                        <a href="/admin/product/categoriesdetail?cat=29&lang=vi">
                            Bóng đèn led
                        </a>
                    </td>
                    <td width="6%">
                        <button class="btn btn-info btn-sm editmenu glyphicon glyphicon-ok" cms-change-field="changfield" currentvalue="1" data-toggle="tooltip" field="public" item-id="2" title="Click để tắt">
                        </button>
                    </td>
                    <td width="6%">
                        <button class="btn btn-info btn-sm editmenu glyphicon glyphicon-ok" cms-change-field="changfield" currentvalue="1" data-toggle="tooltip" field="viewhome" item-id="2" title="Click để tắt">
                        </button>
                    </td>
                    <td width="5%">
                        <button class="btn btn-info btn-sm editmenu glyphicon glyphicon-ok" cms-change-field="changfield" currentvalue="1" data-toggle="tooltip" field="new" item-id="2" title="Click để tắt">
                        </button>
                    </td>
                    <td width="5%">
                        <button class="btn btn-info btn-sm editmenu glyphicon glyphicon-ok" cms-change-field="changfield" currentvalue="1" data-toggle="tooltip" field="sale" item-id="2" title="Click để tắt">
                        </button>
                    </td>
                    <td width="12%">
                        2015-06-09 17:39:20
                    </td>
                    <td width="9%">
                        admin2
                    </td>
                    <td style="text-align: center;" width="15%">
                        <div class="btn-group">
                            <a class="btn btn-info btn-sm" data-toggle="tooltip" href="/admin/product/duplicate?cat=29&id=2&lang=vi" title="Sao chép">
                                <span class="glyphicon glyphicon-list-alt">
                                </span>
                            </a>
                            <a class="btn btn-warning btn-sm editmenu" data-toggle="tooltip" href="/admin/product/movetop?cat=29&id=2&lang=vi" title="Đưa lên đầu tiên">
                                <span class="glyphicon glyphicon-arrow-up">
                                </span>
                            </a>
                            <a class="btn btn-primary btn-sm" data-toggle="tooltip" href="/admin/product/detail?id=2&lang=vi" title="Sửa">
                                <span class="glyphicon glyphicon-pencil">
                                </span>
                            </a>
                            <a class="btn btn-danger btn-sm" data-placement="top" data-toggle="tooltip" href="/admin/product/delete?id=2&lang=vi" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" title="Xóa">
                                <span class="glyphicon glyphicon-trash">
                                </span>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr id="item_1">
                    <td width="3%">
                        <input class="checkdel" del-id="1" type="checkbox"/>
                    </td>
                    <td style="text-align: center;" width="5%">
                        1
                    </td>
                    <td class="edit-name" width="22%">
                        <a href="/admin/product/detail?id=1&lang=vi">
                            Bóng đèn Bulb led TT 2w
                        </a>
                    </td>
                    <td width="10%">
                        <a href="/admin/product/categoriesdetail?cat=29&lang=vi">
                            Bóng đèn led
                        </a>
                    </td>
                    <td width="6%">
                        <button class="btn btn-info btn-sm editmenu glyphicon glyphicon-ok" cms-change-field="changfield" currentvalue="1" data-toggle="tooltip" field="public" item-id="1" title="Click để tắt">
                        </button>
                    </td>
                    <td width="6%">
                        <button class="btn btn-info btn-sm editmenu glyphicon glyphicon-ok" cms-change-field="changfield" currentvalue="1" data-toggle="tooltip" field="viewhome" item-id="1" title="Click để tắt">
                        </button>
                    </td>
                    <td width="5%">
                        <button class="btn btn-info btn-sm editmenu glyphicon glyphicon-ok" cms-change-field="changfield" currentvalue="1" data-toggle="tooltip" field="new" item-id="1" title="Click để tắt">
                        </button>
                    </td>
                    <td width="5%">
                        <button class="btn btn-info btn-sm editmenu glyphicon glyphicon-ok" cms-change-field="changfield" currentvalue="1" data-toggle="tooltip" field="sale" item-id="1" title="Click để tắt">
                        </button>
                    </td>
                    <td width="12%">
                        2015-06-12 11:52:22
                    </td>
                    <td width="9%">
                        admin2
                    </td>
                    <td style="text-align: center;" width="15%">
                        <div class="btn-group">
                            <a class="btn btn-info btn-sm" data-toggle="tooltip" href="/admin/product/duplicate?cat=29&id=1&lang=vi" title="Sao chép">
                                <span class="glyphicon glyphicon-list-alt">
                                </span>
                            </a>
                            <a class="btn btn-warning btn-sm editmenu" data-toggle="tooltip" href="/admin/product/movetop?cat=29&id=1&lang=vi" title="Đưa lên đầu tiên">
                                <span class="glyphicon glyphicon-arrow-up">
                                </span>
                            </a>
                            <a class="btn btn-primary btn-sm" data-toggle="tooltip" href="/admin/product/detail?id=1&lang=vi" title="Sửa">
                                <span class="glyphicon glyphicon-pencil">
                                </span>
                            </a>
                            <a class="btn btn-danger btn-sm" data-placement="top" data-toggle="tooltip" href="/admin/product/delete?id=1&lang=vi" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" title="Xóa">
                                <span class="glyphicon glyphicon-trash">
                                </span>
                            </a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
<!--
<script type="text/javascript"
   src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML">
MathJax.Hub.Config({
  tex2jax: {
    inlineMath: [ ['$','$'], ['\\(','\\)'] ]
  }
});
</script>-->