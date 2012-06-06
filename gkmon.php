<?php

/**
 * Classe baseada na biblioteca cURL para acessar saida HTML de aplicação web.
 *
 * @author h4mn
 */
class gkmon {
    private $gkmon_resource;
    private $gkmon_url;
    private $gkmon_conteudo;
    //put your code here
    public function __construct() {
        //verificação se a extensão curl está carregada
        if(!in_array("curl", get_loaded_extensions())){
            die("Extension curl unloaded.");
        }
        $this->gkmon_resource = curl_init();
    }
    
    public function seturl($url = "http://www.guerrakhan.com") {
        $this->gkmon_url = $url;
    }
    
    public function setopt($key = 0) {
        curl_setopt($this->gkmon_resource, CURLOPT_URL, $this->gkmon_url);
        switch ($key) {
            case 1:
                curl_setopt($this->gkmon_resource, CURLOPT_HEADER, 1);
                break;
            default:
                curl_setopt($this->gkmon_resource, CURLOPT_HEADER, 0);
                curl_setopt($this->gkmon_resource, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($this->gkmon_resource, CURLOPT_COOKIESESSION, true);
                curl_setopt($this->gkmon_resource, CURLOPT_COOKIE,"PHPSESSID=rhgd2eqcorvqbit592rq8f1uq3;valid_user=b9c5859ab2bc3424e9183abfec92dcaf;access=ca88b395a4116512eaf4aad0956cde71");
        }
    }
    
    public function roda($reter = false, $teste = false) {
        if($reter){
            curl_setopt($this->gkmon_resource, CURLOPT_RETURNTRANSFER, $reter);
            $this->gkmon_conteudo = curl_exec($this->gkmon_resource);
            if($teste){
                preg_match_all('|Set-Cookie: (.*);|U', $this->gkmon_conteudo, $resultado);
                $cookies = implode(';', $resultado[1]);
                echo "<pre>";
                print_r($cookies);
                echo "</pre>";
            }
            return $this->gkmon_conteudo;
        } else {
            curl_exec($this->gkmon_resource);
        }
    }
    public function fecha() {
        curl_close($this->gkmon_resource);
    }
    
}

?>
