<?php include('auth/auth_session.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Tekifest</title>
    <link rel="shortcut icon" href="assets/images/logo.jpg">

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style_template.css">
    <link rel="stylesheet" href="assets/css/mods.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#"><h4>Tabla de pilotos</h4></a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <ul class="navbar-nav  mr-auto mt-2 mt-lg-0 ">
                    <li class="nav-link">
                        <a class="nav-link active" href="admin/panel.php">Panel Admin</a>
                    </li>
                    <li class="nav-link">
                        <a class="nav-link active" href="auth/logout.php">Cerrar Sesion</a>
                    </li>
                </ul>
            </form>
        </div>
    </nav>

    <div class="row justify-content-center">
        <div class="col-sm-2 col-md-6 ">
            <div class="logo">
                <img src="assets/images/logo.jpg" alt="" srcset="">
            </div>
        </div>
    </div>

    <div class="container">
        <div class="jumbotron">

            <div class="row">
                <div class="col-md-12 ">

                    <!-- Navbar para nombre de usuario y crear un nuevo piloto-->
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo04" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <a class="navbar-brand" href="#"><h6>Usuario: <?php echo $_SESSION['email'] ?> </h6></a>
                        <div class="collapse navbar-collapse" id="navbarTogglerDemo04">
                            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            </ul>
                            <form class="form-inline my-2 my-lg-0">
                                <ul class="navbar-nav  mr-auto mt-2 mt-lg-0 ">
                                    <li class="nav-link">
                                        <a class="nav-link active" href="admin/tracks.php">Tabla autodromos</a>
                                    </li>
                                      <li class="nav-link">
                                        <a class="nav-link active" href="admin/events.php">Agregar evento</a>
                                    </li>
                                </ul>
                                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0 btn-sm" type="submit">Buscar</button>
                            </form>
                        </div>
                    </nav>
                    <!--Fin de navbar-->

                    <div class="table-responsive mt-3">
                        <div id="target-content" >
                            <strong>loading...</strong>
                        </div>

                        <?php
                            include('server/connection.php'); 
                            $limit = 41;
                            $sql = "SELECT COUNT(id_pilot) FROM pilots";  
                            $rs_result = mysqli_query($db, $sql);  
                            $row = mysqli_fetch_row($rs_result);  
                            $total_records = $row[0];  
                            $total_pages = ceil($total_records / $limit); 
                        ?>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-9">
                    <div class="justify_content-center">
                        <div class="pagination btn-group mr-2" id="pagination" role="group" aria-label="Second group">
                            <?php 
                                if(!empty($total_pages)):for($i=1; $i<=$total_pages; $i++):  
                                if($i == 1):
                                ?>

                                <li class='active' id="<?php echo $i;?>">
                                    <a class="btn btn-secondary btn-sm ml-1" href='settings/view_slopes.php?page=<?php echo $i;?>'><?php echo $i;?></a>
                                </li> 
                                <?php else:?>
                                    <li id="<?php echo $i;?>">
                                        <a class="btn btn-secondary btn-sm ml-1" href='settings/view_slopes.php?page=<?php echo $i;?>'><?php echo $i;?></a>
                                    </li>
                                <?php endif;?>			
                            <?php endfor;endif;?>  
                        </div>
                    </div>                            
                </div>
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#target-content").load("settings/view_slopes.php?page=1");
                $("#pagination li").on('click',function(e){
                e.preventDefault();
                    $("#target-content").html('loading...');
                    $("#pagination li").removeClass('active');
                    $(this).addClass('active');
                    var pageNum = this.id;
                    $("#target-content").load("settings/view_slopes.php?page=" + pageNum);
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    
</body>
</html>