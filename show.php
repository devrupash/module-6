<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
    <style>
        img{
            max-width: 100px;
        }
    </style>
</head>
<body>
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Profile Picture</th>
                        </tr>
					    <?php
                        if (($handle = fopen("users.csv", "r")) !== FALSE) {
                            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                                echo "<tr>";
                                echo "<td>{$data[0]}</td>";
                                echo "<td>{$data[1]}</td>";
                                echo "<td><img src=\"uploads/{$data[2]}\"></td>";
                                echo "</tr>";
                            }
                            fclose($handle);
                        }
					    ?>
                    </table>
                </div>
            </div>
            <div class="row">
                <a href="http://localhost/module-6" class="backtohome">Add another one</a>
            </div>
        </div>
    </section>
</body>
</html>