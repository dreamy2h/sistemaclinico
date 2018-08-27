<?php
session_start();
session_destroy();
echo "A cerrado sesi&oacute;n, redireccionando...";
?>
<script>location.href="../index.php";</script>