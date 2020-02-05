
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>JA Numeric Captha con jQuery GIT</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" crossorigin="anonymous">

<style>
.col-xs-1, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9, .col-xs-10, .col-xs-11, .col-xs-12 {
    border: 1px solid #dadada;
    margin-bottom:  10px;
    padding: 10px;  
}  

.header {
    text-align: center;
    margin-top: 10px;
}

.current_captcha {
    font-size: 22px;
    font-style: italic;
    color: red;
}

.captha_numbers {
    margin-bottom: 10px;
}

.captha_numbers a {
    border: 1px solid #0085CF;
    -webkit-border-radius: 6px;
    -moz-border-radius: 6px;
    border-radius: 6px;
    color: #0085CF;
    padding: 4px;
    text-decoration: none;
}

.captha_numbers a:hover {
    background-color: #0085CF;
    color: #ffffff;
}
</style>
<script>
    $(document).ready(function(){
        $('.button').attr("disabled", true);
        var aleatorioCaptcha = $('#current_captcha').val();
        aleatorioCaptcha = parseInt(aleatorioCaptcha, 10);
        $('.captha_numbers a').on('click', function(){
            var data = $(this).attr('data');
            $('#captcha').val($('#captcha').val() + data);
            var valorCaptcha = $('#captcha').val();
            valorCaptcha = parseInt(valorCaptcha, 10);
            alert(valorCaptcha+' ¿es igual ? '+aleatorioCaptcha);
            if (valorCaptcha == aleatorioCaptcha){
                alert("ya es igual");
                $('#send').attr("disabled", false);
            }
            return false;
        });
    });
</script>
</head>
<?php
    srand(time());
    $captcha_value = (string)rand(1000,9999);
    $captcha_numbers = array(0,1,2,3,4,5,6,7,8,9);
?>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-12 header">
            <h1>JA Numeric Captcha con jQuery</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
                        <form action="index.php" method="post">
                <p class="text form-group">
                    <label for="firstname">Nombre</label>
                    <input type="text" value="Demo" name="firstname" id="firstname" class="form-control">
                </p>
                
                <p class="text form-group">
                    <label for="email">Email</label>
                    <input type="text" value="demo@demo.com" name="email" id="email" class="form-control">
                </p>
        
                <p class="textarea form-group">
                    <label for="message">Mensaje</label>
                    <textarea cols="10" rows="6" name="message" id="message" class="form-control"></textarea>
                </p>     
                
                <p class="form-group current_captcha">
                    <?php echo $captcha_value; ?>             
                </p>

                <p class="text form-group">
                    <label for="captcha" class="captha_numbers">
                    <?php foreach ($captcha_numbers as $number) {
                        echo '<a href="#" data="'.$number.'">'.$number.'</a> ';
                    }
                    ?>
                    </label>
                    <input type="text" size="4" maxlength="4" id="captcha" name="captcha" class="form-control" disabled="disabled">
                    <input type="hidden" id="current_captcha" name="current_captcha" value="<?php echo (int)$captcha_value; ?> ">
                </p>
                
                <div class="form-group">
                    <input id="send" onclick="$(this).hide();" class="btn btn-default button button-medium" name="submitContact" value="Enviar" type="submit">
                </div>
            </form>
        </div>	
    </div>

    
</div>
</body>
</html>
