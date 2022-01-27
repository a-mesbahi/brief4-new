<?php

    //connect to the data base 
    require_once 'connection.php';
    if(!$conn){
        echo 'connection error :'.mysqli_connect_error();
    }

    // delete the infos of the patient by the id 

    if(isset($_POST['delete'])){
        $id_to_delete = mysqli_real_escape_string($conn,$_POST['id_to_delete']); // get the id if the patient 

        $sql = "DELETE FROM patient WHERE id = $id_to_delete "; // delete the data 

        if(mysqli_query($conn,$sql)){
            // check the delete and get back to the dashboard home 
            header("location:dash.php");
        }
    }
    

    //edit the data on the row specify by the id and get back to the home dashboard 

    if(isset($_POST['edite'])){
        $id_to_update = mysqli_real_escape_string($conn,$_POST['id_to_update']); // get the id of the row to update 

        // get the update infos from the inputs from 

        $name = $_POST['new_nom'];
        $prenom = $_POST['new_prenom'];
        $num = $_POST['new_num'];
        $email = $_POST['new_email'];
        $maladie = $_POST['new_message'];
        $birth = $_POST['new_date'];

        //  Update the infos and save it to the database 
        $sql  = "UPDATE patient SET nom='$name', prenom ='$prenom', date_de_naissance='$birth', num_telephone = '$num', email = '$email', maladie = '$maladie' WHERE id = $id_to_update ;";

        // check the update and get back to the dashboard home
        if(mysqli_query($conn, $sql)){
            header('location:dash.php');
        }
    };
    
    //show the data saved on the row specify by the id 
    if(isset($_GET['id'])){

        $id = mysqli_real_escape_string($conn,$_GET['id']);
        $sql = " SELECT * FROM patient WHERE id = $id ";

        $result = mysqli_query($conn,$sql);

        $patient = mysqli_fetch_assoc($result);
        // echo "<pre>"  ;
        // print_r($patient);
        // echo "</pre>"; 
    }
    

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylePrfl.css">
    <title>Document</title>
</head>
<body>
    <div class="profil">
            <div class="head">
                <div class="pic-profil">
                    <img src="./image/doc.png" alt="">
                </div>
                <h2>Rahbani Rafik</h2>
            </div>
            <div class="deconnection">
                <a href="#">Se deconnecter</a>
            </div>
    </div>
    <div class="dash">
        <div class="patient">
            <div class="pic"></div>
                <h2>C'est , <?php echo $patient["nom"]." ".$patient["prenom"] ?></h2>
                <div class="infos">
                <h4>Bron : <?php echo $patient["date_de_naissance"]?></h4>
                <h4>Email : <?php echo $patient["email"]?></h4>
                <h4>Phone : <?php echo $patient["num_telephone"]?></h4>
                <h4>Maladie : <?php echo $patient["maladie"]?></h4>
                
            </div>
            <form action="" method="post">
                    <input type="hidden" name="id_to_delete" value="<?php echo $patient["id"] ?>">
                    <input type="submit" name="delete" value="Delete" class="delete">
            </form>
            <button class="edit">Edit</button>
        </div>
    </div>
    <div class="edit-back" id="man">
        <div class="form-container">
            <h1 class="title">EDIT PATIENT PROFIL</h1>
            <div class="close">X</div>
            <form action="" method="post">
                        <div class="input">
                            <label for="">Nom : </label>
                            <input type="text" name="new_nom" value='<?php echo $patient["nom"] ?>'>
                        </div>
                        <div class="input">
                            <label for="">Prenom : </label>
                            <input type="text" name="new_prenom" value="<?php echo $patient["prenom"] ?>">
                        </div>
                        <div class="input">
                            <label for="">Date de naissance : </label>
                            <input type="texte" name="new_date" value=" <?php echo $patient["date_de_naissance"]?>">
                        </div>
                        <div class="input">
                            <label for="">Email : </label>
                            <input type="text" name="new_email" value="<?php echo $patient["email"]?>">
                        </div>
                        <div class="input">
                            <label for="">Phone Number : </label>
                            <input type="text" name="new_num" value="<?php echo $patient["num_telephone"]?>">
                        </div>
                        <div class="input">
                            <label for="">Description de la maladie : </label>
                            <input type="textarea" name="new_message" id="" cols="30" rows="10" value="<?php echo $patient["maladie"]?>"></input>
                        </div>
                        <div class="message">
                            <input type="hidden" name="id_to_update" value="<?php echo $patient["id"] ?>">
                            <input type="submit" name ="edite" value="EDIT" class="ajouter" id="mesInpu">
                        </div>
            </form>
        </div>
    </div>


    <script src="edit.js"></script>
</body>
</html>