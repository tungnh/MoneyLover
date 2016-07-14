<option value="0">Chọn danh mục</option>
<?php
    if($data != NULL){
        foreach ($data AS $item){
            echo "<option value=\"".$item['Category']['id']."\">".$item['Category']['name']."</option>";
        }
    }
?>
