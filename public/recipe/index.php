<?php
require_once __DIR__ . '/../../src/handlers/helpers.php';

$allRecipes = getAllRecipes(__DIR__ . '/../../storage/recipes.txt');

$recipesData = '';
if (!empty($allRecipes)) {
    $recipesData = '<ul>';
    foreach ($allRecipes as $recipe) {
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
    $recipesData = '<p>Рецептов пока нет.</p>';
}

echo $recipesData;
echo '<br><p><a href="/recipe-book/public/">На главную</a></p>';
echo '<p><a href="/recipe-book/public/recipe/create.php">Добавить новый рецепт</a></p>';