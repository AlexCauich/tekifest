<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>name pilot</th>
            <th>category</th>
            <th>lap time</th>
            <th>lap</th>
            
        </tr>
        <tbody>
            <?php 
            include('server/data_p.php');
            while($row = mysqli_fetch_array($result)){
            ?>
                <tr>
                    <td><?php echo $row['name_pilot']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td><?php echo $row['lap_time']; ?></td>
                    <td><?php echo $row['lap']; ?></td>
                </tr>
            <?php } ?>

            <?php 
            include('server/data_p.php');
            while($row = mysqli_fetch_array($r_result)){
            ?>
                <tr>
                    <td><?php echo $row['name_pilot']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td><?php echo $row['lap_time']; ?></td>
                    <td><?php echo $row['lap']; ?></td>
                </tr>
            <?php } ?>

            <?php 
            include('server/data_p.php');
            while($row = mysqli_fetch_array($r_result1)){
            ?>
                <tr>
                    <td><?php echo $row['name_pilot']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td><?php echo $row['lap_time']; ?></td>
                    <td><?php echo $row['lap']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>