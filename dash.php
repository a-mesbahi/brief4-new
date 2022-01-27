<?php

require_once 'connection.php'; // connection 



    $sql = 'SELECT * FROM patient';

    $result = mysqli_query($conn, $sql);
    
    $patients = mysqli_fetch_all($result, MYSQLI_ASSOC);
    

    // echo "<pre>"  ;
    // print_r($patients);
    // echo "</pre>";
    

    if(isset($_POST['submit'])){
        
        $fullname = $_POST['nom'];
        $nom = explode(' ',$fullname) ;


        $num = $_POST['num'];
        $email = $_POST['email'];
        $maladie = $_POST['message'];
        $birth = $_POST['date'];
        
        
        $sql  = "INSERT INTO patient(nom,prenom,date_de_naissance,num_telephone,email,maladie) VALUES ('$nom[0]','$nom[1]','$birth','$num','$email','$maladie')";

        if(mysqli_query($conn, $sql)){
            header('location:dash.php');
        }
    };
    
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleDash.css">
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
            <a href="index.php">Logout</a>
        </div>
    </div>
    <div class="dash">
        <div class="table-div">
            <table>
                <thead>
                    <tr>
                        <th>Nom et prenom</th>
                        <th>La date de naissance </th>
                        <th class="masquer">Numero de telephone</th>
                        <th class="masquer">Email</th>
                        <th class="masquer">decription de la maladie</th>
                        <th class="masquer">Edit</th>
                    </tr>
                </thead>
                <tbody id="tableau">
                    <?php foreach($patients as $patient){?>
                    <tr>
                        <td><?php echo htmlspecialchars($patient['nom']." ".$patient['prenom']); ?></td>
                        <td><?php echo htmlspecialchars($patient['date_de_naissance']) ;?></td>
                        <td class="masquer"><?php echo htmlspecialchars("0".$patient['num_telephone']) ;?></td>
                        <td class="masquer"><?php echo htmlspecialchars($patient['email']) ;?></td>
                        <td class="masquer"><?php echo htmlspecialchars($patient['maladie']) ;?></td>
                        <td class="edit-part masquer">
                            <a href="test.php?id=<?php echo $patient['id']?> "><p>more details</p></a>
                        </td>
                    </tr>

                    <?php }?>
                </tbody>
            </table>
        </div>
        <div class="rest">
            <div class="form-container">
                <h1 class="title">ADD A PATIENT</h1>
                <form action="dash.php" method="POST">
                            <div class="input">
                                <label for="">Full name : </label>
                                <input type="text" name="nom" placeholder="xxxxx yyyyy">
                            </div>
                            <div class="input">
                                <label for="">Date de naissance : </label>
                                <input type="date" name="date" placeholder="0000-00-00">
                            </div>
                            <div class="input">
                                <label for="">Email : </label>
                                <input type="text" name="email" placeholder="xxxx@yyyy.com">
                            </div>
                            <div class="input">
                                <label for="">Phone Number : </label>
                                <input type="text" name="num" placeholder="0600000000">
                            </div>
                            <div class="input">
                                <label for="">Description de la maladie : </label>
                                <textarea name="message" id="" cols="30" rows="10" placeholder="Description" class="textarea"></textarea>
                            </div>
                            <div class="message">
                                <input type="submit" name ="submit" value="Ajouter" class="ajouter" id="mesInpu">
                            </div>
                </form>
            </div>
        </div>
    </div>
    
    <script src="dashbordJS.js"></script>
</body>
</html>