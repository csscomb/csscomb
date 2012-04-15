# CSScomb для Sublime Text 2

Плагин сортирует в заданном порядке CSS-свойства в рамках каждого блока правил
CSS-кода с помощью алгоритма [CSScomb](http://csscomb.ru).

Например:

<table>
    <tr>
        <td>
            До CSScomb:

<pre>
header h1 {
    display:inline-block;
    color:#333;
    background:#eee;
    margin:0 20px;
    position:relative;
    }</pre>
        </td>
        <td>
            После CSScomb:

<pre>
header h1 {
    position:relative;
    display:inline-block;
    margin:0 20px;
    background:#eee;
    color:#333;
    }</pre>
        </td>
    </tr>
</table>

[Подробнее о CSScomb](http://csscomb.ru) читайте на сайте проекта. Там же
доступны онлайн-сортировка, тесты и описание алгоритма, список плагинов.


## Требования к окружению

1. OS X, Linux или Windows на котором установлен [Sublime Text 2](http://www.sublimetext.com/2).

2. PHP-интерпретатор. На OS X он установлен из коробки. А для Linux/Windows
   его нужно скачать с официального сайта [php.net](http://windows.php.net/download/)
   и добавить путь до папки куда вы установили PHP в переменную окружения $PATH.
   Подробнее о том, как это сделать на Windows читайте
   [тут](https://github.com/miripiruni/CSScomb/blob/master/src/plugins/csscomb.notepad_plus_plus/README.mkd).

## Установка

1. В Sublime Text 2 открываем: `Preferences` → `Browse Packages...` Откроется
   папка `../Sublime Text 2/Packages`.

2. Скачиваем туда последнюю версию [плагина CSScomb для Sublime Text 2](https://github.com/miripiruni/csscomb/downloads/):

   Скачав с гитхаба архив с плагином и распаковав его, вы можете обнаружить
   директорию `csscomb.sublime_text_2`. Именно ее нужно скопировать
   в директорию `Packages` Саблайма. Обратите внимание, что переименовывать ничего
   нельзя. После этого должен появиться пункт `Sort via CSScomb` в меню
   `Tools` в Саблайме.


## Использование

По умолчанию сортируется весь файл. Так же можно выбрать строки со стилями,
которые надо отсортировать. Поддерживается множественное выделение. Выделять
желательно блок правил целиком, с селектором и скобками.

`ctrl + shift + c`

или в меню `Tools` → `Sort via CSScomb`, либо `Sort via CSScomb` в контекстном
меню.


## Issues & bugs

[CSScomb for Sublime Text 2 tracker](https://github.com/miripiruni/CSSComb/issues)


## Мейнтейнеры

CSScomb core: [miripiruni](mailto:mail@csscomb.ru)
Sublime plugin: [i-akhmadullin](https://github.com/i-akhmadullin)
