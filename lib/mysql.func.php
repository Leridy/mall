<?php
/**
 * 与数据库相关的文件
 */


/**
 * 连接数据库
 * @return mysqli
 */
function connect(){
    $link=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME) or die("数据库连接失败Error:".mysqli_errno($link).":".mysqli_error($link));
    mysqli_set_charset($link, 'utf8');
    return $link;
}

/**
 * 完成记录插入的操作
 * @param string $table
 * @param array $array
 * @return number
 */
function insert($table,$array){
    $keys=join(",",array_keys($array));
    $vals="'".join("','",array_values($array))."'";
    $sql="insert {$table}($keys) values({$vals})";
    $link=connect();
    mysqli_query($link,$sql);
    return mysqli_insert_id($link);
}

/**
 * 记录的更新操作
 * @param string $table
 * @param array $array
 * @param string $where
 * @return number
 */
function update($table,$array,$where=null){
    $str=null;
    foreach($array as $key=>$val){
        if($str==null){
            $sep="";
        }else{
            $sep=",";
        }
        $str.=$sep.$key."='".$val."'";
    }
    $sql="update {$table} set {$str} ".($where==null?null:" where ".$where);
    $result=mysql_query($sql);
    //var_dump($result);
    //var_dump(mysql_affected_rows());exit;
    if($result){
        return mysql_affected_rows();
    }else{
        return false;
    }
}

/**
 *	删除记录
 * @param string $table
 * @param string $where
 * @return number
 */
function delete($table,$where=null){
    $where=$where==null?null:" where ".$where;
    $sql="delete from {$table} {$where}";
    $link = connect();
    mysqli_query($link, $sql);
    return mysqli_affected_rows($link);
}

/**
 * 得到指定一条记录
 * @param string $sql
 * @param int $result_type
 * @return array
 */
function fetchOne($sql,$result_type=MYSQL_ASSOC){
    $link=connect();
    $result=mysqli_query($link,$sql);
    return $result==false||true? array():mysqli_fetch_array($result,$result_type);
}


/**
 * 得到结果集中所有记录 ...
 * @param string $sql
 * @param int $result_type
 * @return array:
 */
function fetchAll($sql,$result_type=MYSQL_ASSOC){
    $link=connect();
    $result=mysqli_query($link, $sql);
    $rows[]=array();
    while($row=mysqli_fetch_array($result,$result_type)){
        $rows[]=$row;
    }
    array_shift($rows);
    return $rows;
}

/**
 * 得到结果集中的记录条数
 * @param string $sql
 * @return number
 */
function getResultNum($sql){
    $link=connect();
    $result=mysqli_query($link, $sql);
    return mysql_num_rows($result);
}

/**
 * 得到上一步插入记录的ID号
 * @return number
 */
function getInsertId(){
    $link=connect();
    return mysqli_insert_id($link);
}

