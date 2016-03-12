<?php

class Helper_date {

    private $datetime;

    public function __construct(){
        $this->datetime = new DateTime();
    }

    public function UStoFR($date){
    $datetime = $this->datetime->createFromFormat("Y-m-d", $date);
     if($datetime !== false && !array_sum($datetime->getLastErrors())){
         return $datetime->format("Y-m-d");
     }else{
         $datetime= $this->datetime->createFromFormat("d-m-Y", $date);
         if( $datetime !== false && !array_sum( $datetime->getLastErrors())) {
             return  $datetime->format("d-m-Y");
         }else{
             return null;
         }

      }
    }
    public function FRtoUS($date){
        $datetime = $this->datetime->createFromFormat("d-m-Y", $date);
        if($datetime !== false && !array_sum($datetime->getLastErrors())){
            return $datetime->format("d-m-Y");
        }else{
            $datetime= $this->datetime->createFromFormat("Y-m-d", $date);
            if( $datetime !== false && !array_sum( $datetime->getLastErrors())) {
                return  $datetime->format("Y-m-d");
            }else{
                return null;
            }

        }

    }

    public function validDate(){

    }
} 