<?php
if ($dbarr["status"] != "ADM"){
    header("Location: ../?p=home");
    exit;
}else{
    header("Location: ./?p=member");
    exit;
}
?>