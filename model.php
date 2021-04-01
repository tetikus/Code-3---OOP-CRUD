<?php

class Model
{
    private $server = "localhost";
    private $username = "root";
    private $password;
    private $db = "crudsql";
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);
        } catch (Exception $e) {
            echo "Connection Failed" . $e->getMessage();
        }
    }

    public function insert()
    {
        if (isset($_POST['submit'])) {
            if (isset($_POST['author']) && isset($_POST['title']) && isset($_POST['genre'])) {
                if (!empty($_POST['author']) && !empty($_POST['title']) && !empty($_POST['genre'])) {

                    $author = $_POST['author'];
                    $title = $_POST['title'];
                    $genre = $_POST['genre'];

                    $query = "INSERT INTO book (author,title,genre) VALUES ('$author','$title','$genre')";

                    if ($sql = $this->conn->query($query)) {
                        echo "<script>alert('data recorded successfully!')</script>";
                        echo "<script>window.location.href = 'index.php'</script>";
                    } else {
                        echo "<script>alert('failed'); </script>";
                        echo "<script>window.location.href = 'index.php'</script>";
                    }
                } else {
                    echo "<script>alert('empty'); </script>";
                    echo "<script>window.location.href = 'index.php'</script>";
                }
            }
        }
    }

    public function fetch()
    {
        $data = null;
        $query = "SELECT * FROM book";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function delete($id)
    {
        $query = "DELETE FROM book WHERE id = '$id'";
        if ($sql = $this->conn->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function fetch_single($id)
    {
        $data = null;

        $query = "SELECT * FROM book WHERE id ='$id'";
        if ($sql = $this->conn->query($query)) {
            while ($row = $sql->fetch_assoc()) {
                $data = $row;
            }
        }
        return $data;
    }

    public function edit($id)
    {
        $data = null;
        $query = "SELECT * FROM book WHERE id ='$id'";
        if ($sql = $this->conn->query($query)) {
            while ($row = $sql->fetch_assoc()) {
                $data = $row;
            }
        }
        return $data;
    }

    public function update($data)
    {
        $query = "UPDATE book SET author='$data[author]', title='$data[title]', genre='$data[genre]' WHERE id='$data[id]'";
        if ($sql = $this->conn->query($query)) {
            return true;
        } else {
            return false;
        }
    }
}
