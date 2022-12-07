<?php
class encryption{

    public $ciphering;
    public $iv_length;
    public $options;
    public $encryption_iv;
    public $encryption_key;

    function __construct(){
        $this->options = 0;
        $this->encryption_iv = "1234567891011121";
        $this->ciphering = "AES-128-CTR";
        $this->encryption_key = "eqduiwqefhrg987wuehf973whf9wehf9uho";
        $this->iv_length = openssl_cipher_iv_length($this->ciphering);
    }

    function encrypt($string){
        $encryption = openssl_encrypt($string, $this->ciphering,
        $this->encryption_key, $this->options, $this->encryption_iv);
        return $encryption;
    }

    function decrypt($string){
        $decryption=openssl_decrypt ($string, $this->ciphering, 
        $this->encryption_key, $this->options, $this->encryption_iv);
        return $decryption;
    }

}

?>