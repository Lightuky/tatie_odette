<!DOCTYPE html>
<html style="font-size: 16px;" lang="fr">
<head>
    <meta name="keywords" content="">
    <title>Création| Tatie Odette</title>
    <link rel="stylesheet" href="resources/css/create-pattern.css" media="screen">
    <link id="u-theme-google-font" rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,400i,700|Baskervville:400,400i">
    <meta property="og:title" content="Création">
    <?php require_once('includes/head.php') ?>
    <script type="text/javascript" src="resources/js/create-pattern.js"></script>
</head>
<body class="u-body">
<?php require_once('includes/header.php') ?>
<section class="row no-gutters">
    <div class="col-8">
        <div class="d-flex justify-content-center">
            <h1 class="mr-5 creationTitle">Création</h1>
            <i class="fas fa-pencil-ruler fa-4x my-auto ml-5 text-white"></i>
        </div>
        <div class="h5 mt-2 mr-3 lineSeparator"></div>

        <div id="creationColor">
            <div class="h3 text-center mt-5">Couleur de votre pièce :</div>
            <div class="small text-center mt-3">Cliquez sur un des chocolats pour le sélectionner !</div>
            <div class="d-flex justify-content-around mt-5 text-center">
                <div style="width: 125px;">
                    <div class="h4">Noir 70%</div>
                    <button class="btn w-100 mt-4 rounded-circle colorActive" style="background-color: #453729; height: 125px" value="Noir"></button>
                </div>
                <div style="width: 125px;">
                    <div class="h4">Lait 40%</div>
                    <button class="btn w-100 mt-4 rounded-circle" style="background-color: #725447; height: 125px" value="Lait"></button>
                </div>
                <div style="width: 125px;">
                    <div class="h4">Blanc 35%</div>
                    <button class="btn w-100 mt-4 rounded-circle" style="background-color: #e7e0d1; height: 125px" value="Blanc"></button>
                </div>
            </div>
        </div>
        <div class="h5 mt-5 mr-3 lineSeparator"></div>

        <div id="creationType">
            <div class="h3 text-center mt-5">Type de votre modèle :</div>
            <div class="small text-center mt-3">(Cliquez sur les catégories pou afficher leurs options)</div>
            <div class="d-flex justify-content-around mt-5 text-center" style="flex-direction: column;">
                <div class="d-flex justify-content-around text-center" id="mainCatIcons">
                    <div id="creationTypeText">
                        <div class="h4">Texte seul</div>
                        <button class="btn mt-4 rounded-circle catActive" value="Texte seul">
                            <i class="fas fa-font fa-3x text-white"></i>
                        </button>
                    </div>
                    <div id="creationTypeForms">
                        <div class="h4">Formes</div>
                        <button class="btn mt-4 rounded-circle" value="Formes">
                            <i class="fas fa-cubes fa-3x text-white"></i>
                        </button>
                    </div>
                </div>
                <div class="h5 mt-5 mx-auto w-25 lineSeparator"></div>
                <div class="textInput mt-5">
                    <div class="h6 font-weight-bolder">Texte à graver</div>
                    <div class="h6 mt-5">(limite de 15 caractères)</div>
                    <input type="text" maxlength="15" class="form-control w-50 mx-auto" placeholder="Message à graver">
                </div>
                <div id="formsBlock" class="d-none">
                    <div class="simpleForms mt-5 categoryBlock">
                        <div class="h6 font-weight-bolder">Formes simples</div>
                        <div class="d-flex justify-content-center">
                            <div class="mt-4 mx-4 d-flex" style="flex-direction: column;">
                                <button class="btn rounded-circle mx-auto" value="Coeur" style="background-image: url(images/choc-creator-v2-chocolat1.jpg)"></button>
                                <span class="text-white rounded mx-auto px-1 mt-1">Coeur</span>
                            </div>
                            <div class="mt-4 mx-4 d-flex" style="flex-direction: column;">
                                <button class="btn rounded-circle mx-auto" value="Fleur et coeur" style="background-image: url(images/choc-300x282.png)"></button>
                                <span class="text-white rounded mx-auto px-1 mt-1">Fleur et coeur</span>
                            </div>
                            <div class="mt-4 mx-4 d-flex" style="flex-direction: column;">
                                <button class="btn rounded-circle mx-auto" value="Flocons" style="background-image: url(images/flocon-en-chocolat-imprime-en-3d-1.jpg)"></button>
                                <span class="text-white rounded mx-auto px-1 mt-1">Flocons</span>
                            </div>
                        </div>
                    </div>
                    <div class="h5 mt-5 mx-auto w-25 lineSeparator"></div>
                    <div class="complexForms mt-5 categoryBlock">
                        <div class="h6 font-weight-bolder">Formes complexes</div>
                        <div class="d-flex justify-content-center">
                            <div class="mt-4 mx-4 d-flex" style="flex-direction: column;">
                                <button class="btn rounded-circle mx-auto" value="Octogone rempli" style="background-image: url(images/choc-creator-v2-chocolat3.jpg)"></button>
                                <span class="text-white rounded mx-auto px-1 mt-1">Octogone rempli</span>
                            </div>
                            <div class="mt-4 mx-4 d-flex" style="flex-direction: column;">
                                <button class="btn rounded-circle mx-auto" value="Cylindre spiralé" style="background-image: url(images/5e466aee3b62b74f4b7a89a3.png)"></button>
                                <span class="text-white rounded mx-auto px-1 mt-1">Cylindre spiralé</span>
                            </div>
                            <div class="mt-4 mx-4 d-flex" style="flex-direction: column;">
                                <button class="btn rounded-circle mx-auto" value="Alvéoles" style="background-image: url(images/GenacheBLOG1.jpg)"></button>
                                <span class="text-white rounded mx-auto px-1 mt-1">Alvéoles</span>
                            </div>
                        </div>
                    </div>
                    <div class="h5 mt-5 mx-auto w-25 lineSeparator"></div>
                    <div class="architectureForms mt-5 categoryBlock">
                        <div class="h6 font-weight-bolder">Monuments</div>
                        <div class="d-flex justify-content-center">
                            <div class="mt-4 mx-4 d-flex" style="flex-direction: column;">
                                <button class="btn rounded-circle mx-auto" value="Big Ben" style="background-image: url(images/chocolate-clock-tower.jpg)"></button>
                                <span class="text-white rounded mx-auto px-1 mt-1">Big Ben</span>
                            </div>
                            <div class="mt-4 mx-4 d-flex" style="flex-direction: column;">
                                <button class="btn rounded-circle mx-auto" value="Tour Eiffel" style="background-image: url(images/poche-tour-eiffel-fondant.jpg)"></button>
                                <span class="text-white rounded mx-auto px-1 mt-1">Tour Eiffel</span>
                            </div>
                            <div class="mt-4 mx-4 d-flex" style="flex-direction: column;">
                                <button class="btn rounded-circle mx-auto" value="Arc de Triomphe" style="background-image: url(images/arc_triomphe_lait1-510x510.jpg)"></button>
                                <span class="text-white rounded mx-auto px-1 mt-1">Arc de Triomphe</span>
                            </div>
                        </div>
                    </div>
                    <div class="h5 mt-5 mx-auto w-25 lineSeparator"></div>
                    <div class="animalsForms mt-5 categoryBlock">
                        <div class="h6 font-weight-bolder">Animaux</div>
                        <div class="d-flex justify-content-center">
                            <div class="mt-4 mx-4 d-flex" style="flex-direction: column;">
                                <button class="btn rounded-circle mx-auto" value="Poule" style="background-image: url(images/miam-factory-480x280.png)"></button>
                                <span class="text-white rounded mx-auto px-1 mt-1">Poule</span>
                            </div>
                            <div class="mt-4 mx-4 d-flex" style="flex-direction: column;">
                                <button class="btn rounded-circle mx-auto" value="Chat porte-bonheur" style="background-image: url(images/20191009093448959.jpg)"></button>
                                <span class="text-white rounded mx-auto px-1 mt-1">Chat porte-bonheur</span>
                            </div>
                            <div class="mt-4 mx-4 d-flex" style="flex-direction: column;">
                                <button class="btn rounded-circle mx-auto" value="Ourson" style="background-image: url(images/1478387096279.jpg)"></button>
                                <span class="text-white rounded mx-auto px-1 mt-1">Ourson</span>
                            </div>
                        </div>
                    </div>
                    <div class="h5 mt-5 mx-auto w-25 lineSeparator"></div>
                    <div class="formsTextInput mt-5">
                        <div class="h6 font-weight-bolder">Message gravé sur la forme (optionnel)</div>
                        <div class="h6">(limite de 10 caractères)</div>
                        <input type="text" maxlength="10" class="form-control w-50 mx-auto" placeholder="Message à graver">
                    </div>
                </div>
                <div class="h5 mt-5 mx-auto w-25 lineSeparator"></div>
                <div class="textType mt-5">
                    <div class="h6 font-weight-bolder">Couleur du texte à graver</div>
                    <div class="d-flex justify-content-center mt-5 text-center">
                        <div class="mx-4" style="width: 125px;">
                            <div class="h4">Noir 70%</div>
                            <button class="btn mt-4 rounded-circle colorActive" style="background-color: #453729; height: 95px; width: 95px" value="Noir"></button>
                        </div>
                        <div class="mx-4" style="width: 125px;">
                            <div class="h4">Lait 40%</div>
                            <button class="btn mt-4 rounded-circle" style="background-color: #725447; height: 95px; width: 95px" value="Lait"></button>
                        </div>
                        <div class="mx-4" style="width: 125px;">
                            <div class="h4">Blanc 35%</div>
                            <button class="btn mt-4 rounded-circle" style="background-color: #e7e0d1; height: 95px; width: 95px" value="Blanc"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="h5 mt-5 mr-3 lineSeparator"></div>

        <div id="creationWeight">
            <div class="h3 text-center mt-5">Poids de votre pièce</div>
            <div class="small text-center mt-3">Choisissez selon votre faim !</div>
            <div class="d-flex justify-content-around mt-5 text-center">
                <div style="width: 125px;">
                    <div class="h4">20g</div>
                    <button class="btn w-100 mt-4 rounded-circle weightActive" style="background-color: #725447; height: 125px" value="20g">
                        <i class="fas fa-weight-hanging fa-3x text-white"></i>
                    </button>
                </div>
                <div style="width: 125px;">
                    <div class="h4">50g</div>
                    <button class="btn w-100 mt-4 rounded-circle" style="background-color: #725447; height: 125px" value="50g">
                        <i class="fas fa-weight-hanging fa-4x text-white"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="h5 mt-5 mr-3 lineSeparator"></div>

        <div class="d-flex">
            <div id="creationName" class="w-50">
                <div class="h5 text-center mt-5">Nom de votre modèle personnalisé (optionnel)</div>
                <div class="small text-center mt-2">(50 caractères maximum)</div>
                <input type="text" maxlength="50" class="form-control w-75 mx-auto mt-5" placeholder="Nom par défaut">
            </div>
            <div id="creationDescription" class="w-50">
                <div class="h5 text-center mt-5">Description de votre modèle (optionnel)</div>
                <div class="small text-center mt-2">(500 caractères maximum)</div>
                <textarea maxlength="500" rows="9" class="form-control w-75 mx-auto mt-5" placeholder="Description par défaut" style="resize: none;"></textarea>
            </div>
        </div>
        <div class="h5 mt-5 mr-3 lineSeparator"></div>

    </div>
    <div class="col-4 mt-5 px-3">
        <h2 class="font-weight-light text-center recapTitle">Récapitulatif</h2>
        <div class="h5 mt-4 mr-3 lineSeparator"></div>
        <div class="patternOrderRecap mt-5 mr-3">
            <div class="h3 font-weight-light my-5">
                <div class="mt-4">Nom du modèle</div>
                <div class="mt-2 mr-2 small orderRecapName" style="overflow-wrap: anywhere;">Modèle personnalisé</div>
            </div>
            <div class="h3 font-weight-light my-5">
                <div class="mt-2">Description du modèle</div>
                <div class="mt-2 mr-2 small orderRecapDescription" style="overflow-wrap: anywhere;">Description de base</div>
            </div>
            <div class="h5 mt-2 mr-3 lineSeparator"></div>
            <div class="d-flex justify-content-between h3 font-weight-light my-5">
                <div class="mt-1">Type de la pièce</div>
                <div class="mt-2 mr-2 small orderRecapPieceType">Texte Seul</div>
            </div>
            <div class="justify-content-between h3 font-weight-light my-5 d-none" id="orderRecapCategoryBlock">
                <div class="mt-1">Catégorie</div>
                <div class="mt-2 mr-2 small orderRecapCategory">Non choisi</div>
            </div>
            <div class="justify-content-between h3 font-weight-light my-5 d-none" id="orderRecapPatternIdentifier">
                <div class="mt-1">Nom de la forme</div>
                <div class="mt-2 mr-2 small orderRecapPatternIdentifier">Non choisi</div>
            </div>
            <div class="d-flex justify-content-between align-items-center h3 font-weight-light my-5">
                <div class="mt-1">Type de chocolat</div>
                <div class="mt-2 mr-2 small orderRecapType">Noir</div>
            </div>
            <div class="h5 mt-3"></div>
            <div class="d-flex justify-content-between align-items-center h3 font-weight-light my-5">
                <div class="mt-1">Poids de la pièce</div>
                <div class="mt-2 mr-2 small orderRecapWeight">20g</div>
            </div>
            <div class="d-flex justify-content-between align-items-center h3 font-weight-light my-5">
                <div class="mt-1">Texte gravé</div>
                <div class="mt-2 mr-2 small orderRecapText">Vide</div>
            </div>
            <div class="d-flex justify-content-between align-items-center h3 font-weight-light my-5">
                <div class="mt-1">Type du texte gravé</div>
                <div class="mt-2 mr-2 small orderRecapTextType">Noir</div>
            </div>
            <div class="h5 mt-2 mr-3 lineSeparator"></div>

            <form method="post" action="assets/order.php?r=u" class="patternOrderForm my-5">
                <input type="hidden" id="pattern_name" name="pattern_name" value="Modèle personnalisé">
                <input type="hidden" id="pattern_description" name="pattern_description" value="Description de base">
                <input type="hidden" id="piece_type" name="piece_type" value="Texte seul">
                <input type="hidden" id="category" name="category" value="Non choisi">
                <input type="hidden" id="pattern_identifier" name="pattern_identifier" value="Non choisi">
                <input type="hidden" id="chocolate_type" name="chocolate_type" value="Noir">
                <input type="hidden" id="chocolate_weight" name="chocolate_weight" value="20g">
                <input type="hidden" id="chocolate_text" name="chocolate_text" value="Vide">
                <input type="hidden" id="chocolate_text_type" name="chocolate_text_type" value="Vide">
                <?php if (isset($_SESSION['auth_id'])): ?>
                    <button type="submit" class="btn text-light w-100" style="background-color: #a99b8e">Commander</button>
                <?php else: ?>
                    <a href="login.php" class="btn text-light w-100" style="background-color: #a99b8e">Commander</a>
                <?php endif; ?>
            </form>

            <div class="h5 mt-2 mr-3 lineSeparator"></div>
            <div class="h5 mt-4"></div>
            <div style="letter-spacing: 0; color: #a5907e!important;">
                <div class="font-weight-bolder text-center">Remboursements:</div>
                <div class="text-center">
                    <br>Pour tout dégâts causés durant l'impression avec nos machines Tatie Odette, veuillez contacter le siège
                    Tatie Odette (informations sur la page Contact). Le montant de votre remboursement variera selon le degré de dégât constaté.<br>
                    <br>Si l'impression vous déçoit, vous serez remboursé 20% du prix payé.<br>
                    <br>Nous vous remercions pour votre compréhension.<br>
                    <br>Pour toutes informations complémentaires, n'hésitez-pas à nous contacter !
                </div>
            </div>

        </div>
    </div>
</section>
<?php require_once('includes/footer.php') ?>
</body>
</html>