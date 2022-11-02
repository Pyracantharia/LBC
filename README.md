# LBC de la M2L
Site de vente des produits securise comme leboncoin.fr .
<br>
<br>
<br>
<h1><center>Cahiers des charges</center></h1<br>
<br>
<h2>Mon compte:</h2><br>
-Pouvoir créer un compte de manière sécurisée (L'application doit disposer d'un formulaire d'inscription avec la méthode POST demandant un email et un mot de passe. Le mot de passe de l'utilisateur doit être chiffré selon l'algorithme MD5 en base de données. Une erreur doit s'afficher s'il manque l'email ou le mot de passe, et si le mot de passe fait moins de 10 caractères.)<br>
-Pouvoir se connecter de manière sécurisée (L'application doit disposer d'un formulaire de connexion avec la méthode POST demandant un email et un mot de passe. Une erreur doit s'afficher si l'email n'existe pas ou si le mot de passe est incorrect.  )<br>
-Pouvoir créer une annonce (L'utilisateur doit disposer d'un formulaire pour créer une annonce avec comme champs obligatoires le nom de l'annonce, le prix, la description et une photo. D'autres champs peuvent être ajoutés comme la catégorie, etc...)<br>
-Pouvoir modifier une annonce (L'utilisateur doit pouvoir modifier une annonce déjà créée. Il retrouvera un formulaire avec les informations de l'annonce pré remplis. Il pourra enregistrer ou annuler ses modifications.)<br>
-Pouvoir supprimer une annonce (L'utilisateur doit pouvoir supprimer une annonce déjà créée. Un message d'avertissement lui sera affiché juste avant de supprimer l'annonce pour éviter les mauvaises manipulations.)<br>
<br>
<h2>Annonces:</h2><br>
-Voir la liste des annonces (Un utilisateur, connecté ou non, doit pouvoir voir la liste des annonces disponibles dans la base de données. Elle sera affichée sous la forme d'une liste de cartes. Les informations obligatoires doivent être présentes sur la fiche de l'annonce.)<br>
-Voir le détail d'une annonce (L'utilisateur doit pouvoir voir les détails de l'annonce sur laquelle il a cliqué. Il verra alors les informations complémentaires de l'annonce qui n'étaient pas présentes dans la liste des annonces.)<br>
-Pouvoir filtrer les annonces selon plusieurs critères (L'utilisateur doit disposer d'un formulaire pour filtrer les différentes annonces selon certains critères comme le prix, la catégorie, etc...)<br>
-Pouvoir mettre des annonces dans ses favoris (Un utilisateur connecté doit pouvoir ajouter ou retirer des annonces de ses favoris. Il pourra ensuite consulter ses annonces favorites depuis son compte.)<br>
<br>
<h2>Messagerie:</h2><br>
-Pouvoir envoyer un message concernant une annonce (Un utilisateur connecté doit pouvoir envoyer un message à un autre utilisateur concernant une annonce précise. Les échanges seront supprimés si l'annonce est supprimée.)<br>
-Pouvoir consulter ses messages (Un utilisateur connecté doit pouvoir consulter depuis son compte les différents échanges qu'il a eu avec d'autres utilisateurs.)<br>
<br>
<h3>Bonus:</h3><br>
-Voir les annonces les plus consultées (Ajouter au détail des annonces le nombre de fois que l'on a cliqué sur chaque annonce)<br>
-Barre de recherche en AJAX (Pouvoir rechercher un produit depuis une barre de recherche. Le chargement des données se fera en AJAX)<br>
-Envois d'emails (Ajouter à l'application des envois d'emails utiles (création de compte, réception d'un message, etc) par la méthode de votre choix (API))<br>
-Organiser son code selon une architecture MVC (Adopter une architecture Modèle Vue Controlleur bien organisée)<br>
-Versionning sur Github (Gérer le développement en équipe grâce à Github)<br>
-Autres (Toute autre démarche démontrée lors de la soutenance sera valorisée)<br>
<br>
<h2>En cours:</h2><br>
-Design du site<br>
