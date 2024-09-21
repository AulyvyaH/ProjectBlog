<?php

function initDB($db){
  $db->exec("CREATE TABLE IF NOT EXISTS users (id INTEGER PRIMARY KEY AUTOINCREMENT, firstname TEXT, lastname TEXT, email TEXT, password TEXT)");

  $db->exec("CREATE TABLE IF NOT EXISTS topics (id INTEGER PRIMARY KEY AUTOINCREMENT, title TEXT, content TEXT, author TEXT, creation_date TEXT)");

  $db->exec(
    'INSERT INTO users (firstname, lastname, email, password) 
    VALUES ("James", "Brown", "jbrown@example.com", "XctH42@Pot"),
    ("Mary", "Brown", "mbrown@example.com", "AB123$!çYg"),
    ("Mary", "Dawson", "mdawsonj@example.com", "CD123$!çYg"),
    ("Mary", "Dinah", "mdinah@example.com", "EF123$!çYg"),
    ("John", "Doe", "jdoe@example.com", "test1234="),
    ("John", "Davis", "jdavis@example.com", "tinecoS7@+"),
    ("Robert", "Jones", "rjones@example.com", "8eeth0ven42")'
  );

  $db->exec(
    'INSERT INTO topics (title, content, author, creation_date) 
    VALUES ("Comment apprendre à coder ?", "Il n\'y a pas qu\'une seule façon d\'apprendre à coder. Certaines personnes vont à l\'école, d\'autres s\'inscrivent à des bootcamps ou encore à des sessions d\'entraînement intensif. Certains choisissent même de s\'auto-former. Même avec autant de possibilités pour apprendre à coder, il y a, néanmoins, quelques étapes générales que vous pouvez suivre pour rendre le processus d\'apprentissage plus facile et plus efficace ", "Danny Boon", "12-12-2023"),
    ("Commencez à apprendre à coder par vous-même", "Si vous n\'avez jamais codé auparavant, il est fortement recommandé de rechercher des ressources gratuites en ligne et de commencer à apprendre les bases par vous-même. Cela vous donnera la possibilité de décider si vous voulez vraiment vous engager sur cette voie avant de financer un programme de formation ou un diplôme.", "Danny Biin", "13-12-2023"),
    ("Choisissez la bonne option pour apprendre à coder", "Une fois que vous avez décidé que le codage est une compétence que vous voulez absolument acquérir, trouvez le meilleur chemin, celui qui vous correspond le mieux et qui vous semble être fait pour vous. Si vous voulez devenir programmeur, une formation de cinq ans menant à un diplôme en informatique est probablement votre meilleur choix. De telles formations pour devenir programmeur sont dispensées dans des écoles d\'ingénieur en informatique.", "Danny Baan", "14-12-2023"),
    ("Choisissez vos langages de programmation", "Si vous souhaitez apprendre à coder, il est recommandé de connaitre certains langages en priorité : HTML, JavaScript et CSS. Par la suite, vous pourrez en choisir au moins un de plus à maitriser et au moins un dont vous pouvez comprendre les principes fondamentaux.
Au-delà de cela, le nombre de langues supplémentaires que vous prendrez ainsi que le temps que vous être prêt à consacrer à étudier dépendra de l\'importance du codage dans votre carrière professionnelle. S\'il s\'agit de la fonction centrale de votre travail, il serait préférable pour vous d\'être aussi flexible que possible en passant d\'un langage à l\'autre. Si ce n\'est pas le cas, les langages avec lesquels vous avez commencé sont probablement suffisants.", "Danny Buun", "14-12-2023"),
    ("Soyez patient et cohérent", "Apprendre à coder peut être passionnant au début, car vous apprenez de nouvelles compétences à un rythme rapide. Cependant, une fois que vous avez acquis les bases, il est beaucoup plus difficile de maîtriser les compétences les plus avancées.
Si vous êtes patient et que vous continuez à consacrer du temps et de l\'énergie à l\'apprentissage, vous dépasserez cette phase de plateau et atteindrez un point où le codage redeviendra passionnant. Votre apprentissage deviendra encore plus excitant, non seulement du fait de votre maîtrise et votre compréhension, mais surtout parce que vous serez capable de réaliser des programmes tous plus intéressants les uns que les autres.", "Danny Boon", "15-12-2023"),
    ("Préparez-vous à une vie d\'apprentissage", "Si vous apprenez à coder pour devenir développeur informatique ou programmeur, vous devrez continuer à apprendre tout au long de votre carrière pour vous tenir au courant des langages et des possibilités les plus récentes. Prévoyez du temps au moins une fois par mois pour vous tenir au courant des dernières nouvelles de la programmation et découvrir quels nouveaux langages de programmation sont en cours de développement et quelles nouvelles technologies rencontrent du succès. Vous n\'avez pas besoin d\'étudier intensivement chaque nouveau langage, mais il est recommandé de l\'essayer pour avoir une idée de son fonctionnement.", "Danny Been", "16-12-2023")');
}

//Delete DB File if exists to prevent duplicate datas
$sqlitePath = "data.sqlite";
if (file_exists($sqlitePath)) {
   unlink($sqlitePath);
}
//

$pdo = new PDO('sqlite:data.sqlite');
initDB($pdo);
