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
                <a href="/projetFinale/index.php/deconnexion">
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
                        <h2>SAISIE</h2>
                    </div>
                    <div class="formContainer sectionContainer">
                        <form action="index.php" method="POST" class="gestion">
                        <table class="gestion">
                                <thead>
                                    <th colspan="4">Période d'éngagement</th>
                                </thead>
                                <tbody>
                                <tr class="column-title">
                                    <th><label for="">Mois</label></th>
                                    <th><label for="">Année</label></th>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="" id="">
                                            <option value=""></option>
                                            <option value="01">Jan</option>
                                            <option value="02">Fév</option>
                                            <option value="03">Mar</option>
                                            <option value="04">Avr</option>
                                            <option value="05">Mai</option>
                                            <option value="06">Jui</option>
                                            <option value="07">Jul</option>
                                            <option value="08">Aou</option>
                                            <option value="09">Sep</option>
                                            <option value="10">Oct</option>
                                            <option value="11">Nov</option>
                                            <option value="12">Dec</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="" id="">
                                            <option value=""></option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                        </select>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="gestion">
                                <thead>
                                    <th colspan="5">Frais Forfaitaires</th>
                                </thead>
                                <tbody>
                                    <tr class="column-title">
                                        <th><label for="repas">Repas midi</label></th>
                                        <th><label for="nuite">Nuitées</label></th>
                                        <th><label for="etape">Etape</label></th>
                                        <th><label for="km">Km</label></th>
                                    </tr>
                                    <tr>
                                        <td><input type="number" min="0" name="repas"></td>
                                        <td><input type="number" min="0" name="nuite"></td>
                                        <td><input type="number" min="0" name="etape"></td>
                                        <td><input type="number" min="0" name="km"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="gestion">
                                <thead>
                                    <th colspan="4">Hors Forfaits</th>
                                </thead>
                                <tbody>
                                <tr class="column-title">
                                    <th><label for="">Date</label></th>
                                    <th><label for="">Libellé</label></th>
                                    <th><label for="">Montant</label></th>
                                </tr>
                                <tr>
                                    <td><input type="date" name="date"></td>
                                    <td><input type="text" name="libelle"></td>
                                    <td><input type="text" name="montant"></td>
                                    <td><button class="add">Add</button></td>
                                </tr>
                                </tbody>
                            </table>

                            <input type="hidden" name="action" value="insertFrais"/>
                            <div class="submit">
                                <input type="submit" value="Reinitialiser">
                                <input type="submit" value="Envoyer">
                            </div>
                        </form>
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