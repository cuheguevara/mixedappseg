<?php echo $msg;?><br/><br/>
<form name="form_captcha" action="<?php echo base_url().'contact/sendrecaptcha'?>" method="POST">
  <table>
    <tr>
      <td>Nama : </td>
      <td><input value="<?php echo $name;?>" type="text" name="input[name]"  /></td>
    </tr>
    <tr>
      <td>Email : </td>
      <td><input value="<?php echo $email;?>" type="text" name="input[email]"  /></td>
    </tr>
    <tr>
      <td>Pesan : </td>
      <td><textarea name="input[pesan]" cols="40" rows="8"><?php echo $pesan;?></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
        <?=$captcha;?><br/>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
        <input type="submit" value="Kirim" placeholder="Type Code from Image" />
      </td>
    </tr>
  </table>
</form>