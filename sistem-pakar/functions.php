<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$conn = mysqli_connect("localhost", "root", "", "sistem_pakar_cf");

class DB
{
    private $conn;

    function __construct($conn)
    {
        $this->conn = $conn;
    }

    function get_results($query)
    {
        $res = mysqli_query($this->conn, $query);
        $rows = [];
        while ($row = mysqli_fetch_object($res)) {
            $rows[] = $row;
        }
        return $rows;
    }

    function get_row($query)
    {
        $res = mysqli_query($this->conn, $query);
        return mysqli_fetch_object($res);
    }

    function query($query)
    {
        return mysqli_query($this->conn, $query);
    }
}

$db = new DB($conn);

function esc_field($str)
{
    return htmlspecialchars($str);
}

function redirect_js($url)
{
    echo "<script>location.href='$url'</script>";
}

function print_msg($msg)
{
    echo "<p>$msg</p>";
}
?>