<?php 
    session_start();
    include "conn.php";

    /*Avoid access payment.php page without login */
    if (!isset($_SESSION['login_user'])) { 
	   header("location:login.php");
    }
    else if($_SESSION['amount']==0){
        header("location:user_acc.php");
    }
    $userloged=$_SESSION['login_user'];

?>
<html>
    <head>
        <title>PAYMENT</title>
        <link rel="stylesheet" href="css/payment_style.css">
        <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
        <script src="js/backbtn.js"></script>
    </head>
    <body>
        
        <div class="payment_page">
            
        <!--Main div which capable between card payment and e-walet payment forms /Code line 26 to 48/-->
            <div class="form" >
            
            <!--Form to pay ticket fee by credit card /Code line 29 to 85/-->
                <!--Relevent PHP script code -line 136 to 187-->
                <form class="credit_crd" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <div id="logos">
                        <center>
                            <img src="images/visa2.png">
                            <img src="images/mastercard.jpg">
                            <img src="images/ae.jpg">
                        </center>
                    </div><br>
                    <label>Amount  : </label> <p id="money">Rs.<?php echo $_SESSION['amount'];?> </p>
                    <label>Card Type :</label>
                    <select id="pay_method" name="crd">
                        <option value="VISA">VISA</option>
                        <option value="Master Card">Master Card</option>
                        <option value="American Express">American Express</option>
                    </select><br><br>
                    <label>Your Name :</label>
                    <input type="text" id="name" name="name" placeholder="  As printed on your card"><br><br>
                    <label>Card No :</label>
                    <input type="text" id="crd_no" name="crd_no" placeholder="  XXXX XXXX XXXX XXXX"><br><br>
                    <label>CCV :</label>
                    <input type="text" id="ccv" name="ccv" placeholder="3 DIGIT CCV"><br><br>
                    <label>Date of Expiry :</label>
                    <select name="month" id="exp">
                        <option value="1">Jan</option>
                        <option value="2">Feb</option>
                        <option value="3">Mar</option>
                        <option value="4">Apr</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">Aug</option>
                        <option value="9">Sep</option>
                        <option value="10">Oct</option>
                        <option value="11">Nov</option>
                        <option value="12">Dec</option>
                    </select>
                    <select name="year" id="exp">
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                    </select>
                    
                    <br><br><br>
                    <button name="pay_crd">Pay Now</button>
                    <p class="message"> <u>  &nbsp;Card Payment </u><span style="float:right;"><a href="#"> Online Account Payment </a></span></p>
                </form>
            <!--End of Form to pay ticket fee by credit card-->
                
            <!--End of Form to pay ticket fee by e wallet /Code line 87 to 119/-->
                <!--Relevent PHP script code -line 190 to 227-->
                <form class="online_acc" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <div id="logos">
                        <center>
                            <img src="images/netteler.png">
                            <img src="images/skrill.jpg">
                            <img src="images/payoneer.png">
                            <br>
                            <img src="images/paypal.png">
                            <img src="images/payza.png">
                            <img src="images/webmoney.jpg">
                        </center>
                    </div><br><br><br>
                    <label>Amount  : </label> <p id="money">Rs.<?php echo $_SESSION['amount'];?> </p>
                    <label>E Wallet Type :</label>
                    <select name="e_wlt">
                        <option value="Netteler">Netteler</option>
                        <option value="Skrill">Skrill</option>
                        <option value="Paypal">Paypal</option>
                        <option value="Payza">Payza</option>
                        <option value="Payoneer">Payoneer</option>
                        <option value="Webmoney">Webmoney</option>
                    </select><br><br>
                    <label>Account Mail :</label>
                    <input type="text" placeholder="  Online wallet Mail" name="acc_mail" id="acc_mail"><br><br>
                    <label>Authentication Password :</label>
                    <input type="password" id="au_pwd" placeholder="  Verification Password" name="pword"><br><br><br>
                    <button name="pay_e">Pay Now</button>
                    
                    <p class="message"><a href="#"> &nbsp; Card Payment </a> <span style="float:right;"><u> &nbsp;&nbsp;&nbsp;&nbsp;Online Account Payment </u></span></p>
                </form>
            <!--End of Form to pay ticket fee by e-wallet-->
                
            </div>
        </div>
        <div id="back">
            <a href="user_acc.php"><img src="images/back-button.png" id="backimg"></a>
        </div>
        <script>
            $('.message a').click(function(){
                $('form').animate({height:"toggle", opacity:"toggle"},"slow");
            });
        </script>
    </body>
</html>

<?php

    /*Payment operation by card*/
    if(isset($_POST['pay_crd'])){

        $crd=$_POST['crd'];
        $name=$_POST['name'];
        $crd_no=$_POST['crd_no'];
        $ccv=$_POST['ccv'];
        $month=$_POST['month'];
        $year=$_POST['year'];

        $cur_m=date("m");
        $cur_y=date("Y");

        $t_id=$_SESSION['re_id'];
        if(empty($name) || empty($crd_no) || empty($ccv)){
            echo '<script type="text/javascript">';
            echo 'alert("Please Fill All fields")';
            echo '</script>';
        }
        else{
            if(!preg_match( "/^[0-9]{4}\ [0-9]{4}\ [0-9]{4}\ [0-9]{4}$/",$crd_no) ){ //Validate Credit card number
                echo '<script type="text/javascript">';
                echo 'alert("Please Enter valid credit card Number in given format XXXX XXXX XXXX XXXX")';
                echo '</script>'; 
            }
            else if(!preg_match( "/^[0-9]{3}$/",$ccv)){//Validate ccv code
                echo '<script type="text/javascript">';
                echo 'alert("Please Enter correct 3 digit ccv code")';
                echo '</script>'; 
            }
            else if(($cur_y > $year)|| ($cur_y == $year && $cur_m > $month)){  //Validate credit card expiry by comparison current month and year
                echo '<script type="text/javascript">';
                echo 'alert("Your Card is Expired")';
                echo '</script>';
            }
            else{
                $update_sql=mysqli_query($con,"UPDATE reservations SET status='Paid' WHERE reservation_id='$t_id'");
                if($update_sql){
                    echo '<script type="text/javascript">';
                    echo 'var fee="'.$_SESSION['amount'].'";var crd="'.$crd.'";var crd_no="'.$crd_no.'"; alert("Payment Accepted from "+crd+" card. Card Num is : "+crd_no+".  Rs."+fee+" Will deducted from your account")';
                    echo '</script>';
                    $_SESSION['amount']=0; //In code line 9 to 11 having header to navigate user_account page when $_SESSION['amount'] is 0. Cannot include header directly here, because then alert will not display
                }
                else{
                    echo '<script type="text/javascript">';
                    echo 'var crd="'.$crd.'"; alert("Payment Not Accepted from "+crd+" card.Contact your bank or try again")';
                    echo '</script>';
                }
            }

        }
    }
    

/*Payment operation by e wallet*/
    if(isset($_POST['pay_e'])){
    
        $e_wlt=$_POST['e_wlt'];
        $acc_mail=$_POST['acc_mail'];
        $au_pwd=$_POST['pword'];

        $t_id=$_SESSION['re_id'];

        if(empty($acc_mail) || empty($au_pwd)){
            echo '<script type="text/javascript">';
            echo 'alert("Please Fill All fields")';
            echo '</script>';
        }
        else{
            if(!filter_var($acc_mail, FILTER_VALIDATE_EMAIL)){ //validate mail address
                echo '<script type="text/javascript">';
                echo 'alert("Please Enter valid E-Wallet Account mail")';
                echo '</script>'; 
            }
            else{
                $update_sql=mysqli_query($con,"UPDATE reservations SET status='Paid' WHERE reservation_id='$t_id'");
                if($update_sql){
                    echo '<script type="text/javascript">';
                    echo 'var fee="'.$_SESSION['amount'].'";var wlt="'.$e_wlt.'";var mail="'.$acc_mail.'"; alert("Payment Accepted from "+crd+" e-Wallet. Account is : "+mail+".  Rs."+fee+" Will deducted from your account")';
                    echo '</script>';
                    $_SESSION['amount']=0; //In code line 9 to 11 having header to navigate user_account page when $_SESSION['amount'] is 0. Cannot include header directly here, because then alert will not display
                }
                else{
                    echo '<script type="text/javascript">';
                    echo 'var wlt="'.$e_wlt.'"; alert("Payment Not Accepted from  "+wlt+" e-Wallet. Contact your e_wallet help center or try again")';
                    echo '</script>';
                }
            }

        }
    
    }


?>
<!--Product of Uni Ruhuna. Tec Fac Group 2 //TG2016//-097-095-112-111--->