<?php

require_once("db.php");
require_once("component.php");

$con= Createdb();

//create button click
if(isset($_POST['create'])) {
    createData();
}

if(isset($_POST['update'])){
    UpdateData();
}

if(isset($_POST['delete'])){
    deleteRecord();
}

if(isset($_POST['deleteall'])){
    deleteAll();

}

function createData(){
    $Flag1=0;
    $Flag2=0;
    $Flag3=0;
    $Flag4=0; 
    $STUDENTNAME=textboxValue("STUDENTNAME");
    if (!preg_match ("/^[a-zA-z' ]*$/", $STUDENTNAME) ) 
    { 
	//TextNode("error","Provide only alphabets in the Textbox"); 
    	$ErrMsg = "Only alphabets and whitespace are allowed in STUDENTNAME.";  
            $Flag1=1;
            echo $ErrMsg;  
    } 
    else {
	    $Flag1=0;
    }
    $USN=textboxValue("USN");
    if (!preg_match ("/^([0-9]){1}([a-zA-Z]){2}([0-9]){2}([a-zA-Z]){2}([0-9]){3}?$/", $USN)) 
    {
  	//TextNode("error","Provide only alphabets and digits in the Textbox");
    	$ErrMsg = "Only alphabets and numeric are allowed in USN.";  
        $Flag2=1;
          echo $ErrMsg;  
    } 
    else 
    {
	    $Flag2=0;
    }
    $DEPT=textboxValue("DEPT");
    if (!preg_match ("/^[a-zA-z]*$/", $DEPT) ) 
    {  
	//TextNode("error","Provide only alphabets in the Textbox");
    	$ErrMsg = "Only alphabets are allowed in DEPT.";  
        $Flag3=1;
             echo $ErrMsg;  
    } 
    else {
	    $Flag3=0;
    }
    $CITY=textboxValue("CITY");
    if (!preg_match ("/^[a-zA-z]*$/", $CITY) ) 
    {  
	//TextNode("error","Provide only alphabets in the Textbox");
	$ErrMsg = "Only alphabets are allowed in CITY.";  
        $Flag4=1;
            echo $ErrMsg;  
    } 
    else 
    {
	    $Flag4=0;
    }
    if($Flag1==0 && $Flag2==0 && $Flag3==0 && $Flag4==0)
    {
    if($STUDENTNAME && $USN && $DEPT && $CITY)
    {
        $sql="INSERT INTO student(STUDENTNAME,USN,DEPT,CITY)
                VALUES('$STUDENTNAME','$USN','$DEPT','$CITY')";

        if(mysqli_query($GLOBALS['con'],$sql)){
            TextNode("success","Record Successfully Inserted..!");
        }else{
            echo "Error";
        }

    }else{
        TextNode("error","Provide Data in the Textbox");
    }
    }
}

function textboxValue($value){
    $textbox =mysqli_real_escape_string($GLOBALS['con'],trim($_POST[$value]));
    if(empty($textbox)){
        return false;
    }else{
        return $textbox;
    }
}

//Messages
function TextNode($classname,$msg){
    $element="<h6 class='$classname'>$msg</h6>";
    echo $element;
}

//get data from mysql database
function getData(){
    $sql = "SELECT * FROM student";

    $result=mysqli_query($GLOBALS['con'],$sql);

    if(mysqli_num_rows($result) >0){
        return $result;
     }
}

// update data
function UpdateData(){
    $STUDENTID=textboxValue("STUDENTID");
    $STUDENTNAME = textboxValue("STUDENTNAME");
    $USN = textboxValue("USN");
    $DEPT = textboxValue("DEPT");
    $CITY = textboxValue("CITY");

    if($STUDENTNAME && $USN && $DEPT && $CITY){
        $sql = "
                    UPDATE student SET STUDENTNAME='$STUDENTNAME', CITY = '$CITY', DEPT = '$DEPT',USN='$USN' WHERE id='$STUDENTID';";

        if(mysqli_query($GLOBALS['con'], $sql)){
            TextNode("success", "Data Successfully Updated");
        }else{
            TextNode("error", "Enable to Update Data");
        }

    }else{
        TextNode("error", "Select Data Using Edit Icon");
    }

}

function deleteRecord(){
    $STUDENTID = (int)textboxValue("STUDENTID");

    $sql = "DELETE FROM student WHERE id=$STUDENTID";

    if(mysqli_query($GLOBALS['con'], $sql)){
        TextNode("success","Record Deleted Successfully...!");
    }else{
        TextNode("error","Enable to Delete Record...!");
    }

}

function deleteBtn(){
    $result = getData();
    $i = 0;
    if($result){
        while (mysqli_fetch_assoc($result)){
            $i++;
            if($i > 3){
                buttonElement("btn-deleteall", "btn btn-danger" ,"<i class='fas fa-trash'></i> Delete All", "deleteall", "");
                return;
            }
        }
    }
}

function deleteAll(){
    $sql = "DROP TABLE student";

    if(mysqli_query($GLOBALS['con'], $sql)){
        TextNode("success","All Record deleted Successfully...!");
        Createdb();
    }else{
        TextNode("error","Something Went Wrong Record cannot deleted...!");
    }
}

function setID(){
    $getid = getData();
    $id = 0;
    if($getid){
        while ($row = mysqli_fetch_assoc($getid)){
            $id = $row['id'];
        }
    }
    return ($id + 1);
}
