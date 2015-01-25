<?php
header('Location: ' . $url->longUrl);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Refresh" content="0; url='<?php echo htmlspecialchars($url->longUrl); ?>'">
        <script type="text/javascript">
            document.location.href = unescape("<?php echo rawurlencode($url->longUrl); ?>");
        </script>
    </head>
    <body>
        <a href="<?php echo htmlspecialchars($url->longUrl); ?>">
            <?php echo htmlspecialchars($url->longUrl); ?>
        </a>
    </body>
</html>
