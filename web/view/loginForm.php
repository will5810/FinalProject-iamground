<?php
    if($_SERVER['REQUEST_METHOD']=='POST' && $this->action=='login'){
        print "<script>alert('".$this->data."');</script>";
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>php로그인</title>      
  </head>
  <body>
    <form  method="post" action="../index.php?action=login">
    로그인</br>
    <table>
      <tr>
        <td>아이디 :</td>
        <td><input type="text" name="uid"/></td>
        <td rowspan=2><input type="submit" value="sign in" /></td>
      </tr>
      <tr>
        <td>비밀번호 : </td>
        <td><input type="password" name="pwd" /></td>
      </tr>
    </table>
      
    </form>
  </body>
</html>
