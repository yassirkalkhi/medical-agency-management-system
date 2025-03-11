<?php
setcookie("id", "", time() - 1, "/");
setcookie("type", "", time() - 1, "/");
header("Location: index")


?>