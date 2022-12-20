<?php


namespace Gogol\Lebertest\Employee;


class CreateEmployee extends Employee
{
    /**
     * @var array
     */
    protected array $data;

    /**
     * CreateEmployee constructor.
     * @param string $name
     * @param string $age
     * @param string $salary
     */
    public function __construct(string $name, string $age, string $salary){
        $this->data['name']=$name;
        $this->data['age']=$age;
        $this->data['salary']=$salary;
        parent::__construct('/api/v1/create');
        $this->curlOpt(parent::getCh());
        parent::curlExec();
        parent::curlClose();
        $this->output();
    }

    /**
     * Curl options
     * @param $ch
     */
    protected function curlOpt($ch)
    {
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($this->data));
    }

    /**
     * Output results
     */
    protected function output(){
        $res=json_decode(parent::getResponse());
        //echo $res->data->name;
        echo '<h1 class="text-success">Success!</h1><p class="text-center">ID: '.$res->data->id.'</p><br>'.'<p class="text-center">Name: '.$res->data->name.'</p><br>'.'<p class="text-center">Salary: '.$res->data->salary.'</p><br>'.'<p class="text-center">Age: '.$res->data->age.'</p>';
    }

}