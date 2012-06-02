<?php

/**
 * Classe baseada na biblioteca cURL para acessar saida HTML de aplicação web.
 *
 * @author h4mn
 */
class gkmon {
    //put your code here
    public function __construct() {
        //verificação se a extensão curl está carregada
        if(!in_array("curl", get_loaded_extensions())){
            die("Extension curl unloaded.");
        }
        setcookie("test");
    }
    
}

?>
