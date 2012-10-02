# CSScomb for Sublime Text 2

Tool for sorting CSS properties in specific order.

Example:

<table>
    <tr>
        <td>
            Before CSScomb:

<pre>
header h1 {
    top:-10px;
    margin-top:0;
    display:inline-block;
    color:#333;
    margin-bottom:20px;
    background:#eee;
    margin-left:20px;
    position:relative;
    }</pre>
        </td>
        <td>
            After CSScomb:

<pre>
header h1 {
    position:relative;
    top:-10px;
    display:inline-block;
    margin-top:0;
    margin-bottom:20px;
    margin-left:20px;
    background:#eee;
    color:#333;
    }</pre>
        </td>
    </tr>
</table>

More details at [CSScomb.com](http://csscomb.com): tests, online-version, info, etc.


## The Requirements

1. OS X, Linux or Windows.
2. [Sublime Text 2](http://www.sublimetext.com/2).
3. [PHP](http://windows.php.net/download/) (on OS X already installed). [How to for Windows](https://github.com/miripiruni/CSScomb/blob/master/src/plugins/csscomb.notepad_plus_plus/README.mkd#required).


## How to Install

There is two ways: 

* install via package control, see package 'CSScomb'. More about [package control](http://wbond.net/sublime_packages/package_control/installation).

* manual install
  1. Download [CSScomb for Sublime Text 2](https://github.com/miripiruni/csscomb/downloads/).
  2. Unzip it. There is directory `csscomb.sublime_text_2`
  3. In Sublime Text 2: `Preferences` → `Browse Packages...` then you'll see directory `../Sublime Text 2/Packages`.
  4. Copy `csscomb.sublime_text_2` directory into `../Sublime Text 2/Packages`.
  5. Restart Sublime Text 2.


## Usage

* Shortcut: `ctrl + shift + c`
* Or in menu: `Tools` → `Sort via CSScomb`
* Or in context menu: `Sort via CSScomb`


## Issues & bugs

[CSScomb for Sublime Text 2 tracker](https://github.com/miripiruni/CSSComb/issues)


## Maintainers

* CSScomb core: [miripiruni](https://github.com/miripiruni)
* Sublime plugin: [i-akhmadullin](https://github.com/i-akhmadullin)




---




# CSScomb для Sublime Text 2

Плагин сортирует в заданном порядке CSS-свойства в рамках каждого блока правил
CSS-кода с помощью алгоритма [CSScomb](http://csscomb.ru).

Например:

<table>
    <tr>
        <td>
            Before CSScomb:

<pre>
header h1 {
    top:-10px;
    margin-top:0;
    display:inline-block;
    color:#333;
    margin-bottom:20px;
    background:#eee;
    margin-left:20px;
    position:relative;
    }</pre>
        </td>
        <td>
            After CSScomb:

<pre>
header h1 {
    position:relative;
    top:-10px;
    display:inline-block;
    margin-top:0;
    margin-bottom:20px;
    margin-left:20px;
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

* Горячая клавиша: `ctrl + shift + c`
* или в меню: `Tools` → `Sort via CSScomb`
* или в контекстном меню `Sort via CSScomb`


## Issues & bugs

[CSScomb for Sublime Text 2 tracker](https://github.com/miripiruni/CSSComb/issues)


## Мейнтейнеры

* CSScomb core: [miripiruni](mailto:mail@csscomb.ru)
* Sublime plugin: [i-akhmadullin](https://github.com/i-akhmadullin)
