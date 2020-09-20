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
    <link rel="stylesheet" href="assets/css/modes.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#"><h4>Tekifest</h4></a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <ul class="navbar-nav  mr-auto mt-2 mt-lg-0 ">
                    <li class="nav-link">
                        <a class="nav-link active" href="nav/Contacto.html">Contacto</a>
                    </li>
                    <li class="nav-link">
                        <a class="nav-link active" href="nav/TekifestVirtual.html">Tekifest Virtual</a>
                    </li>
                    <li class="nav-link">
                        <a class="nav-link active" href="nav/Reglamento TEKIFEST v-1.5.pdf">Reglamento</a>
                    </li>
                    <li class="nav-link">
                        <a type="button" class="nav-link active" data-toggle="modal" data-target="#exampleModal">
                            Settings
                        </a>                  
                    </li>
                </ul>
            </form>
        </div>
    </nav>

    <!--Modal-->
    <div id="App" >
        <!-- Modal Register -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="form-content" class="modal-content">
                    <div class="modal-header ">
                        <h5 class="modal-title" id="exampleModalLabel">Tekifest</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modalimg form-group">
                            <img src="assets/images/logo.jpg" alt="" srcset="">
                        </div>
                        <label for="email">Username or Email</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <img src="Budget/svg/user.svg" class="input-group-text" id="basic-addon1"/>
                            </div>  
                            <input type="text" class="form-control" name="username" id="username" placeholder="Example@exam.com" required aria-label="email" aria-describedby="basic-addon1" >  
                        </div>
                        <div class="form-group">
                            <label for="email">Password</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <img src="Budget/svg/eye.svg" type="button" class="input-group-text" id="mostrar_contrasena"/>
                                </div>  
                                <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" required aria-label="email" aria-describedby="basic-addon1" require>  
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="login" class="btn btn-success">Log In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--end modal--> 
    </div>
    <!--Fin Modal-->

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-sm-2 col-md-6 col-lg-12">
                <div class="logo">
                    <img src="assets/images/logo.jpg" alt="" srcset="">
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                
                <div class="pos-f-t">
                    <div class="collapse" id="navbarToggleExternalContent">
                        <div class="bg-light p-4">
                            
                            <form  action="index.php" method="post">
                                <h5 class="text-dark h4">Consultas</h5>
                                <span class="text-dark">Fecha del evento</span>
                                <!--Select event date-->
                                <div class="form-group">
                                    <select class="myselect form-control" name="event_date">
                                        <?php 
                                            include('server/queries.php');
                                            while($row = mysqli_fetch_array($result)){
                                        ?>  
                                            <option class="dropdown-item" data-url="event_date" value="<?php echo $row['event_date']; ?>">
                                                <?php echo $row['id_track']; ?>  <?php echo $row['event_date']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <!--FIN select-->  
                                <!--Queries-->          
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success btn-block btn-sm" value="Vuelta mas Rapida por Piloto por Evento" name="vrpe" data-toggle="tooltip" data-placement="bottom" title="Select event date "/>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success btn-block btn-sm" value="Vueltas por Piloto por Evento" name="vpe" data-toggle="tooltip" data-placement="bottom" title="Select event date "/>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success btn-block btn-sm" value="Vuelta mas Rapida por categoria" name="vrpce"/>                   
                                </div>
                                    
                                <!--FIN Queries-->  
                            </form>

                        </div>
                    </div>
                    <nav class="navbar navbar-light bg-light">
                        <h6 class="text-dark h6">Estadisticas por evento</h6>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </nav>
                </div>
                
            </div>

            <div class="sec2 col-md-6">
                <!--Start-->
                <div class="pos-f-t">
                    <div class="collapse" id="navbarToggleExternalContent1">
                        <div class="bg-light p-4">
                        <h5 class="text-dark h4">Consultas</h5>
                            
                            <form action="index.php" method="post">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success btn-block btn-sm" value="Vueltas mas Rapidas por Autodromo" name="vre" />
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success btn-block btn-sm" value="Vueltas mas Rapidas" name="vrpte" />
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success btn-block btn-sm" value="Vueltas mas rapidas de cada piloto" name="m" />  
                                </div>
                                
                            </form>
                                
                        </div>
                    </div>
                    <nav class="navbar navbar-light bg-light">
                        <h6 class="text-dark h6">Estadisticas globales</h6>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent1" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </nav>
                </div>                                            
                <!--End-->

            </div>
        </div>

        <div class="jumbotron mt-2">
            <div class="col-md-12 col-sm-6">
                <div class="table-responsive">
                    
                    <!-- vueltas piloto por evento -->
                    <?php 
                    include('server/connection.php');
                    if(isset($_POST['vpe'])){
                        
                        $event_date = $_POST['event_date']; 
                                        
                        $query = "SELECT records.id_pilot, P.name_pilot, P.category, P.model, P.brand FROM records INNER JOIN pilots P ON records.id_pilot = P.id_pilot WHERE records.event_date = '$event_date' GROUP BY records.id_pilot ORDER BY P.category, records.lap_time ASC";
                        $result = mysqli_query($db, $query);
                    
                        if(!$result){
                            die("Query error");
                        }

                        $sql = "SELECT id_track FROM records WHERE event_date = '$event_date' LIMIT 1";
                        $r_result = mysqli_query($db, $sql);
                        while($data = mysqli_fetch_array($r_result)){ 

                    ?>
                        <div class="form-group mt-3">
                            <p> <strong> Track :  </strong> <?php echo $data['id_track']; ?> </p>
                        </div>
                    <?php } ?>

                    <table class="table table-striped table-bordered">
                        <thead class="bordere">
                            <tr>
                                <th>Name pilot</th>
                                <th>Category</th>
                                <th>Pilot Record</th>
                                <th>Brand</th>
                                <th>Model</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_array($result)){ ?>
                            <tr>
                                <td width="180px"><?php echo $row['name_pilot']; ?></td>
                                <td width="180px"><?php echo $row['category']; ?></td>
                                <td width="180px">
                                    <a href="show_records.php?id_pilot=<?php echo $row['id_pilot']; ?>" class="btn btn-info">
                                        Pilot Records
                                    </a>
                                </td>
                                <td><?php echo $row['brand']; ?></td>
                                <td><?php echo $row['model']; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <?php } ?>
                <!-- Fin vueltas piloto por evento -->
                
                <!-- vuelta mas rapida piloto por evento -->
                <?php 
                    include('server/connection.php');
                    if(isset($_POST['vrpe'])){

                        $event_date = $_POST['event_date']; 
                        
                        $query = "SELECT P.name_pilot, P.category, lap, lap_time, P.model, P.brand FROM records INNER JOIN pilots P ON records.id_pilot = P.id_pilot WHERE lap_time = ANY (SELECT MIN(lap_time) FROM records WHERE lap_time > '00.01:00.00' GROUP BY records.id_pilot ) AND event_date = '$event_date' ORDER BY lap_time ASC";
                        $result = mysqli_query($db, $query);
                    
                        if(!$result){ 
                            die("Query error");
                        }
                        $sql = "SELECT id_track FROM records WHERE event_date = '$event_date' LIMIT 1";
                        $r_result = mysqli_query($db, $sql);
                        while($data = mysqli_fetch_array($r_result)){ 

                    ?>
                        <div class="form-group">
                            <p> <strong> Track :  </strong> <?php echo $data['id_track']; ?> </p>
                        </div>
                    <?php } ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name pilot</th>
                                <th>Category</th>
                                <th>Lap</th>
                                <th>Lap time</th>
                                <th>Brand</th>
                                <th>Model</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_array($result)){ ?>
                            <tr>
                                <td width="210px"><?php echo $row['name_pilot']; ?></td>
                                <td><?php echo $row['category']; ?></td>
                                <td><?php echo $row['lap']; ?></td>
                                <td><?php echo $row['lap_time']; ?></td>
                                <td><?php echo $row['brand']; ?></td>
                                <td><?php echo $row['model']; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } ?>
                <!-- vuelta mas rapida piloto por evento -->
                
                <!-- vuelta mas rapida piloto por categoria -->
                <?php 
                    include('server/connection.php');
                    if(isset($_POST['vrpce'])){

                        $event_date = $_POST['event_date'];
                        //selecciona el nivel mas alto
                        $query = "SELECT P.category, lap, P.name_pilot, event_date, lap_time, P.model, P.brand FROM records 
                                    INNER JOIN pilots P ON records.id_pilot = P.id_pilot WHERE lap_time = ANY(SELECT MIN(lap_time) FROM records 
                                    WHERE event_date = '$event_date' AND lap_time > '00.00:00.000' GROUP BY id_pilot)AND P.category = 'NEGRA' ";
                        $result = mysqli_query($db, $query);

                        if(!$result) {
                            die("Query Failed black");
                        }
                        
                        //selecciona el nivel Intermedio 
                        $query_blue = "SELECT P.category, lap, P.name_pilot, event_date, lap_time, P.model, P.brand FROM records 
                                INNER JOIN pilots P ON records.id_pilot = P.id_pilot WHERE lap_time = ANY(SELECT MIN(lap_time) FROM records 
                                WHERE event_date = '$event_date' AND lap_time > '00.00:00.000' GROUP BY id_pilot)AND P.category = 'AZUL' ";
                        $result_blue = mysqli_query($db, $query_blue);

                        if(!$result_blue) {
                            die("Query Failed");
                        }
                    
                        //selecciona el nivel Bajo
                        $green = "SELECT P.category, lap, P.name_pilot, event_date, lap_time, P.model, P.brand FROM records 
                                    INNER JOIN pilots P ON records.id_pilot = P.id_pilot WHERE lap_time = ANY(SELECT MIN(lap_time) FROM records 
                                    WHERE event_date = '$event_date' AND lap_time > '00.00:00.000' GROUP BY id_pilot)AND P.category = 'VERDE' ";
                        $r_result1 = mysqli_query($db, $green);

                        if(!$r_result1) {
                            die("Query Failed green");
                        }
                        //selecciona el autodromo
                        $sql = "SELECT id_track FROM records WHERE event_date = '$event_date' LIMIT 1";
                        $r_result = mysqli_query($db, $sql);
                        while($data = mysqli_fetch_array($r_result)){ 

                    ?>
                        <div class="form-group">
                            <p> <strong> Track :  </strong> <?php echo $data['id_track']; ?> </p>
                        </div>
                    <?php } ?>
                    
                    <table class="table table-striped ">
                        <thead>
                            <tr>
                                <th>Name pilot</th>
                                <th>Category</th>
                                <th>Lap</th>
                                <th>Lap time</th>
                                <th>Brand</th>
                                <th>Model</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            while($row = mysqli_fetch_array($result)){
                            ?>
                                <tr>
                                    <td><?php echo $row['name_pilot']; ?></td>
                                    <td><?php echo $row['category']; ?></td>
                                    <td><?php echo $row['lap_time']; ?></td>
                                    <td><?php echo $row['lap']; ?></td>
                                    <td><?php echo $row['brand']; ?></td>
                                    <td><?php echo $row['model']; ?></td>
                                </tr>
                            <?php } ?>

                            <?php 
                            while($row = mysqli_fetch_array($result_blue)){
                            ?>
                                <tr>
                                    <td><?php echo $row['name_pilot']; ?></td>
                                    <td><?php echo $row['category']; ?></td>
                                    <td><?php echo $row['lap_time']; ?></td>
                                    <td><?php echo $row['lap']; ?></td>
                                    <td><?php echo $row['brand']; ?></td>
                                    <td><?php echo $row['model']; ?></td>
                                </tr>
                            <?php } ?>

                            <?php 
                            while($row = mysqli_fetch_array($r_result1)){
                            ?>
                                <tr>
                                    <td><?php echo $row['name_pilot']; ?></td>
                                    <td><?php echo $row['category']; ?></td>
                                    <td><?php echo $row['lap_time']; ?></td>
                                    <td><?php echo $row['lap']; ?></td>
                                    <td><?php echo $row['brand']; ?></td>
                                    <td><?php echo $row['model']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    
                <?php } ?>
                <!-- Fin vuelta mas rapida piloto por categoria -->


                <!-- Consultas globales -->
                <?php 
                include('server/connection.php');
                if(isset($_POST['vre'])){

                    
                    $query = "SELECT name_track FROM tracks";
                    $result = mysqli_query($db, $query);
                
                    if(!$result){
                        die("Query error");
                    }

                    ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Tracks</th>
                                <th>Records</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_array($result)){ ?>
                            <tr>
                                <td width="210px"><?php echo $row['name_track']; ?></td>
                                <td width="210px">
                                    <a href="vre.php?name_track=<?php echo $row['name_track']; ?>" class="btn btn-info">
                                        Records
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } ?>


                <?php 
                include('server/connection.php');
                if(isset($_POST['vrpte'])){

                    
                    $query = "SELECT P.name_pilot, P.category, lap_time, lap, brand, model, T.name_track, event_date FROM records 
                    INNER JOIN pilots P ON records.id_pilot = P.id_pilot
                    INNER JOIN tracks T ON records.id_track = T.name_track
                    WHERE lap_time = ANY(SELECT MIN(lap_time) FROM records WHERE lap_time > '00:00.000' GROUP BY event_date) ORDER BY event_date ASC";
                    $result = mysqli_query($db, $query);
                    
                   if(!$result){
                       die("Query name track failed");
                   }            
                ?>
                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th>Name pilot</th>
                            <th>Category</th>
                            <th>Lap</th>
                            <th>Lap time</th>
                            <th>Brand</th>
                            <th>Model</th>
                            <th>Track</th>
                            <th>Event Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        while($row = mysqli_fetch_array($result)){
                    ?>

                        <tr>
                            <td><?php echo $row['name_pilot'] ?></td>
                            <td><?php echo $row['category'] ?></td>
                            <td><?php echo $row['lap'] ?></td>
                            <td><?php echo $row['lap_time'] ?></td>
                            <td><?php echo $row['brand'] ?></td>
                            <td><?php echo $row['model'] ?></td>
                            <td><?php echo $row['name_track'] ?></td>                            
                            <td><?php echo $row['event_date'] ?></td>                            
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <?php } ?>

                <?php 
                include('server/connection.php');
                if(isset($_POST['m'])){

                    $query = "SELECT DISTINCT name_pilot FROM pilots";
                    $result = mysqli_query($db, $query);
                
                    if(!$result){
                        die("Query error");
                    }
            
                ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name pilot</th>
                            <th>Records</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_array($result)){ ?>
                        <tr>
                            <td><?php echo $row['name_pilot']; ?></td>
                            <td>
                                <a class="btn btn-info" href="pilots.php?name_pilot=<?php echo $row['name_pilot']; ?>">Records</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php } ?>
                <!-- Fin de consultas globales -->

                
                </div>
            </div>
        </div>

    </div>

    <script src="http://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="Log_in.js"></script>

</body>
</html>