<?php


namespace Gogol\Lebertest\Employee;


class GetEmployee extends Employee
{

    /**
     * GetEmployee constructor.
     */
    public function __construct(){
     parent::__construct('/api/v1/employees');
     $this->curlOpt(parent::getCh());
     parent::curlExec();
     parent::curlClose();
     $this->output();
 }

    /**
     * cURL Options
     * @param $ch
     */
    protected function curlOpt($ch)
 {
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 }

    /**
     * Result output
     */
    protected function output(){
     $output='<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Salary</th>
      <th scope="col">Age</th>
      <th scope="col">Image</th>
    </tr>
  </thead>
  <tbody>
   
  ';
     $all_data=json_decode(parent::getResponse())->data;
     $i=0;
foreach($all_data as $data){
    $i++;
    $output.='<tr><th scope="row">'.$data->id.'</th>'.'<td>'.$data->employee_name.'</td>'.'<td>'.$data->employee_salary.'</td>'.'<td>'.$data->employee_age.'</td>'.'<td>'.$data->profile_image.'</td></tr>';
}
$output.='<tr><td colspan="5">Total: '.$i.'</td></tr></tbody>
</table>';
    echo $output;
 }
}