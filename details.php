<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
    <title>document</title>
    
</head>

<body class="bg-black">
  

<section class="min-h-[95vh] w-[100%]  bg-[url('images/ballcup.jpeg')] bg-cover">
<a href="index.php"  class="text-green-900 bg-black-500 h-[10vh] w-[30vw] rounded-2xl"> <button class="flex h-[100%] w-[100%] justify-center items-center text-center" >Retour A l'acceuil</button></a>


    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "wordcup";




    
    $Dbcreation = "CREATE DATABASE IF NOT EXISTS $dbName";

  


  

    $cnx = new mysqli($servername, $username, $password, $dbName);


    ?>
   
       
<section class="flex flex-col gap-[100px] w-[65%] m-auto">
        <table class="leading-9 w-[100%] text-center mt-[70px]">
            <thead class="text-white">
                <tr>
                    <th class = "border-[2px] border-white border-solid w-[15%]">Nom du Group</th>
                    <th class = "border-[2px] border-white border-solid w-[15%]">Stades</th>
                    
                </tr>
                <?php
                $sql = "SELECT nomGroupe, stadeGroupe FROM groupe";
                $result = $cnx->query($sql);

                if ($result->num_rows > 0) {
                  
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
            <td class = 'border-[2px] border-white border-solid w-[15%]'>" .'groupe :' . $row["nomGroupe"] . " </td>
            <td class = 'border-[2px] border-white border-solid w-[15%]'> " . $row["stadeGroupe"] . "</td>
         
          </tr>";
                    }
                } else {
                
                }

               
                ?>
            </thead>


        </table>
        <table class="leading-9 w-[100%] text-center mb-[70px]">
            <thead class="text-white">
                <tr>
                    <th class = "border-[2px] border-white border-solid w-[50vw]">Nom D'équipe</th>
                    <th class = "border-[2px] border-white border-solid w-[50vw]">Entraineur</th>
                    
                    
                </tr>
                <?php
                $sql2 = "SELECT nomEquipe, entraineur,drapeau FROM equipe";
                $result2 = $cnx->query($sql2);

                if ($result2->num_rows > 0) {
                 
                    while ($row = $result2->fetch_assoc()) {
                        echo "<tr>
                            <td class='border-[2px] border-white  h-[7vh] gap-[15px] flex flex-row justify-center border-solid w-[50vw]'><img src='" . $row['drapeau'] . "'> " . $row['nomEquipe'] . "</td>
                            <td class='border-[2px] border-white h-[7vh] border-solid w-[50vw]'>" . $row["entraineur"] . "</td>
                        </tr>";
                    }
                } else {
                   
                }
                
                

                $cnx->close();
                ?>
            </thead>


        </table>

        </section>
    </section>
    <footer class="text-center h-[5vh] text-white bg-black flex items-center justify-center">
        <h2 >Copyright © 2030 Hashtag Developer. All Rights Reserved</h2>
    </footer>
</body>

</html>