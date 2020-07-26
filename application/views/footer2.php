 			
			<script type="text/javascript">
				var js_date_format = 'dd/mm/yy';
			</script>

 			<script type="text/javascript">
				var default_javascript_path = '<?php echo site_url() ?>assets/grocery_crud/js';
				var default_css_path = '<?php echo site_url() ?>assets/grocery_crud/css';
				var default_texteditor_path = '<?php echo site_url() ?>assets/grocery_crud/texteditor';
				var default_theme_path = '<?php echo site_url() ?>assets/grocery_crud/themes';
				var base_url = '<?php echo site_url() ?>';

			</script>

      <script>
function openCity(cityName) {
  var i;
  var x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  document.getElementById(cityName).style.display = "block";  
}
</script>

      <script src="<?php echo base_url() ?>assets/grocery_crud/js/jquery-1.11.1.min.js"></script>
      <script type="text/javascript">

        $('#selesai-dan-simpan').on('click', function(e) {
          e.preventDefault();
          
          console.log($(this).data('hasil'));

          return false;
        });

      </script>
            <script src="<?php echo base_url() ?>assets/grocery_crud/js/common/list.js"></script>
            <script src="<?php echo base_url() ?>assets/grocery_crud/themes/flexigrid/js/cookies.js"></script>
            <script src="<?php echo base_url() ?>assets/grocery_crud/themes/flexigrid/js/flexigrid.js"></script>
            <script src="<?php echo base_url() ?>assets/grocery_crud/js/jquery_plugins/jquery.form.min.js"></script>
            <script src="<?php echo base_url() ?>assets/grocery_crud/js/jquery_plugins/jquery.numeric.min.js"></script>
            <script src="<?php echo base_url() ?>assets/grocery_crud/themes/flexigrid/js/jquery.printElement.min.js"></script>
            <script src="<?php echo base_url() ?>assets/grocery_crud/js/jquery_plugins/ui/jquery-ui-1.10.3.custom.min.js"></script>

            
            <script src="<?php echo base_url() ?>assets/grocery_crud/js/jquery_plugins/config/jquery.datepicker.config.js"></script>
            <script src="<?php echo base_url() ?>assets/grocery_crud/js/jquery_plugins/jquery.chosen.min.js"></script>
            <script src="<?php echo base_url() ?>assets/grocery_crud/js/jquery_plugins/config/jquery.chosen.config.js"></script>
            <script src="<?php echo base_url() ?>assets/grocery_crud/themes/flexigrid/js/jquery.form.js"></script>
            <script src="<?php echo base_url() ?>assets/grocery_crud/js/jquery_plugins/jquery.form.min.js"></script>
            <script src="<?php echo base_url() ?>assets/grocery_crud/themes/flexigrid/js/flexigrid-add.js"></script>
            <script src="<?php echo base_url() ?>assets/grocery_crud/js/jquery_plugins/jquery.noty.js"></script>
            <script src="<?php echo base_url() ?>assets/grocery_crud/js/jquery_plugins/config/jquery.noty.config.js"></script>
</body>
</html>