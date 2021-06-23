<?php    
    echo "<script> console.log('molist.php'); </script>";    
    $moLists = $this->responseData; 
    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">    
    <title>Document</title>
</head>
<body>
<table>
        <? for($i = 0; $i < count($moLists); $i++) : ?>
            <tr>
                <td><? echo $moLists[$i]->getMoId() ?></td>                        
                <td>
                    <form method="POST" action="../am/index.php?action=monitoring">
                        <input type="hidden" name="moId" value="<? echo $moLists[$i]->getMoId() ?>"/>
                        <input type="submit" value ="Detail"/>
                    </form>
                </td>                        
            </tr>
            <? endfor; ?>
</table>
</body>
</html>
