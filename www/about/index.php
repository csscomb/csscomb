<?
$title['en'] = $h1['en'] = 'About';
$title['ru'] = $h1['ru'] = 'О проекте';
$module = 'about';
require_once'../common/header.php';

if($lang=='ru'){
?>

        <h2>Как работает CSScomb?</h2>
		<p>Алгоритм CSScomb максимально повторяет действия веб-технолога, работающего с CSS-кодом.
		   Для пересортировки обычно перемещают строки относительно друг друга, учитывая комметарии в коде, многострочные записи значений свойств, хаки и всё,
		   что может встретиться в реальном файле. CSScomb воспроизводит такие действия за вас.
		   Это означает, что парсер по своей природе «думает» как человек редактирующий текст, а не как слепой робот, разбирающий CSS по косточкам.</p>

		<h2>Что умеет CSScomb?</h2>
		<ul>
			<li>Сортирует CSS-свойства в&nbsp;рамках селекторов в&nbsp;соответствии с&nbsp;настройками.</li>
			<li>Бережно относится к исходному форматированию таблицы стилей.</li>
			<li>Сортирует закомментированные свойства так, как если бы они не были закомментированы.</li>
			<li>Переносит вниз незнакомые свойства в том порядке, в&nbsp;котором они встречаются в&nbsp;рамках селектора. Например: <code>he\ight:&nbsp;100%</code> и&nbsp;подобные будут рассмотрены как&nbsp;незнакомые.</li>
			<li>Успешно парсит <code>@media&nbsp;...&nbsp;{...}</code> и любые другие конструкции с <code>@</code>.</li>
			<li>Успешно парсит <code>expressions</code> и&nbsp;далее переносит их в&nbsp;конец свойств в&nbsp;порядке, в&nbsp;котором они встретились в&nbsp;рамках свойств одного селектора.</li>
		</ul>

		<h2>Как настраивать порядок сортировки?</h2>
		<p>В веб интерфейсе настройки можно задать простым списком: каждое свойство с новой строки, в нужном порядке. При желании можно разделить свойства на группы пустой строкой, тогда результат форматирования будет выглядеть так же.</p>
        <p>Для настроек плагинов используется одномернный или двумерный JSON-массив. В случае двумерного массива свойства будут разделены на группы пустой строкой. В плагинах нужно расковырять файлик <code>csscomb.php</code></p>
        <ul>
            <li>В TextMate: <code>/Applications/TextMate.app/Contents/SharedSupport/Bundles/CSS.tmbundle/Support/lib/csscomb.php</code></li>
            <li>В Coda: <code>/Users/%YOUR_USER_NAME%/Library/Application Support/Coda/Plug-ins/CSScomb.codaplugin/Contents/Resources/csscomb.php</code></li>
        </ul>

		<h2>Как помочь проекту?</h2>
		<p>Сделать плагин (если такового нет) к вашему любимому редактору.</p>

		<h2>Планы</h2>
		<p>Совершенствование алгоритма и доработки по тест-кейсам, которые падают.</p>
		<p>Внедрение CSScomb в популярные редакторы кода.</p>

        <h2>Благодарности</h2>
        <p>Александру Титула-Бойченко, Вадиму Макееву, Игорю Майданову, Олегу Васютинскому, Елизавете Пимошиной и всем, кто помогал тестировать.</p>
<?
}
else{
    echo '
<h2>How does CSScomb work?</h2>
<p>The algorithm of CSScomb simulates web-technologist\'s actions upon working with CSS-code to the limit. Usually to re-order code you move
lines over each other considering comments in the code, multilines records of property values, hacks and everything that could be found
in the real file. CSScomb reproduces these actions for you. This means that the parser "thinks" as a person editing the text, not as a blind robot parsing CSS.</p>

<h2>What can CSScomb do?</h2>
<ul>
    <li>Sorts CSS-properties within the selectors according to the settings.</li>
    <li>Treats the initial formatting of style sheets carefully.</li>
    <li>Sorts commented properties as if they are not commented.</li>
    <li>Moves down unknown properties in the order they are met within the selector. E.g.: <code>he\ight: 100%</code> and similar will be taken as the unknown ones.</li>
    <li>Successfully parses <code>@media ... {...}</code> and any other constructions with <code>@</code>.</li>
    <li>Successfully parses <code>expressions</code> and then moves them to the end of the properties in the order they are met within the framework of properties of one selector.</li>
</ul>

<h2>How to adjust the order of sorting?</h2>
<p>In the web interface, settings can be defined by a simple list: a line for each property, in the required order.
If desired, it\'s possible to divide properties into groups by adding an empty line. In that case the result of
formatting will be the same.</p>
<p>For adjusting plugins use one-dimensional and two-dimensional JSON arrays. In case of two-dimensional arrays
the properties will be divided into groups with an empty line. In plugins you should pick open file
<code>csscomb.php</code></p>
<ul>
    <li>At TextMate: <code>/Applications/TextMate.app/Contents/SharedSupport/Bundles/CSS.tmbundle/Support/lib/csscomb.php</code></li>
    <li>At Coda: <code>/Users/%YOUR_USER_NAME%/Library/Application Support/Coda/Plug-ins/CSScomb.codaplugin/Contents/Resources/csscomb.php</code></li>
</ul>

<h2>How to support?</h2>
<p>Make a plugin (if you don\'t have one) for your favorite code editor.</p>

<h2>Plans</h2>
<p>Improvement of the algorithm and rework the test cases that are failed.</p>
<p>Introduction of CSScomb in the popular code editors.</p>

<h2>Gratitude</h2>
<p>Александру Титула-Бойченко, Вадиму Макееву, Игорю Майданову, Олегу Васютинскому, Елизавете Пимошиной and everyone who helped in testing.</p>';
}

require_once'../common/footer.php';
?>
