<?php
//require "DB_func.php";

class picture
{
    private $id;
    private $name;

    public static function count_pic()
    {
        return excuteQuery("SELECT COALESCE(max(id), 0)  as COUNT from picture;")[0]['COUNT'];
    }

    public static function push($path)
    {
        return excuteOther("INSERT INTO picture(name) values('" . $path . "');");
    }

    public function fill_object($id)
    {
        if ($id >= 1 && $id <= picture::count_pic()) {
            $this->id = $id;
            $this->name = excuteQuery("SELECT name from picture where id=" . $id)[0]['name'];
        }
    }

    public static function get_id($name)
    {
        return excuteQuery("SELECT id from picture where name='" . $name . "'")[0]['id'];
    }

    public function getId()
    {
        return $this->id;
    }

    public function getpicname()
    {
        return $this->name;
    }




//error_reporting(E_ALL); // or E_STRICT
//ini_set("display_errors",1);
//ini_set("memory_limit","1024M");
//define ('SITE_ROOT', realpath(dirname(__FILE__)));
//echo count($_POST);
//header("LOCATION: index.php");

    public static function uploadimg($myimg)
    {
        //images: png
        $errors = [];
        //check
        if (!($myimg['image']['type'] == 'image/png' || $myimg['image']['type'] == 'image/jpeg')) {
            $errors[] = 'only images are allowed';
        }

        if ($myimg['image']['error'] > 0) {
            $errors[] = 'error no. ' . $_FILES['image']['error'] . ' occurred';
        }

        if ($myimg['image']['size'] > 20 * 1024 * 1024) {
            $errors[] = 'max file size exceeded';
        }

        if (count($errors) == 0) {
            $target_dir = "../../uploads/";
            $newName = $myimg["image"]["name"];
            $sp = explode(".", $newName);
            $max = picture::count_pic() + 1;
            $target_file = $target_dir . $max . '.' . $sp[count($sp) - 1];
            if (move_uploaded_file($myimg['image']['tmp_name'], $target_file)) {
                return $max . '.' . $sp[count($sp) - 1];
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

}