<?php

class task
{
    protected $Host     = "localhost"; // Hostname of our MySQL server.
    protected $Database = "digitalnimaran"; // Logical database name on that server.
    protected $User     = "root"; // User and Password for login.
    protected $Password = "";
    public $con=0;  // Result of mysql_connect().
    protected $Query_ID = 0;  // Result of most recent mysql_query().
    protected $Row;// current row number.
    public $Record;
    public function __construct()
    {
        $this->connect();
    }

    public function saveForOtp($number, $otp){
    	$check="select * from `otp` where number='$number'";
    	$rowCheck=mysqli_query($this->con, $check);
    	$num=mysqli_num_rows($rowCheck);
    	if($num>0){
    		$del="delete from `otp` where number='$number'";
    		$delRow=mysqli_query($this->con, $del);
    	}
    	$insertOtp="INSERT INTO `otp` (`otp`, `number`) VALUES ('$otp','$number')";
    	$insertRow=mysqli_query($this->con, $insertOtp);
    }

    public function AddDept()
    {
        $name = addslashes(strtoupper($_POST["name"]));
        $hod = addslashes(strtoupper($_POST["hod"]));
        $query = "insert into department(name, hod) values('$name','$hod')";
        //echo $query;
        mysqli_query($this->con, $query);
    }
    public function AddDesignation(){
        $post = addslashes(strtoupper($_POST["position"]));
        $query="insert into designation(position) values('$post')";   
        mysqli_query($this->con, $query);
    }

    public function addUser(){
        $fname = addslashes($_POST["fname"]);
        $lname = addslashes($_POST["lname"]);     
        $email = addslashes($_POST["email"]);     
        $password = addslashes($_POST["password"]);     
        $number = addslashes($_POST["number"]);     
        $gender = addslashes($_POST['gender']);
        $dob = addslashes($_POST["date"]);     
        $address = addslashes($_POST["address"]);     
        $city = addslashes($_POST["city"]);     
        $pincode = addslashes($_POST["pincode"]);     
        $cons = addslashes($_POST["cons"]);
        $query = "INSERT INTO `register`(`firstname`, `lastname`, `email`, `password`, `gender`, `phone`, `dob`, `address`, `city`, `constituency`, `pincode`) VALUES ('$fname', '$lname', '$email', '$password', '$gender','$number','$dob', '$address', '$city', '$cons', '$pincode')";
        if (mysqli_query($this->con, $query)) {
            return true;
        }   
    }
    public function EditCategory(){
        $id = $_POST['id'];
        $name = addslashes(strtoupper($_POST["name"]));

        $query = "update category set name='$name' where id='$id'";
        //echo $query;
        
        if (mysqli_query($this->con, $query)) {
            return 1;
        }
    }

    public function AddCategory(){
        $name = addslashes(strtoupper($_POST["name"]));
        $query="insert into category(name) values('$name')";   
        mysqli_query($this->con, $query);
    }

    public function AddAttend(){
        $date=$_POST['date'];
        $status="present";
        $time=$_POST['time'];
        $id=$_SESSION['id'];
        $query="INSERT INTO `attendance`(`emp_id`, `status`, `time`, `date`) VALUES ('$id','$status','$time','$date')";
        if(mysqli_query($this->con, $query)){
            return 1;
        }
    }

    public function AddTasks(){
        $title=$_POST['subject'];
        $description=$_POST['description'];
        $date=$_POST['date'];
        $category=$_POST['category'];
        $priority=$_POST['priority'];
        $send=$_POST['send'];
        $userId=$_SESSION['id'];
        if ($send){
            foreach ($send as $s){
                $query="INSERT INTO `tasks`(`cid`, `title`, `description`, `deadline`, `priority`, `assigned_by`, `assigned_to`) VALUES ('$category', '$title', '$description', '$date', '$priority', '$userId', '$s')";
                mysqli_query($this->con, $query);  
            }
            return 1;
        }
    }

    public function connect()
    {
        $this->con=mysqli_connect("$this->Host", "$this->User", "$this->Password", "$this->Database");
    }



   
    public function EditDept()
    {
        $id = $_POST['id'];
        $name = addslashes(strtoupper($_POST["name"]));
        $hod = addslashes(strtoupper($_POST["hod"]));

        $query = "update department set name='$name', hod='$hod' where id=".$id;
        //echo $query;
        
        if (mysqli_query($this->con, $query)) {
            return true;
        }
    }

    public function EditDesignation()
    {
        $id = $_POST['id'];
        $post = addslashes(strtoupper($_POST["position"]));

        $query = "update designation set position='$post' where id='$id'";
        //echo $query;
        
        if (mysqli_query($this->con, $query)) {
            return 1;
        }
    }


    public function updateEmp(){
        $id=$_POST['id'];
        $firstname = addslashes($_POST["firstname"]);
        $lastname = addslashes($_POST["lastname"]);     
        $email = addslashes($_POST["email"]);     
        $username = addslashes($_POST["username"]);     
        $dept_id = addslashes($_POST["dept_id"]);     
        $des_id = addslashes($_POST["des_id"]);     
        $phone = addslashes($_POST["phone"]);     
        $gender = addslashes($_POST['gender']);
        $dob = addslashes($_POST["dob"]);     
        $address = addslashes($_POST["address"]);     
        $state = addslashes($_POST["state"]);     
        $city = addslashes($_POST["city"]);     
        $pincode = addslashes($_POST["pincode"]);     
        $qual = addslashes($_POST["qual"]);     
        $experience = addslashes($_POST["experience"]);     
        $salary = addslashes($_POST["salary"]);
        
        $types=$_POST['type'];
        $ir = 0;
        $ur = 0;
        $dr = 0;
        $vr = 0;
        if($types=="admin"){
            if (isset($_POST["insert"])) {
                $ir = 1;
            }
            if (isset($_POST["edit"])) {
                $ur = 1;
            }
            if (isset($_POST["delete"])) {
                $dr = 1;
            }
            if (isset($_POST["view"])) {
                $vr = 1;
            }  
        }
        else{
            $ir = 0;
            $ur = 0;
            $dr = 0;
            $vr = 0;
        }
        $snap=substr($_POST['snap'],7);
        if($snap == $_FILES["snap"]["name"]){
          $snap=$_POST['photo'];  
        }
        else{
            if ($_FILES["snap"]["error"]==0) {
                $type=$_FILES["snap"]["type"];
                $temp=explode("/", $type);
                $ext=$temp[1];
                if ($ext=="jpg" || $ext=="jpeg" || $ext=="gif" || $ext=="png") {
                    $snap="admins/$username";
                    move_uploaded_file($_FILES["snap"]["tmp_name"], $snap);
                }
            }
        }
        $query="UPDATE `employee` SET `dept_id`='$dept_id', `des_id`='$des_id', `firstname`='$firstname', `lastname`='$lastname', `username`='$username', `email`='$email', `gender`='$gender',`phone`='$phone', `photo`='$snap', `dob`='$dob', `address`='$address', `state`='$state', `city`='$city', `pincode`='$pincode', `qualification`='$qual', `experience`='$experience', `salary`='$salary' WHERE id='$id'";
        //die(var_dump($city));

        if (mysqli_query($this->con, $query)) {
            $query2 = "UPDATE `rights` SET `ir`='$ir',`vr`='$vr',`ur`='$ur',`dr`='$dr' WHERE emp_id='$id'";
            if(mysqli_query($this->con, $query2)){
                return true;
            }
        } 
    }


    public function updateadmin()
    {
        $id=$_POST['id'];

        /*$query="select snap from admins where id=$id";
        $data=mysqli_query($this->con, $query);
        $row=mysqli_fetch_assoc($data);*/
        //$password = strtolower(addslashes($_POST["password"]));
        $username = strtolower(addslashes($_POST["username"]));
        $name = strtolower(addslashes($_POST["name"]));
        $phone = strtolower(addslashes($_POST["phone"]));
        $address = strtolower(addslashes($_POST["address"]));
        $email = strtolower(addslashes($_POST["email"]));
        $ir = "n";
        if (isset($_POST["insert"])) {
            $ir = "y";
        }
        $er = "n";
        if (isset($_POST["edit"])) {
            $er = "y";
        }
        $dr = "n";
        if (isset($_POST["delete"])) {
            $dr = "y";
        }
        $vr = "n";
        if (isset($_POST["view"])) {
            $vr = "y";
        }

        $snap=$row['snap'];

        if ($_FILES["snap"]["error"]==0) {
            $type=$_FILES["snap"]["type"];
            $temp=explode("/", $type);
            $ext=$temp[1];
            if ($ext=="jpg" || $ext=="jpeg" || $ext=="gif" || $ext=="png") {
                $snap="admins/$admin_id.$ext";
                move_uploaded_file($_FILES["snap"]["tmp_name"], $snap);
            }
        }
        
        $query="UPDATE `admins` SET `username`='$username',`name`='$name',`password`='$password',`address`='$address',`email`='$emailid',`phone`='$phone',`snap`='$snap',`insertright`='$ir',`editright`='$er',`deleteright`='$dr',`viewright`='$vr' WHERE admin_id='$admin_id'";
        if (mysqli_query($this->con, $query)) {
            return 1;
        }
    }

     //-------------------------------------------
//    Change Admin password
//-------------------------------------------
    public function changeAdminPsw($password)
    {
        $id = $_SESSION['admin_id'];
        $query = "update admins set `password`='$password' where admin_id=$id";
        if (mysqli_query($this->con, $query)) {
            return 1;
        } else {
            return 0;
        }
    } // end function changeAdminPsw


    public function updateproduct()
    {
        $name = strtolower(addslashes($_POST["name"]));
        $price = $_POST["price"];
        $subcatid = $_POST["subcatid"];
        $bid = $_POST["brand"];
        $description = strtolower(addslashes($_POST["des"]));
        $snap="products/default.jpg";
        $pid=$_POST['pid'];

        $snap=$_SESSION['productsnap'];

        if ($_FILES["snap"]["error"]==0) {
            $type=$_FILES["snap"]["type"];
            $temp=explode("/", $type);
            $ext=$temp[1];
            if ($ext=="jpg" || $ext=="jpeg" || $ext=="gif" || $ext=="png") {
                $snap="admins/$admin_id.$ext";
                move_uploaded_file($_FILES["snap"]["tmp_name"], $snap);
            }
        }
        $query="UPDATE `products` SET `price`='$price',`bid`='$bid',`subcatid`='$subcatid',`pname`='$name',`description`='$description',`snap`='$snap',`status`='1' WHERE pid='$pid'";
        if (mysqli_query($this->con, $query)) {
            return 1;
        }
    }

    
    public function addproduct()
    {
        $name = strtolower(addslashes($_POST["name"]));
        $price = strtolower(addslashes($_POST["price"]));
        $subcatid = strtolower(addslashes($_POST["subcatid"]));
        $bid = strtolower(addslashes($_POST["brand"]));
        $description = strtolower(addslashes($_POST["des"]));
        $snap="products/default.jpg";
        $pid=$this->getId("products", "pid");

        if ($_FILES["snap"]["error"]==0) {
            $type=$_FILES["snap"]["type"];
            $temp=explode("/", $type);
            $ext=$temp[1];
            if ($ext=="jpg" || $ext=="jpeg" || $ext=="gif" || $ext=="png") {
                $snap="products/$pid.$ext";
                move_uploaded_file($_FILES["snap"]["tmp_name"], $snap);
            }
        }
        $query="INSERT INTO `techshark`.`products` (`pid`, `price`,`bid`, `subcatid`, `pname`, `description`, `snap`,`time` ,`status`) VALUES ('$pid', '$price','$bid' ,'$subcatid', '$name', '$description', '$snap',NOW(),'1')";
        if (mysqli_query($this->con, $query)) {
            return 1;
        }
    }
    

    public function AddAdmin()
    {
        $query = "select max(id) as maxid from admins";
        $data = mysqli_query($this->con, $query);
        $id = 1;
        if ($row = mysqli_fetch_assoc($data)) {
            extract($row);
            $id = $maxid + 1;
        }
        $username = strtolower(addslashes($_POST["username"]));
        $password = strtolower(addslashes($_POST["password"]));
        $name = strtolower(addslashes($_POST["name"]));
        $phone = strtolower(addslashes($_POST["phone"]));
        $address = strtolower(addslashes($_POST["address"]));
        $emailid = strtolower(addslashes($_POST["emailid"]));
        $ir = "n";
        if (isset($_POST["insert"])) {
            $ir = "y";
        }
        $er = "n";
        if (isset($_POST["edit"])) {
            $er = "y";
        }
        $dr = "n";
        if (isset($_POST["delete"])) {
            $dr = "y";
        }
        $vr = "n";
        if (isset($_POST["view"])) {
            $vr = "y";
        }

        $snap="admins/default.jpg";

        if ($_FILES["snap"]["error"]==0) {
            $type=$_FILES["snap"]["type"];
            $temp=explode("/", $type);
            $ext=$temp[1];
            if ($ext=="jpg" || $ext=="jpeg" || $ext=="gif" || $ext=="png") {
                $snap="admins/$id.$ext";
                move_uploaded_file($_FILES["snap"]["tmp_name"], $snap);
            }
        }
        
        $query = "INSERT INTO `admins`(`username`, `email`, `name`, `password`, `address`, `phone`, `snap`, `ir`, `er`, `dr`, `vr`) VALUES ('$username', '$emailid', '$name', '$password', '$address', '$phone', '$snap', '$ir', '$er', '$dr', '$vr')";
        if (mysqli_query($this->con, $query)) {
            return 1;
        }
    }




 //-------------------------------------------
//    Queries the database
//-------------------------------------------
    public function query($Query_String)
    {
        if ($this->Query_ID = mysqli_query($this->con, $Query_String)) {
            return $this->Query_ID;
        } else {
            return false;
        }
    } // end function query

       
    public function checkUser()
    {
        // if the session id is not set, redirect to login page
        if (!isset($_SESSION['id'])) {
            header('Location:index.php');
        }
    }

    public function doLogin()
    {
        // if we found an error save the error message in this variable
    
    $name = $_POST['username'];
    $password = $_POST['password'];
    
    // first, make sure the username & password are not empty
        // check the database and see if the username and password combo do match
        $sql = "SELECT * FROM admins WHERE username = '$name' AND password = '$password' ";
        $result = $this->query($sql);
        
        $result2=mysqli_num_rows($result);
        if ($result2) {
            $row = mysqli_fetch_assoc($result);
            session_start();
            $id=$row['id'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $name;

            /*if($_SESSION['type']=="admin"){
                $query="select * from rights where emp_id='$id'";
                $res=$this->query($query);
               
                $res2=mysqli_num_rows($res);
                
                if($res2){
                    $row2 = mysqli_fetch_assoc($res);
                    $_SESSION['ir']=$row2['ir'];
                    $_SESSION['dr']=$row2['dr'];
                    $_SESSION['ur']=$row2['ur'];
                    $_SESSION['vr']=$row2['vr'];
                }
            }*/
            header("location:home.php");
        } else {
            header('location:index.php?p=1');
        }
    
        return $errorMessage;
    }

//-------------------------------------------
//    Retrieves the 2 record in a recordset
//-------------------------------------------
    public function nextRecord()
    {
        $this->Record = mysqli_fetch_assoc($this->Query_ID);
        $this->Row += 1;
        $stat = is_array($this->Record);
        if (!$stat) {
            mysqli_free_result($this->Query_ID);
            $this->Query_ID = 0;
        }
        return $stat;
    } // end function nextRecord



    public function getId($table, $field)
    {
        $id = 1;
        $query = "select $field from $table where $field=(select max($field) from $table)";
        $data = $this->query($query);
        if ($row = mysqli_fetch_assoc($data)) {
            extract($row);
            $id = $row[$field] + 1;
        }
        return $id;
    }
    public function getValue($table, $field, $id){
        $query="select $field from $table where id=".$id;
        $data= $this->query($query);
        $row = mysqli_fetch_assoc($data);
        return $row[$field];
    }
    public function getValues($table, $field, $id, $check){
        $query="select $field from $table where $check=".$id;
        $data= $this->query($query);
        $row = mysqli_fetch_assoc($data);
        return $row[$field];
    }
}
