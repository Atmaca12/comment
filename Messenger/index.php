<?php 
include 'baglan.php';



if (isset($_POST['yorumgonder'])) {

    $gelen_url=$_POST['gelen_url'];



$ayarekle = $db->prepare("INSERT INTO yorum SET
    
    yorum_detay=:yorum_detay

");

$insert = $ayarekle->execute(array(
    
    'yorum_detay' => $_POST['yorum_detay']
    
));


if ($insert) {

    Header("Location:$gelen_url?durum=ok");
} else {
    Header("Location:$gelen_url?durum=no");
}
}


$a=$db->prepare("SELECT * FROM yorum ");
$a->execute(array(
));





?> 




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="icon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="icon/favicon.ico" type="image/x-icon">
    <title>Messenger</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <div class="dash">
            <!-- /message/ -->
            
            <?php while($b=$a->fetch(PDO::FETCH_ASSOC)) {  ?>
            
            a <? echo $b['yorum_detay'] ?>  <br> <!--a <br> a <br> a <br> a <br> a <br>-->

            <? } ?>



        </div>
        <form id="form" class="feed-form" action="" method="POST">
        <input type="hidden" name="gelen_url" value="<?php echo 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>">
            <div class="textarea">
                <textarea class="textarea_box" name="yorum_detay" id="" cols="90" rows="5"></textarea>
                <button name="yorumgonder" class="btn" type="submit">submit</button>
            </div>
        </form>
    </div>
</body>

</html>