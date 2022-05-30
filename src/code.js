function deleteLi(delid ,arr){
        $.ajax({
            type:'post',
            url:'process.php',
            data:{
                delid: delid , 
                arr: arr,
            },
            success:function(response) {
                document.getElementById("result").innerHTML=response;
            }
        });
    }
   
   function submit(id){  
   var new_task = document.getElementById('new-task').value;
        if(new_task!=""){
            $.ajax({
                type:'post',
                url:'process.php',
                data:{
                    id:id,
                    new_task: new_task, 
                },
                success:function(response) {
                    document.getElementById("result").innerHTML=response;
                }
            });
        }            
    }
  function edit(editid,editvalue,arr){
        document.getElementById("Add").style.display="none";
        document.getElementById("Update").style.display="block";
        document.getElementById("new-task").value=editvalue;
       // alert(editid);
        $.ajax({
            type:'post',
            url:'process.php',
            data:{
                editid: editid,
                arr: arr,   
            }
        });
    }
   
   
  function checkboxInc(checkid, checkvalue){
    $.ajax({
        type:'post',
        url:'process.php',
        data:{
            checkid: checkid,
            checkvalue: checkvalue,   
        },
        success:function(response) {
            document.getElementById("result").innerHTML=response;
        }
    });  
  }   
  
  function checkboxCom(uncheckid, uncheckvalue){
    $.ajax({
        type:'post',
        url:'process.php',
        data:{
            uncheckid: uncheckid,
            uncheckvalue: uncheckvalue,
        },
        success:function(response) {
            document.getElementById("result").innerHTML=response;
        }
    });  
  }   
    
function showlist(){
    $.ajax({
        type:'post',
        url:'process.php',
        data:{
           show: 'show'
           
        },
        success:function(response) {
            document.getElementById("result").innerHTML=response;
        }
    });  
}

