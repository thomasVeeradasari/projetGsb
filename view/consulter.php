<!DOCTYPE html>
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
                        <a href="/projetFinale/index.php/nouveau" class="navItem">
                            <i class="lni lni-add-files"></i>
                            <span class="navItemName">NOUVEAU</span>
                        </a>
                    </li>
                    <li class="proposNav">
                        <a href="/projetFinale/index.php/consulter" class="navItem">
                            <i class="lni lni-magnifier"></i>
                            <span class="navItemName">CONSULTER</span>
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
                        <span>Gestion des frais</span>
                        <h2>CONSULTER</h2>
                    </div>
                    <div class="formContainer sectionContainer">
                        <form action="" method="post">
                            <p>Selectionnez la période</p>
                            <select name="mois" id="">
                                <option value="Jan">Jan</option>
                                <option value="Fev">Fev</option>
                                <option value="Mar">Mar</option>
                                <option value="Avr">Avr</option>
                            </select>
                            <select name="annee" id="">
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                            </select>
                            <button type="submit" name="submit">></button>
                        </form>
                        <table class="gestion">
                            <thead>
                                <th colspan="6">Frais Forfaitaires</th>
                            </thead>
                            <tbody class="consulter">
                                <tr class="column-title">
                                    <th>Date</th>
                                    <th>Forfaitaires</th>
                                    <th>Quantite</th>
                                    <th>Montant</th>
                                    <th>Etat</th>
                                    <th>Date modification</th>
                                </tr>
                                <tr>
                                    <td><p>01-01-2022</p></td>
                                    <td><p>Nuitée</p></td>
                                    <td><p>3</p></td>
                                    <td><p>180.00</p></td>
                                    <td><p>validation en cours</p></td>
                                    <td><p>28-01-2022</p></td>
                                </tr>
                                <tr>
                                    <td><p>01-01-2022</p></td>
                                    <td><p>Nuitée</p></td>
                                    <td><p>3</p></td>
                                    <td><p>180.00</p></td>
                                    <td><p>validation en cours</p></td>
                                    <td><p>28-01-2022</p></td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="gestion">
                            <thead>
                                <th colspan="6">Hors Forfaits</th>
                            </thead>
                            <tbody class="consulter">
                            <tr class="column-title">
                                <th>Date</th>
                                <th>Libellé</th>
                                <th>Montant</th>
                                <th>Etat</th>
                                <th>Date modification</th>
                                <th>Justificatifs</th>
                            </tr>
                            <tr>
                                <td><p>01-01-2022</p></td>
                                <td><p>Seminar</p></td>
                                <td><p>250.00</p></td>
                                <td><p>validation en cours</p></td>
                                <td><p>28-01-2022</p></td>
                                <td><p>Null</p></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </section>
                <div class="important">
                    <h3>IMPORTANT**</h3>
                    <ol>
                        <li>Les frais forfaitaires doivent être justifiés par une facture acquittée faisant apparaître le montant de la TVA. Ces documents ne sont pas à joindre à l’état de frais mais doivent être conservés pendant trois années. Ils peuvent être contrôlés par le délégué régional ou le service comptable.</li>
                        <li>Tarifs en vigueur au 01/09/2010.</li>
                        <li>
                            Prix au kilomètre selon la puissance du véhicule  déclaré auprès des services comptables.
                            <ul>
                                <li>(Véhicule  4CV Diesel) 	0.52 € / Km</li>
                                <li>(Véhicule  4CV Diesel) 	0.52 € / Km</li>
                                <li>(Véhicule  4CV Diesel) 	0.52 € / Km</li>
                                <li>(Véhicule  4CV Diesel) 	0.52 € / Km</li>
                            </ul>
                        </li>
                        <li>Tout frais « hors forfait » doit être dûment justifié par l’envoi d’une facture acquittée faisant apparaître le montant de TVA.</li>
                    </ol>
                </div>
            </div>
        </main>
    </div>
    <footer>
        <p class="sidenav">&copy; GSB</p>
    </footer>
</body>
</html>