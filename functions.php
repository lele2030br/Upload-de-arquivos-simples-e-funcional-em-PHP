<?php
function isImage($filename) {
    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        return in_array($ext, ['jpg', 'jpeg', 'png', 'gif']);
        }

        function isVideo($filename) {
            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                return in_array($ext, ['mp4', 'mov', 'avi']);
                }
                ?>