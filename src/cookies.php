<?php
session_start();
if ($_GET['c'] == "c") {
    $_SESSION['cookies'] = true;
    header ("Location: ".$_SESSION['page']);
    exit;
}
else if ($_GET['c'] == "d") {
    session_destroy();
    echo '<script>window.location.href="about:blank"</script>';
}
else {
    header ("Location: ".$_SESSION['page']);
    exit;
}
?>