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

### index.php
```html
<!doctype>
<html>
    <head>...</head>
    <body>
        <header>...</header>
        <article>
            <?php 
                require('router.php');
                doRouting(); 
            ?>
        </article>
        <footer>...</footer>
    </body>
</html>
```

### router.php
```php
function doRouting()
{
    // On inclut le controller
    require('controller/'.$_GET['controller'].'.php');
    // Et on lance la bonne action
    $_GET['action']();
}
```

### controller/recipe.php
```php
function edit()
{
    // On récupère l'enregistrement, c'est le Model qui fait ça
    require('model/recipe.php');
    $recipe = getRecipe($_GET['id']);

    // Si on a des données dans le $_POST,
    // c'est qu'on a essayé de valider un formulaire
    if (count($_POST)) {
        // vérifications, affectations
        $recipe['nom'] = $_POST['nom'];
        // sauvegarde, dans une fonction du Model
        save($recipe);
    }
    
    // On affiche le formulaire
    // En pré-remplissant les informations
    $view = [
        'recipe' => $recipe
    ];
    require('view/recipe/edit.php');
}
```

### model/recipe.php
```php
function getRecipe(int $id): array
{
    // Requête de récupération ici
    return $recipe;
}

function save(array $recipe): bool
{
    // Requête d'update
    // return true si pas d'erreur, false sinon
}
```

### view/recipe.php
```html
<form action="/index.php?controller=recipe&action=edit&id=<?php echo $recipe['id']; ?>" method="post">
    <label for="nom">
        <input type="text" name="nom" id="nom" />
    </label>
    <label for="description"></label>
    <textarea name="description" id="description" cols="30" rows="10"></textarea>
    
    <button type="submit">Enregistrer</button>
</form>
```
## Extensibilité
 * Contrôler que l'utilisateur a bien les droits de modification
 * Vérifier les données du formulaire
 * Transmettre à la vue des éventuels messages d'erreur ou de confirmation
 * Afficher les éventuels messages

