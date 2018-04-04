<?php

// usage: php validate_video.php video_file.ext
// argv[1] = the video file to validate

if (count($argv) != 2) {
    echo "Invalid script invocation\n";
    exit;
}

$cmd = "ffmpeg -v error -i $argv[1] -map 0:1 -f null - 2>error.log";
shell_exec($cmd); 

$contents = file_get_contents('error.log');

// if the file is empty, then the video is valid
echo (strlen($contents) == 0 ? 1 : 0) . "\n";

?>