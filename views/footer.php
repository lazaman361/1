<?php

// Currently located in $this->view object and loading all the scripts from its js attribute, which is an array.
if (isset($this->js)){
    foreach ($this->js as $js)
    {
        echo '<script src="' . URL . 'views/' . $js . '"></script>';
    }
}
?>

<div id="footer">Copyright L&copy;</div>