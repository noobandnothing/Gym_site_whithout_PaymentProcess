<?php

class Branch
{
    public $id;
    public $name;
    public $phone;
    public $Describe;
    public $pic;

    public function SetAllParam($name, $phone, $Describe, $pic)
    {
        $this->name = $name;
-       $this->phone = $phone;
        $this->Describe = $Describe;
        $this->pic = $pic;
    }
    public static function count_member()
    {
        return excuteQuery("SELECT  COALESCE(max(Bra_id) , 0) as COUNT from Branch_info;")[0]['COUNT'];
    }

    public function push()
    {
        try {

            if ($this->name != null &&  $this->phone != null && $this->Describe != null  && $this->pic != null)
                return excuteOther("INSERT INTO Branch_info (Bra_Name, Bra_Phone, Bra_Describe, pic_id) VALUES ('".$this->name."','".$this->phone."','".$this->Describe."',".$this->pic->getId().");");
            else
                return null;
        } catch (Exception $ex) {
            return false;
        }
    }

    public function fill_object($id)
    {
        if ($id >= 1 && $id <= Branch::count_member()) {
            $this->id = $id;
            $arr = excuteQuery("SELECT * from Branch_info where Bra_id=" . $id);
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
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return mixed
     */
    public function getDescribe()
    {
        return $this->Describe;
    }

    /**
     * @return mixed
     */
    public function getPic()
    {
        return $this->pic;
    }
    //public $GYM_site;


}