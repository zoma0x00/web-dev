<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <title>Admin Control Panal</title>

    <style>
        body{
            background-color:whitesmoke;
            font-family: 'Montserrat', sans-serif;
        }
        #mother{
            width:20px;
            font-size: 20px;
        }
        main{
            float:left;
            border:1px solid gray;
            
        }
        input{
            padding:4px;
            border:5px solid black;
            text-align:center;
            font-size:20px;
            font-family:"Tajawal" , sans-serif;
        }
        aside{
            text-align:center;
            width:300px;
            float:left;
            border:1px solid black;
            padding:10px;
            font-size:20px;
            background-color:silver;
            color:white;
        }
        #tbl{
            width: 890px; 
            font-size:20px;

        }
        #tbl th{
            background-color: silver;
            color:black20px;
            padding:10px;

        }
    </style>
</head>
<body>
   <div id="mother">
    <?php 
    //Connect to database
    $host="127.0.0.1" ;
    $user="root" ;
    $passwd="" ;
    $db="student" ;

    $fetch= mysqli_connect($host, $user, $passwd, $db);
    $res=mysqli_query($fetch, "SELECT * FROM STUDENT");
    //Button variable --
    $id="" ;
    $name="" ;
    $address="";
    
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    }
    if (isset($_POST['address'])) {
        $sqls = "INSERT INTO STUDENT VALUE($id, '$name', '$address')" ;
        mysqli_query($fetch, $sqls) ;
        header("location: index.php");
    }
    if (isset($_POST['remove'])) {
        $sqls = "DELETE FROM STUDENT WHERE NAME='$name'" ;
        mysqli_query($fetch, $sqls) ;
        header("location: index.php");
    }

    $sqls="";

    if (isset($_POST['add'])) {
        $id = $_POST['id'];
    }
    ?>
        <form action="" method="POST">
            <!--Control Panal-->
            <aside>
                <div id="div">
                    <img src="https://www.flaticon.com/free-icon/student_5850276" alt="Logo">
                    <h3>Admin Panal</h3> 

                    <label>Student ID :</label><br>
                    <input type="text" name="id" id="id"><br>

                    <label>Student Name :</label><br>
                    <input type="text" name="name" id="name"><br>

                    <label>Student Adress :</label><br>
                    <input type="text" name="address" id="address"><br><br>
                    
                    <button name="add">Add Student</button>
                    <button name="remove">Remove Student</button>
                    

                </div>
            </aside>
            

            <!--Control Panal-->
            <main>
           
                <table id="tbl">
                    <tr>
                        <th>Student ID</th>
                        <th>Sudent Name</th>
                        <th>Student Address</th>
                    </tr>
                    <?php 
                    while ($row =mysqli_fetch_array($res)){
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>" ;
                        echo "<td>" . $row['name'] . "</td>" ;
                        echo "<td>" . $row['address'] . "</td>" ;
                        echo "<tr>";
                    }

                    ?> 
                </table>
            </main>
        </form>
   </div> 
</body>
</html>
