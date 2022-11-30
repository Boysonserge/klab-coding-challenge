<?php
// [ {name: 'Bike', price:100}, {name: 'TV', price:200}, {name: 'Album', price:10}, {name: 'Book', price:5}, {name: 'Phone', price:500}, {name: 'Computer', price:1000}, ]
Class Product {
    public $items = array([
        'name' => 'Bike',
        'price' => 100
        ], [
        'name' => 'TV',
        'price' => 200
        ], [
        'name' => 'Album',
        'price' => 10
        ], [
        'name' => 'Book',
        'price' => 5
        ], [
        'name' => 'Phone',
        'price' => 500
        ], [
        'name' => 'Computer',
        'price' => 1000
        ]);

    public function getItems(){
        return json_encode($this->items);
    }

    public function getCheapItem(){
        $min = $this->items[0]['price'];
        $minProduct= $this->items[0]['name'];
        foreach($this->items as $item){
            if($item['price'] < $min){
                $min = $item['price'];
                $minProduct = $item['name'];
            }
        }
        return $minProduct . ' <b>'.$min.'</b>';
    }

    public function getExpensiveItem(){
        $max = $this->items[0]['price'];
        $maxProduct= $this->items[0]['name'];
        foreach($this->items as $item){
            if($item['price'] > $max){
                $max = $item['price'];
                $maxProduct = $item['name'];
            }
        }
        return $maxProduct . ' <b>'.$max.'</b>';
    }

    public function getTotalPrice(){
        $total = 0;
        foreach($this->items as $item){
            $total += $item['price'];
        }
        return $total;
    }
    
    public function getTotalPriceBiggerThan($price){
        $total = 0;
        foreach($this->items as $item){
            if($item['price'] > $price){
                $total += $item['price'];
            }
        }
        return $total;
    }
}

$obj = new Product();

echo "Cheap product: ".$obj->getCheapItem()."<br>";
echo "Expensive product: ".$obj->getExpensiveItem()."<br>";
echo "Total price: ".$obj->getTotalPrice()."<br>";
echo "Total price bigger than 10: ".$obj->getTotalPriceBiggerThan(10)."<br>";
