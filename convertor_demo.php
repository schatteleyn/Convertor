<?php require_once 'convertisseur.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">

    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <title>Convertor</title>
    </head>

    <body>
        <form method="post">
            <p>
                <textarea name="message" rows="8" cols="45"><?php echo isset($_POST['message']) ? stripcslashes(htmlspecialchars($_POST['message'])) : ''; ?></textarea><br />
                <input type="submit" value="Envoyer" />
            </p>
        </form>
        <?php if (isset($_POST['message'])) { ?>
        <p>
            <?php echo convert_first($_POST['message']); ?>
        </p>
        <?php } ?>
    </body>
</html>