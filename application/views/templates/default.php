<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/default.css" />
  </head>
  <body>
    <table align="center">
      <tr>
        <td>
          <a href="<?= base_url('language/indonesia') ?>">Indonesia</a>
        </td>
        <td><a href="<?= base_url('language/english') ?>">English</a></td>
      </tr>
    </table>
    <div id="container">
      <div id="header">
        <div id="title">
          <h1>Welcome to CodeIgniter!</h1>
        </div>
        <div id="menu">
          <?php $this->load->view('templates/menu'); ?>

        </div>

      </div>

      <div id="body">
        <?php $this->load->view($view); ?>
      </div>

      <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
    </div>

  </body>
</html>