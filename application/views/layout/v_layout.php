<?php //$this->output->cache(10);?>
<!DOCTYPE html>
<html>
<!--head-->
      <?php $this->load->view('layout/v_head');   ?>
<body>
<div data-role="page" class="jqm-demos jqm-home">

	<!-- /header -->
    <?php $this->load->view('layout/v_header');   ?>
    
  	<!--</a><div role="main" class="ui-content jqm-content">-->
	<!-- /content -->
        <?php 
            if(isset($path))
                $this->load->view($path);
        ?>
    <!--</div>-->	
	<!-- /panel -->  
    <?php $this->load->view('layout/v_panel');   ?>
	<!-- /footer -->
    <?php $this->load->view('layout/v_footer');   ?>
    	
    <!-- /search panel -->
    <?php $this->load->view('layout/v_search_panel');   ?>
    
</div><!-- /page -->

</body>
</html>
