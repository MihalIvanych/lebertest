<?php
namespace Gogol\Lebertest\Employee;
class Employee
{
    protected string $url='https://dummy.restapiexample.com';
    protected string $uri;
    protected $ch;
    protected mixed $response;

    /**
     * Employee constructor.
     * @param $urn
     */
    protected function __construct($urn){
        $this->curlInit($urn);
    }

    /**
     * cURL Initialization
     * @param $urn
     */
    protected function curlInit($urn){
        $this->uri=$this->url.$urn;
        $this->ch=curl_init($this->uri);
    }

    /**
     * cURL Execution
     */
    protected function curlExec(){
        $this->response = curl_exec($this->ch);
    }

    /**
     * Close cURL
     */
    protected function curlClose(){
    curl_close($this->ch);
    }
    protected function getCh(){
        return $this->ch;
    }

    /**
     * @return mixed
     */
    protected function getResponse(){
        return $this->response;
    }

    /**
     * @return string
     */
    protected function getUri():string{
        return $this->uri;
    }
//    abstract protected function curlOpt($ch);
}