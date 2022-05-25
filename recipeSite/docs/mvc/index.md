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
C'est le point d'entrée de l'application, tout passe par ici. On ne fait donc que
décorer l'application avec la structure principale : emplacement et contenu du header,
du menu, du footer ou encore d'une éventuelle colonne à droite. On prépare une zone
qui accueillera toutes les sorties de l'application.
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
Le but du Router est de traiter une Requête en transmettant les informations au
bon Controller et en appelant la bonne méthode.

Ni plus, ni moins
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
Le Controller est là pour recevoir une demande qui le concerne, la traiter et renvoyer une Réponse.

Il doit réunir les informations pour pouvoir générer la Réponse.

Dans la plupart des cas, la Réponse est une génération de code HTML.
```php
function edit()
{
    // On récupère l'enregistrement, c'est le Model qui fait ça
    require('model/recipe.php');
    $recipe = getRecipe($_GET['id']);

    // Si on a des données dans le $_POST,
    // c'est qu'on a essayé de valider un formulaire
    if (count($_POST)) {
        // sauvegarde, dans une fonction du Model
        save($_POST);
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
Le Model est en charge de toutes les interactions avec la base de données. C'est aussi, 
plus globalement, la partie en charge de la représentation des données, mais pour le moment
nous ne sommes pas concernés.

On doit donc y trouver toutes les fonctions permettant la manipulation des lignes en base de données,
notamment toutes les opérations du CRUD *(Create, Read, Update, Delete)*.
```php
function getRecipe(int $id): array
{
    // Requête de récupération ici
    return $recipe;
}

function save(array $recipe): bool
{
    // Si ID présent, requête d'update
    // Sinon, requête d'insert
    
    // return true si pas d'erreur, false sinon
}
```

### view/recipe.php
Enfin, la Vue qui nous permet de représenter le formulaire de modification.
Comme le Controller a récupéré la recette concernée et qu'il l'envoie à travers la variable
`$view['recipe']`, il est tout à fait possible de remplir les valeurs par défaut des champs
du formulaire.

On peut noter qu'une Vue pour la création d'une recette ne serait pas bien différente, voire 
exactement la même : la création d'un objet n'est finalement que la modification d'un objet
qui n'a pas encore d'enregistrement en base de données (et donc aucune valeur par défaut).
```html
<form action="/index.php?controller=recipe&action=edit&id=<?php echo $recipe['id']; ?>" method="post">
    <label for="nom">
        <input type="text" name="nom" id="nom" value="<?php echo $view['recipe']['nom']; ?>" />
    </label>
    <label for="description"></label>
    <textarea name="description" id="description" cols="30" rows="10">
        <?php echo $view['recipe']['description']; ?>
    </textarea>
    
    <button type="submit">Enregistrer</button>
</form>
```
## Extensibilité
L'avantage d'avoir séparé de cette manière notre code, c'est que chaque partie de l'application
a un objectif précis. On sépare donc naturellement les responsabilités entre les fichiers.

En fonction de ce que je veux faire dans mon application, l'endroit que je dois toucher devient
évident, plutôt que d'avoir à faire au feeling à chaque fois.

De même, bien que mon application va avoir plusieurs parties distinctes (même si parfois liées), 
chaque *module* va se comporter de la même manière : que ce soit les recettes, les utilisateurs,
les commentaires, chaque module aura son Controller, son Model, sa Vue.

Comme j'ai présenté une tâche assez simple jusqu'ici, on pourrait alors se demander comment faire
concrètement pour étendre la simple fonctionnalité d'édition d'une recette qu'on a vu plus haut.

Quelques exemples donc.

### Contrôler que l'utilisateur a bien les droits de modification
On a des informations à aller chercher, comparer et prendre des décisions, c'est donc au Controller 
de se charger de cette fonction. Si on veut mettre en place cette mécanique, il nous faut vérifier
ça le plus tôt possible, pour que l'utilisateur ne puisse pas faire d'action non autorisée.

Il faudrait donc modifier la fonction avec la logique suivante : 
```php
function edit()
{
    // On récupère l'enregistrement, c'est le Model qui fait ça
    require('model/recipe.php');
    $recipe = getRecipe($_GET['id']);
    
    // On n'exécute plus rien si l'utilisateur n'est pas connecté, 
    // et s'il n'est pas l'auteur de la recette
    if (!isset($_SESSION['userId']) || $_SESSION['userId'] !== $recipe['author']) {
        // 403 est le code d'erreur HTTP pour les exceptions liées aux droits d'accès
        /** @see https://developer.mozilla.org/fr/docs/Web/HTTP/Status */
        throw new \Exception('Vous n\'avez pas le droit d\'accéder à cette ressource', 403);
    }
    
    // Suite de la fonction
    // ...
}
```

### Vérifier les données du formulaire
Si le contrôle de "Est-ce que tel utilisateur a le droit de faire ceci" qui nécessite
donc plusieurs objets et relève du Controller, la vérification des données elle-même
doit être fait dans le **Model** car, on le rappelle, c'est le garant de la gestion des données : 
en plus de communiquer avec la base de données, le Model doit se charger de vérifier les données
qu'il fait rentrer dans le système, comme vérifier qu'une adresse email est bien au bon format.

Il faudrait donc modifier notre fonction `save` de la manière suivante : 

```php
function save(array $recipe): bool
{
    // Avant toute autre action, on doit vérifier les données qu'on va manipuler
    // On vérifie que le tableau a bien une entrée 'nom' et que le contenu n'est pas vide
    // Le test null == $recipe['nom'] avec seulement 2 == considède comme null les valeurs suivantes :
    // "", 0, "0", false, array(), null 
    if (!array_key_exists('nom', $recipe) || null == $recipe['nom']) {
        throw new \Exception('Vous devez renseigner un nom de recette');
    }
    if (!array_key_exists('description', $recipe) || null == $recipe['description']) {
        throw new \Exception('Vous devez renseigner une description de recette');
    }
    
    // Une fois que toutes les valeurs sont bonnes, on peut faire rentrer les données
    // dans notre système

    // Suite de la fonction
    ...
}
```

### Transmettre à la vue des éventuels messages d'erreur ou de confirmation
Après une action qui nécessite un traitement, il se peut qu'on ait besoin de faire
remonter des informations à l'utilisateur. On ne va pas pour autant créer une toute nouvelle
vue juste pour afficher un message. 

Dans notre exemple, on va considérer le cas où on vient de poster la modification de la recette.
#### On a posté une recette sans titre
Dans notre flux d'exécution, c'est le **Model** qui devrait détecter cette erreur car il est
le garant des données mises dans le système. On a vu plus haut qu'en cas d'oubli de titre, 
une Exception est levée, avec un message d'erreur, il faut donc l'attraper dans le Controller.

```php
function edit()
{
    // Vérifications des droits vu plus haut
    
    // On créer notre variable pour la vue plus haut
    $view = [];
    
    if (count($_POST)) {
        $recipe = $_POST;
    
        // Le Model vérifie désormais les données, et lève une Exception en cas
        // d'erreur. On veut donc récupérer cette Exception pour la transformer en message
        // pour l'envoyer à la vue
        try {
            // sauvegarde, dans une fonction du Model
            save($recipe);
        } catch (\Exception $e) {
            // On ajoute le message dans un tableau dans le cas où plusieurs erreurs
            // pourraient arriver dans notre script dans le futur
            $view['errors'][] = $e->getMessage();   // contient ''Vous devez renseigner un nom de recette'
        }
    }
    
    // On complète désormais notre variable pour la vue en repassant la recette
    // On a changé plus haut $recipe avec les valeurs du $_POST pour que les données
    // ne soient pas perdues et soient réutilisées
    $view['recipe'] = $recipe;
    
    require('view/recipe/edit.php');
}
```

Enfin, comme on a ajouté un tableau des erreurs, il faut désormais l'afficher dans la **Vue**. 
On fabrique une simple liste, à styliser avec un fond rouge par exemple.

```php
<?php if (count($view['errors']) { ?>
    <ul class='errors-message'>
        <?php foreach($view['errors'] as $error) { ?>
            <li><?php echo $error; ?></li>
        <?php } ?>
    </ul>
<?php } ?>
```
```html
<form action="/index.php?controller=recipe&action=edit&id=<?php echo $recipe['id']; ?>" method="post">
    ...
</form>
```



### Afficher les éventuels messages
Vue

