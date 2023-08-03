<?php

require "../model/koreograf.php";
require '../broker.php';

$broker=Broker::getBroker();

$resultSet = Koreograf::getAll($broker);
$response=[];

if(!$resultSet){
    $response['status']=0;
    $response['greska']=$broker->getMysqli()->error;
} 
else{
    $response['status']=1;
    while($row=$resultSet->fetch_object()){
    $response['koreografi'][]=$row;
    }

echo json_encode($response);
}

?>