<?php

class Customer
{
    private  $id;
    private $birth_date;
    private $phone;
    private $FN;
    private $LN;
    private $username;
    private $password;
    private $memberShip;

    /**
     * @param $id
     * @param $birth_date
     * @param $phone
     * @param $FN
     * @param $LN
     * @param $username
     * @param $password
     */
    public function SetAllParam($birth_date, $phone, $FN, $LN, $username, $password)
    {
        $this->birth_date = $birth_date;
        $this->phone = $phone;
        $this->FN = $FN;
        $this->LN = $LN;
        $this->username = $username;
        $this->password = $password;
    }

    public static function count_member()
    {
        return excuteQuery("SELECT COALESCE(max(cust_id), 0) as COUNT from Customer;")[0]['COUNT'];
    }

    public function push()
    {
        try {
            if( $this->birth_date != null && $this->phone != null && $this->FN  != null && $this->LN != null && $this->username != null && $this->password != null)
                return excuteOther("INSERT INTO Customer (cust_Phone_num, cust_FirstName, cust_LastName, cust_username, cust_pass,cust_birth_date) VALUES ('".$this->phone."','".$this->FN."','".$this->LN."','".$this->username."','".$this->password."',DATE('". $this->birth_date."'));");
            else
                return null;
        } catch (Exception $ex) {
            return false;
        }
    }

    public function fill_object($id)
    {
        if ($id >= 1 && $id <= Customer::count_member()) {
            $this->id = $id;
            $arr = excuteQuery("SELECT * from Customer where cust_id=" . $id);
            if (count($arr) != 0) {
                $this->birth_date = $arr[0]['cust_birth_date'] ;
                $this->phone = $arr[0]['cust_Phone_num']  ;
                $this->FN =$arr[0]['cust_FirstName']  ;
                $this->LN = $arr[0]['cust_LastName'] ;
                $this->username =$arr[0]['cust_username']  ;
                $this->password =$arr[0]['cust_pass']  ;
                return true;
            }
        }
        return false;
    }

    public function fill_object_u($username)
    {
        if ($username) {
            $arr = excuteQuery("SELECT * from Customer where cust_username= '" . $username . "'");
            if (count($arr) != 0) {
                $this->birth_date = $arr[0]['cust_birth_date'];
                $this->phone = $arr[0]['cust_Phone_num'];
                $this->FN = $arr[0]['cust_FirstName'];
                $this->LN = $arr[0]['cust_LastName'];
                $this->id = $arr[0]['cust_id'];
                $this->password = $arr[0]['cust_pass'];
                return true;
            }
        }
    }


    public function sub($Class_id)
    {
        try {
            $date = new DateTime();
            $result = $date->format('Y-m-d');
            if($this->id && $Class_id && $result)
                return excuteOther("INSERT INTO subscription ( cust_id,class_id,Sub_date) VALUES (".$this->id.",".$Class_id.",DATE('". $result."'));");
            else
                return null;
        } catch (Exception $ex) {
            return false;
        }
    }

    public function unsub($Class_id)
    {
        try {
            $date = new DateTime();
            $result = $date->format('Y-m-d');
            if($this->id && $Class_id && $result)
                return excuteOther("Delete FROM subscription where cust_id = ".$this->id."  and class_id= ".$Class_id.";");
            else
                return null;
        } catch (Exception $ex) {
            return false;
        }
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getBirthDate()
    {
        return $this->birth_date;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return mixed
     */
    public function getFN()
    {
        return $this->FN;
    }

    /**
     * @return mixed
     */
    public function getLN()
    {
        return $this->LN;
    }

    public function getname()
    {
        if($this->FN != null && $this->LN != null)
            return $this->FN." ".$this->LN;
        else
            return  null;
    }
    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    public function setMemberShip($memberShip)
    {
        $this->memberShip = $memberShip;
    }

    /**
     * @return mixed
     */
    public function getMemberShip()
    {
        return $this->memberShip;
    }


}