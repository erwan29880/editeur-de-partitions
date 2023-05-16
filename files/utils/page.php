<?php  
if(!isset($_GET['a'])) exit;

echo '<html><head></head><META HTTP-EQUIV="Content-Type" CONTENT="text/html;charset=utf-8"><body>';



if($_GET['a']==1){
    echo '<p>Des caractères ne sont pas pris en charge !</p>
    <p>Voici ceux qui sont pris en charge :</p>
    <ul>
        <li>G,</li>
        <li>A,</li>
        <li>B,</li>
        <li>C</li>
        <li>D</li>
        <li>E</li>
        <li>F</li>
        <li>G</li>
        <li>A</li>
        <li>B</li>
        <li>c</li>
        <li>d</li>
        <li>e</li>
        <li>f</li>
        <li>g</li>
        <li>a</li>
        <li>b</li>
        <li>c\'</li>
        <li>d\'</li>
        <li>e\'</li>
        <li>^C ou _D</li>
        <li>^D ou _E</li>
        <li>^G ou _A</li>
        <li>^A ou _B</li>
        <li>^c ou _d</li>
        <li>^d ou _e</li>
        <li>^g ou _a</li>
        <li>^a ou _b</li>
    </ul>

    <p>Ne tentez pas les airs avec ce genre de symboles [DG,,2] ! Ces airs reprennent la main droite et la main gauche du diato (ils sont édités par le logiciel tabledit), utilisez donc la fonction "import" de TablEdit pour les utiliser ! Le format ABC est un format texte très simple...et facilement déchiffrable...ce qui n\'est pas vraiment le cas des airs avec ce genre de symboles.</p> 
    <p><a href="clavier4.php">Retentez !</p>';
}


if($_GET['a']==2){
    echo '<p>Cette tonalité n\'est pas prise en charge !</p>
    <p>Voici celles qui sont prises en charge pour le moment :</p>
    <ul>
        <li>Sol majeur</li>
        <li>Do majeur</li>
        <li>Fa majeur</li>
        <li>Ré majeur</li>
        <li>La majeur</li>
        <li>Mi mineur</li>
        <li>La mineur</li>
        <li>Ré mineur</li>
        <li>Sol mineur</li>
        <li>Si mineur</li>
        <li>La dorien</li>
        <li>Ré dorien</li>
        <li>Sol dorien</li>
        <li>Mi dorien</li>
        <li>Si dorien</li>
        <li>Sol mixolydien</li>
        <li>La mixolydien</li>
        <li>Do mixolydien</li>
        <li>Ré mixolydien</li>
        <li>La phrygien</li>
    </ul>
    <p><a href="clavier4.php">Retentez !</p>';
}

if($_GET['a']==3){
    echo '<p>Votre fichier ne semble pas être en 2/4...essayez de rajouter des barres de mesures, de diviser le rythme des notes par deux, d\'indiquer un "L:" différent, de changer la métrique en 4/4...désolé !</p>';
    echo '<p><a href="clavier4.php">Retentez !</p>';
}

if($_GET['a']==4){
    echo '<p>Cette tonalité n\'est pas prise en charge pour un la/ré.</p>';
    echo '<p><a href="clavier4.php">Retentez !</p>';
}

echo '</body></html>';

?>