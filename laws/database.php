<?php

 class database
{
    public $connection;

    // public $table="users";
    public function __construct()
    {
        $this->connect();
    }

    public function connect()
    {
        try {
            $this->connection = new PDO('mysql:host=localhost;dbname=project', 'root', '');
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function fetchdata($tables)
    {
        $stat = $this->connection->prepare("select * from  $tables");
        $stat->execute();
        $result = $stat->fetchAll();
        return $result;

    }

    public function insertdata($table, $parameters)
    {
        $sql = sprintf("insert into %s (%s)values (%s)",
            $table,
            implode(",", array_keys($parameters)),
            ":" . implode(",:", array_keys($parameters))
        );
        try {

            $stmt = $this->connection->prepare($sql);
            $stmt->execute($parameters);
        } catch (Exception $e) {
            die($e->getMessage());
        }

    }

    function delete($table, $value)
    {
        $sql2 = sprintf("delete * from %s where %s = %s",
            $table,
            implode(",", array_keys($value)),
            ":" . implode(",:", array_keys($value))
        );
        try {
            $stmt = $this->connection->prepare($sql2);
            $stmt->execute($value);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function update($table, $post)
    {
        try {
            $stmt = $this->connection->prepare("update $table set name=:name,sname=:sname,no=:no where id=:id");
            $stmt->execute($post);

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function update_law($table, $post)
    {
        try {
            $stmt = $this->connection->prepare("update $table set lawyer=:lawyer where id=:id ");
            $stmt->execute($post);

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    function update_profile($table, $post)
    {
        try {
            $stmt = $this->connection->prepare("update $table set image=:image where username=:username ");
            $stmt->execute($post);

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    function recent_post($table)
    {
        try {
            $stmt = $this->connection->prepare("select * from $table order by id desc LIMIT 0,3");
            $stmt->execute();
            $result = $stmt->fetchall();
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    function login($table, $post)
    {
        try {
            $stmt = $this->connection->prepare("select * from $table where username=:username and password=:password and approve='true'");
            $stmt->execute($post);
//            $result = $stmt->rowCount();
            $result = $stmt->fetchall();
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    function fetch_comment_user($table, $post)
    {
        try {
            $stmt = $this->connection->prepare("select * from $table where username=:username");
            $stmt->execute($post);
            $result = $stmt->fetchall();
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function admin_login($table, $post)
    {
        try {
            $stmt = $this->connection->prepare("select * from $table where username=:username and password=:password");
            $stmt->execute($post);
            $result = $stmt->fetchall();
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function fullblog($table, $post)
    {
        try {
            $stmt = $this->connection->prepare("select * from $table where id=:id");
            $stmt->execute($post);
            $result = $stmt->fetchall();
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function search($table, $post)
    {
        try {
            $stmt = $this->connection->prepare("select * from $table where title like :search or post like :search;");
            $stmt->execute($post);
            $result = $stmt->fetchall();
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function fetch_case($table, $post)
    {
        try {
            $stmt = $this->connection->prepare("select * from $table where lawyer like :username;");
            $stmt->execute($post);
            $result = $stmt->fetchall();
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function fetch_new($table, $post)
    {
        try {
            $stmt = $this->connection->prepare("select * from $table where lawyer like :username and sign ='false';");
            $stmt->execute($post);
            $result = $stmt->rowcount();
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function fetch_comments($table, $post)
    {
        try {
            $stmt = $this->connection->prepare("select * from $table where bindex=:id;");
            $stmt->execute($post);
            $result = $stmt->fetchall();
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    function fetch_profile($table, $post)
    {
        try {
            $stmt = $this->connection->prepare("select * from $table where username=:username;");
            $stmt->execute($post);
            $result = $stmt->fetchall();
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function admin_delete($table, $post)
    {
        try {
            $stmt = $this->connection->prepare("delete from $table where id=:id;");
            $stmt->execute($post);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function approve($table, $post)
    {
        try {
            $stmt = $this->connection->prepare("update $table set approve=:approve where id=:id");
            $stmt->execute($post);

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function fetch_approve($table)
    {
        try {
            $stmt = $this->connection->prepare("select * from $table where approve='true'");
            $stmt->execute();
//            $result = $stmt->rowCount();
            $result = $stmt->fetchall();
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function insert_sign($table, $post)
    {
        try {
            $stmt = $this->connection->prepare("update $table set sign = :sign where id=:id");
            $stmt->execute($post);

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function admin_read($table, $data)
    {
        try {

            $stmt = $this->connection->prepare("select * from $table where id = :id");
            $stmt->execute($data);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


}

$dbcon = new database();


