<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить рецепт</title>
</head>
<body>
    <h1>Добавить новый рецепт</h1>
    <form action="/recipe-book/src/handlers/create_recipe.php" method="POST">
        <p><input type="text" name="recipe_name" placeholder="Название рецепта" required></p>
        <p><input type="text" name="recipe_category" placeholder="Категория" required></p>
        <p><textarea name="ingredients" placeholder="Ингредиенты" required></textarea></p>
        <p><textarea name="description" placeholder="Описание" required></textarea></p>
        <p><input type="text" name="tags[]" placeholder="Теги (через запятую)"></p>
        <p><textarea name="steps" placeholder="Шаги приготовления" required></textarea></p>
        <p><button type="submit">Сохранить</button></p>
    </form>
    <p><a href="/recipe-book/public/">На главную</a></p>
</body>
</html>