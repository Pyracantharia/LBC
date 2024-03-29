# LBC
LeBonCoin de la M2L

Descriptif de la réalisation professionnelle, y compris les productions réalisées et schémas explicatifs

Le concept du projet est de réaliser une application web de gestion de petites annonces comme Leboncoin.  Cette application sera développée en PHP pour le côté serveur, HTML et CSS pour le côté client et SQL pour la base de données. Du Javascript peut être utilisé pour améliorer l’expérience utilisateur, mais n’est pas obligatoire. L’application devra permettre à un utilisateur de s’inscrire et se connecter à son compte, de gérer ses annonces, de consulter d’autres annonces et de contacter d’autres utilisateurs via leurs annonces.

 

Détail des fonctionnalités

-        Pouvoir créer un compte de manière sécurisée : L'application doit disposer d'un formulaire d'inscription avec la méthode POST demandant un email et un mot de passe. Le mot de passe de l'utilisateur doit être chiffré selon l'algorithme MD5 en base de données. Une erreur doit s'afficher s'il manque l'email ou le mot de passe, et si le mot de passe fait moins de 10 caractères.

 

-        Pouvoir se connecter de manière sécurisée : L'application doit disposer d'un formulaire de connexion avec la méthode POST demandant un email et un mot de passe. Une erreur doit s'afficher si l'email n'existe pas ou si le mot de passe est incorrect.

 

-        Pouvoir créer une annonce : L'utilisateur doit disposer d'un formulaire pour créer une annonce avec comme champs obligatoires le nom de l'annonce, le prix, la description et une photo. D'autres champs peuvent être ajoutés comme la catégorie, etc…

 

-        Pouvoir modifier une annonce : L'utilisateur doit pouvoir modifier une annonce déjà créée. Il retrouvera un formulaire avec les informations de l'annonce pré remplis. Il pourra enregistrer ou annuler ses modifications.

 

-        Pouvoir supprimer une annonce : L'utilisateur doit pouvoir supprimer une annonce déjà créée. Un message d'avertissement lui sera affiché juste avant de supprimer l'annonce pour éviter les mauvaises manipulations.

 

-        Voir la liste des annonces : Un utilisateur, connecté ou non, doit pouvoir voir la liste des annonces disponibles dans la base de données. Elle sera affichée sous la forme d'une liste de cartes. Les informations obligatoires doivent être présentes sur la fiche de l'annonce.

 

-        Voir le détail d'une annonce : L'utilisateur doit pouvoir voir les détails de l'annonce sur laquelle il a cliqué. Il verra alors les informations complémentaires de l'annonce qui n'étaient pas présentes dans la liste des annonces.

 

-        Pouvoir filtrer les annonces selon plusieurs critères : L'utilisateur doit disposer d'un formulaire pour filtrer les différentes annonces selon certains critères comme le prix, la catégorie, etc…

 

-        Pouvoir mettre des annonces dans ses favoris : Un utilisateur connecté doit pouvoir ajouter ou retirer des annonces de ses favoris. Il pourra ensuite consulter ses annonces favorites depuis son compte.

 

-        Pouvoir envoyer un message concernant une annonce : Un utilisateur connecté doit pouvoir envoyer un message à un autre utilisateur concernant une annonce précise. Les échanges seront supprimés si l'annonce est supprimée.

 

-        Pouvoir consulter ses messages : Un utilisateur connecté doit pouvoir consulter depuis son compte les différents échanges qu'il a eu avec d'autres utilisateurs.

 
