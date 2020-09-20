<?php
include('../server/connection.php');
 
$limit = 100;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  
  
$sql = "SELECT * FROM pilots ORDER BY name_pilot ASC LIMIT $start_from, $limit";  
$rs_result = mysqli_query($db, $sql);  
?>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID tag</th>
                <th>Nombre del piloto</th>
                <th>Categoria</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th width="50px">Herramientas</th>

            </tr>
        </thead>
        <tbody>
            <?php 
                while($data = mysqli_fetch_array($rs_result)) {
            ?>
            <tr>
                <td><?php echo $data['id_tag']; ?></td>
                <td><?php echo $data['name_pilot']; ?></td>
                <td><?php echo $data['category']; ?></td>
                <td><?php echo $data['brand']; ?></td>
                <td><?php echo $data['model']; ?></td>

                <td>
                    <div class="form-group">
                        <a class="btn-sm btn btn-warning mt-1" href="settings/tools/edit_records.php?id_pilot=<?php echo $data['id_pilot']; ?>">
                            <img src="./Budget/svg/edit.svg" title="Editar" alt="">
                        </a>
                        <a class="btn-sm btn btn-success mt-1" href="settings/tools/s_records.php?id_pilot=<?php echo $data['id_pilot']; ?>">
                            <img src="./Budget/svg/check-circle.svg"/>
                        </a>
                    </div>
                </td>
            </tr>
        </tbody>
        <?php } ?>
    </table>


