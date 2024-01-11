<html>
    <head>
        <title>CHECK BALANCE </title>
    </head>
    <body text=darkblue bgcolor="lightblue">
    <form method=post>       
        <center>
            <fieldset style="background-color:white;border-width:1px ;border-color:darkblue;width:45%;height:95%;">            
            <u><h2 style="color:red">CHECK BALANCE</h2></u>                  
            <table cellspacing="10">

                <tr>
                    <td> Enter Acount No : </td><td><input type=text name="tacno" size=20></td>
                </tr>

               </table>
                    
               <center>
            <input type=submit name=b1 value="SHOW BALANCE" style="background-color:blue;color:white;width:120px;height:25px">
    </center>
            <?php   

                    extract($_POST);
                    if(isset($b1))
                    {
                        
                        $con=mysqli_connect('localhost','root','123','bank');
                        $q="select * from account where acno=$tacno";
                        $result=mysqli_query($con,$q);
                        $n=$result->num_rows;
                        if($n == 0)
                        {
                            echo"Not found";
                        }
                        else
                        {
                            $row=$result->fetch_array();
                            ?>

                        <table cellspacing=15>    
                        <tr>
                            <td>Account No</td><td><input type=text name=t1 value=<?php echo $row[0];?>></td>
                        </tr>
                        <tr>
                        <td>Balance </td><td><input type=text value=<?php echo $row[10];?>></td>
                        </tr>
  
                    <?php
                        }
                    }
                    ?>
                    
            </table> 

        </fieldset>    
        </center>
    
    </body>
</html>