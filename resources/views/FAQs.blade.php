<?php header('Access-Control-Allow-Origin: *'); ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    @include('layouts.head')
</head>

<body class="horizontal-layout horizontal-menu 2-columns  navbar-floating footer-static  " data-open="hover"
    data-menu="horizontal-menu" data-col="2-columns">
    @include('layouts.header')
    @include('layouts.horizontal-menu')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Accordion start -->
                <section id="accordion">
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="accordionWrapa1" role="tablist" aria-multiselectable="true">
                                <div class="card collapse-icon accordion-icon-rotate ">
                                    <div class="card-header text-center">
                                        <h2>FAQs sur l'entretien de la voiture</h2>
                                        <br><br>
                                        <div> <img src="../../../app-assets/images/car.jpg"
                                                alt="l'entretien de la voiture" srcset="" class="img-fluid"
                                                style="border-radius:5px;align:center"></div>
                                    </div>
                                    <br><br>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <h6>Quiconque qui a déjà essayé la réparation automobile vous dira qu'en
                                                tant que nouveau propriétaire de voiture, vous aurez des questions et
                                                des renseignements a demandées, surtout si vous n'avez aucune expérience
                                                technique.<br>
                                                C'est pourquoi nous avons décidé de vous présenter un
                                                ensemble d'informations en réponse aux questions les plus fréquemment
                                                posées par les nouveaux propriétaires de voitures
                                            </h6>
                                            <div class="accordion-default collapse-bordered">
                                                <div class="card collapse-header">
                                                    <div id="heading1" class="card-header collapse-header"
                                                        data-toggle="collapse" role="button" data-target="#accordion1"
                                                        aria-expanded="false" aria-controls="accordion1">
                                                        <span class="lead collapse-title" style="color:#1977cc;">
                                                            <i class="ri-lg ri-question-line"
                                                                style="color:#76b5ee;"></i> Pourquoi le voyant de
                                                            mon
                                                            moteur de contrôle est-il allumé ?
                                                        </span>
                                                    </div>
                                                    <div id="accordion1" role="tabpanel" data-parent="#accordionWrapa1"
                                                        aria-labelledby="heading1" class="collapse">
                                                        <div class="card-content">
                                                            <div class="card-body">
                                                                <strong>Votre voyant de contrôle moteur s'est allumé, et
                                                                    maintenant ?</strong>
                                                                Ces conseils peuvent vous aider à déterminer si votre
                                                                véhicule a des problèmes de moteur majeurs ou simplement
                                                                un bouchon d'essence desserré.

                                                                <p>Le voyant de contrôle du moteur ou le message «
                                                                    entretien du moteur bientôt » souvent incompris peut
                                                                    signifier plusieurs choses. Il peut s'agir d'un
                                                                    moteur raté, d'un capteur d'oxygène cassé ou
                                                                    simplement d'un bouchon d'essence desserré.</p>
                                                                <p>
                                                                    Lorsque vous voyez le voyant de contrôle du moteur,
                                                                    cela ne signifie pas nécessairement que vous devez
                                                                    garer la voiture sur le côté de la route et appeler
                                                                    une dépanneuse. Cela signifie que vous devez faire
                                                                    vérifier la voiture dès que possible. Si vous
                                                                    ignorez l'avertissement, vous pourriez finir par
                                                                    causer d'autres dommages. Cela pourrait également
                                                                    être un signe que vous obtenez une mauvaise économie
                                                                    de carburant et que vous émettez des niveaux élevés
                                                                    de polluants.

                                                                </p>
                                                                <p>
                                                                    Dans tous les cas, si le témoin de contrôle du
                                                                    moteur est allumé dans votre voiture, il est temps
                                                                    de prendre un rendez-vous d'entretien. Dans notre
                                                                    centre de service, nous avons des techniciens formés
                                                                    en usine qui peuvent facilement vérifier et
                                                                    diagnostiquer ce qui se cache derrière votre message
                                                                    lumineux de contrôle du moteur, à un coût presque
                                                                    toujours inférieur à celui d'un garage privé.

                                                                </p>
                                                                <ul>
                                                                    <li style="color:red;list-style:none;">
                                                                        <i class="ri-check-line"></i>
                                                                        S'il est vrai que des problèmes extrêmes comme
                                                                        une basse pression d'huile ou une surchauffe du
                                                                        moteur déclencheront l'allumage de votre voyant
                                                                        de contrôle du moteur, votre tableau de bord
                                                                        dispose d'autres voyants et jauges pour vous
                                                                        avertir de problèmes graves, et probablement
                                                                        bientôt.

                                                                    </li>
                                                                    <li style="color:red;list-style:none;">
                                                                        <i class="ri-check-line"></i>Une bonne
                                                                        règle de base est de
                                                                        toujours lire votre manuel du propriétaire et de
                                                                        vous renseigner sur les différentes raisons qui
                                                                        déclencheraient l'allumage du témoin de contrôle
                                                                        du moteur. Il devrait également vous faire
                                                                        visiter les autres indicateurs de jauge et
                                                                        d'avertissement sur votre tableau de bord.
                                                                    </li>
                                                                    <li style="color:red;list-style:none;">
                                                                        <i class="ri-check-line"></i>
                                                                        Si votre voyant de contrôle du moteur est
                                                                        allumé, la première chose à faire est de
                                                                        rechercher un problème grave qui nécessite une
                                                                        attention immédiate. Vérifiez les jauges et les
                                                                        voyants de votre tableau de bord pour des
                                                                        indications de basse pression d'huile ou de
                                                                        surchauffe. Ces conditions signifient que vous
                                                                        devez vous arrêter et couper le moteur dès que
                                                                        vous pouvez trouver un endroit sûr pour le
                                                                        faire. Sur certaines voitures, un « vérifier le
                                                                        moteur » jaune signifie enquêter sur le
                                                                        problème, tandis qu'un « vérifier le moteur »
                                                                        rouge signifie s'arrêter maintenant.
                                                                    </li>
                                                                    <li style="color:red;list-style:none;">
                                                                        <i class="ri-check-line"></i>
                                                                        Ensuite, essayez de serrer votre bouchon
                                                                        d'essence. Cela résout souvent le problème.
                                                                        Gardez à l'esprit que cela peut prendre
                                                                        plusieurs voyages avant que la lumière ne se
                                                                        réinitialise. Certains véhicules ont un
                                                                        indicateur séparé qui avertit d'un bouchon
                                                                        d'essence desserré avant que la condition
                                                                        n'éteigne le voyant « vérifier le moteur ».
                                                                    </li>
                                                                    <li style="color:red;list-style:none;">
                                                                        <i class="ri-check-line"></i>
                                                                        Reduce your speed and, if possible, the weight
                                                                        you’re carrying. If the”check engine” light is
                                                                        blinking or you notice any serious performance
                                                                        problems, such as a loss of power, reduce your
                                                                        speed and try to reduce the load on the engine.
                                                                        For example, it would be a good idea to stop
                                                                        towing a trailer. Have the car checked as soon
                                                                        as possible to prevent expensive damage.</li>
                                                                    <li style="color:red;list-style:none;">
                                                                        <i class="ri-check-line"></i>
                                                                        Même si vous ne remarquez pas de problème
                                                                        extrême, vous devez absolument lire le code du
                                                                        moteur de vérification et résoudre le problème.
                                                                        Si vous souhaitez diagnostiquer vous-même le
                                                                        dysfonctionnement, vous pouvez acheter un outil
                                                                        d'analyse dans la plupart des magasins de pièces
                                                                        automobiles. Ces outils vous donneront des
                                                                        instructions sur la façon de déchiffrer les
                                                                        codes du moteur. Si vous n'avez pas déjà des
                                                                        compétences en mécanique pour diagnostiquer et
                                                                        résoudre le problème, c'est une décision plus
                                                                        rentable d'aller directement à un centre de
                                                                        service.

                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card collapse-header">
                                                    <div id="heading2" class="card-header collapse-header"
                                                        data-toggle="collapse" role="button" data-target="#accordion2"
                                                        aria-expanded="false" aria-controls="accordion2">
                                                        <span class="lead collapse-title" style="color:#1977cc;">
                                                            <i class="ri-lg ri-question-line"
                                                                style="color:#76b5ee;"></i> Comment vérifier le
                                                            niveau
                                                            d'huile moteur ?
                                                        </span>
                                                    </div>
                                                    <div id="accordion2" role="tabpanel" data-parent="#accordionWrapa1"
                                                        aria-labelledby="heading2" class="collapse"
                                                        aria-expanded="false">
                                                        <div class="card-content">
                                                            <div class="card-body">
                                                                Vérifier le niveau d'huile de votre voiture est l'une
                                                                des choses les plus vitales que vous puissiez faire pour
                                                                prolonger la durée de vie de votre moteur. Non seulement
                                                                c'est important, mais c'est aussi une tâche très rapide
                                                                et simple à accomplir.
                                                                <br><br>

                                                                <strong>Suivez les étapes ci-dessous pour vérifier votre
                                                                    niveau d'huile…
                                                                </strong>
                                                                <br><br>
                                                                <ul>
                                                                    <li style="color:red;list-style:none;">
                                                                        <i class="ri-check-line"></i>Tout d'abord,
                                                                        assurez-vous que
                                                                        vous êtes garé sur un terrain plat, pour une
                                                                        lecture plus précise.
                                                                    </li>
                                                                    <li style="color:red;list-style:none;">
                                                                        <i class="ri-check-line"></i>Ensuite,
                                                                        ouvrez votre capot en
                                                                        toute sécurité et trouvez la jauge (qui a
                                                                        généralement une poignée de couleur vive,
                                                                        généralement orange, et porte le mot OIL).
                                                                    </li>
                                                                    <li style="color:red;list-style:none;">
                                                                        <i class="ri-check-line"></i>Retirez la
                                                                        jauge et essuyez-la
                                                                        avec une serviette ou un chiffon, puis
                                                                        replacez-la dans le moteur en vous assurant
                                                                        qu'elle rentre complètement.
                                                                    </li>
                                                                    <li style="color:red;list-style:none;">
                                                                        <i class="ri-check-line"></i>Maintenant,
                                                                        retirez la jauge
                                                                        et assurez-vous de ne PAS la retourner pour lire
                                                                        car l'huile coulera et vous n'aurez pas une
                                                                        lecture précise. La jauge aura deux marques sur
                                                                        le fond (généralement des lignes ou des trous
                                                                        dans la jauge), et vous pouvez lire le niveau
                                                                        d'huile en regardant où se rencontrent la
                                                                        section huileuse et la section sèche. Si vous
                                                                        trouvez cette marque entre les deux, alors vous
                                                                        êtes prêt !
                                                                    </li>


                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card collapse-header">
                                                    <div id="heading3" class="card-header collapse-header"
                                                        data-toggle="collapse" role="button" data-target="#accordion3"
                                                        aria-expanded="false" aria-controls="accordion3">
                                                        <span class="lead collapse-title" style="color:#1977cc;">
                                                            <i class="ri-lg ri-question-line"
                                                                style="color:#76b5ee;"></i> à quelle fréquence
                                                            dois-je
                                                            changer mon huile ?
                                                        </span>
                                                    </div>
                                                    <div id="accordion3" role="tabpanel" data-parent="#accordionWrapa1"
                                                        aria-labelledby="heading3" class="collapse"
                                                        aria-expanded="false">
                                                        <div class="card-content">
                                                            <div class="card-body">
                                                                <p>Changer l'huile de votre véhicule aux intervalles
                                                                    recommandés est la meilleure chose à faire pour lui
                                                                    assurer une longue durée de vie. Aussi simple que
                                                                    cette tâche puisse paraître, beaucoup de gens ne
                                                                    savent pas exactement à quelle fréquence l'huile de
                                                                    leur voiture doit être changée
                                                                </p>
                                                                <br>
                                                                <ul>
                                                                    <li style="color:red;list-style:none;">
                                                                        <i class="ri-check-line"></i>Dans le
                                                                        passé, il était
                                                                        courant que les vidanges d'huile aient lieu tous
                                                                        les 5 000 kilomètres ou tous les trois mois,
                                                                        selon la première éventualité. Or, cette norme
                                                                        ne s'applique pas toujours. La qualité de
                                                                        l'huile s'est améliorée au fil des ans et
                                                                        l'industrie automobile a commencé à prendre en
                                                                        compte les habitudes de déplacement et de
                                                                        conduite des conducteurs lors de ses
                                                                        recommandations. En tant que tel, la fréquence à
                                                                        laquelle vous changez votre huile devrait
                                                                        dépendre de vos habitudes de conduite
                                                                        personnelles.
                                                                    </li>
                                                                    <li style="color:red;list-style:none;">
                                                                        <i class="ri-check-line"></i>Si vous
                                                                        n'utilisez la voiture
                                                                        que pour de courts trajets dans les rues de la
                                                                        ville, en particulier par temps froid, vous
                                                                        devriez probablement faire changer l'huile tous
                                                                        les trois mois. Pourquoi? Sur un court trajet,
                                                                        le moteur n'atteint pas sa température de
                                                                        fonctionnement appropriée, ce qui peut provoquer
                                                                        de la condensation d'eau à l'intérieur du carter
                                                                        et l'huile peut être diluée par l'essence.
                                                                    </li>
                                                                    <li style="color:red;list-style:none;">
                                                                        <i class="ri-check-line"></i>Si vous
                                                                        utilisez
                                                                        principalement votre voiture pour des trajets
                                                                        occasionnels plus longs, il est acceptable
                                                                        d'attendre six mois ou plus pour changer
                                                                        l'huile.
                                                                    </li>
                                                                    <li style="color:red;list-style:none;">
                                                                        <i class="ri-check-line"></i>Une chose que
                                                                        vous devez
                                                                        absolument considérer lorsque vous décidez quand
                                                                        votre huile doit être changée est la garantie de
                                                                        votre voiture. De nombreux fabricants exigent
                                                                        spécifiquement que le détenteur de la garantie
                                                                        change l'huile en fonction du temps. Si c'est le
                                                                        cas pour vous, cela vaut la peine de changer
                                                                        l'huile conformément aux directives jusqu'à
                                                                        l'expiration de la garantie. Si votre moteur a
                                                                        besoin d'une réparation couverte par la garantie
                                                                        à l'avenir, votre fabricant pourrait refuser de
                                                                        le couvrir si vous n'avez pas suivi le
                                                                        calendrier recommandé pour les changements
                                                                        d'huile. Pour éviter les maux de tête, suivez
                                                                        leurs recommandations.
                                                                    </li>

                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card collapse-header">
                                                    <div id="heading4" class="card-header" data-toggle="collapse"
                                                        role="button" data-target="#accordion4" aria-expanded="false"
                                                        aria-controls="accordion4">
                                                        <span class="lead collapse-title" style="color:#1977cc;">
                                                            <i class="ri-lg ri-question-line"
                                                                style="color:#76b5ee;"></i> Comment faire
                                                            synchroniser
                                                            le bluetouth avec un telephone ?
                                                        </span>

                                                    </div>
                                                    <div id="accordion4" role="tabpanel" data-parent="#accordionWrapa1"
                                                        aria-labelledby="heading4" class="collapse"
                                                        aria-expanded="false">
                                                        <div class="card-content">
                                                            <div class="card-body">
                                                                <p>
                                                                    Le processus de synchronisation du Bluetooth de
                                                                    votre
                                                                    voiture avec votre iPhone varie en fonction du
                                                                    véhicule que
                                                                    vous conduisez. Cependant, au téléphone, c'est
                                                                    généralement
                                                                    la même chose.
                                                                </p><br>
                                                                Aller à l'écran d'accueil
                                                                <br>
                                                                <ul>
                                                                    <li style="color:red;list-style:none;">
                                                                        <i class="ri-check-line"></i>Choisissez
                                                                        les paramètres</li>
                                                                    <li style="color:red;list-style:none;">
                                                                        <i class="ri-check-line"></i>Général</li>
                                                                    <li style="color:red;list-style:none;">
                                                                        <i class="ri-check-line"></i>Bluetooth
                                                                    </li>
                                                                </ul>

                                                                <p>Si votre téléphone est actuellement synchronisé avec
                                                                    un autre
                                                                    système, appuyez sur le système auquel il est
                                                                    connecté afin
                                                                    de vous en déconnecter, puis choisissez le système
                                                                    avec
                                                                    lequel vous souhaitez qu'il soit synchronisé. Afin
                                                                    de savoir
                                                                    ce que vous devez faire spécifiquement pour votre
                                                                    véhicule,
                                                                    vous pouvez visiter le site Web du fabricant, ou il
                                                                    existe
                                                                    de nombreux forums que vous pouvez trouver en ligne.
                                                                </p>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card collapse-header">
                                                    <div id="heading5" class="card-header" data-toggle="collapse"
                                                        role="button" data-target="#accordion5" aria-expanded="false"
                                                        aria-controls="accordion5">
                                                        <span class="lead collapse-title" style="color:#1977cc;">
                                                            <i class="ri-lg ri-question-line"
                                                                style="color:#76b5ee;"></i> Comment changer les
                                                            essuie-glaces ?
                                                        </span>

                                                    </div>
                                                    <div id="accordion5" role="tabpanel" data-parent="#accordionWrapa1"
                                                        aria-labelledby="heading5" class="collapse"
                                                        aria-expanded="false">
                                                        <div class="card-content">
                                                            <div class="card-body">
                                                                <p>
                                                                    Le remplacement de vos essuie-glaces est une tâche
                                                                    rapide et relativement facile. Vous pouvez trouver
                                                                    des essuie-glaces dans la plupart des magasins de
                                                                    détail automobile. Si vous n'êtes pas sûr du type à
                                                                    utiliser, consultez votre manuel du propriétaire ou
                                                                    demandez à un représentant du magasin.
                                                                    <br><br>
                                                                    Retrait des anciens essuie-glaces…
                                                                </p>

                                                                <br>

                                                                <ul>

                                                                    <li style="color:red;list-style:none;">
                                                                        <i class="ri-check-line"></i>Pour
                                                                        commencer, les anciens
                                                                        essuie-glaces doivent être retirés. Pour ce
                                                                        faire, éloignez tout l'essuie-glace du
                                                                        pare-brise et il devrait se maintenir en place.
                                                                        (Le bras est en métal. Veillez à ne pas rayer la
                                                                        vitre du pare-brise !)
                                                                    </li>
                                                                    <li style="color:red;list-style:none;">
                                                                        <i class="ri-check-line"></i>Utilisez une
                                                                        main pour tenir
                                                                        le bras et l'autre pour appuyer sur la petite
                                                                        languette située sous l'essuie-glace à l'endroit
                                                                        où elle rencontre le bras métallique.
                                                                    </li>
                                                                    <li style="color:red;list-style:none;">
                                                                        <i class="ri-check-line"></i>Faites-le
                                                                        glisser en tirant du
                                                                        centre vers le bas du bras.
                                                                    </li>
                                                                    <li style="color:red;list-style:none;">
                                                                        <i class="ri-check-line"></i>Une fois
                                                                        retiré, placez
                                                                        doucement le bras contre le pare-brise. Afin
                                                                        d'éviter tout dommage, assurez-vous qu'il ne se
                                                                        rétracte pas.
                                                                    </li>

                                                                </ul>
                                                                <br><br>
                                                                <p>Il est maintenant temps de mettre les nouveaux
                                                                    essuie-glaces…

                                                                </p>
                                                                <ul>
                                                                    <li style="color:red;list-style:none;">
                                                                        <i class="ri-check-line"></i>Tout d'abord,
                                                                        alignez les deux
                                                                        pièces pour vous assurer qu'il s'enclenche
                                                                        simplement.

                                                                    </li>
                                                                    <li style="color:red;list-style:none;">
                                                                        <i class="ri-check-line"></i>Regardez du
                                                                        côté de
                                                                        l'essuie-glace qui se fixe au bras. Vous verrez
                                                                        qu'il est plat et a une courbe sur le dessus.
                                                                        Tournez ce clip jusqu'à ce que la courbe pointe
                                                                        vers le balai d'essuie-glace.

                                                                    </li>
                                                                    <li style="color:red;list-style:none;">
                                                                        <i class="ri-check-line"></i>Tenez
                                                                        l'essuie-glace à
                                                                        l'envers à côté du bras où ils correspondent et
                                                                        placez le bras entre les côtés de
                                                                        l'essuie-glace.

                                                                    </li>
                                                                    <li style="color:red;list-style:none;">
                                                                        <i class="ri-check-line"></i>Assurez-vous
                                                                        que l'extrémité
                                                                        ouverte de la courbe fait face au clip et tirez
                                                                        l'essuie-glace vers le haut de sorte que le bord
                                                                        arrondi glisse dans le crochet. Tirez dessus
                                                                        fermement pour l'encliqueter en place.


                                                                    </li>

                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card collapse-header">
                                                        <div id="heading6" class="card-header" data-toggle="collapse"
                                                            role="button" data-target="#accordion6"
                                                            aria-expanded="false" aria-controls="accordion6">
                                                            <span class="lead collapse-title" style="color:#1977cc;">
                                                                <i class="ri-lg ri-question-line"
                                                                    style="color:#76b5ee;"></i> Comment puis-je
                                                                économiser de l'essence ?
                                                            </span>

                                                        </div>
                                                        <div id="accordion6" role="tabpanel"
                                                            data-parent="#accordionWrapa1" aria-labelledby="heading6"
                                                            class="collapse" aria-expanded="false">
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <p>
                                                                        Les prix de l'essence continuent d'augmenter et
                                                                        de baisser. Il existe de nombreuses façons pour
                                                                        les propriétaires de voitures neuves ou
                                                                        d'occasion d'améliorer leur économie de
                                                                        carburant globale jusqu'à 20 %.
                                                                    </p>
                                                                    <br>
                                                                    <strong>
                                                                        La première chose qui affecte l'économie de
                                                                        carburant est la façon dont vous conduisez la
                                                                        voiture…</strong> <br><br>
                                                                    <ul>
                                                                        <li style="color:red;list-style:none;">
                                                                            <i class="ri-check-line"></i>
                                                                            Planifiez vos voyages : essayez d'accomplir
                                                                            plusieurs choses en un seul voyage. Vous
                                                                            pouvez également essayer de faire du
                                                                            covoiturage ou de marcher jusqu'à votre
                                                                            destination. Cela ne réduira pas la
                                                                            consommation de carburant, mais vous aidera
                                                                            à conduire moins, ce qui signifie moins
                                                                            d'essence.

                                                                        </li>
                                                                        <li style="color:red;list-style:none;">
                                                                            <i class="ri-check-line"></i>
                                                                            Ne pas accélérer : Si vous êtes sur
                                                                            l'autoroute, conduire à 100 km/h au lieu de
                                                                            110 km/h vous fera économiser 1 à 2
                                                                            kilomètres par litre sur la durée de votre
                                                                            voyage. Essayez d'utiliser votre régulateur
                                                                            de vitesse, il réduit la consommation de
                                                                            carburant en maintenant une vitesse
                                                                            constante.
                                                                        </li>
                                                                        <li style="color:red;list-style:none;">
                                                                            <i class="ri-check-line"></i>Moins
                                                                            d'accélérateur :
                                                                            Accélérez et freinez facilement. Vous
                                                                            économiserez du carburant ainsi que l'usure
                                                                            de vos freins.
                                                                        </li>
                                                                        <li style="color:red;list-style:none;">
                                                                            <i class="ri-check-line"></i>Ne vous
                                                                            réchauffez pas :
                                                                            grâce à la nouvelle technologie, la plupart
                                                                            des voitures modernes n'ont vraiment besoin
                                                                            que de 30 secondes pour se réchauffer.

                                                                        </li>
                                                                        <li style="color:red;list-style:none;">
                                                                            <i class="ri-check-line"></i>
                                                                            Fenêtres relevées : Le fait d'abaisser les
                                                                            vitres sur l'autoroute peut réduire
                                                                            l'économie de carburant jusqu'à 10 %.
                                                                        </li>
                                                                        <li style="color:red;list-style:none;">
                                                                            <i class="ri-check-line"></i>
                                                                            Huile : Utilisez uniquement l'huile moteur
                                                                            spécifiée par le fabricant et changez-la
                                                                            selon les recommandations de l'usine, peut
                                                                            également améliorer l'économie de carburant.

                                                                        </li>
                                                                        <li style="color:red;list-style:none;">
                                                                            <i class="ri-check-line"></i>
                                                                            Poids : moins le poids de votre véhicule est
                                                                            important, meilleure est la consommation de
                                                                            carburant. 45 kilogrammes supplémentaires
                                                                            augmentent la consommation de carburant de 1
                                                                            à 2 %.

                                                                        </li>
                                                                        <li style="color:red;list-style:none;">
                                                                            <i class="ri-check-line"></i>
                                                                            Pneus : Assurez-vous que vos pneus sont
                                                                            réglés à la pression recommandée à tout
                                                                            moment, cela peut augmenter l'économie de
                                                                            carburant jusqu'à 3,3 %.

                                                                        </li>
                                                                        <li style="color:red;list-style:none;">
                                                                            <i class="ri-check-line"></i>
                                                                            Filtres : Un filtre à air et un filtre à
                                                                            carburant propres permettront à l'air et au
                                                                            carburant de circuler sans encombre et
                                                                            peuvent vous aider à économiser jusqu'à 10 %
                                                                            sur les coûts de carburant.

                                                                        </li>
                                                                    </ul>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card collapse-header">
                                                        <div id="heading7" class="card-header" data-toggle="collapse"
                                                            role="button" data-target="#accordion7"
                                                            aria-expanded="false" aria-controls="accordion7">
                                                            <span class="lead collapse-title" style="color:#1977cc;">
                                                                <i class="ri-lg ri-question-line"
                                                                    style="color:#76b5ee;"></i>
                                                                Comment vérifier le niveau de liquide de refroidissement
                                                                ?
                                                            </span>

                                                        </div>
                                                        <div id="accordion7" role="tabpanel"
                                                            data-parent="#accordionWrapa1" aria-labelledby="heading7"
                                                            class="collapse" aria-expanded="false">
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <p>
                                                                        Vérifier le niveau de liquide de refroidissement
                                                                        dans votre voiture est un processus assez
                                                                        simple. La première chose à retenir est de
                                                                        vérifier le niveau de liquide de refroidissement
                                                                        lorsque la voiture est froide. Dans la plupart
                                                                        des voitures d'aujourd'hui, il y a un réservoir
                                                                        de trop-plein de liquide de refroidissement
                                                                        opaque situé à côté du radiateur. Le réservoir
                                                                        opaque est en plastique blanc, ce qui permet de
                                                                        voir l'intérieur et de s'assurer que le liquide
                                                                        de refroidissement est à un niveau sécuritaire.
                                                                        Vous constaterez également qu'il y a des marques
                                                                        sur le côté pour vous indiquer à quel point le
                                                                        niveau est haut ou bas.

                                                                    </p>

                                                                    <br><br>

                                                                    <ul>
                                                                        <li style="color:red;list-style:none;">
                                                                            <i class="ri-check-line"></i>
                                                                            Vous devriez vérifier votre niveau de
                                                                            liquide de refroidissement plusieurs fois
                                                                            par an pour vous assurer qu'il n'y a pas de
                                                                            fuites dans votre système.


                                                                        </li>
                                                                        <li style="color:red;list-style:none;">
                                                                            <i class="ri-check-line"></i>
                                                                            Si vous constatez que vous manquez de
                                                                            liquide de refroidissement, vous devrez le
                                                                            compléter. Les moteurs utilisent un mélange
                                                                            50/50 de liquide de refroidissement et
                                                                            d'eau, ce qui permet à votre radiateur la
                                                                            protection optimale contre l'ébullition ou
                                                                            le gel dont votre moteur a besoin. Vous
                                                                            pouvez généralement acheter ce pré-mélangé.

                                                                        </li>
                                                                        <li style="color:red;list-style:none;">
                                                                            <i class="ri-check-line"></i>Pour
                                                                            ajouter le liquide de
                                                                            refroidissement, il suffit de dévisser le
                                                                            bouchon du réservoir de trop-plein opaque et
                                                                            d'ajouter le mélange jusqu'à ce qu'il
                                                                            atteigne le repère plein.

                                                                        </li>
                                                                        <li style="color:red;list-style:none;">
                                                                            <i class="ri-check-line"></i>Après
                                                                            cela, tout ce que
                                                                            vous avez à faire est de replacer le
                                                                            capuchon, assurez-vous qu'il est bien serré
                                                                            et vous êtes prêt à rouler !


                                                                        </li>
                                                                        <li style="color:red;list-style:none;">
                                                                            <i class="ri-check-line"></i>
                                                                            Assurez-vous de changer votre liquide de
                                                                            refroidissement tous les deux ans (en
                                                                            suivant les recommandations du fabricant).

                                                                        </li>
                                                                        <li style="color:red;list-style:none;">
                                                                            <i class="ri-check-line"></i>
                                                                            Huile : Utilisez uniquement l'huile moteur
                                                                            spécifiée par le fabricant et changez-la
                                                                            selon les recommandations de l'usine, peut
                                                                            également améliorer l'économie de carburant.

                                                                        </li>
                                                                        <li style="color:red;list-style:none;">
                                                                            <i class="ri-check-line"></i>
                                                                            Poids : moins le poids de votre véhicule est
                                                                            important, meilleure est la consommation de
                                                                            carburant. 45 kilogrammes supplémentaires
                                                                            augmentent la consommation de carburant de 1
                                                                            à 2 %.

                                                                        </li>
                                                                        <li style="color:red;list-style:none;">
                                                                            <i class="ri-check-line"></i>
                                                                            Pneus : Assurez-vous que vos pneus sont
                                                                            réglés à la pression recommandée à tout
                                                                            moment, cela peut augmenter l'économie de
                                                                            carburant jusqu'à 3,3 %.

                                                                        </li>
                                                                        <li style="color:red;list-style:none;">
                                                                            <i class="ri-check-line"></i>
                                                                            Filtres : Un filtre à air et un filtre à
                                                                            carburant propres permettront à l'air et au
                                                                            carburant de circuler sans encombre et
                                                                            peuvent vous aider à économiser jusqu'à 10 %
                                                                            sur les coûts de carburant.

                                                                        </li>
                                                                    </ul>


                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card collapse-header">
                                                            <div id="heading8" class="card-header"
                                                                data-toggle="collapse" role="button"
                                                                data-target="#accordion8" aria-expanded="false"
                                                                aria-controls="accordion8">
                                                                <span class="lead collapse-title"
                                                                    style="color:#1977cc;"><i
                                                                        class="ri-lg ri-question-line"
                                                                        style="color:#76b5ee;"></i>
                                                                    La climatisation n'est pas froide ?
                                                                </span>

                                                            </div>
                                                            <div id="accordion8" role="tabpanel"
                                                                data-parent="#accordionWrapa1"
                                                                aria-labelledby="heading8" class="collapse"
                                                                aria-expanded="false">
                                                                <div class="card-content">
                                                                    <div class="card-body">
                                                                        <p>
                                                                            Plusieurs raisons peuvent expliquer pourquoi
                                                                            votre système de climatisation souffle de
                                                                            l'air chaud au lieu de l'air froid.

                                                                            <br><br>
                                                                            Retrait des anciens essuie-glaces…


                                                                        </p>
                                                                        <ul>
                                                                            <li style="color:red;list-style:none;">
                                                                                <i class="ri-check-line"></i>La
                                                                                première
                                                                                possibilité est qu'il y ait une fuite de
                                                                                réfrigérant. La fuite peut être trouvée
                                                                                dans l'évaporateur, le condenseur ou le
                                                                                tuyau, auquel cas vous devez amener
                                                                                votre voiture chez un mécanicien pour
                                                                                qu'elle soit réparée.

                                                                            </li>
                                                                            <li style="color:red;list-style:none;">
                                                                                <i class="ri-check-line"></i>Une
                                                                                autre raison pour
                                                                                laquelle votre climatiseur peut ne pas
                                                                                souffler d'air frais est que le
                                                                                compresseur a mal tourné. Le compresseur
                                                                                pressurise le réfrigérant et le pompe
                                                                                dans tous les composants nécessaires du
                                                                                climatiseur. Parce que tout tourne
                                                                                autour du compresseur, s'il est
                                                                                défectueux alors la climatisation ne
                                                                                fonctionnera pas correctement.
                                                                                Habituellement, il y aura un bruit fort
                                                                                lorsque vous essayez d'allumer votre
                                                                                climatiseur si le compresseur est cassé.

                                                                            </li>
                                                                            <li style="color:red;list-style:none;">
                                                                                <i class="ri-check-line"></i>
                                                                                Enfin, un autre problème qui peut
                                                                                survenir avec votre système de
                                                                                climatisation est qu'il y a un tube à
                                                                                orifice bouché. Celui-ci est situé entre
                                                                                le condenseur à l'avant du radiateur et
                                                                                l'évaporateur dans l'habitacle. S'il y a
                                                                                une obstruction dans le tube, cela
                                                                                empêchera le réfrigérant d'atteindre
                                                                                l'évaporateur, ce qui obligera votre
                                                                                système à souffler de l'air chaud.

                                                                            </li>


                                                                        </ul>
                                                                        <br><br>
                                                                        <p>Il est maintenant temps de mettre les
                                                                            nouveaux
                                                                            essuie-glaces…

                                                                        </p>
                                                                        <ul>
                                                                            <li style="color:red;list-style:none;">
                                                                                <i class="ri-check-line"></i>Tout
                                                                                d'abord, alignez
                                                                                les deux
                                                                                pièces pour vous assurer qu'il
                                                                                s'enclenche
                                                                                simplement.

                                                                            </li>
                                                                            <li style="color:red;list-style:none;">
                                                                                <i class="ri-check-line"></i>
                                                                                Regardez du côté de
                                                                                l'essuie-glace qui se fixe au bras. Vous
                                                                                verrez
                                                                                qu'il est plat et a une courbe sur le
                                                                                dessus.
                                                                                Tournez ce clip jusqu'à ce que la courbe
                                                                                pointe
                                                                                vers le balai d'essuie-glace.

                                                                            </li>
                                                                            <li style="color:red;list-style:none;">
                                                                                <i class="ri-check-line"></i>Tenez
                                                                                l'essuie-glace à
                                                                                l'envers à côté du bras où ils
                                                                                correspondent et
                                                                                placez le bras entre les côtés de
                                                                                l'essuie-glace.

                                                                            </li>
                                                                            <li style="color:red;list-style:none;">
                                                                                <i class="ri-check-line"></i>
                                                                                Assurez-vous que
                                                                                l'extrémité
                                                                                ouverte de la courbe fait face au clip
                                                                                et tirez
                                                                                l'essuie-glace vers le haut de sorte que
                                                                                le bord
                                                                                arrondi glisse dans le crochet. Tirez
                                                                                dessus
                                                                                fermement pour l'encliqueter en place.


                                                                            </li>

                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>



                                                        </div>



                                                        <div class="card collapse-header">
                                                            <div id="heading9" class="card-header"
                                                                data-toggle="collapse" role="button"
                                                                data-target="#accordion9" aria-expanded="false"
                                                                aria-controls="accordion9">
                                                                <span class="lead collapse-title"
                                                                    style="color:#1977cc;">
                                                                    <i class="ri-lg ri-question-line"
                                                                        style="color:#76b5ee;"></i> Pourquoi mon
                                                                    moteur
                                                                    tourne-t-il au ralenti ?

                                                                </span>

                                                            </div>
                                                            <div id="accordion9" role="tabpanel"
                                                                data-parent="#accordionWrapa1"
                                                                aria-labelledby="heading9" class="collapse"
                                                                aria-expanded="false">
                                                                <div class="card-content">
                                                                    <div class="card-body">
                                                                        <p>
                                                                            Une chose à garder à l'esprit est que la
                                                                            marche au ralenti brutale n'est pas le
                                                                            problème - c'est un symptôme d'un problème
                                                                            de moteur qui n'a pas encore été
                                                                            diagnostiqué. Votre moteur peut tourner au
                                                                            ralenti à peu près pour un certain nombre de
                                                                            raisons différentes.

                                                                            L'une des raisons d'un ralenti irrégulier
                                                                            est qu'il est peut-être temps de nettoyer
                                                                            les injecteurs de carburant ou de changer
                                                                            les bougies
                                                                        </p>

                                                                        <br>
                                                                        <strong>Les autres raisons de la marche au
                                                                            ralenti brutale comprennent :
                                                                        </strong> <br><br>
                                                                        <ul>
                                                                            <li style="color:red;list-style:none;">
                                                                                <i class="ri-check-line"></i>
                                                                                Problèmes
                                                                                d'échappement.
                                                                            </li>
                                                                            <li style="color:red;list-style:none;">
                                                                                <i class="ri-check-line"></i>Trous
                                                                                dans la soupape
                                                                                d'admission d'air.</li>
                                                                            <li style="color:red;list-style:none;">
                                                                                <i class="ri-check-line"></i>Une
                                                                                perte de puissance
                                                                                générale dans la voiture.
                                                                            </li>
                                                                            <li style="color:red;list-style:none;">
                                                                                <i class="ri-check-line"></i>Cela
                                                                                peut également se
                                                                                produire pendant les mois d'hiver,
                                                                                lorsque les voitures ont plus de
                                                                                difficulté à démarrer et peuvent
                                                                                trembler lorsque le moteur tourne.
                                                                            </li>
                                                                        </ul>
                                                                        <br><br>
                                                                        <p>Si votre téléphone est actuellement
                                                                            synchronisé avec
                                                                            un autre
                                                                            système, appuyez sur le système auquel il
                                                                            est
                                                                            connecté afin
                                                                            de vous en déconnecter, puis choisissez le
                                                                            système
                                                                            avec
                                                                            lequel vous souhaitez qu'il soit
                                                                            synchronisé. Afin
                                                                            de savoir
                                                                            ce que vous devez faire spécifiquement pour
                                                                            votre
                                                                            véhicule,
                                                                            vous pouvez visiter le site Web du
                                                                            fabricant, ou il
                                                                            existe
                                                                            de nombreux forums que vous pouvez trouver
                                                                            en ligne.
                                                                        </p>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card collapse-header">
                                                            <div id="heading10" class="card-header"
                                                                data-toggle="collapse" role="button"
                                                                data-target="#accordion10" aria-expanded="false"
                                                                aria-controls="accordion10">
                                                                <span class="lead collapse-title"
                                                                    style="color:#1977cc;"><i
                                                                        class="ri-lg ri-question-line"
                                                                        style="color:#76b5ee;"></i>
                                                                    Qu'est-ce qui ne va pas avec mes freins ?


                                                                </span>

                                                            </div>
                                                            <div id="accordion10" role="tabpanel"
                                                                data-parent="#accordionWrapa1"
                                                                aria-labelledby="heading10" class="collapse"
                                                                aria-expanded="false">
                                                                <div class="card-content">
                                                                    <div class="card-body">
                                                                        <p>
                                                                            Les freins sont l'une des pièces les plus
                                                                            importantes de votre véhicule et ils
                                                                            contribuent grandement à votre sécurité au
                                                                            volant. Cependant, il est souvent difficile
                                                                            de déterminer si les bruits que nous
                                                                            entendons faire par nos freins sont le
                                                                            résultat de quelque chose de simple, comme
                                                                            de l'air dans la conduite de frein, ou s'ils
                                                                            sont un signe avant-coureur d'une
                                                                            défaillance imminente des freins.


                                                                            N'oubliez pas que lorsque votre technicien
                                                                            de service recommande une réparation de
                                                                            frein, celle-ci doit être effectuée dès que
                                                                            possible pour éviter tout danger. Que vous
                                                                            ayez besoin d'une simple inspection de
                                                                            frein, d'un remplacement de frein, d'un
                                                                            remplacement de plaquette de frein ou de
                                                                            travaux sur les disques de frein, les
                                                                            plaquettes de frein ou les rotors, nous
                                                                            pouvons vous aider. Nos techniciens sont
                                                                            formés pour travailler sur des marques et
                                                                            des modèles spécifiques, et nos prix sont
                                                                            souvent inférieurs à ceux que vous pouvez
                                                                            trouver dans un garage indépendant.



                                                                            Pour une meilleure idée de ce qui pourrait
                                                                            causer votre problème de freinage, lisez la
                                                                            suite pour obtenir des réponses aux
                                                                            questions courantes sur les freins.
                                                                            .

                                                                        </p>

                                                                        <br>
                                                                        <strong>Pourquoi mes freins pulsent ?



                                                                        </strong><br><br>
                                                                        <ul>
                                                                            <li style="color:red;list-style:none;">
                                                                                <i class="ri-check-line"></i>
                                                                                Si vous ressentez une pulsation ou des
                                                                                secousses du frein, il est beaucoup plus
                                                                                probable que cela ait été causé par un
                                                                                défaut du rotor ou du tambour de frein
                                                                                que par le système antiblocage. Un rotor
                                                                                déformé ou un tambour mal rond peut
                                                                                provoquer des pulsations prononcées dans
                                                                                la pédale de frein.

                                                                            </li>
                                                                            <li style="color:red;list-style:none;">
                                                                                <i class="ri-check-line"></i>
                                                                                L'échec de la
                                                                                rétraction de la plaquette n'est pas
                                                                                rare. Dans les systèmes à tambour plus
                                                                                anciens, les mâchoires de frein sont
                                                                                retirées du tambour par de puissants
                                                                                ressorts. Mais dans un système de frein
                                                                                à disque, les plaquettes sont retirées
                                                                                du rotor (ou du disque) par l'élasticité
                                                                                des joints en caoutchouc. À mesure que
                                                                                ces joints vieillissent ou sont
                                                                                endommagés par du liquide de frein
                                                                                contaminé, ils peuvent ne pas faire leur
                                                                                travail. Le résultat est que le patin va
                                                                                rouler contre le rotor et s'user
                                                                                prématurément.
                                                                            </li>
                                                                            <li style="color:red;list-style:none;">
                                                                                <i class="ri-check-line"></i>Si
                                                                                votre rotor est
                                                                                déformé, le patin peut s'user même sans
                                                                                défaillance du joint en caoutchouc. Un
                                                                                rotor déformé vacillera lorsqu'il
                                                                                tournera, raclant ainsi le patin
                                                                                lorsqu'il tourne. Finalement, le tampon
                                                                                s'use et la plaque d'appui en métal
                                                                                endommagera le rotor en métal.

                                                                            </li>

                                                                        </ul>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->
    @include('layouts.footer')


    @include('layouts.footer-scripts')



    <script>
        if (navigator.geolocation) {
            var options = {
  enableHighAccuracy: true,
  timeout: 5000,
  maximumAge: 5000,
};
            navigator.geolocation.getCurrentPosition(showPosition,error,options);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
        function showPosition(position) {
          /*  $.ajax({
        url: "{{URL::to('compare')}}",
        type: 'GET',
        data: {
            lat: position.coords.latitude,
            long: position.coords.longitude
        },
        success: function(data) {
            // you can manipulation your html here
        }
    });*/
    alert("Latitude: " + position.coords.latitude + 
            "<br>Longitude: " + position.coords.longitude); 
        }
        function error(err) {
  console.warn(`ERREUR (${err.code}): ${err.message}`);
}

    </script>
</body>

<!-- END: Body-->

</html>