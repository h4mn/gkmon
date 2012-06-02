<?php
    require_once('gkmon.php');
    $classe = new gkmon();

    $url = $_POST['gkurl'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php require_once('form.html'); ?>
        <hr>
        <p>URI da pagina: <b><?php echo $url; ?></b></p>
        <!--
        <iframe src="<?php echo $url; ?>" width="640px" height="480px"></iframe>
        /-->
        <footer><!-- Area de testes -->
            <?php 
                exit();
                if ($url != "") {
                    /**
                     * Bloco usando a framework simple_html_dom                      
                    include_once('simple_html_dom.php');
                    $html = new simple_html_dom();
                    $html->load_file($url);
                    echo $html;
                     * Fim do bloco 
                     */
                    
                    $ch = curl_init();
                    // informar URL e outras funções ao CURL

                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                    #curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_USERPWD,"h4mn:hamngk1");
                    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
                    // acessar a URL
                    #$output = curl_exec($ch);
                    curl_exec($ch);
                    // Imprimir as informações
                    #echo '<pre>';
                    #print_r (curl_getinfo($ch));
                    #echo '</pre>';
                    curl_close($ch);
                    
                    
                }
            ?>
            <?php #echo phpinfo(); ?>
        </footer>
    </body>
</html>
