<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/26/2019
 * Time: 3:12 PM
 */

class Course{

    public $code;
    public $title;
    public $trimester;
    public $level;
    public $program;
    public $faculty ;
    public $prog_type ;

    function __construct($course =[])
    {
        $this->code = isset($course['code']) ? $course['code'] : '';
        $this->level = isset($course['level']) ? $course['level'] : '';
        $this->program = isset($course['program']) ? $course['program'] : '';
        $this->prog_type = isset($course['prog_type']) ? $course['prog_type'] : '';
        $this->title = isset($course['title']) ? $course['title'] : '';
        $this->trimester = isset($course['trimester'])  ? $course['trimester'] : '';
        $this->faculty = isset($course['faculty']) ? $course['faculty'] : '';
    }


    public  function create(){
        $stm='';
        try{
            $con= Database::connect();
            $sql = "INSERT INTO courses(code, title, level,  trimester, program, program_type, faculty)
                      VALUES (:code, :title, :level, :trimester, :program, :program_type, :faculty)";
            $stm = $con->prepare($sql);
            $stm->bindValue(":code", $this->code);
            $stm->bindValue(":title", $this->title);
            $stm->bindParam(":level", $this->level, PDO::PARAM_INT);
            $stm->bindValue(":trimester", $this->trimester);
            $stm->bindValue(":program", $this->program);
            $stm->bindValue(":faculty", $this->faculty);
            $stm->bindValue(":program_type", $this->prog_type);

            $errorInfo = $stm->errorInfo();

            if(isset($errorInfo[2])){
                echo print_r($errorInfo);

            }
        }catch (Exception $e){
            echo $e->getMessage();
        }

        if($stm->execute())
            return true;
        else
            return false;

    }



    public  function  update(){
        $stm = '';
        try{
            $con = Database::connect();
            $sql = "UPDATE courses SET title = :title, level=:level,
                      faculty=:faculty, program=:program, program_type=:program_type, trimester= :trimester
                      WHERE code = '".$this->code."'";
            $stm = $con->prepare($sql);

            $errorInfo = $stm->errorInfo();
            if(isset($errorInfo[2])){
                print_r($errorInfo);
            }

        }catch(Exception $e){
            print_r($e->getMessage()) ;

        }
        if($stm->execute(
            [
                ':title'=> $this->title,
                ':level'=>$this->level,
                ':faculty'=> $this->faculty,
                ':program'=>$this->program,
                ':program_type'=>$this->prog_type,
                ':trimester'=>$this->trimester
            ]
        )){
            return true;
        }else{
            die('failed');
        }

    }



    public static function find($code)
    {
        $result = [];
        try{
            $con = Database::connect();
            $sql = "select * from courses where code =  '" . $code . "'";
            $result = $con->query($sql);

        }catch (Exception $e){
            print_r($e->getMessage());
        }

        if($result){
            return $result->fetchAll(PDO::FETCH_ASSOC)[0];
        }
    }

    public function findAll(){
        $courses = [];
        try {
            //todo put codes into a method in the course class
            $con = Database::connect();
            $sql = "SELECT * FROM  courses WHERE program_type = '" . $this->prog_type . "' AND faculty ='" . $this->faculty . "' ";
            $sql .= "AND program = '" . $this->program . "' AND level = '" . $this->level . "' AND trimester ='" . $this->trimester . "'";
            $courses = $con->query($sql)->fetchAll(PDO::FETCH_ASSOC);

//            var_dump($courses);
//            die();

            $errorInfo = $con->errorInfo();
            if(isset($errorInfo[2]))
            {
                print_r($errorInfo[2]);
            }

        } catch (Exception $e) {
            print_r($e->getMessage());
        }
        if(!empty($courses))
        {
            return $courses;
        }
    }







}