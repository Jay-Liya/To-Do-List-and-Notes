<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Registration</title>
        <script type="text/javascript">
        function validateForm()
        {
        if(document.forms["reg"]["password"].value!=document.forms["reg"]["confirmpwd"].value){

            alert("Passwords not matched");
            return false;
        }

        var g=document.forms["reg"]["username"].value;
        var h=document.forms["reg"]["password"].value;

        if (g==null || g=="")
        {
        alert("username must be filled out");
        return false;
        }
        if (h==null || h=="")
        {
        alert("password must be filled out");
        return false;
        }
        }
        </script>
    </head>

    <body>

        <form name="reg" action="codeexec.php" onsubmit="return validateForm()" method="post">
            <div class="table">

                <div class="row">
                    <div class="leftcol">
                        <p></p>
                    </div>      

                    <div class="rightcol">

                        <?php
                        $remarks="";
                        if(isset($_GET['remarks']))
                            $remarks=$_GET['remarks'];

                        if ($remarks==null and $remarks=="")
                        {
                        echo "<h4>Registration</h4>";
                        }
                        else if ($remarks==0)
                        {
                        echo "<h5 style='color:green;' >Success</h5> <a href='login.php'id='bckloginbtn'>Back to Login</a>";
                        }
                        else if ($remarks==1)
                        {
                        echo "<h5 style='color:red;'>Username already exists</h5>";
                        }
                        ?>                    
                        
                    </div>

                </div>

                <div class="row">

                    <div class="leftcol">
                        <p>Username</p>
                    </div>      

                    <div class="rightcol">
                        <input name="username" type="text"  maxlength="15" />
                    </div>

                </div>

                <div class="row">

                    <div class="leftcol">
                        <p>Password</p>
                    </div>      

                    <div class="rightcol">
                        <input name="password" type="password" maxlength="15" />
                    </div>

                </div>

                <div class="row">

                    <div class="leftcol">
                        <p>Confirm Password</p>
                    </div>      

                    <div class="rightcol">
                        <input name="confirmpwd" type="password" maxlength="15" />
                    </div>

                </div>

                <div class="row">

                    <div class="leftcol">
                        <p></p>
                    </div>      

                    <div class="rightcol">
                        <input name="submit" type="submit" value="Register" />
                    </div>

                </div>

                <div class="row">

                    <div class="leftcol">
                        <?php if(!isset($_GET['remarks'])||$remarks!=0){ ?>
                            <a href="login.php" id="bckloginbtn">Back to Login</a>
                        <?php } ?>
                    </div>      

                    <div class="rightcol">
                        <p></p>
                    </div>

                </div>
            </div>
        </form>
    </body>
</html