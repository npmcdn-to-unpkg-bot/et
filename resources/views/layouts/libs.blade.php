<link href="{{asset("css/bootstrap2.css")}}" media="screen" rel="stylesheet" type="text/css"/>
<link href="{{asset("css/admin.css")}}" media="screen" rel="stylesheet" type="text/css"/>
<link href="{{asset("css/custom.css")}}" media="screen" rel="stylesheet" type="text/css"/>
<link href="{{asset("css/jquery-ui.css")}}" media="screen" rel="stylesheet" type="text/css" />
<script src="{{asset("js/jquery-1.10.2.js")}}" type="text/javascript"></script>
<script src="{{asset("js/bootstrap.js")}}" type="text/javascript"></script>
<script src="{{asset("js/bootstrap-growl.min.js")}}" type="text/javascript"></script>
<script src="{{asset("js/jquery-ui-1.10.4.custom.min.js")}}"></script>
<script src="{{asset("plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("js/DT_bootstrap.js")}}"></script>
<script src="{{asset("js/ckeditor/ckeditor.js")}}"></script>
<script src="{{asset("js/helper.js")}}"></script>
<script src="{{asset("js/config.js")}}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#{{@$active}}').addClass('active');	
	})
    
</script>