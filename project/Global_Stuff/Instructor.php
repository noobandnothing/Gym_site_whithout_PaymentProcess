<?php

//require "picture.php";

class Instructor
{
    public $id;
    public $FN;
    public $LN;
    public $phone;
    public $Description;
    public $pic;

    public function SetAllParam($FN, $LN, $phone, $Description, $pic)
    {
        $this->FN = $FN;
        $this->LN = $LN;
        $this->phone = $phone;
        $this->Description = $Description;
        $this->pic = $pic;
    }

    public static function count_member()
    {
        return excuteQuery("SELECT  COALESCE(max(Ins_id), 0) as COUNT from Instructor;")[0]['COUNT'];
    }

    public function push()
    {
        try {
            if ($this->FN != null && $this->LN != null && $this->Description != null && $this->phone != null && $this->pic != null)
                return excuteOther("INSERT INTO Instructor(Ins_Description, Ins_Phone, Ins_Firstname, Ins_Lastname, Ins_pic) VALUES ('" . $this->Description . "', '" . $this->phone . "', '" . $this->FN . "', '" . $this->LN . "'," . $this->pic->getId() . ");");
            else
                return null;
        } catch (Exception $ex) {
            return false;
        }
    }

    public function fill_object($id)
    {
        if ($id >= 1 && $id <= GClass::count_member()) {
            $this->id = $id;
            $arr = excuteQuery("SELECT * from Class where class_id=" . $id);
            if (count($arr) != 0) {
                $this->name = $arr[0]['Bra_Name'];
                $this->phone = $arr[0]['Bra_Phone'];
                $this->Describe = $arr[0]['Bra_Describe'];
                $pictmp = new picture();
                $pictmp->fill_object($arr[0]['pic_id']);
                $this->pic = $pictmp;
                return true;
            }
        }
        return false;
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
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * @return mixed
     */
    public function getPic()
    {
        return $this->pic;
    }
}