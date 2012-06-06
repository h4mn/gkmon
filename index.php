<?php
    require_once('gkmon.php');
    $gkmon = new gkmon();

    $url = $_POST['gkurl'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="expires" content="0" />
        <meta http-equiv="Content-Language" content="pt_BR" />

        <title></title>
    </head>
    <body>
        <?php require_once('form.html'); ?>
        <hr>
        <?php
            if(!empty($url)) {
                echo "<p>URI da página: <b>$url</b></p>";
                $gkmon->seturl($url);
                $gkmon->setopt();
                $gkmon->roda();
            }
        ?>
        <!--
        <iframe src="<?php echo $url; ?>" width="640px" height="480px"></iframe>
        /-->
        <footer><!-- Area de testes -->
            <?php 
                #echo phpinfo(); 
                $gkmon->fecha()
            ?>
        </footer>
    </body>
</html>
