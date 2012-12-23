<?php echo $msg;?>
<form name="form_captcha" action="<?php echo base_url().'contoh_captha_recaptcha/send'?>" method="POST">
  <p><label>NAMA PENGIRIM:</label><br /><input value="<?php echo $name;?>" name="input[name]" type="text" size="30" class="text" /></p>
  <p><label>EMAIL:</label><br /><input value="<?php echo $email;?>" name="input[email]" type="text" size="30" class="text" /></p>
  <p><label>PESAN:</label><br /><textarea name="input[pesan]" rows="7" cols="103"><?php echo $pesan;?></textarea></p>
  <p><?=$captcha;?><br/>
  <input type="submit" class="submit" value="Kirim" />
  </p>
</form>
