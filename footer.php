<?php

function theme_footer()
{
?>
    </div><!-- /#wrapper -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script>
    $('#date input').datepicker({
    todayHighlight: true,
    format: "yyyy-mm-dd"
    });
    </script>
  </body>
</html>

<?php
}