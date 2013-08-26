<?php

class IECacheClear {

	public function __construct(){}

    public function setResponseHeaders(){

        $this->CI =& get_instance();

        $this->CI->output->set_header('HTTP/1.0 200 OK');
        $this->CI->output->set_header('HTTP/1.1 200 OK');
        $this->CI->output->set_header('cache-control: private');
        $this->CI->output->set_header('Expires: Mon, 26 Jul 2013 05:00:00 GMT');
        $this->CI->output->set_header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
        $this->CI->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->CI->output->set_header('Cache-Control: post-check=0, pre-check=0');
        $this->CI->output->set_header('Pragma: no-cache');
    }
}

