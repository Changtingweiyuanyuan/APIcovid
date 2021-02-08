<?php 
date_default_timezone_set("Asia/Taipei");
session_start();

// $Mem = new DB('covid_mem');
$Total = new DB('covid_total');
$News = new DB('covid_news');
$Log = new DB('covid_log');
$Marquee = new DB('covid_marquee');
$Info = new DB('covid_info');
$Login = new DB('covid_login');



Class DB{
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=covid";
    protected $table = "";
    protected $pdo = "";
    protected $user = "root";
    protected $pw = "";

    function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn,$this->user,$this->pw);
    }

function all(...$arg){
    $sql = "select * from $this->table ";
    if(isset($arg[0])){
        if(is_array($arg[0])){
            foreach($arg[0] as $k => $v){
                $tmp[] = sprintf("`%s`='%s'", $k, $v);
            }
            $sql .= " where ".implode(" && ", $tmp);
        }else{
            $sql .= $arg[0];
        }
    }
    if(isset($arg[1])){
        $sql .= $arg[1];
    }
    // echo $sql;
    return $this->pdo->query($sql)->fetchAll();
}

function count(...$arg){
    $sql = "select count(*) from $this->table ";
    if(isset($arg[0])){
        if(is_array($arg[0])){
            foreach($arg[0] as $k => $v){
                $tmp[] = sprintf("`%s`='%s'", $k, $v);
            }
            $sql .= " where ".implode(" && ", $tmp);
        }else{
            $sql .= $sql[0];
        }
    }
    if(isset($arg[1])){
        $sql .= $arg[1];
    }
    return $this->pdo->query($sql)->fetchColumn();
}

function find($arg){
    $sql = "select * from $this->table ";
    if(is_array($arg)){
        foreach($arg as $k => $v){
            $tmp[] = sprintf("`%s`='%s'", $k, $v);
        }
        $sql .= " where ".implode(" && ", $tmp);
    }else{
        $sql .= " where `id`='$arg'";
    }
    // echo $sql;
    return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
}

function del($arg){
    $sql ="delete from $this->table ";
    if(is_array($arg)){
        foreach($arg as $k => $v){
            $tmp[] = sprintf("`%s`='%s'", $k, $v);
        }
        $sql .= " where ".implode(" && ", $tmp);
    }else{
        $sql .= " where `id`='$arg'";
    }
    // echo $sql;
    return $this->pdo->exec($sql);
}

function save($arg){
    //update $this->table set ``='',``=''
    if(isset($arg['id'])){
        if(is_array($arg)){
            foreach($arg as $k => $v){
                $tmp[] = sprintf("`%s`='%s'", $k, $v);
            }
            $sql = "update $this->table set ".implode(" , ",$tmp)." where `id`='".$arg['id']."'";
        }
    //insert into (``,``,``) values ('','','')
    }else{
        $sql ="insert into $this->table (`".implode("`,`", array_keys($arg))."`) values ('".implode("','", $arg)."')";
    }
    // echo $sql;
    return $this->pdo->exec($sql);
}

function q($arg){
    // $sql = "select * from $this->table ";
    // $sql .= $arg;
    return $this->pdo->query($arg)->fetchAll();
}


}

function to($url){
    header("location:".$url);
}


?>