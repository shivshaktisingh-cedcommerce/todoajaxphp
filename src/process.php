<?php 
    session_start();
    if(!isset($_SESSION['incomplete'])){
        $_SESSION['incomplete']=array();
    }
    if(!isset($_SESSION['complete'])){
        $_SESSION['complete']=array();
    }
    if(isset($_POST['delid'])){
        if(($_POST['arr'])==0){
            array_splice($_SESSION['incomplete'],$_POST['delid'],1);
        }
        else if(($_POST['arr'])==1){
            array_splice($_SESSION['complete'],$_POST['delid'],1);
        }
      
        display();
    }
    if(isset($_POST['show'])){
        display();
    }

   
    if(isset($_POST['new_task'])){
        $sign=$_POST['id'];
        $new_task = $_POST['new_task'];
        if($sign=="Add"){
              array_push($_SESSION['incomplete'],$new_task);
            }
        else if ($sign=="Update"){
            if(($_SESSION['arrtype'])==0){
                $key=$_SESSION['tempid'];
                $_SESSION['incomplete'][$key]=$new_task;
            }
           else if(($_SESSION['arrtype'])==1){
            $key=$_SESSION['tempid'];
            $_SESSION['complete'][$key]=$new_task;
            }
        }
        display();
    }
    if(isset($_POST['editid'])){
        $editid = $_POST['editid'];
        $arr = $_POST['arr'];
        $_SESSION['tempid']=$editid;
        $_SESSION['arrtype']=$arr;
    }
    if(isset($_POST['checkid'])){
        $taskcomplete = $_POST['checkvalue'];
        $id=$_POST['checkid'];
      //  echo $taskcomplete;
        array_push($_SESSION['complete'],$taskcomplete);
        array_splice($_SESSION['incomplete'],$id,1);
        display(); 
    }
    if(isset($_POST['uncheckid'])){
        $taskincomplete = $_POST['uncheckvalue'];
        $id=$_POST['uncheckid'];
        array_push($_SESSION['incomplete'],$taskincomplete);
        array_splice($_SESSION['complete'],$id,1);
        display(); 
    }

 
    function display(){
        $txt="";
        $txt.= "
            <div class='container'>
                <h2>TODO LIST</h2>
                <h3>Add Item</h3>
                <p>
                    <input id='new-task' type='text'>
                    <button id='Add' onclick='submit(this.id);'>ADD</button>
                    <button id='Update' onclick='submit(this.id);'>UPDATE</button>
                </p>
        
                <h3>Todo</h3>
                <ul id='incomplete-tasks'>";
                for($i=0;$i<count($_SESSION['incomplete']);$i++){
                   $txt.= "<li>
                        <input id='$i' type='checkbox' value=".$_SESSION['incomplete'][$i]." onclick='checkboxInc(this.id,this.value);'>
                        <label>".$_SESSION['incomplete'][$i]."</label>
                        <input type='text'>
                        <button class='edit' id='$i' value=".$_SESSION['incomplete'][$i]." onclick='edit(this.id,this.value,0);'>Edit</button>
                        <button class='delete' id='$i' onclick='deleteLi(this.id,0);'>Delete</button>
                        </li>";
                }
                    
                $txt.= "</ul>
                <h3>Completed</h3>
                <ul id='completed-tasks'>";
                for($i=0;$i<count($_SESSION['complete']);$i++){
                    $txt.= "<li>
                        <input id='$i' type='checkbox' value=".$_SESSION['complete'][$i]." onclick='checkboxCom(this.id,this.value);'checked>
                        <label>".$_SESSION['complete'][$i]."</label>
                        <input type='text'>
                        <button class='edit' id='$i' value=".$_SESSION['complete'][$i]." onclick='edit(this.id,this.value,1);'>Edit</button>
                        <button class='delete' id='$i'  onclick='deleteLi(this.id,1);'>Delete</button>
                    </li>";
                }
                $txt.= "</ul>
                     </div>";
                echo $txt;
    }
 // session_destroy();
?>