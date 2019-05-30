<?php


namespace Request;


class Request
{
    public function take(array $arr) : array
    {
      $date = [];

      foreach($arr as $value)
      {
        if(isset($_REQUEST[$value]))
        {
            $date[$value] = $_REQUEST[$value];
        }
      }
      return $date;
    }

}