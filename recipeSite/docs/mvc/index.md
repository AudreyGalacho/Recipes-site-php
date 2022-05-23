# Le modèle MVC

## Schéma
[Schéma du cycle de vie de l'application](https://i.imgur.com/x72dHuI.jpeg)

## Introduction
Le but du modèle MVC est de partager en grande partie une application afin de garantir, au mieux
la répartition des rôles, la maintenabilité et l'extensibilité de l'application.

Le modèle MVC ne décrit pas l'entièreté d'une application, mais les parties les plus importantes.
Il est donc composé de 3 grandes parties :
 * **M** : le **Model**, il s'agit de la représentation des données et de leur persistence.
    Ce sont les fichiers qui seront chargés de communiquer avec la base de données.
 * **V** : la **Vue**, il s'agit des fichiers qui seront utilisés pour afficher les écrans de l'application.
    Ce sont donc des fichiers qui affichent principalement du HTML avec quelques structures simple comme des ` if` ou des `for` 
    pour faciliter l'affichage.
 * **C**: le **Controller**, il s'agit des fichiers qui décident des actions à réaliser en fonction
    de ce qui est demandé par l'utilisateur. Il est chargé de réaliser les traitements et de réunir
    les données qui doivent être affichées par la **Vue**.

On va prendre un exemple concret, qui va suivre ce qu'on peut voir dans le schéma plus haut.

## Exemple
On va considérer la fonction de mise à jour d'une recette, avec la route suivante : `index.php?controller=recipe&action=edit&id=15`

L'URL nous indique donc 3 choses : on est dans la partie `recipe` du site, et on veut `edit` la recette `15`.

Pour répondre à cette demande, on va avoir besoin de 5 fichiers, suivant cette arborescence :
```
    .
    |-- index.php
    |-- router.php
    |-- controller/
        |-- recipe.php
    |-- model/
        |-- recipe.php
    |-- view/
        |-- recipe.php
```
