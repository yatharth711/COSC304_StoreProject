<HTML>
    <HEAD>
        <TITLE>Sign-Up Confirmation</TITLE>
        <link rel="stylesheet" href="hf.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script>
            $(function(){
                $("#header").load("header.html"); 
                $("#footer").load("footer.html"); 
            });
        </script>
    </HEAD>

    <BODY>
        <div id="header"></div>
        <div>
            <?php 
            require "encrypt.php";
            require "db.php";

            $encrypt = new encryption();
            $db = new db();

             if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $fn = $_POST['fname'];
                $ln = $_POST['lname'];
                $email = $encrypt->encrypt($_POST['email']);
                $password = hash('md5',$_POST['password']);
                $address =  $encrypt->encrypt($_POST['address']);
                $city = $encrypt->encrypt($_POST['city']);
                $province =  $encrypt->encrypt($_POST['province']);
                $country =  $encrypt->encrypt($_POST['country']);
                $pc =  $encrypt->encrypt($_POST['postalcode']);

                $db-> db_signUP($fn,$ln,$email,$password,$address,$city,$province,$country,$pc);
            }

            



            ?>
        </div>
        <div id="footer"></div>
    </BODY>
</HTML>
