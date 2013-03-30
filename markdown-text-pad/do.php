<?
    $redirect = "http://202.194.15.195/markdown-text-pad/out.html";
    $file = fopen("out.md", "w");
    fwrite($file, $_POST['content']);
    fclose($file);

    exec("/bin/bash interpret.sh");
    header("Location: $redirect");
?>
