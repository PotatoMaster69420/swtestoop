<?php

class Users extends Db {


    protected function getItems() {

        $sql = "SELECT * FROM items1";
        $stmt = $this->connect()->query($sql);
        $stmt->execute();
        
        $results = $stmt;

        return  $results;

    }


    protected function unsetItem($sku) {

        $sql = "DELETE FROM items1 WHERE sku = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$sku]);
           
    }

    protected function setItem2($sku, $name, $price, $type, $size, $width, $length, $height, $weight) {
        
        $dimensions =  ($height . 'x' . $length . 'x' . $width);

        $sql = "INSERT INTO items1(sku, name, price, type, size, width, height, length,	weight, dimensions) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$sku, $name, $price, $type, $size, $width, $height, $length, $weight, $dimensions]);
     
    }

    protected function getItemsWithType($type) {

        $sql = "SELECT * FROM items1 WHERE type = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$type]);
        $items = $stmt->fetchAll();

        return $items;
         
    }

    protected function setItemIxs($array, $prefix, $appendix, $key) {

        
            //foreach($keys as $key){
        //$attributes[] = $key;
        //} */
        //if(is_array($keys)){
        //foreach($keys as $key){
        //$attributes[] =$key;


        //}
           
        $printableitems= array();

        foreach($array as $item)
        {
        $item['prefix'] = $prefix;
        $item['appendix'] = $appendix;
        $item['attribute'] = $item[$key];
        $printableitems[] = $item;
        }
       
        return $printableitems;
         
    }




    protected function getPrintableArray(){

        
        //book ixs
        $books = $this->getItemsWithType('book');
        $printablebooks = $this->setItemIxs($books, 'Weight: ', 'KG', 'weight');

        //dvd ixs
        $dvds= $this->getItemsWithType('dvd');
        $printabledvds = $this->setItemIxs($dvds, 'Size: ', 'MB', 'size');

        
        //furniture ixs
        $furniture = $this->getItemsWithType('furniture');
        $printablefurniture = $this->setItemIxs($furniture, 'Dimensions:', 'CM', 'dimensions');

        $allitems= array_merge($printablebooks, $printabledvds, $printablefurniture);

        $sku = array_column($allitems, 'sku');

        //array_multisort($price, SORT_DESC, $inventory);

        array_multisort($sku, SORT_ASC, $allitems);

        return $allitems;

        


    }


    protected function checkSku(){
        $sku = ($_POST['sku']);
        $sql="SELECT count(*) as cntSku FROM items1 WHERE sku= :sku";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(':sku', $sku, PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->fetchColumn();

            
        $response = "<span style='color: green;'>Available.</span>";
        if($count > 0){
            $response = "<span style='color: red;'>Not Available.</span>";
        }

        echo $response;
        exit;
    }


}

?>