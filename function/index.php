<?php //include 'library.php';?>
<?php include 'db.php';?>
<style>
    *{
        font-family: 'Courier New', Courier, monospace
    }
</style>
<?php
// $rows= all('sales');
// dd($rows);

$rows=all('sales'," WHERE quantity >=2");
dd($rows);

// $find=find('items',2);
// dd($find);


// $row=find('items',2);
// $row['cost']=8;
// $row['price']=15;

// update("items",$row);

// $data=[
//         'id'=>9,
//         'name'=>'熱狗',
//         'cost'=>8,
//         'stock'=>50,
//         'price'=>20 ];
// save('items',$data);



// $all=q("select name,price from items order by price");
// dd($all);
// stars('正三角形',5);
// stars('正三角形',10);
// stars('正三角形',15);
// stars('菱形',15);
?>