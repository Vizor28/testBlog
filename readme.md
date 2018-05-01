#test Blog


При решении задания используйте один из следующих фреймворков - Symfony, Laravel. Желательно использовать Symfony.

Задание.
Реализовать блог с постами разбитыми по категориях. Категории, посты должны создаваться, редактироваться, удаляться всеми пользователями.

Должна быть возможность добавить комментарии к уже созданным категориям и постам. Комментарии должны добавляться с помощью Ajax.

Записывать в базу данных IP и информацию о браузере пользователя для каждой новой сессии. Отслеживать новых пользователей нужно на всех страницах проекта.
Вывести текст с информацией сколько пользователей с какого браузера перешли (например “Chrome: 8, Firefox: 5, ...”) на всех страницах проекта (например в хедере).
Категория
Должна иметь поля:
name
description
Страницы:
список категорий постов
страницы редактирования/создания категори
страница категории (на странице должны быть список постов категории, комментарии категории)
Пост
Должен иметь поля:
name — required
content — required
file — максимальный размер 2 Mb
Страницы:
страницы редактирования/создания поста
страница поста (на странице должны быть информация о посте и комментарии поста)
Комментарий
Должен иметь поля:
author — required, должно содержать два слова, оба с большой буквы
content — required
created_at — дата создания, заполняется автоматически


