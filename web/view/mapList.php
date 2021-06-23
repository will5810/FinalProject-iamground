<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>mapList</title>
    <link rel="stylesheet" href="./source/iamground.css">
	<?php
    	if(session_status() != PHP_SESSION_ACTIVE){
       	 session_start();         
   	    }
  	    if(isset($_SESSION['userId'])){
     	    if($this->action=='login'){
       	        print "<script>alert('".$this->data."');</script>";
      	    }
     	    print $_SESSION['userId']." login ing...<br>";
   	    } else {
   	        header("Location:view/loginForm.php");
   	    }
        $mapLists = $this->responseData;
        //var_dump($this->responseData);
	?>
    </head>
    <body>
        <div class='container'>
            <div class='lists'>
                <? for($i = 0; $i < count($mapLists); $i++) : ?>
                    <div class='list'>
                        <div><? echo $mapLists[$i]->getMapLocation(); ?></div>
                        <div>map id : <? echo $mapLists[$i]->getMapId(); ?></div>                        
                                            
                        <form method="POST" action="../am/index.php?action=moList">
                            <input type="hidden" name="mId" value="<? echo $mapLists[$i]->getMapId() ?>"/>
                            <input type="submit" value ="Detail"/>
                        </form>                
                    </div>
                <? endfor; ?>
            </div>
        </div>
</body>
</html>
 
