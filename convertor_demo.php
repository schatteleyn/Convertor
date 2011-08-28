<?php require_once 'convertisseur.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>Convertor</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script>
$(document).ready( function () {
	$("textarea.message").change( function() {
		var that = this;	
		$.ajax({
			type: 'GET',
			url: 'convertisseur.php',
			data: 'text='+ $(that).val() + '&delimiter=' + $(that).child().val(),
			success: function(){    			$("form").insertAfter();  			}
		});
		return false;
	});
});
</script>
</head>
    <body>
        <form method="GET">
            <p>
            	Insert your text here: <br />
                <textarea id="message" class="message" name="message" rows="8" cols="45"><?php echo isset($_GET['message']) ? stripcslashes(htmlspecialchars($_GET['message'])) : ''; ?></textarea><br />
                Delimiter (by default, first letter of every lines will be capitalized): <br /><input class="send" type="text" name="delimiter"><br />
                <input type="submit" value="Envoyer" />
            </p>
        </form>
        <?php //if (isset($_GET['message']) && isset($_GET['delimiter'])) { ?>
        <p>
            <?php //echo convert($_GET['message'], $_GET['delimiter']); ?>
        </p>
        <?php //} ?>
    </body>
</html>