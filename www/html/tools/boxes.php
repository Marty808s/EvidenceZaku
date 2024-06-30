<?php

function sucessBox($text, $timer = false){
    echo '<div class="alert alert-success" role="alert" id="sucessBox">';
    echo $text;
    echo '</div>';
    if ($timer == true) {
    echo '<script>
            setTimeout(function() {
                var sucessBox = document.getElementById("sucessBox");
                if (sucessBox) {
                    sucessBox.style.display = "none";
                }
            }, 1500);   
          </script>';
    }
}


function errorBox($text, $timer = false){
    echo '<div class="alert alert-danger" role="alert" id="errorBox">';
    echo $text;
    echo '</div>';
    if ($timer == true) {
    echo '<script>
            setTimeout(function() {
                var errorBox = document.getElementById("errorBox");
                if (errorBox) {
                    errorBox.style.display = "none";
                }
            }, 1500);   
          </script>';
    }
}


function infoBox($text, $timer = false){
    echo '<div class="alert alert-info" role="alert" id="infoBox">';
    echo $text;
    echo '</div>';
    if ($timer == true) {
    echo '<script>
            setTimeout(function() {
                var infoBox = document.getElementById("infoBox");
                if (infoBox) {
                    infoBox.style.display = "none";
                }
            }, 1500);   
          </script>';
    }
}