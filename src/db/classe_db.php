<?php

class Database
{

    function __construct()
    {
        $this->server = 'localhost';
        $this->user = 'root';
        $this->pass = '';
        $this->database = 'mmtech';
    }


    public function connect()
    {
        $this->link_id = $this->connect_db($this->server, $this->user, $this->pass);

        if (!$this->link_id)
            $this->error("<div style='text-align:center'>"
                . "<span style='padding: 5px; border: 1px solid #999; background-color:#EFEFEF;"
                . "font-family: Verdana; font-size: 11px; margin-left:auto; margin-right:auto'>"
                . "<b>Database Error:</b>Connection to Database " . $this->database . " Failed</span></div>");

        if (!$this->select_db($this->database, $this->link_id))
            $this->error("<div style='text-align:center'>"
                . "<span style='padding: 5px; border: 1px solid #999; background-color: #EFEFEF;"
                . "font-family: Verdana; font-size: 11px; margin-left:auto; margin-right:auto'>"
                . "<b>Database Error:</b>mySQL database (" . $this->database . ")cannot be used</span></div>");

        unset($this->password);
    }


    private function connect_db($server, $user, $pass)
    {
        return mysqli_connect($server, $user, $pass);
    }

    private function select_db($database, $link_id)
    {
        return mysqli_select_db($link_id, $database);
    }

    public function insert($table = null, $data)
    {
        global $core;
        if ($table === null or empty($data) or !is_array($data)) {
            $this->error("Invalid array for table: <b>" . $table . "</b>.");
            return false;
        }
        $q = "INSERT INTO `" . $table . "` ";
        $v = '';
        $k = '';

        foreach ($data as $key => $val) :
            $k .= "`$key`, ";
            if (strtolower($val) == 'null')
                $v .= "NULL, ";
            elseif (strtolower($val) == 'now()')
                $v .= "NOW(), ";
            elseif (strtolower($val) == 'tzdate')
                $v .= "DATE_ADD(NOW(),INTERVAL " . $core->timezone . " HOUR), ";
            else
                $v .= "'" . $val . "', ";
        endforeach;

        $q .= "(" . rtrim($k, ', ') . ") VALUES (" . rtrim($v, ', ') . ");";

        $_SESSION["sqlinsert"] = $q;
        if ($this->query($q)) {
            return $this->insertid();
        } else
            return false;
    }

    public function escape($string)
    {
        if (is_array($string)) {
            foreach ($string as $key => $value) :
                $string[$key] = $this->escape_($value);
            endforeach;
        } else
            $string = $this->escape_($string);

        return $string;
    }

    private function escape_($string)
    {
        return mysqli_real_escape_string($this->link_id, $string);
    }

    public function query($sql)
    {
        if (trim($sql != "")) {
            $this->query_id = mysqli_query($this->link_id, $sql);
            $this->last_query = $sql . '<br />';
        }

        if (!$this->query_id)
            $this->error("mySQL Error on Query : " . $sql);

        return $this->query_id;
    }

    public function insertid()
    {
        return mysqli_insert_id($this->link_id);
    }

    private function error($msg = '')
    {
        global $DEBUG, $_SERVER;
        if ($this->link_id > 0) {
            $this->error_desc = mysqli_error($this->link_id);
            $this->error_no = mysqli_errno($this->link_id);
        } else {
            $this->error_desc = mysqli_error();
            $this->error_no = mysqli_errno();
        }

        $the_error = "<div style=\"background-color:#FFF; border: 3px solid #999; padding:10px\">";
        $the_error .= "<b>mySQL WARNING!</b><br />";
        $the_error .= "DB Error: $msg <br /> More Information: <br />";
        $the_error .= "<ul>";
        $the_error .= "<li> Erro Mysql : " . $this->error_no . "</li>";
        $the_error .= "<li> Erro no Mysql # : " . $this->error_desc . "</li>";
        $the_error .= "<li> Data : " . date("F j, Y, g:i a") . "</li>";
        $the_error .= "<li> Referencia: " . isset($_SERVER['HTTP_REFERER']) . "</li>";
        $the_error .= "<li> Script : " . $_SERVER['REQUEST_URI'] . "</li>";
        $the_error .= '</ul>';
        $the_error .= '</div>';
        if ($DEBUG)
            echo $the_error;
        die();
    }

    public function first($string)
    {
        $query_id = $this->query($string);
        $record = $this->fetch($query_id);
        $this->free($query_id);

        return $record;
    }

    public function fetch($query_id, $type = false)
    {
        if ($query_id)
            $this->query_id = $query_id;

        if (isset($this->query_id)) {
            $record = mysqli_fetch_assoc($query_id);
        } else
            $this->error("Invalid query_id: <b>" . $this->query_id . "</b>. Records could not be fetched.");

        return $record;
    }
    private function free($query_id = -1)
    {
        if ($query_id)
            $this->query_id = $query_id;

        return mysqli_free_result($this->query_id);
    }

    public function fetch_all($sql)
    {
        $query_id = $this->query($sql);
        $record = array();

        while ($row = $this->fetch($query_id, $sql)) :
            $record[] = $row;
        endwhile;

        $this->free($query_id);

        return $record;
    }

    public function update($table = null, $data, $where)
    {
        global $core;
        if ($table === null or empty($data) or !is_array($data)) {
            $this->error("Invalid array for table: <b>" . $table . "</b>.");
            return false;
        }

        if ($where == null or empty($where)) {
            $this->error("Invalid where for table: <b>" . $where . "</b>.");
            return false;
        }

        $q = "UPDATE `" . $table . "` SET ";
        foreach ($data as $key => $val) :
            if (strtolower($val) == 'null')
                $q .= "`$key` = NULL, ";
            elseif (strtolower($val) == 'now()')
                $q .= "`$key` = NOW(), ";
            elseif (strtolower($val) == 'tzdate')
                $q .= "`$key` = DATE_ADD(NOW(),INTERVAL " . $core->timezone . " HOUR), ";
            elseif (strtolower($val) == 'default()')
                $q .= "`$key` = DEFAULT($val), ";
            elseif (preg_match("/^inc\((\-?\d+)\)$/i", $val, $m))
                $q .= "`$key` = `$key` + $m[1], ";
            else
                $q .= "`$key`='" . $this->escape($val) . "', ";
        endforeach;
        $q = rtrim($q, ', ') . ' WHERE ' . $where . ';';

        // $this->Logger("Atualização  :\r\n" . $q . "\r\n");
        return $this->query($q);
    }
}
