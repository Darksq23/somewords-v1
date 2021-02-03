On a besoin comme d'habitude d'un champ « id » en auto-increment, mais aussi des champs pour le « titre » et le « contenu » de
la news.
Enfin, on a un champ « timestamp » qui nous permettra de stocker le timestamp du moment où la news a été postée. Comme on l'a
vu dans le chapitre sur les dates, on pourra ressortir toutes les informations qu'on veut à partir de ce timestamp (le jour,
l'heure…).
En ce qui concerne les liens, voici quelques petites choses à savoir.
Le lien « Ajouter une news » sur la page liste_news.php est un lien HTML normal qui amène vers rediger_news.php.
Sur la page liste_news.php, si l'on clique sur « Modifier » pour une news, ça amène vers la page rediger_news, mais cette
fois avec un paramètre qui indique l'id de la news à modifier. Par exemple, pour la news n
o 3, le lien serait :
rediger_news.php?modifier_news=3.
Pensez à préremplir les champs « titre » et « contenu » si c'est une modification de news !
Sur la page liste_news.php toujours, si l'on clique sur « Supprimer » pour une news, ça recharge la page liste_news avec
un paramètre qui indiquera qu'il faut supprimer une news. Par exemple, le lien pour la news dont le numéro d'id est 3 sera :
liste_news.php?supprimer_news=3.
Lorsque l'on validera le formulaire de rediger_news.php, le mieuxest de retourner sur la page liste_news.php. La balise du
formulaire sera donc : <formaction="liste_news.php" method="post">.
Dans liste_news.php, on vérifiera si les variables $_POST['titre'] et $_POST['contenu'] existent : ça voudra dire alors qu'il faut
enregistrer des informations dans la base de données