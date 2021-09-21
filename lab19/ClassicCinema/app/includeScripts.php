<?php
if (isset($scriptList) && is_array($scriptList)) {
    foreach ($scriptList as $script) {
        echo "<script src='$script'></script>";
    }
}

