<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>document</title>
    <style>
        
        .groupe-container {
            padding: 10px;
            margin-bottom: 3vh;
            display: inline-block;
            width: 22%;
            border-radius: 15px;
        }

        .groupe-title {
            color: green;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            background: black;
            height: 2rem;
            border-radius: 15px;
        }

        .groupes-wrapper {
            display: flex;
            justify-content: space-evenly;
            align-items : center;
            flex-wrap: wrap; 
            height: 120vh;
        }

        .search-bar {
            margin-bottom: 20px;
        }
    </style>
    <title>Document</title>
</head>
<body class="p-0 m-0">
    <section class="bg-[url('images/ballcup.jpeg')] bg-cover drop-shadow-md shadow-black h-[100vh]">
        <div class="w-[55%] m-auto flex justify-between items-center pt-[10px] pb-[10px]">
            <img class="h-[17vh]"  src="images/cuptrophy.png">
            <div>
                <h1 class="text-[80px] text-white text-center font-bold">MAROC</h1>
                <p class="text-center text-white">FIFA COUPE DU MONDE 2030</p>
            </div>
            <img class="h-[17vh]" src="images/marocflag.png">
        </div>
        <div class="w-[80%] h-[55vh] flex justify-center items-center gap-8 rounded-2xl flex-col m-auto text-white bg-black/20">
            <h2 class="text-[27px] font-bold">Un Mondial Épique, une Nation Magique !"</h2>
            <p>
                En 2030, le Maroc s'apprête à accueillir le monde entier pour une Coupe du Monde mémorable,
                où l'hospitalité marocaine se mêlera à la passion mondiale pour le football.
                Les stades vibreront au rythme des acclamations ferventes,
                les rues seront emplies de la diversité culturelle des supporters du monde entier,
                créant une symphonie de couleurs et de chants
            </p>
           <a href="details.php"  class="text-green-900 bg-black h-[15%] w-[15%] rounded-2xl"> <button class="flex h-[100%] w-[100%] justify-center items-center text-center" >Détails</button></a>
        </div>
    </section>

    <div class="min-h-[110vh] items-center bg-[url('images/stade-football-nuit-generative-ai.jpg')] bg-cover min-w-screen">
    <div class="filter-buttons flex w-[100%] h-[7vh] justify-evenly items-center bg-blue-300 font-semibold">
            <form method="GET">
                <button type="submit" class=" w-[10vw] h-[7vh] hover:bg-blue-400" name="filter" value="all">tous les Groupes</button>
            </form>
            <form method="GET">
                <button type="submit" class=" w-[10vw] h-[7vh] hover:bg-blue-400" name="filter" value="A">Group A</button>
            </form>
            <form method="GET">
                <button type="submit" class=" w-[10vw] h-[7vh] hover:bg-blue-400" name="filter" value="B">Group B</button>
                
            </form>
            <form method="GET">
                <button type="submit" class=" w-[10vw] h-[7vh] hover:bg-blue-400" name="filter" value="C">Group C</button>
              
            </form>
            <form method="GET">
                <button type="submit" class=" w-[10vw] h-[7vh] hover:bg-blue-400" name="filter" value="D">Group D</button>
             
            </form>
            <form method="GET ">
                <button type="submit" class=" w-[10vw] h-[7vh] hover:bg-blue-400" name="filter" value="E">Group E</button>
            
            </form>
            <form method="GET">
                <button type="submit" class=" w-[10vw] h-[7vh] hover:bg-blue-400" name="filter" value="F">Group F</button>
            
            </form>
            <form method="GET">
                <button type="submit" class=" w-[10vw] h-[7vh] hover:bg-blue-400" name="filter" value="G">Group G</button>
            
            </form>
            <form method="GET">
                <button type="submit" class=" w-[10vw] h-[7vh] hover:bg-blue-400" name="filter" value="H">Group H</button>
              
            </form>
</div>

        <div class="groupes-wrapper ">
            <?php
           
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbName = "wordcup";

            // Cree connection
            $conn = mysqli_connect($servername, $username, $password, $dbName);

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

           
            if (isset($_GET['filter'])) {
                $filterTerm = $_GET['filter'];
                if ($filterTerm === 'all') {
                    
                    $sqlGroups = "SELECT nomGroupe FROM groupe";
                } else {
                    
                    
                    $sqlGroups = "SELECT nomGroupe FROM groupe WHERE nomGroupe = '$filterTerm'";
                }
            } else {
                
                $sqlGroups = "SELECT nomGroupe FROM groupe";
            }


            $resultGroups = $conn->query($sqlGroups);

            if ($resultGroups->num_rows > 0) {
                while ($group = $resultGroups->fetch_assoc()) {
                    $groupName = $group["nomGroupe"];

                    
                    echo '<div class="groupe-container bg-gray-50 p-2.5 mb-8 inline-block w-11/50 rounded-2xl">';
                    echo '<div class="groupe-title">GROUPE ' . $groupName . "<br>" . '</div>';

                    echo "<div class='mt-[20px]'>";
                    
                    $sqlTeams = "SELECT nomEquipe,drapeau FROM equipe WHERE idGroupe = (SELECT idGroupe FROM groupe WHERE nomGroupe = '$groupName')";
                    $resultTeams = $conn->query($sqlTeams);

                    if ($resultTeams->num_rows > 0) {
                        while ($team = $resultTeams->fetch_assoc()) {
                           
                            echo "<div class='flex h-[35px] items-center font-extrabold'><img src='" . $team['drapeau'] . "'> " . $team['nomEquipe'] . "</div><br>";
                        }
                    }
                    echo '</div>';
                   
                    echo '</div>';
                }
            } else {
                echo "0 results";
            }

           
            $conn->close();
            ?>
        </div>
    </div>

    <footer>
        <h2 class="text-center text-white bg-black">Copyright © 2030 Hashtag Developer. All Rights Reserved</h2>
    </footer>
</body>
</html>
