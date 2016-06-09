var config = {
	datatable : {
        // "sDom": "<'row'r>t<'row pull-right'p>>",
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
    },

    deleteFromCb: function(path){
        return $("#btn-del-all").click(function(){
                    var countchecked = $('input.checkdel:checked').length;
                    if (countchecked > 0){
                        if (confirm('Bạn có chắc chắn muốn xóa?')){
                            var delstr = '';                    
                            $('input.checkdel:checkbox:checked').each(function(index){
                                if (index < countchecked - 1)
                                    delstr += $(this).attr('del-id') + ',';
                                else
                                    delstr += $(this).attr('del-id');
                                });
                            window.location = path + '?array=' + delstr.split(',');
                        }
                    } else {
                        return false;
                    }
                });
    }
}