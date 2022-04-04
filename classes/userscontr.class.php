<?php



class UsersContr extends Users {
    

    
    public function createItem($sku, $name, $price, $attributes, $type) {

        
        $this->setItem($sku, $name, $price, $attributes, $type);


    }

    public function deleteItem($sku) {

        $this->unsetItem($sku);

    }

    public function massDelete($array) {

        foreach($array as $item){

            $this->unsetItem($item);

        }

    }

    public function createItem2($sku, $name, $price, $type, $size, $width, $length, $height, $weight) {

        if(empty($sku)){
            header('Location: ../error.php');
        }

        if(empty($name)){
            header('Location: ../error.php');
        } 

        if(empty($price)){
            header('Location: ../error.php');
        } 

        if(empty($attributes)){
            header('Location: ../error.php');
        }

        if(empty($type)){
            header('Location: ../error.php');
        }

        $this->setItem2($sku, $name, $price, $type, $size, $width, $length, $height, $weight);

    }

    public function checkingSku(){
        $this->checkSku();
    }



    /*public function getPrintableArray(){

        
        //book ixs
        $books = $this->getItemsWithType('books');
        $printablebooks = $this->setItemsIxs($books, 'Weight: ', 'KG');

        //dvd ixs
        $dvds= $this->getItemsWithType('dvd');
        $printabledvds = $this->setItemsIxs($dvds, 'Size: ', 'MB');

        //furniture ixs
        $furniture = $this->getItemsWithType('furniture');
        $printablefurniture = $this->setItemsIxs($furniture, 'Dimensions:', 'CM');

        $allitems= arraymerge($printablebooks, $printabledvds, $printablefurniture);

        $sku = array_column($inventory, 'sku');

        //array_multisort($price, SORT_DESC, $inventory);

        $sorted_array = array_multisort($sku, SORT_DESC, SORT_NATURAL|SORT_FLAG_CASE, $allitems);

        return $sorted_array;

        


    }*/
 


}

?>