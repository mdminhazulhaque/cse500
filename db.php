<?php

$mysqli = new mysqli(db_host,
                     db_user,
                     db_password,
                     db_name);

function db_init()
{
    global $mysqli;
    if($mysqli)
        return true;
    else
        return false;
}

function db_query($query)
{
    global $mysqli;
    $result = $mysqli->query($query);
    for($return_array=array(); $tmp=$result->fetch_array(MYSQLI_ASSOC);)
        $return_array[] = $tmp;
    return $return_array;
}

function db_exec_only($query)
{
    global $mysqli;
    $stmt = $mysqli->prepare($query);
    return $stmt->execute();
}

function db_select($table, $params = '*')
{
    return db_query('select ' . $params . ' from ' . $table);
}

function db_select_where($table, $params = '*', $where = '1=1')
{
    return db_query('select ' . $params . ' from ' . $table . ' where ' . $where);
}

function db_insert($query)
{
    global $mysqli;
    return $mysqli->real_query($query);
}

function db_close()
{
    global $mysqli;
    $mysqli->close();
}

