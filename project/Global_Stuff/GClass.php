<?php

class GClass
{
    private $id;
    private $name;
    private $describe;
    private $start;
    private $end;
    private $Day;
    private $branch;
    private $pic;

    /**
     * @param $name
     * @param $describe
     * @param $start
     * @param $end
     * @param $Day
     * @param $branch
     * @param $pic
     */
    public function SetAllParam($name, $describe, $start, $end, $Day, $branch,$pic)
    {
        $this->name = $name;
        $this->describe = $describe;
        $this->start = $start;
        $this->end = $end;
        $this->Day = $Day;
        $this->branch = $branch;
        $this->pic = $pic;
    }

    public static function count_member()
    {
        return excuteQuery("SELECT COALESCE(max(class_id) , 0) as COUNT from Class;")[0]['COUNT'];
    }

    public function push()
    {
        try {
            if ($this->name != null && $this->branch != null && $this->describe != null && $this->start != null && $this->end != null && $this->Day != null && $this->pic != null)
                return excuteOther("INSERT INTO Class (class_name, class_describe, class_start, class_end, class_Day, branch_id,pic_id) VALUES ('".$this->name."','".$this->describe."','".$this->start."','".$this->end."','".$this->Day."',".$this->branch->getId().",".$this->pic->getId().");");
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
                $this->name = $arr[0]['class_name'];
                $this->describe = $arr[0]['class_describe'];
                $this->start = $arr[0]['class_start'];
                $this->end = $arr[0]['class_end'];
                $this->Day = $arr[0]['class_Day'];
                $branchtmp = new branch();
                $branchtmp->fill_object($arr[0]['branch_id']);
                $this->branch = $branchtmp;
                $pictmp = new picture();
                $pictmp->fill_object($arr[0]['pic_id']);
                $this->pic = $pictmp;
                return true;
            }
        }
        return false;
    }

    public function Connect_INS($id)
    {
        if ($id >= 1 && $id <= Instructor::count_member()) {
            if($this->id != null)
             return excuteOther ("INSERT INTO Ins_Class (Ins_id, class_id) VALUES (".$id.",".$this->id.");");
        }
        return  false;
    }

    public function update($Class_id)
    {
        try {
            if ($this->name != null && $this->branch != null && $this->describe != null && $this->start != null && $this->end != null && $this->Day != null && $this->pic != null)
                return excuteOther( "UPDATE CLASS WHERE class_id=".$Class_id." , class_name = '".$this->name."' ,class_describe = '".$this->describe."' ,class_start = '".$this->start."' , class_end = '".$this->end."' , class_Day = '".$this->Day."' , branch_id = ".$this->branch->getId()." ,pic_id = ".$this->pic->getId()." WHERE class_id =".$Class_id.";");
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getDescribe()
    {
        return $this->describe;
    }

    /**
     * @return mixed
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @return mixed
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @return mixed
     */
    public function getDay()
    {
        return $this->Day;
    }

    /**
     * @return mixed
     */
    public function getBranch()
    {
        return $this->branch;
    }

    /**
     * @return mixed
     */
    public function getPic()
    {
        return $this->pic;
    }

}