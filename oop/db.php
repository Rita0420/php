<?php
function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function q($sql)
{
    $dsn = "mysql:host=localhost;dbname=store;charset=utf8";
    $pdo = new PDO($dsn, 'root', '');

    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}


class DB
{
    private $pdo;
    private $dsn = "mysql:host=localhost;dbname=store;charset=utf8";
    private $table;


    public function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, 'root', '');
    }
    function all($array = null, $str = null)
    {

        $sql = "SELECT * FROM $this->table";

        if (is_array($array)) {
            $tmp =$this-> array2sql($array);
            $sql = $sql . " WHERE " . join(" AND ", $tmp);
        } else {
            $sql .= $array;
        }

        $sql .= $str;

        $rows = $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
    function find($id)
    {

        if (is_array($id)) {
            $tmp =$this-> array2sql($id);
            $sql = "SELECT * FROM $this->table WHERE " . join(" AND ", $tmp);
        } else {
            $sql = "SELECT * FROM $this->table WHERE id='$id'";
        }

        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function save($data)
    {
        if (isset($data['id'])) {
            $tmp =$this-> array2sql($data);

            $sql = "UPDATE $this->table SET " . join(" , ", $tmp) . "
                      WHERE id='{$data['id']}'";

            echo $sql;
            return $this->pdo->exec($sql);
        } else {
            $keys =array_keys($data);

            $sql = "INSERT INTO $this->table (`" . join("`,`", $keys) . "`) values('" . join("','", $data) . "');";
            echo $sql;
            return $this->pdo->exec($sql);
        }
    }
    function del($id)
    {
        $sql = "DELETE FROM $this->table WHERE ";
        if (is_array($id)) {
            $tmp =$this->array2sql($id);
            $sql .= join(" AND ", $tmp);
        } else {
            $sql .= "id='$id'";
        }

        return $this->pdo->exec($sql);
    }
    private function array2sql($array)
    {
        $tmp = [];
        foreach ($array as $key => $value) {
            $tmp[] = "`$key`='$value'";
        }

        return $tmp;
    }
}

$Item = new DB('items');
dd($Item->find(4));
echo "<hr>";
dd($Item->all());
echo "<hr>";
dd($Item->save(['id'=>'2','cost'=>'10']));
echo "<hr>";
dd($Item->save(['name'=>'紅茶','cost'=>'15','stock'=>'40','price'=>'50']));
echo "<hr>";
dd($Item->del(9));
echo "<hr>";

$Sales=new DB('sales');
dd($Sales->all());
