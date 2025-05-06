<?php
require_once __DIR__ . '/../src/handlers/helpers.php';

$latestRecipes = getLatestRecipes(__DIR__ . '/../storage/recipes.txt', 2);

$recipesData = '';
if (!empty($latestRecipes)) {
    $recipesData = '<ul>';
    foreach ($latestRecipes as $recipe) {
        $recipesData .= '<li>';
        $recipesData .= '<h2>' . htmlspecialchars($recipe['recipe_name']) . '</h2>';
        $recipesData .= '<p>Категория: ' . htmlspecialchars($recipe['recipe_category']) . '</p>';
        $recipesData .= '<p>Ингредиенты: ' . nl2br(htmlspecialchars($recipe['ingredients'])) . '</p>';
        $recipesData .= '<p>Описание: ' . nl2br(htmlspecialchars($recipe['description'])) . '</p>';
        $recipesData .= '<p>Тэги: ' . htmlspecialchars(implode(', ', $recipe['tags'])) . '</p>';
        $recipesData .= '<p>Шаги: ' . nl2br(htmlspecialchars($recipe['steps'])) . '</p>';
        $recipesData .= '</li>';
    }
    $recipesData .= '</ul>';
} else {
    $recipesData = '<p>Пока нет ни одного рецепта. <a href="/recipe-book/public/recipe/create.php">Добавить первый рецепт</a>.</p>';
}

$addRecipeLink = '<p><a href="/recipe-book/public/recipe/create.php">Добавить новый рецепт</a></p>';

include 'index_template.php';