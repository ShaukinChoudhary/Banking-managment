<html>
    <head>
        <title>transfer amount</title>
    </head>
    <body text=darkblue bgcolor="lightblue">
        <form method=post>
       
        <center>
            <fieldset style="background-color:white;border-width:1px ;border-color:darkblue;width:40%;height:45%;">
            <center>
                <u><h2 style="color:red">TRANSFER AMOUNT</h2></u>                
            
                Enter Acount from : <input type=text name="t1" size=20>
            <p>
            <input type=submit  value=varify name=b1 style="background-color:blue;color:white;width:120px;height:25px">       
            <?php
            extract($_POST);
            if (isset($b1))
            {
                
                $con=mysqli_connect('localhost','root','123','bank');
                $q="select * from account where acno='$t1'";
                $result=mysqli_query($con,$q);
                $n=$result->num_rows;

                if($n==0){
                    ?>
                    <h2 style="color:red">Incorrect Account</h2>
                    <?php


                }
                else
                {
                    $row=$result->fetch_array();
                ?> 
                    <input type=hidden name=afrom value=<?php echo $row['acno'];?>>
                    <input type=hidden name=tbal value=<?php echo $row['amnt'];?>>
                    <table cellspacing=10>
                        <tr>
                            <td>Transfer TO:</td><td><input type=text name=ato placeholder="Account To" size=20></td>
                        </tr>
                        <tr>
                            <td>Enter Amount:</td><td><input type=text name=t4 placeholder="Amount" size=20></td>
                        </tr>


                    </table>
                    <p>
                     <input type=submit  value=submit name=b2 style="background-color:blue;color:white;width:120px;height:25px"> 

                
                <?php
                }

             }
        
             extract($_POST);
        if(isset($b2))
        {
            $con=mysqli_connect('localhost','root','123','bank');
            $amnt=$t4;
            $cbal=$tbal;
            if($cbal<$amnt)
                echo"<h2>Inefficient balance</h2>";
        else
        {
            $qq="select * from account where acno=$afrom";
            $con=mysqli_connect('localhost','root','123','bank');
            $result=mysqli_query($con,$qq);
            $n=$result->num_rows;
            if($n==0)
            {
                ?>
                <h2 style="color:red"?Account not availble</h2>
                <?php
            }
            else
            {
                $row=$result->fetch_array();
                $tcbal=$row["amnt"];
                $tcbal=$tcbal-$amnt;
                $qq="update account set amnt=$tcbal where acno='$ato";
                mysqli_query($con,$qq);
                $cbal=$cbal+$amnt;
                $qq="update account set amnt=$cbal where acno='$afrom'";
                mysqli_query($con,$qq)
                ?>
                <h2 style="color:red">Transaction Successful</h2>
            <?php
            }

        }
    }
?>
           


        </fieldset> 
        
        
    </center>
        
    </form>
    </body>
</html>