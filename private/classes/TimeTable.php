<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/31/2019
 * Time: 9:36 AM
 */

class TimeTable {
    //todo Add the school field in case it would be extended to other schools
    public $code;
//    public $title;
    public $startTime;
    public $endTime;
    public $day;
    public $lectureHall;
    public $lecturer;
//    public $school;
    public $faculty;
    public $year;
    public $trimester;
    public $program;

    public function __construct($arg=[]){
    $this->code = isset($arg['code']) ? $arg['code'] : '';
//    $this->title = isset($arg['title']) ? $arg['title'] : '';
    $this->startTime = isset($arg['startTime']) ? $arg['startTime'] : '';
    $this->endTime = isset($arg['endTime']) ? $arg['endTime'] : '';
    $this->day = isset($arg['day']) ? $arg['day'] : '';
    $this->hall = isset($arg['hall']) ? $arg['hall'] : '';
//    $this->school = isset($arg['school']) ? $arg['school'] : 'uds';
    $this->faculty = isset($arg['faculty']) ? $arg['faculty'] : '';
    $this->year = isset($arg['year']) ? $arg['year'] : '';
    $this->trimester = isset($arg['trimester']) ? $arg['trimester'] : '';
    $this->lecturer = isset($arg['lecturer']) ? $arg['lecturer'] : '';
    $this->program = isset($arg['program']) ? $arg['program'] : '';

    }


    public static function find($code)
    {
        try{
            $con = Database::connect();
            $sql = "select * from timetable where code =  '" . $code . "'";
            $result = $con->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        }catch (Exception $e){
            print_r($e->getMessage());
        }

        if(!empty($result)){
            return $result[0];
        }
    }






    public  function addCourse()
    {
        try
        {
            //        Create connection to the database
            $con = Database::connect();
            $sql = "INSERT INTO timetable (code, startTime, endTime, day, hall, faculty, trimester, program)
                VALUES (:courseCode,  :startTime, :endTime, :day, :lectureHall
                                                      , :faculty, :trimester, :program);";
            $stm = $con->prepare($sql);
            $stm->bindValue(":courseCode", $this->code);
//            $stm->bindValue(":courseTitle", $this->title);
            $stm->bindValue(":startTime", $this->startTime);
            $stm->bindValue(":endTime", $this->endTime);
            $stm->bindParam(":day", $this->day, PDO::PARAM_INT);
            $stm->bindValue(":lectureHall", $this->hall);
//            $stm->bindValue(":lecturer", $this->lecturer);
            $stm->bindValue(":faculty", $this->faculty);
            $stm->bindValue(":program", $this->program);
//            $stm->bindValue(":year", $this->year);
            $stm->bindValue(":trimester", $this->trimester);
            $stm->execute();

            $errorInfo = $stm->errorInfo();
            if(isset($errorInfo[2]))
            {
                echo ($errorInfo[2]);
                return false;
            }
            else
            {
                return true;

            }

        }
        catch(Exception $e)
        {
            var_dump($e->getMessage());
            exit;
        }

    }
    public  function updateCourse()
    {
        try
        {
            //        Create connection to the database
            $con = Database::connect();
            $sql = "UPDATE timetable SET  startTime = :startTime, endTime = :endTime,
                      day = :day, hall = :hall, faculty = :faculty, trimester = :trimester, program = :program WHERE code = '".$this->code."'" ;
//            print($sql);
//            die();
            $stm = $con->prepare($sql);
            $stm->bindValue(":startTime", $this->startTime);
            $stm->bindValue(":endTime", $this->endTime);
            $stm->bindParam(":day", $this->day, PDO::PARAM_INT);
            $stm->bindValue(":hall", $this->hall);
            $stm->bindValue(":faculty", $this->faculty);
            $stm->bindValue(":program", $this->program);
            $stm->bindValue(":trimester", $this->trimester);
            $stm->execute();



        }
        catch(Exception $e)
        {
            var_dump($e->getMessage());
            exit;
        }
        $errorInfo = $stm->errorInfo();
        if(isset($errorInfo[2]))
        {
            echo ($errorInfo[2]);
            return false;
        }
        else
        {
            return true;

        }
    }

    public static  function timetable($username)
    {

        try{
            $con = Database::connect();
            $sql = "SELECT code FROM registration WHERE username = '". $username . "'";
            $result = $con->query($sql)->fetchAll(PDO::FETCH_ASSOC);

            $sql = "Select timetable.code, time_format(timetable.startTime, '%h:%i %p') startTime, time_format(timetable.endTime, '%h:%i %p') endTime, timetable.day, timetable.hall, timetable.faculty, courses.title
                    from timetable INNER JOIN courses ON timetable.code = courses.code WHERE  code in(";
            foreach($result as $code){
                $sql .=  "'".$code['code']. "',";
            }
            $sql .= ") ORDER BY day asc";

            $sql = str_replace(",)", ")", $sql);
            $result = $con->query($sql);
            if(!empty($result)) {
                $result = $result->fetchAll(PDO::FETCH_ASSOC);
            }
        }catch (Exception $e){
            print_r($e->getMessage());
        }
        if(!empty($result)){
            return $result;
        }

   }

}


