<html>
<head>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<body  style="background-color:silver";>

<div class="container">

    <div class="col-lg-offset-4 col-lg-4" id="panel">
        <h2 style="color:red;font-family:sans";>Q&A FORM</h2>
        
        <form method="post" action="<?php echo base_url('addqa'); ?>" id="my-form">

            <div class="group">
                <input type="text" name="sport" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label> Which is Your Favorite Sport?</label>
            </div>

            <div class="group">
                <input type="text" name="sportsman" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Who is Your Favorite SportsMan?</label>
            </div>

            <div class="group">
                <input type="text" name="gamertag" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>What was Your Gamer Tag?</label>
            </div>

            <div class="group">
                <center> <button type="submit" id="btn-submit" class="btn btn-info">Submit</button></center><br><br>
                <center> <a href="<?php echo base_url('back'); ?>" class="btn btn-danger";> BACK </a> </center>
            </div>


        </form>

      
        <?php
        
        ?>
    </div>
</div>
<style>

    * {
    box-sizing: border-box;
    
}

h2 {
    text-align: center;
    margin-bottom: 50px;
    color: #fff;
}

.group {
    position: relative;
    margin-bottom: 35px;
}

input {
    font-size: 18px;
    padding: 5px 10px 10px 5px;
    display: block;
    width: 100%;
    border: none;
    border-bottom: 1px solid #fff;
    background: transparent;
}

input:focus {
    outline: none;
}

label {
    color: #fff;
    font-size: 18px;
    font-weight: normal;
    position: absolute;
    pointer-events: none;
    left: 5px;
    top: 10px;
    transition: 0.2s ease all;
    -moz-transition: 0.2s ease all;
    -webkit-transition: 0.2s ease all;
}

input:focus ~ label, input:valid ~ label {
    top: -20px;
    font-size: 14px;
    color: #fff;
}

.bar {
    position: relative;
    display: block;
    width: 100%;
}

.bar:before, .bar:after {
    content: '';
    height: 2px;
    width: 0;
    bottom: 1px;
    position: absolute;
    background: #fff;
    transition: 0.2s ease all;
    -moz-transition: 0.2s ease all;
    -webkit-transition: 0.2s ease all;
}

.bar:before {
        left: 50%;
}

.bar:after {
        right: 50%;
}

input:focus ~ .bar:before, input:focus ~ .bar:after {
    width: 50%;
}

.highlight {
    position: absolute;
    height: 60%;
    width: 100px;
    top: 25%;
    left: 0;
    pointer-events: none;
    opacity: 0.5;
}

input:focus ~ .highlight {
    -webkit-animation: inputHighlighter 0.3s ease;
    -moz-animation: inputHighlighter 0.3s ease;
    animation: inputHighlighter 0.3s ease;
}

@-webkit-keyframes inputHighlighter {
    from {
        background: #fff;
    }

    to {
        width: 0;
        background: transparent;
    }
}

@-moz-keyframes inputHighlighter {
    from {
        background: #fff;
    }

    to {
        width: 0;
        background: transparent;
    }
}

@keyframes inputHighlighter {
    from {
        background: #fff;
    }

    to {
        width: 0;
        background: transparent;
    }
}

#panel {
    min-width : 500px;
    padding-right:90px;
    border: 1px solid rgb(200, 200, 200);
    box-shadow: rgba(0, 0, 0, 0.1) 0px 5px 5px 2px;
    background: #ffffff;
    background: red; /* For browsers that do not support gradients */
    background: -webkit-linear-gradient(90deg, #2caab3 0%, #2c8cb3 100%); /* For Safari 5.1 to 6.0 */
    background: -o-linear-gradient(90deg, #2caab3 0%, #2c8cb3 100%); /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(90deg, #2caab3 0%, #2c8cb3 100%); /* For Firefox 3.6 to 15 */
    background: lightblue; /* Standard syntax (must be last) */
    /* -webkit-linear-gradient(90deg, #2caab3 0%, #2c8cb3 100%); */
    
    
    border-radius: 4px;
    top: 50px;
}

    </style>
    </head>
    </body>
    </html>