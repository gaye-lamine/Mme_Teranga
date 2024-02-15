
# API CRUD de Gestion de Produits

Cette API permet la gestion complète des produits, y compris la création, la lecture, la mise à jour et la suppression (CRUD). Elle est conçue pour être simple, robuste et extensible.

## Utilisation

### Liste des Produits

- **URL**: `/products`
- **Méthode HTTP**: GET
- **Description**: Récupère la liste complète des produits.

#### Réponse Succès
- **Statut**: 200 OK
- **Contenu**: Liste des produits au format JSON.

#### Réponse Erreur
- **Statut**: 404 Not Found
- **Contenu**: Message d'erreur si aucun produit n'est trouvé.

### Détails d'un Produit

- **URL**: `/products/{id}`
- **Méthode HTTP**: GET
- **Description**: Récupère les détails d'un produit spécifique en fonction de son ID.

#### Réponse Succès
- **Statut**: 200 OK
- **Contenu**: Détails du produit au format JSON.

#### Réponse Erreur
- **Statut**: 404 Not Found
- **Contenu**: Message d'erreur si le produit n'est pas trouvé.

### Création d'un Produit

- **URL**: `/products`
- **Méthode HTTP**: POST
- **Description**: Crée un nouveau produit avec les détails fournis.

#### Réponse Succès
- **Statut**: 201 Created
- **Contenu**: Détails du produit créé au format JSON.

#### Réponse Erreur
- **Statut**: 400 Bad Request
- **Contenu**: Message d'erreur en cas de données non valides.

### Mise à Jour d'un Produit

- **URL**: `/products/{id}`
- **Méthode HTTP**: PUT
- **Description**: Met à jour les détails d'un produit existant en fonction de son ID.

#### Réponse Succès
- **Statut**: 202 Accepted
- **Contenu**: Détails du produit mis à jour au format JSON.

#### Réponse Erreur
- **Statut**: 404 Not Found
- **Contenu**: Message d'erreur si le produit n'est pas trouvé.

### Suppression d'un Produit

- **URL**: `/products/{id}`
- **Méthode HTTP**: DELETE
- **Description**: Supprime un produit existant en fonction de son ID.

#### Réponse Succès
- **Statut**: 200 OK
- **Contenu**: Détails du produit supprimé au format JSON.

#### Réponse Erreur
- **Statut**: 404 Not Found
- **Contenu**: Message d'erreur si le produit n'est pas trouvé.

## Exemples de Requêtes

### Création d'un Produit


{
    "title": "Nouveau Produit",
    "description": "Description du nouveau produit",
    "price": 99.99,
    "quantity": 10
}


### Mise à Jour d'un Produit


{
    "title": "Produit Mis à Jour",
    "description": "Nouvelle description du produit",
    "price": 129.99,
    "quantity": 20
}


## Structure du Projet

Le projet suit une architecture MVC (Modèle-Vue-Contrôleur) avec une organisation des fichiers comme suit :


app/
├── Http/
│   ├── Controllers/
│   │   └── ProductController.php
│   ├── Utils/
│   │   └── ApiResponse.php
│   └── Requests/
│       └── ProductRequest.php
├── Models/
│   └── Product.php
├── Repositories/
│   └── ProductRepository.php
└── UseCases/
    ├── GetAllProductsUseCase.php
    ├── ShowProductUseCase.php
    ├── CreateProductUseCase.php
    ├── UpdateProductUseCase.php
    └── DeleteProductUseCase.php
