<!--footer section start-->

<footer class="sticky-footer" >
	<?php echo date("Y") ?> &copy; All Rights Reserverd | Developed By - Md.Shabuddin Nayan
</footer>
<!--footer section end-->


</div>
<!-- main content end-->
</section>

<!-- Placed js at the end of the document so the pages load faster -->

<script src="public/js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="public/js/jquery-migrate-1.2.1.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/modernizr.min.js"></script>
<script src="public/js/jquery.nicescroll.js"></script>
<script src="public/summernote/summernote-lite.min.js"></script>
<!--dynamic table-->
<script type="text/javascript" language="javascript" src="public/js/advanced-datatable/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="public/js/data-tables/DT_bootstrap.js"></script>

<!--dynamic table initialization -->
<script src="public/js/dynamic_table_init.js"></script>

<!-- JavaScript for Uploaded File Preview -->
<script>
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#blah')
				.attr('src', e.target.result);
			};
			
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>
<!-- JavaScript for Uploaded File Preview -->

<!-- Summernote Start -->
<script src="public/summernote/summernote-lite.min.js"></script>
<script>
	$(document).ready(function() {
		$('#summerOne').summernote();
		$('#summerTwo').summernote();
	});
</script>
<!-- Summernote End -->

<!--common scripts for all pages-->
<script src="public/js/scripts.js"></script>

</body>

<!-- Mirrored from adminex.themebucket.net/blank_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Sep 2015 19:55:06 GMT -->
</html>