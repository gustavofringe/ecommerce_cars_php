<?php
class Form{
    public function open($method, $action=null){
        echo "<form method='$method' action='$action'>";
    }

    public function input($for, $class_label, $label, $type, $name, $class, $value, $id, $placeholder=null){
        echo "<div class='form-group'>
                <label for='$for' class='$class_label'>$label</label>
                <input type='$type' name='$name' class='$class' value='$value' id='$id' placeholder='$placeholder'>
               </div>";
    }
    public function textarea( $for, $label,$class, $id, $name,$content, $placeholder=null){
        echo "<div class='form-group'>
            <label for='$for'>$label</label>
            <textarea class='$class' id='$id' name='$name' placeholder='$placeholder'>$content</textarea>
        </div>";
    }
    public function button($class, $value){
        echo "<button class='$class'>$value</button>";
    }
    public function checkbox(){
        echo "<div class='form-check'>
                <label class='form-check-label'>
                <input type='checkbox' class='form-check-input' name='check' value=1>
                        En ligne ?
                </label>
               </div>";
    }
    public function close(){
        echo "</form>";
    }
}