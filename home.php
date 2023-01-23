<?php

//compteurs par défaut

 const HOST='localhost',
          USER= 'root',
          PASSWORD='',
          DATABASE='dbgrading';
    
    try {
        $connect= new PDO('mysql:host='.HOST.';dbname='.DATABASE,USER,PASSWORD, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    } catch(PDOException $e) {
        die('
        <p style="font-size:24px;color:red;font-weight:bold">
        '.$e->getMessage().'
        </p>');
    }

$comptstudent = $connect->query("SELECT COUNT(*) as studenttot FROM tblstudent");
$comptteacher = $connect->query("SELECT COUNT(*) as teachtot FROM instructor");
$comptcours = $connect->query("SELECT COUNT(*) as courstot FROM course");

?>

<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title text-center">Etudiants</h5>
                    
                    <center>
                        <a href="#" class="btn btn-primary" style="font-size: 30px;">
                            <?php
                                foreach($comptstudent as $datacountstudent){
                                    echo $datacountstudent['studenttot'];
                                }
                            ?>
                        </a>
                    </center>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title text-center">Enseignants</h5>
                    
                    <center>
                        <a href="#" class="btn btn-primary" style="font-size: 30px;">
                            <?php
                                foreach($comptteacher as $datacountsteach){
                                    echo $datacountsteach['teachtot'];
                                }
                            ?>
                        </a>
                    </center>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title text-center">Cours disponibles</h5>
                   
                    <center>
                        <a href="#" class="btn btn-primary" style="font-size: 30px;">
                            <?php
                                foreach($comptcours as $datacountcour){
                                    echo $datacountcour['courstot'];
                                }
                            ?>
                        </a>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>