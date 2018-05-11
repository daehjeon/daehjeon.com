<?php
if ($_GET['randomId'] != "MItdRkp56Q4ACunxzRIh9qVKad0FVwOl4viIqe4qwd53VmNPQpGqXBttA62_Fvat") {
    echo "Access Denied";
    exit();
}

// display the HTML code:
echo stripslashes($_POST['wproPreviewHTML']);

?>  
