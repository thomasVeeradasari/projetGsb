<?php
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,500;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.lineicons.com/2.0/LineIcons.css">
</head>
<body>
    <div class="flexWrap">
        <aside class="sideMenu">
            <img src="../assets/img/logo.png" alt="">
            <nav>
                <ul class="nav">
                    <li class="homeNav">
                        <a href="" class="navItem" name="action" value="insertFrais">
                            <i class="lni lni-checkmark"></i>
                            <span class="navItemName">VALIDER</span>
                        </a>
                    </li>
                    <li class="proposNav">
                        <a href="" class="navItem" action="insertFrais">
                            <i class="lni lni-ruler-pencil"></i>
                            <span class="navItemName">OPERATION</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="logout" id="logout">
                <a href="">
                    <i class="lni lni-power-switch"></i>
                    <span class="navItemName logoutText">Déconnexion</span>
                </a>
        </div>
        </aside>
        <main>
            <div class="innerWrapper">
                <section class="contactSection" id="contact">
                    <div class="sectionHead">
                        <span>Validation des frais</span>
                        <h2>VALIDER DES FRAIS PAR VISITEUR</h2>
                    </div>
                    <div class="formContainer sectionContainer">
                        <table class="gestion">
                            <form action="" method="post">
                                <thead>
                                    <th colspan="4">Selectionnez la période</th>
                                </thead>
                                <tbody class="valider">
                                    <tr class="column-title">
                                        <th>visiteur</th>
                                        <th>Mois</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select name="visiteur" id="">
                                                <?php
                                                foreach ($listev as $visiteur) {
                                                    $id = $visiteur->getId();
                                                    $nom = $visiteur->getNom();
                                                    echo "<option value=\"$id\">$nom</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="mois" id="">
                                                <option value="Jan">Jan</option>
                                                <option value="Fev">Fev</option>
                                                <option value="Mar">Mar</option>
                                                <option value="Avr">Avr</option>
                                            </select>
                                        </td>
                                        <td>
                                            <button type="submit" name="submit">>></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </form>
                        </table>
                        <form action="index.php" class="" id="" method="POST">
                            <table class="gestion">
                                <thead>
                                    <th colspan="6">Frais Forfaitaires</th>
                                </thead>
                                <tbody class="consulter">
                                    <tr class="column-title">
                                        <th>Repas Midi</th>
                                        <th>Nuitee</th>
                                        <th>Etape</th>
                                        <th>Km</th>
                                        <th>Situation</th>
                                    </tr>
                                    <tr>
                                        <td><p>01-01-2022</p></td>
                                        <td><p>Nuitée</p></td>
                                        <td><p>3</p></td>
                                        <td><p>180.00</p></td>
                                        <td>
                                        <select size="3" name="situation">
                                            <option value="E">Enregistre</option>
                                            <option value="V">Valide</option>
                                            <option value="R">Rembourse</option>
                                        </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="gestion">
                                <thead>
                                    <th colspan="5">Hors Forfaits</th>
                                </thead>
                                <tbody class="consulter">
                                <tr class="column-title">
                                    <th>Date</th>
                                    <th>Libellé</th>
                                    <th>Montant</th>
                                    <th>Situation</th>
                                </tr>
                                <tr>
                                    <td><p>28-01-2022</p></td>
                                    <td><p>Seminar</p></td>
                                    <td><p>250.00</p></td>
                                    <td>
                                        <select size="3" name="hfSitu2">
                                            <option value="E">Enregistre</option>
                                            <option value="V">Valide</option>
                                            <option value="R">Rembourse</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><p>28-01-2022</p></td>
                                    <td><p>Seminar</p></td>
                                    <td><p>250.00</p></td>
                                    <td>
                                        <select size="3" name="hfSitu2">
                                            <option value="E">Enregistre</option>
                                            <option value="V">Valide</option>
                                            <option value="R">Rembourse</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>Nb Justificatifs</tr>
                                    <input type="text" class="zone" size="4" name="hcMontant"/>	
                                </tbody>
                            </table>
                            <input type="hidden" name="action" value="validFrais"/>
                            <div class="submit">
                                <input type="submit" value="Reinitialiser">
                                <input type="submit" value="Enrégistrer">
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </main>
    </div>
    <footer>
        <p class="sidenav">&copy; GSB</p>
    </footer>
</body>
</html>