<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <?php $this->load->view('templates/header') ?>
  <body>
    <div id="header">
      <h1><a href="#"><?php echo lang('site.title')?></a></h1>
      <div class="userprofile">
        <ul>
          <li><a href="<?= base_url('language/english') ?>"><?php echo lang('site.english')?></a></li>
        </ul>
      </div>
      <div class="userprofile">
        <ul>
          <li><a href="<?= base_url('language/indonesia') ?>"><?php echo lang('site.indonesia')?></a></li>
        </ul>
      </div>
    </div>			<!-- #header ends -->
    <div class="clear"></div>

    <div id="sidebar">
      <?php $this->load->view('templates/sidebar') ?>
    </div><!-- #sidebar ends -->

    <div id="content">
      <!-- <ul id="crumbs"><li><a href="#">Home</a></li><li><a href="#">Main section</a></li><li><a href="#">Sub section</a></li><li>The page you are on right now</li></ul>-->
      <ul id="crumbs"><li>{MX_BREADCUMB}</li></ul>
      <?php $this->load->view($view); ?>
    </div>
    <?php $this->load->view('templates/footer'); ?>
  </body>
</html>
