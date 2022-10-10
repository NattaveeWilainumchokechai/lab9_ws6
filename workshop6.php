<?php
$pdo = new PDO("mysql:host=localhost;dbname=blueshop;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

<html>
    <head>
        <meta charset="utf-8">
        <script>
            function confirmDelete(usn) { 
            var ans = confirm("ต้องการลบผู้ใช้ " + usn);
            if (ans==true)
            document.location = "delete-workshop6.php?username=" + usn;
            }
        </script>
    </head>
    <body>
        <?php
        $stmt = $pdo->prepare("SELECT * FROM member");
        $stmt->execute();
        while($row = $stmt->fetch()){ ?>
        ชื่อ : <?=$row["name"]?><br>
        ที่อยู่ : <br><?=$row["address"]?><br>
        อีเมล: <?=$row["email"]?><br>
        <a href="">แก้ไข</a> | 
        <a href="" onclick='confirmDelete("<?=$row["username"]?>")'>ลบ</a>
        <hr>
        <?php } ?>
    </body>
</html>