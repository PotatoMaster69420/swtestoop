<?php


class UsersView extends Users {




    public function showItems2(){

        //$results = $this->getItems();
        $results = $this->getPrintableArray();
        
        foreach($results as $row) {
            echo '<div class="itemcard">';
            echo '<h3 class="title">'. 'SKU: <br>' . $row['sku'] . '</h4>' ;
            echo '<h5 class="itemname">' . 'Name: ' . $row['name'] . '</h5>' ;
            echo '<h5 class="itemprice">' . 'Price: ' . $row['price'] . '$' . '</h5>'  ;
            //echo '<h5 class="itemtype">' . $row['type'] . '</h5>' ;
            //echo '<h5 class="itemattribute">' . $row['prefix'] . '<br>' . $row['attribute'] . '</h5>' ;
            echo '<h5 class="itemattribute">' . $row['prefix'] . '<br>' . $row['attribute'] . ' ' . $row['appendix'] . '</h5>' ;
            //echo '<h5 class="itemattribute">' . $row['width'] . ' ' . $row['length'] . ' '. $row['height'] .'</h5>' ;
            //echo '<h5 class="itemattribute">' . $row['weight'] . '</h5>' ;
            echo '<input type="checkbox" name="marked[]" value="' . htmlspecialchars($row['sku']) . '" class="delete-checkbox">'; 
            echo '</div>';
        }



    }




}


?>
