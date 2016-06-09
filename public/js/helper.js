$('.deleteimg').click(function() {
    if (confirm('Bạn muốn xóa ảnh này?')) {
        var id = $(this).attr('imgdetailid');
        $.ajax({
            url: '/admin/product/deleteimgpro?id=' + id,
            async: false,
            method: 'GET',
            success: function() {
                window.location.href = "/admin/product/detail?id=4&lang=vi";
            }
        });
        return false;
    } else {
        return false;
    }
});
$('.xoaanhchitiet').click(function() {
    if (confirm('Bạn muốn xóa ảnh này?')) {
        var id = $(this).attr('imgdetailid');
        $.ajax({
            url: '/admin/product/deleteimg?id=' + id,
            async: false,
            method: 'GET',
            success: function() {
                $('#imagedetail_' + id).remove();
            }
        });
        return false;
    } else {
        return false;
    }
});
$(document).ready(function() {
    $("[data-toggle=tooltip]").tooltip();
    $('#btn-ck-all').click(function() {
        var checkBoxes = $(".checkdel");
        checkBoxes.prop("checked", !checkBoxes.prop("checked"));
        if ($('input.checkdel:checkbox:checked').length == $('input.checkdel:checkbox').length) {
            $('#btn-ck-all span').attr('class', 'glyphicon glyphicon-check')
        } else if ($('input.checkdel:checkbox:checked').length > 0) {
            $('#btn-ck-all span').attr('class', 'glyphicon glyphicon-collapse-down')
        } else {
            $('#btn-ck-all span').attr('class', 'glyphicon glyphicon-unchecked');
        }
    });
    $("#btn-del-all").click(function() {
        var countchecked = $('input.checkdel:checked').length;
        if (countchecked > 0) {
            if (confirm('Bạn có chắc chắn muốn xóa?')) {
                var delstr = '';
                $('input.checkdel:checkbox:checked').each(function(index) {
                    if (index < countchecked - 1) delstr += $(this).attr('del-id') + ',';
                    else delstr += $(this).attr('del-id');
                });
                window.location = '/admin/product/deletemultiple?id=' + delstr + '&lang=vi';
            }
        } else {
            return false;
        }
    });
    $(".checkdel").change(function() {
        if ($('input.checkdel:checkbox:checked').length == $('input.checkdel:checkbox').length) {
            $('#btn-ck-all span').attr('class', 'glyphicon glyphicon-check')
        } else if ($('input.checkdel:checkbox:checked').length > 0) {
            $('#btn-ck-all span').attr('class', 'glyphicon glyphicon-collapse-down')
        } else {
            $('#btn-ck-all span').attr('class', 'glyphicon glyphicon-unchecked');
        }
    });
    $('button[cms-change-field="changfield"]').click(function() {
        var obj = $(this);
        var currentvalue = $(this).attr('currentvalue');
        var id = $(this).attr('item-id');
        var field = $(this).attr('field');
        $.ajax({
            url: '/admin/product/changefield?id=' + id + '&p=' + currentvalue + '&field=' + field,
            success: function(data) {
                if (currentvalue == 0) {
                    pic = 'ok';
                    currentvalue = 1;
                    tooltip = 'Click để tắt';
                    cl = 'btn-info';
                } else {
                    pic = 'remove';
                    currentvalue = 0;
                    tooltip = 'Click để bật';
                    cl = '';
                }
                obj.attr('currentvalue', currentvalue);
                obj.attr('class', 'btn ' + cl + ' btn-sm editmenu glyphicon glyphicon-' + pic);
                obj.attr('data-original-title', tooltip);
            }
        });
    });
    // $( "#sorttable" ).sortable({
    //   update: function(event, ui) {
    //     sort = $(this).sortable('toArray');
    //     $.post('/admin/product/sort', {sort: sort});
    //   }
    // });
    /* oTable = $('#table_content').dataTable({
                "sDom": "<'row'r>t<'row pull-right'p>>",
                "sPaginationType": "bootstrap",
                "iDisplayLength": 10,
                "bLengthChange" : false,
                "bFilter": false,
                "bInfo": false,
                "bSort": false,
                "oLanguage": {
                  "oPaginate": {
                    "sFirst" : 'Đầu',
                    "sLast": 'Cuối',
                    "sNext": 'Sau', // Next
                    "sPrevious": 'Trước' // Previous
                  },
                "sEmptyTable": 'Không có sản phẩm nào', //   No data available in table,
                "sSearch": "Lọc các từ _INPUT_ trong bảng",
                "sInfo": "Có tất cả _TOTAL_ sản phẩm, đang hiển thị từ _START_ đến _END_",
                "sInfoEmpty": "Không có dữ liệu để hiển thị"
                }
            });*/
    $('.datepicker').datepicker({
        showButtonPanel: true,
        dateFormat: 'yy-mm-dd'
    });
});