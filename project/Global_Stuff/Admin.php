<?php

class Admin
{
    private $id;
    private  $name;
    private  $username;
    private  $password;


    public static function count_member()
    {
        return excuteQuery("SELECT  COALESCE(max(admin_id) , 0) as COUNT from Admin_GYM;")[0]['COUNT'];
    }

    /**
     * @param $id
     * @param $name
     * @param $username
     * @param $password
     */
    public function SetAllParam($name, $username, $password)
    {
        $this->name = $name;
        $this->username = $username;
        $this->password = $password;
    }

    public function push()
    {
        try {

            if ($this->name != null && $this->username != null && $this->password != null)
                return excuteOther("INSERT INTO Admin_GYM ( admin_name, admin_username, admin_pass) VALUES ('".$this->name."', '".$this->username."', '".$this->password ."');");
            else
                return null;
        } catch (Exception $ex) {
            return false;
        }
    }

    public function fill_object($id)
    {
        if ($id >= 1 && $id <= Admin::count_member()) {
            $this->id = $id;
            $arr = excuteQuery("SELECT * from Admin_GYM where admin_id=" . $id);
            if (count($arr) != 0) {
                $this->name = $arr[0]['admin_name'] ;
                $this->username = $arr[0]['admin_username']  ;
                $this->password =$arr[0]['admin_pass']  ;
                return true;
            }
        }
        return false;
    }

    public function fill_object_u($username)
    {
        if ($username) {
            $arr = excuteQuery("SELECT * from Admin_GYM where admin_username = '" . $username . "'");
            if (count($arr) != 0) {
                $this->id = $arr[0]['admin_id']  ;
                $this->name = $arr[0]['admin_name'] ;
                $this->password =$arr[0]['admin_pass']  ;
                return true;
            }
        }
    }

    // 1- null id not db
    // 2- true all ok
    // false problem in db
    public function delete($id)
    {
        $arr = null;
        if ($id >= 1 && $id <= Admin::count_member()) {
            $this->id = $id;
            $arr = excuteOther("delete  from Admin_GYM where admin_id=" . $id);
            return $arr;
        }
        return $arr;
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
    public function getName()
    {
        return $this->name;
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

}