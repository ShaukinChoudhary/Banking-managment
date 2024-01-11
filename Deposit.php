<html>
    <head>
        <title>deposit amount</title>
    </head>
    <body text=darkblue bgcolor="lightblue">
       <form method=post>
        <center>
            <fieldset style="background-color:white;border-width:1px ;border-color:darkblue;width:40%;height:45%;">
            
            <u><h2 style="color:red">DEPOSIT AMOUNT</h2></u>                
            <table cellspacing="10">

                <tr>
                    <td> Enter Acount No : </td><td> <input type=text name="teno" size=20></td>
                </tr>

                <tr>
                    <td> Enter Name : </td><td><input type=text name="tename" size=20></td>
                </tr>
                            

            </table> 
             
            
            <input type=submit   Name=b1 value=VARIFY style="background-color:blue;color:white;width:80px;height:25px">
            <hr color= darkblue size =1>

            <table cellspacing="10">
                <?php
                extract($_POST);
                if(isset($b1))
                {
                    $con=mysqli_connect('localhost','root','123','bank');
                    $q="select * from account where acno='$teno' and  name='$tename'";
                    $result=mysqli_query($con,$q);
                    $n=$result->num_rows;
                    if($n==0)
                    {
                        ?>
                            <h2 style ="color:red"> Incorrect Account no</h2>
                        <?php
                    }
                    else
                    {
                        $row=$result->fetch_array();
                        ?>
                        <input type=hidden name=teno2 value=<?php echo $row['acno'];?>>
                        <input type=hidden name=tename2 value=<?php echo $row ['name'];?>>
                        <input type=hidden name=tbal2 value=<?php echo $row ['amnt'];?>>
                        <table>
                        <tr>
                        <td> Enter Amount : </td><td><input type=text name= "t3" size=20></td>
                        </tr>
                        </table>
        
                        <input type=submit  value=OK name=b2 style="background-color:blue;color:white;width:120px;height:25px"> &nbsp; &nbsp;

                        <?php

                    }
                }

                extract($_POST);
                if(isset($b2))
                {
                    $con=mysqli_connect('localhost','root','123','bank');
                    $temp_eno=$teno2;
                    $temp_name=$tename2;
                    $temp_amt=$t3;
                    $bal=$tbal2;
                    $bal=$bal + $temp_amt;

                    $q2="update account set amnt=$bal where acno=$temp_eno and name='$temp_name'";
                    if(mysqli_query($con,$q2))
                        echo"<h2>Successfully Saved</h2>";
                    else
                        echo"Connection error";
                    
                }
?>
        </fieldset>    
        </center>
    
    </body>
</html>