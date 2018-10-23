<html>
    <head>
        <title>Login</title>
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
        <style type="text/css">
        	body{
        		background: #eee;
        	}
            #main {
                width: 380px;
    			margin: 50px auto;
                font-family: raleway;
            }            
            span {
                color: red;
            }            
            h2 {                
                text-align: center;
                border-radius: 10px 10px 0 0;
                margin: -10px -40px;
                padding: 30px;
            }
            
            #login {
                width: 300px;                
                font-family: raleway;
                border: 2px solid #ccc;
                padding: 10px 40px 25px;
                margin-top: 70px;
                background: #fff;
            }
            
            input[type=text],
            input[type=password],
            input[type=email] {
                width: 99.5%;
                padding: 10px;
                margin-top: 8px;
                border: 1px solid #ccc;
                padding-left: 5px;
                font-size: 16px;
                font-family: raleway;
            }
            
            input[type=submit] {
                width: 100%;
                background-color: #002144;
                color: white;
                border: 2px solid #010e1d;
                padding: 10px;
                font-size: 20px;
                cursor: pointer;
                border-radius: 5px;
                margin-bottom: 15px;
            }
            
            #profile {
                padding: 50px;
                border: 1px dashed grey;
                font-size: 20px;
                background-color: #DCE6F7;
            }
            
            #logout {
                float: right;
                padding: 5px;
                border: dashed 1px gray;
                margin-top: -168px;
            }
            
            a {
                text-decoration: none;
                color: cornflowerblue;
            }
            
            i {
                color: cornflowerblue;
            }
            
            .error_msg {
                color: red;
                font-size: 16px;
            }
            
            .message {
                position: absolute;
                font-weight: bold;
                font-size: 28px;
                color: #6495ED;
                left: 262px;
                width: 500px;
                text-align: center;
            }
        </style>
    </head>

    <body>
        <?php
        	$this->load->helper('form');			

			if (isset($logout_message)) {
				echo "<div class='message'>";
				echo $logout_message;
				echo "</div>";
			}
		
			if (isset($message_display)) {
				echo "<div class='message'>";
				echo $message_display;
				echo "</div>";
			}
		?>
        <div id="main">
            <div id="login">
                <h2>Login</h2>
                <hr/>
                <?php echo form_open(); ?>
                    <?php
						echo "<div class='error_msg'>";
						if (isset($error_message)) {
							echo $error_message;
						}
						echo validation_errors();
						echo "</div>";
					?>
					<br />
                    <label>UserName</label>
                    <input type="text" name="username" id="name" placeholder="username" />
                    <br />
                    <br />
                    <label>Password</label>
                    <input type="password" name="password" id="password" placeholder="**********" />
                    <br/>
                    <br />
                    <input type="submit" value=" Login " name="submit" />           
                    <?php echo form_close(); ?>
            </div>
        </div>
    </body>

</html>