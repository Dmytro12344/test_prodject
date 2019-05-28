<?php


namespace Model;


class CurrencyModel
{
    private $fields = ['amount', 'curr_name'];



    public function fill(array $arr) : void
    {
        foreach($arr as $key => $value)
        {
            if(in_array($key, $this->fields))
            {
                $this->fields[$key] = $value;
            }
        }
    }

    public function getFields() : array
    {
        return $this->fields;
    }
}