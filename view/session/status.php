<?php
$app->session->start();
$data = [
    "Session_status" => session_status(),
    "Session_cache_expire" => session_cache_expire(),
    "Session_module_name" => session_module_name(),
];

?>


<pre>
    <?php
    print_r($data);
    ?>
</pre>
