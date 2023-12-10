<?php
require_once 'config.php';
interface Position{
    public function getPositionsData();
    public function getAverageSalary();
    public function getPositionsByAverageSalary();
}
class Web implements Position{
    public array $positions;
    public string $position;
    public function __construct($positions, $position){
        $this->positions=$positions;
        $this->position=$position;
    }
    public function getPositionsData():array{
        $data=[];
        foreach ($this->positions as $k=>$v) {
                if ($v['name'] == $this->position) {
                    $data[$v['name']] = $v['salary'];
                }
        }
        return $data;
    }
    public function getAverageSalary():float{
        $sum=0;
        foreach ($this->positions as $k=>$v) {
            $sum+=$v['salary'];
        }
        return $sum/3;
    }
    public function getPositionsByAverageSalary():array{
        $avg=$this->getAverageSalary();
        $temp=[];
        foreach ($this->positions as $k=>$v) {
            if ($v['salary']>=$avg)
                $temp[$v['name']]=$v['salary'];
        }
        return $temp;
    }
}
$obj=new Web($positions,'senior');
var_dump($obj->getPositionsData());
var_dump($obj->getAverageSalary());
var_dump($obj->getPositionsByAverageSalary());