<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/f062.js" crossorigin="anonymous"></script>
</head>
<?php   
echo "<pre>";
    $message_sent = False;
    if(isset($_POST['email']) && $_POST['email'] != ''){

        if( filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $userFname = $_POST['fname'];
            $userLname = $_POST['lname'];
            $userEmail = $_POST['email'];
            $userPnumber = $_POST['pnumber'];
            $userFound = $_POST['found'];
            $userMessage = $_POST['message'];

            $to = "camkilpatrick7@gmail.com"
            $body = "";

            $body .= "From: ".$userFname. "\r\n";
            $body .= "Last Name: ".$userLname. "\r\n";
            $body .= "Email: ".$userEmail. "\r\n";
            $body .= "Phone number: ".$userPnumber. "\r\n";
            $body .= "How they found us: ".$userFound. "\r\n";
            $body .= "Message: ".$userMessage. "\r\n";

            mail($to, $userFname, $body);

            $message_sent = True;



        } 
        

        
    }

echo "<pre>";
?>

<body>

    <?php
    if($message_sent):
    ?>

        <h3> Thanks, we'll be in touch shortly. </h3>

    <?php 
        else:   
    ?>    
            <div class="form-layout">
                <form method="post" action="contact.php" name="emailContact">
                    <label for="fname">First Name</label>
                    <input type="text" id="fname" name="firstname" placeholder="Your name.." required>
                
                    <label for="lname">Last Name</label>
                    <input type="text" id="lname" name="lastname" placeholder="Your last name.." required>

                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" placeholder="Your email.." required>

                    <label for="pnumber">Phone Number</label>
                    <input type="text" id="pnumber" name="phonenumber" placeholder="Your phone number.." required>
                
                    <label for="found">How you found us</label>
                    <select id="found" name="found">
                    <option value="choose">Choose an option</option>
                    <option value="Facebook">Facebook</option>
                    <option value="WOM">Word of mouth</option>
                    <option value="Instagram">Instagram</option>
                    </select>

                    <label for="message"> Write us a message</label>
                    <textarea id="message" name="message" placeholder="Type message here"></textarea required>
                
                    <input type="submit" value="Submit">
                </form>
               </div> 
            <?php
            endif;

            ?>
</body>