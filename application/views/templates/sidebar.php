<?php
  $ci =& get_instance();
  $existing_class = $ci->router->fetch_class();
?>


<ul id="nav">
  <?php if ($existing_class == 'home') { ?>
        <li><a href="<?php site_url(base_url()) ?>"><strong><img src="<?php echo base_url(); ?>assets/images/nav/dashboard.png" alt="" /> Dashboard</strong></a></li>
  <?php }else{ ?>
        <li><a href="<?php site_url(base_url()) ?>"><img src="<?php echo base_url(); ?>assets/images/nav/dashboard.png" alt="" /> Dashboard</a></li>
  <?php } ?>
        
  <?php foreach ($menu_list as $row) : ?>
    <li>
      <a href="<?php echo site_url($row['controller'].'/'.($row['view']=='index'?'':$row['view']))?>">
        
    <?php 
      if ($existing_class ==$row['controller']) 
      {
        echo "<strong><img src=\"".base_url()."assets/images/nav/file.png\" alt=\"\" /> ".$row['judul']."</a></strong>";
      }
      else
      {
        echo "<img src=\"".base_url()."assets/images/nav/file.png\" alt=\"\" /> ".$row['judul']."</a>";
      }
    ?>    
    </li>
  <?php endforeach; ?>
</ul>