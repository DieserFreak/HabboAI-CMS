<?php

/* mCMS
 * A first CMS by Micki 
 * -------------------------
 * Copyright (C) by Micki
 * Copyright reserved!
 *
 */
 
// MySQL Daten
$_CONFIG['mysqli']['mysql_ip'] = "localhost";
$_CONFIG['mysqli']['mysql_user'] = "root";
$_CONFIG['mysqli']['mysql_pass'] = "asdfasdf";
$_CONFIG['mysqli']['mysql_db'] = "habbo";
$_CONFIG['mysqli']['mysql_port'] = "3306";

$mysqli = new mysqli(
	$_CONFIG['mysqli']['mysql_ip'], 
	$_CONFIG['mysqli']['mysql_user'], 
	$_CONFIG['mysqli']['mysql_pass'], 
	$_CONFIG['mysqli']['mysql_db'],
	$_CONFIG['mysqli']['mysql_port']	
);

if ($mysqli->connect_errno) {
	include("/update.php");
	exit;
}

function dbSelect($select_column, $table_name, $where_clause='')
{
	global $mysqli;
	
    $whereSQL = '';
    if(!empty($where_clause))
    {
        if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
        {
            $whereSQL = " WHERE ".$where_clause;
        } else
        {
            $whereSQL = " ".trim($where_clause);
        }
    }

    $sql = "SELECT ".$select_column." FROM ".$table_name.$whereSQL;

	$query = $mysqli->query($sql);
	if($mysqli->error){
		exit( $mysqli->error );
	}
	
    return $query;
}

function dbSelectS($select_column, $table_name, $order_clause='')
{
	global $mysqli;
	
    $whereSQL = '';
    if(!empty($$order_clause))
    {
        if(substr(strtoupper(trim($$order_clause)), 0, 5) != 'ORDER')
        {
            $whereSQL = " ORDER ".$$order_clause;
        } else
        {
            $whereSQL = " ".trim($$order_clause);
        }
    }

    $sql = "SELECT ".$select_column." FROM ".$table_name.$whereSQL;

	$query = $mysqli->query($sql);
	if($mysqli->error){
		exit( $mysqli->error );
	}
	
    return $query;
}

function dbSelectNumRows($select_column, $table_name, $where_clause='')
{
	global $mysqli;
	
    $whereSQL = '';
    if(!empty($where_clause))
    {
        if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
        {
            $whereSQL = " WHERE ".$where_clause;
        } else
        {
            $whereSQL = " ".trim($where_clause);
        }
    }

    $sql = "SELECT ".$select_column." FROM ".$table_name.$whereSQL;

	$query = $mysqli->query($sql);
	if($mysqli->error){
		exit( $mysqli->error );
	}
    return $query->num_rows;
}

function dbSelectNumRowsS($select_column, $table_name)
{
	global $mysqli;
	
    $sql = "SELECT ".$select_column." FROM ".$table_name;

	$query = $mysqli->query($sql);
	if($mysqli->error){
		exit( $mysqli->error );
	}
    return $query->num_rows;
}

function dbInsert($table_name, $form_data)
{
	global $mysqli;
    $fields = array_keys($form_data);

    $sql = "INSERT INTO ".$table_name."
    (`".implode('`,`', $fields)."`)	    VALUES('".implode("','", $form_data)."')";

	$query = $mysqli->query($sql);
	if($mysqli->error){
		exit( $mysqli->error );
	}
    return $query;
}

function dbUpdate($table_name, $form_data, $where_clause='')
{
	global $mysqli;
	
    $whereSQL = '';
    if(!empty($where_clause))
    {
        if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
        {
            $whereSQL = " WHERE ".$where_clause;
        } else
        {
            $whereSQL = " ".trim($where_clause);
        }
    }
    $sql = "UPDATE ".$table_name." SET ";

    $sets = array();
    foreach($form_data as $column => $value)
    {
         $sets[] = "`".$column."` = '".$value."'";
    }
    $sql .= implode(', ', $sets);
    $sql .= $whereSQL;
	
	$query = $mysqli->query($sql);
	if($mysqli->error){
		exit( $mysqli->error );
	}
    return $query;
}

function dbDelete($table_name, $where_clause='')
{
	global $mysqli;
	
    $whereSQL = '';
    if(!empty($where_clause))
    {
        if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
        {
            $whereSQL = " WHERE ".$where_clause;
        } else
        {
            $whereSQL = " ".trim($where_clause);
        }
    }
    $sql = "DELETE FROM ".$table_name.$whereSQL;

	$query = $mysqli->query($sql);
	if($mysqli->error){
		exit( $mysqli->error );
	}
    return $query;
}
?>