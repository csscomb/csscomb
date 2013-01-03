<?php
/**
 * CSScomb
 *
 * Tool for sorting CSS properties in specific order
 *
 * @version 2.12 (build e784736-1301040046)
 * @author Vyacheslav Oliyanchuk (miripiruni) <mail@csscomb.com>
 * @license MIT
 * @web http://csscomb.com/
 */

error_reporting(E_ALL);

class csscomb{

    var $sort_order = Array(),
    $code = Array(
        // оригинальный код, без изменений, то, что пришло на вход
        'original' => null,
        // код, который может меняться в процессе выполнения алгоритма пересортировки
        'edited' => null,
        // TODO: избавиться от resorted
        // конечный, пересортированный CSS-код
        'resorted' => null,
        // если найдены expression, то эта переменная станет массивом, ячейки которого
        // будут содержать код каждого найденного expression
        'expressions' => null,
        // если найдены data uri, то эта переменная станет массивом...
        'datauri' => null,
        // если найдены интерполированные переменные, то эта переменная станет массивом
        'interpolations' => null,
        // если найдены CSS-хаки мешающие парсить, то эта переменная станет массивом...
        'hacks' => null,
        // если найдены комментарии содержащие { или } мешающие парсить,
        // то эта переменная станет массивом.
        'braces' => null,
        // если найдены entities мешающие парсить, то эта переменная станет массивом.
        'entities' => null
    ),

    // В переменной $mode лежит режим работы с CSS-кодом. Возможны следующие значения:
    //   css-file - только CSS-код
    //   style-attribute - найден атрибут style="..."
    //   properties - не найдено фигурных скобок, зато присутствуют точки с запятой и двоеточия.
    $mode = 'properties',

    $default_sort_order = '[
        "position",
        "top",
        "right",
        "bottom",
        "left",
        "z-index",
        "display",
        "visibility",
        "-webkit-flex-direction",
        "-moz-flex-direction",
        "-ms-flex-direction",
        "-o-flex-direction",
        "flex-direction",
        "-webkit-flex-order",
        "-moz-flex-order",
        "-ms-flex-order",
        "-o-flex-order",
        "flex-order",
        "-webkit-flex-pack",
        "-moz-flex-pack",
        "-ms-flex-pack",
        "-o-flex-pack",
        "flex-pack",
        "float",
        "clear",
        "-webkit-flex-align",
        "-moz-flex-align",
        "-ms-flex-align",
        "-o-flex-align",
        "flex-align",
        "overflow",
        "-ms-overflow-x",
        "-ms-overflow-y",
        "overflow-x",
        "overflow-y",
        "clip",
        "-webkit-box-sizing",
        "-moz-box-sizing",
        "box-sizing",
        "margin",
        "margin-top",
        "margin-right",
        "margin-bottom",
        "margin-left",
        "padding",
        "padding-top",
        "padding-right",
        "padding-bottom",
        "padding-left",
        "min-width",
        "min-height",
        "max-width",
        "max-height",
        "width",
        "height",
        "outline",
        "outline-width",
        "outline-style",
        "outline-color",
        "outline-offset",
        "border",
        "border-spacing",
        "border-collapse",
        "border-width",
        "border-style",
        "border-color",
        "border-top",
        "border-top-width",
        "border-top-style",
        "border-top-color",
        "border-right",
        "border-right-width",
        "border-right-style",
        "border-right-color",
        "border-bottom",
        "border-bottom-width",
        "border-bottom-style",
        "border-bottom-color",
        "border-left",
        "border-left-width",
        "border-left-style",
        "border-left-color",
        "-webkit-border-radius",
        "-moz-border-radius",
        "border-radius",
        "-webkit-border-top-left-radius",
        "-moz-border-radius-topleft",
        "border-top-left-radius",
        "-webkit-border-top-right-radius",
        "-moz-border-radius-topright",
        "border-top-right-radius",
        "-webkit-border-bottom-right-radius",
        "-moz-border-radius-bottomright",
        "border-bottom-right-radius",
        "-webkit-border-bottom-left-radius",
        "-moz-border-radius-bottomleft",
        "border-bottom-left-radius",
        "-webkit-border-image",
        "-moz-border-image",
        "-o-border-image",
        "border-image",
        "-webkit-border-image-source",
        "-moz-border-image-source",
        "-o-border-image-source",
        "border-image-source",
        "-webkit-border-image-slice",
        "-moz-border-image-slice",
        "-o-border-image-slice",
        "border-image-slice",
        "-webkit-border-image-width",
        "-moz-border-image-width",
        "-o-border-image-width",
        "border-image-width",
        "-webkit-border-image-outset",
        "-moz-border-image-outset",
        "-o-border-image-outset",
        "border-image-outset",
        "-webkit-border-image-repeat",
        "-moz-border-image-repeat",
        "-o-border-image-repeat",
        "border-image-repeat",
        "-webkit-border-top-image",
        "-moz-border-top-image",
        "-o-border-top-image",
        "border-top-image",
        "-webkit-border-right-image",
        "-moz-border-right-image",
        "-o-border-right-image",
        "border-right-image",
        "-webkit-border-bottom-image",
        "-moz-border-bottom-image",
        "-o-border-bottom-image",
        "border-bottom-image",
        "-webkit-border-left-image",
        "-moz-border-left-image",
        "-o-border-left-image",
        "border-left-image",
        "-webkit-border-corner-image",
        "-moz-border-corner-image",
        "-o-border-corner-image",
        "border-corner-image",
        "-webkit-border-top-left-image",
        "-moz-border-top-left-image",
        "-o-border-top-left-image",
        "border-top-left-image",
        "-webkit-border-top-right-image",
        "-moz-border-top-right-image",
        "-o-border-top-right-image",
        "border-top-right-image",
        "-webkit-border-bottom-right-image",
        "-moz-border-bottom-right-image",
        "-o-border-bottom-right-image",
        "border-bottom-right-image",
        "-webkit-border-bottom-left-image",
        "-moz-border-bottom-left-image",
        "-o-border-bottom-left-image",
        "border-bottom-left-image",
        "background",
        "filter:progid:DXImageTransform.Microsoft.AlphaImageLoader",
        "background-color",
        "background-image",
        "background-attachment",
        "background-position",
        "-ms-background-position-x",
        "-ms-background-position-y",
        "background-position-x",
        "background-position-y",
        "background-clip",
        "background-origin",
        "background-size",
        "background-repeat",
        "box-decoration-break",
        "-webkit-box-shadow",
        "-moz-box-shadow",
        "box-shadow",
        "color",
        "table-layout",
        "caption-side",
        "empty-cells",
        "list-style",
        "list-style-position",
        "list-style-type",
        "list-style-image",
        "quotes",
        "content",
        "counter-increment",
        "counter-reset",
        "-ms-writing-mode",
        "vertical-align",
        "text-align",
        "-webkit-text-align-last",
        "-moz-text-align-last",
        "-ms-text-align-last",
        "text-align-last",
        "text-decoration",
        "text-emphasis",
        "text-emphasis-position",
        "text-emphasis-style",
        "text-emphasis-color",
        "text-indent",
        "-ms-text-justify",
        "text-justify",
        "text-outline",
        "text-transform",
        "text-wrap",
        "-ms-text-overflow",
        "text-overflow",
        "text-overflow-ellipsis",
        "text-overflow-mode",
        "text-shadow",
        "white-space",
        "word-spacing",
        "-ms-word-wrap",
        "word-wrap",
        "-ms-word-break",
        "word-break",
        "-moz-tab-size",
        "-o-tab-size",
        "tab-size",
        "-webkit-hyphens",
        "-moz-hyphens",
        "hyphens",
        "letter-spacing",
        "font",
        "font-weight",
        "font-style",
        "font-variant",
        "font-size-adjust",
        "font-stretch",
        "font-size",
        "font-family",
        "src",
        "line-height",
        "opacity",
        "-ms-filter:\'progid:DXImageTransform.Microsoft.Alpha",
        "filter:progid:DXImageTransform.Microsoft.Alpha(Opacity",
        "-ms-interpolation-mode",
        "-webkit-filter",
        "-ms-filter",
        "filter",
        "resize",
        "cursor",
        "nav-index",
        "nav-up",
        "nav-right",
        "nav-down",
        "nav-left",
        "-webkit-transition",
        "-moz-transition",
        "-ms-transition",
        "-o-transition",
        "transition",
        "-webkit-transition-delay",
        "-moz-transition-delay",
        "-ms-transition-delay",
        "-o-transition-delay",
        "transition-delay",
        "-webkit-transition-timing-function",
        "-moz-transition-timing-function",
        "-ms-transition-timing-function",
        "-o-transition-timing-function",
        "transition-timing-function",
        "-webkit-transition-duration",
        "-moz-transition-duration",
        "-ms-transition-duration",
        "-o-transition-duration",
        "transition-duration",
        "-webkit-transition-property",
        "-moz-transition-property",
        "-ms-transition-property",
        "-o-transition-property",
        "transition-property",
        "-webkit-transform",
        "-moz-transform",
        "-ms-transform",
        "-o-transform",
        "transform",
        "-webkit-transform-origin",
        "-moz-transform-origin",
        "-ms-transform-origin",
        "-o-transform-origin",
        "transform-origin",
        "-webkit-animation",
        "-moz-animation",
        "-ms-animation",
        "-o-animation",
        "animation",
        "-webkit-animation-name",
        "-moz-animation-name",
        "-ms-animation-name",
        "-o-animation-name",
        "animation-name",
        "-webkit-animation-duration",
        "-moz-animation-duration",
        "-ms-animation-duration",
        "-o-animation-duration",
        "animation-duration",
        "-webkit-animation-play-state",
        "-moz-animation-play-state",
        "-ms-animation-play-state",
        "-o-animation-play-state",
        "animation-play-state",
        "-webkit-animation-timing-function",
        "-moz-animation-timing-function",
        "-ms-animation-timing-function",
        "-o-animation-timing-function",
        "animation-timing-function",
        "-webkit-animation-delay",
        "-moz-animation-delay",
        "-ms-animation-delay",
        "-o-animation-delay",
        "animation-delay",
        "-webkit-animation-iteration-count",
        "-moz-animation-iteration-count",
        "-ms-animation-iteration-count",
        "-o-animation-iteration-count",
        "animation-iteration-count",
        "-webkit-animation-direction",
        "-moz-animation-direction",
        "-ms-animation-direction",
        "-o-animation-direction",
        "animation-direction",
        "pointer-events",
        "unicode-bidi",
        "direction",
        "-webkit-columns",
        "-moz-columns",
        "columns",
        "-webkit-column-span",
        "-moz-column-span",
        "column-span",
        "-webkit-column-width",
        "-moz-column-width",
        "column-width",
        "-webkit-column-count",
        "-moz-column-count",
        "column-count",
        "-webkit-column-fill",
        "-moz-column-fill",
        "column-fill",
        "-webkit-column-gap",
        "-moz-column-gap",
        "column-gap",
        "-webkit-column-rule",
        "-moz-column-rule",
        "column-rule",
        "-webkit-column-rule-width",
        "-moz-column-rule-width",
        "column-rule-width",
        "-webkit-column-rule-style",
        "-moz-column-rule-style",
        "column-rule-style",
        "-webkit-column-rule-color",
        "-moz-column-rule-color",
        "column-rule-color",
        "break-before",
        "break-inside",
        "break-after",
        "page-break-before",
        "page-break-inside",
        "page-break-after",
        "orphans",
        "widows",
        "-ms-zoom",
        "zoom",
        "max-zoom",
        "min-zoom",
        "user-zoom",
        "orientation"
    ]',

    $yandex_sort_order = '[
        [
            "position",
            "z-index",
            "top",
            "right",
            "bottom",
            "left"
        ],
        [
            "display",
            "visibility",
            "float",
            "clear",
            "overflow",
            "overflow-x",
            "overflow-y",
            "-ms-overflow-x",
            "-ms-overflow-y",
            "clip",
            "zoom",
            "flex-direction",
            "flex-order",
            "flex-pack",
            "flex-align"
        ],
        [
            "-webkit-box-sizing",
            "-moz-box-sizing",
            "box-sizing",
            "width",
            "min-width",
            "max-width",
            "height",
            "min-height",
            "max-height",
            "margin",
            "margin-top",
            "margin-right",
            "margin-bottom",
            "margin-left",
            "padding",
            "padding-top",
            "padding-right",
            "padding-bottom",
            "padding-left"
        ],
        [
            "table-layout",
            "empty-cells",
            "caption-side",
            "border-spacing",
            "border-collapse",
            "list-style",
            "list-style-position",
            "list-style-type",
            "list-style-image"
        ],
        [
            "content",
            "quotes",
            "counter-reset",
            "counter-increment",
            "resize",
            "cursor",
            "nav-index",
            "nav-up",
            "nav-right",
            "nav-down",
            "nav-left",
            "-webkit-transition",
            "-moz-transition",
            "-ms-transition",
            "-o-transition",
            "transition",
            "-webkit-transition-delay",
            "-moz-transition-delay",
            "-ms-transition-delay",
            "-o-transition-delay",
            "transition-delay",
            "-webkit-transition-timing-function",
            "-moz-transition-timing-function",
            "-ms-transition-timing-function",
            "-o-transition-timing-function",
            "transition-timing-function",
            "-webkit-transition-duration",
            "-moz-transition-duration",
            "-ms-transition-duration",
            "-o-transition-duration",
            "transition-duration",
            "-webkit-transition-property",
            "-moz-transition-property",
            "-ms-transition-property",
            "-o-transition-property",
            "transition-property",
            "-webkit-transform",
            "-moz-transform",
            "-ms-transform",
            "-o-transform",
            "transform",
            "-webkit-transform-origin",
            "-moz-transform-origin",
            "-ms-transform-origin",
            "-o-transform-origin",
            "transform-origin",
            "-webkit-animation",
            "-moz-animation",
            "-ms-animation",
            "-o-animation",
            "animation",
            "-webkit-animation-name",
            "-moz-animation-name",
            "-ms-animation-name",
            "-o-animation-name",
            "animation-name",
            "-webkit-animation-duration",
            "-moz-animation-duration",
            "-ms-animation-duration",
            "-o-animation-duration",
            "animation-duration",
            "-webkit-animation-play-state",
            "-moz-animation-play-state",
            "-ms-animation-play-state",
            "-o-animation-play-state",
            "animation-play-state",
            "-webkit-animation-timing-function",
            "-moz-animation-timing-function",
            "-ms-animation-timing-function",
            "-o-animation-timing-function",
            "animation-timing-function",
            "-webkit-animation-delay",
            "-moz-animation-delay",
            "-ms-animation-delay",
            "-o-animation-delay",
            "animation-delay",
            "-webkit-animation-iteration-count",
            "-moz-animation-iteration-count",
            "-ms-animation-iteration-count",
            "-o-animation-iteration-count",
            "animation-iteration-count",
            "-webkit-animation-iteration-count",
            "-moz-animation-iteration-count",
            "-ms-animation-iteration-count",
            "-o-animation-iteration-count",
            "animation-iteration-count",
            "-webkit-animation-direction",
            "-moz-animation-direction",
            "-ms-animation-direction",
            "-o-animation-direction",
            "animation-direction",
            "text-align",
            "-webkit-text-align-last",
            "-moz-text-align-last",
            "-ms-text-align-last",
            "text-align-last",
            "vertical-align",
            "white-space",
            "text-decoration",
            "text-emphasis",
            "text-emphasis-color",
            "text-emphasis-style",
            "text-emphasis-position",
            "text-indent",
            "-ms-text-justify",
            "text-justify",
            "text-transform",
            "letter-spacing",
            "word-spacing",
            "-ms-writing-mode",
            "text-outline",
            "text-transform",
            "text-wrap",
            "text-overflow",
            "-ms-text-overflow",
            "text-overflow-ellipsis",
            "text-overflow-mode",
            "-ms-word-wrap",
            "word-wrap",
            "word-break",
            "-ms-word-break",
            "-moz-tab-size",
            "-o-tab-size",
            "tab-size",
            "-webkit-hyphens",
            "-moz-hyphens",
            "hyphens",
            "pointer-events"
        ],
        [
            "opacity",
            "filter:progid:DXImageTransform.Microsoft.Alpha(Opacity",
            "-ms-filter:\'progid:DXImageTransform.Microsoft.Alpha",
            "-ms-interpolation-mode",
            "color",
            "border",
            "border-collapse",
            "border-width",
            "border-style",
            "border-color",
            "border-top",
            "border-top-width",
            "border-top-style",
            "border-top-color",
            "border-right",
            "border-right-width",
            "border-right-style",
            "border-right-color",
            "border-bottom",
            "border-bottom-width",
            "border-bottom-style",
            "border-bottom-color",
            "border-left",
            "border-left-width",
            "border-left-style",
            "border-left-color",
            "-webkit-border-radius",
            "-moz-border-radius",
            "border-radius",
            "-webkit-border-top-left-radius",
            "-moz-border-radius-topleft",
            "border-top-left-radius",
            "-webkit-border-top-right-radius",
            "-moz-border-radius-topright",
            "border-top-right-radius",
            "-webkit-border-bottom-right-radius",
            "-moz-border-radius-bottomright",
            "border-bottom-right-radius",
            "-webkit-border-bottom-left-radius",
            "-moz-border-radius-bottomleft",
            "border-bottom-left-radius",
            "-webkit-border-image",
            "-moz-border-image",
            "-o-border-image",
            "border-image",
            "-webkit-border-image-source",
            "-moz-border-image-source",
            "-o-border-image-source",
            "border-image-source",
            "-webkit-border-image-slice",
            "-moz-border-image-slice",
            "-o-border-image-slice",
            "border-image-slice",
            "-webkit-border-image-width",
            "-moz-border-image-width",
            "-o-border-image-width",
            "border-image-width",
            "-webkit-border-image-outset",
            "-moz-border-image-outset",
            "-o-border-image-outset",
            "border-image-outset",
            "-webkit-border-image-repeat",
            "-moz-border-image-repeat",
            "-o-border-image-repeat",
            "border-image-repeat",
            "outline",
            "outline-width",
            "outline-style",
            "outline-color",
            "outline-offset",
            "background",
            "filter:progid:DXImageTransform.Microsoft.AlphaImageLoader",
            "background-color",
            "background-image",
            "background-repeat",
            "background-attachment",
            "background-position",
            "background-position-x",
            "-ms-background-position-x",
            "background-position-y",
            "-ms-background-position-y",
            "background-clip",
            "background-origin",
            "background-size",
            "box-decoration-break",
            "-webkit-box-shadow",
            "-moz-box-shadow",
            "box-shadow",
            "-webkit-box-shadow",
            "-moz-box-shadow",
            "box-shadow",
            "-webkit-box-shadow",
            "-moz-box-shadow",
            "box-shadow",
            "-webkit-box-shadow",
            "-moz-box-shadow",
            "box-shadow",
            "filter:progid:DXImageTransform.Microsoft.gradient",
            "-ms-filter:\'progid:DXImageTransform.Microsoft.gradient",
            "text-shadow"
        ],
        [
            "font",
            "font-family",
            "font-size",
            "font-weight",
            "font-style",
            "font-variant",
            "font-size-adjust",
            "font-stretch",
            "font-effect",
            "font-emphasize",
            "font-emphasize-position",
            "font-emphasize-style",
            "font-smooth",
            "line-height"
        ]
    ]';

    /**
     * @param string css
     * @param boolean debug, OPTIONAL
     * @param json custom_sort_order JSON expected, OPTIONAL
     * @return string|false
     *
     * @TODO: https://github.com/miripiruni/CSScomb/issues/21
     *
     * Example:
     *
     * <code>
     *     require_once 'PATH_TO_CSScomb/csscomb.php';
     *
     *     $c = new csscomb();
     *     $result_code = $c->csscomb(
     *         'div {margin-top:0; color: red; display: inline;}',
     *         false,
     *         $MY_JSON_SORT_ORDER
     *     );
     * </code>
     *
     */
    function csscomb($css = '', $debug = false, $custom_sort_order = null) {
        $this->output = $debug ? true : false;

        if ($css && is_string($css)) {
            $this->code['original'] = $this->code['edited'] = $css;
            $this->set_mode();
            $this->set_sort_order($custom_sort_order);
            $this->preprocess();
            $this->parse_rules();
            $this->postprocess();
            return $this->end_of_process();
        } else {
            return false;
        }
    }


    /**
     * Функция устанавливает $this->sort_order
     *
     * @param json_array {string/JSON}
     *
     */
    function set_sort_order($json_array = null) {
        $this->sort_order = json_decode($this->default_sort_order);

        if ($json_array !== null) {
            $custom_sort_order = json_decode($json_array);
            if (is_array($custom_sort_order) AND count($custom_sort_order) > 0) {
                $this->sort_order = $custom_sort_order;
            }
        }

        if ($json_array === 'yandex') {
            $this->sort_order = json_decode($this->yandex_sort_order);
            //switch(json_last_error()) {
                //case JSON_ERROR_DEPTH:
                    //echo 'JSON parse error: Достигнута максимальная глубина стека';
                //break;
                //case JSON_ERROR_STATE_MISMATCH:
                    //echo 'JSON parse error: Некорректные разряды или не совпадение режимов';
                //break;
                //case JSON_ERROR_CTRL_CHAR:
                    //echo 'JSON parse error: Некорректный управляющий символ';
                //break;
                //case JSON_ERROR_SYNTAX:
                    //echo 'JSON parse error: Синтаксическая ошибка, не корректный JSON';
                //break;
            //}
        }
    }


    /**
     * Функция устанавливает $this->mode
     *
     * @TODO: а если и тег <style> и несколько style="..." в HTML?
     *        https://github.com/miripiruni/CSScomb/issues/9
     */
    function set_mode() {
        if (strpos($this->code['original'], '{')) { // если есть фигурные скобки
            $this->mode = 'css-file';
        }
        else { // если нет фигурных скобок
            // если есть атрибут
            if (strpos($this->code['original'], "style='") OR strpos($this->code['original'], 'style="')) {
                $this->mode = 'style-attribute';
            }
            // если есть двоеточия и точки с запятой то это набор свойств
            else if (strpos($this->code['original'], ':') AND strpos($this->code['original'], ';')) {
                $this->mode = 'properties';
            }
        }
    }


    /**
     * @TODO: почему нигде не используется? Убрать?
     */
    function get_sort_order($order_name = null) {
        $order = '';
        if ($order_name !== null) {
            if ($order_name == 'zen') {
                $this->set_sort_order($this->default_sort_order);
                foreach ($this->sort_order as $k => $prop) {
                    $order .= $prop."
";
                }
            }

            if ($order_name === 'yandex') {
                $this->set_sort_order($this->yandex_sort_order);
                foreach ($this->sort_order as $group) {
                    foreach ($group as $prop) {
                        $order .= $prop."
";
                    }
                    $order .= "
";
                }
                $order = trim($order);
            }
        }
        return $order;

    }


    function preprocess() {
        // 1. экранирование хаков, которые мешают парсить
        if (strpos($this->code['edited'], '"\\"}\\""')) { // разбираемся со страшным хаком "\"}\""
            $i = 0;
            $this->code['hacks'] = array();
            while(strpos($this->code['edited'], '"\\"}\\""')):
                $this->code['hacks'][] = '"\\"}\\""';
                $this->code['edited'] = str_replace('"\\"}\\""', 'hack'.$i++.'__', $this->code['edited']);
            endwhile;
        }

        // 2. expressions
        if (strpos($this->code['edited'], 'expression(')) { // разбираемся с expression если они присутствуют
            $i = 0;
            $this->code['expressions'] = array();
            while(strpos($this->code['edited'], 'expression(')):
                // вылавливаем expression
                preg_match_all('@(.*)expression\((.*?)\)@ism', $this->code['edited'], $match, PREG_SET_ORDER);
                $this->code['expressions'][] = $match[0][2]; // собираем значения expression(...)
                $this->code['edited'] = str_replace(
                                            'expression('.$match[0][2].')',
                                            'exp'.$i++.'__',
                                            $this->code['edited']);
            endwhile;
        }

        // 3. data uri
        if (strpos($this->code['edited'], ';base64,')) {
            $i = 0;
            $this->code['datauri'] = array();
            while(strpos($this->code['edited'], ';base64,')):
                // вылавливаем data uri
                preg_match_all(
                    '@(url\(["\']?data:.[^\)]*["\']?\))@ism',
                    $this->code['edited'],
                    $match,
                    PREG_SET_ORDER);
                $this->code['datauri'][] = $match[0][1]; // собираем значения
                $this->code['edited'] = str_replace($match[0][1], 'datauri'.$i++.'__', $this->code['edited']);
            endwhile;
        }

        // 4. Interpolated variables
        preg_match_all('@(\#|\@){.*?}@ismx', $this->code['edited'], $this->code['interpolations']);
        foreach ($this->code['interpolations'][0] as $key => $value) {
            $pos = strpos($this->code['edited'], $value);
            if ($pos !== false) {
                $this->code['edited'] = substr_replace($this->code['edited'],"interpolation".$key.'__',$pos,strlen($value));
            }    
        }

        // 5. Закрываем сложности парсинга {}
        $this->code['edited'] = str_replace('{}', '{ }', $this->code['edited']);

        // 6. Закрываем сложности с отсутствующей последней ; перед }
        $this->code['edited'] = preg_replace('@(.*?[^\s;\{\}\/\*])(\s*?})@', '$1;$2', $this->code['edited']);
        // Убираем ; у последнего инлайнового комментария
        // Инлайновый комментарий может идти только после фигурной скобки или ;
        $this->code['edited'] = preg_replace('@([;\{\}]+\s*?//.*?);(\s*?})@', '$1$2', $this->code['edited']);
        // Убираем ; у интерполированных переменных
        $this->code['edited'] = preg_replace('/((#\{\$|\@\{).*?)[;](\s*?\})/', '$1$3', $this->code['edited']);

        // 7. Комментарии
        if (preg_match_all('@
            (
            \s*
            /\*
            .*?[^\*/]
            \*/
            (\s/\*\*/)?
            )
            @ismx', $this->code['edited'], $test)) {

            // 7.1. Закомментировано одно или несколько свойств: повторяющийся паттерн *:*; \s*?
            if (preg_match_all('@
                (\s*)
                /\*
                (.*?[^\*/])
                \*+/
                (\ {0,1}/\*\*/)?
                @ismx', $this->code['edited'], $comments)) {

                $new_comments = Array();
                $old_comments = $comments[0];

                foreach ($comments[2] as $key => $comment) {
                    if ( // если комментарий содержит ; и :
                        strpos($comment, ':') !== FALSE AND
                        strpos($comment, ';') !== FALSE

                    ) {
                        preg_match_all('@
                        (\s*)
                        (
                            .+?[^;]
                            ;
                        )
                        @ismx', $comment, $properties);

                        $new_comment = '';
                        foreach ($properties[2] as $property) {
                            $new_comment .= $comments[1][$key]."commented__".$property;
                        }
                        $new_comments[] = $new_comment;
                    }
                    else {
                        // если нет : или ;, то считаем что это текстовый комментарий
                        // и копируем его в том виде, в каком он был.
                        $new_comments[] = $comments[0][$key];
                    }


                }

                foreach ($old_comments as $key => $old_comment) {
                    $this->code['edited'] = str_replace(
                                                $old_comments[$key],
                                                $new_comments[$key],
                                                $this->code['edited']);
                }
            }

            // 7.2. Обрывки закомментированных деклараций: присутствует { или }
            if (preg_match_all('@
                \s*?
                /\*
                (
                    .*?[^\*/]
                )*?
                \*+/
                @ismx', $this->code['edited'], $comments)) {

                $new_comments = Array();
                $old_comments = $comments[0];

                foreach ($comments[0] as $key => $comment) {
                    if (strpos($comment, '}') !== FALSE OR strpos($comment, '{') !== FALSE) {
                        $new_comment = '';
                        if (strpos($comment, '}') !== FALSE) { $new_comment .= '}'; }
                        $new_comment .= "brace__".$key;
                        if (strpos($comment, '{') !== FALSE) { $new_comment .= '{'; }
                        $new_comments[$key] = $new_comment;
                        $this->code['braces'][$key] = $comment;
                    }
                }

                foreach ($new_comments as $key => $new_comment) {
                    if (strlen($new_comment) > 0) {
                        $this->code['edited'] = str_replace(
                                                    $old_comments[$key],
                                                    $new_comment,
                                                    $this->code['edited']);
                    }
                }
            }
        }

        // 8. Entities
        if (preg_match_all('@
            \&
            \#?
            [\d\w]*?[^;]
            \;
            @ismx', $this->code['edited'], $entities)) {

            $this->code['entities'] = array();

            foreach ($entities[0] as $key => $val) {
                $this->code['entities'][$key] = $val;
                $this->code['edited'] = str_replace($val, 'entity__'.$key, $this->code['edited']);
            }

        }
    }


    /**
     *
     * Зависит от $this->mode
     * Из $this->code['edited'] получает массив разбитый по }
     *
     */
    function parse_rules() {
        if ($this->mode === 'css-file') {

            // Отделяем всё после последней }
            // Например, @import и комментарии
            preg_match('@
                (
                    .*[^}]
                    }
                )
                (.*)
                @ismx', $this->code['edited'], $matches);

            $code_without_end = $matches[1];

            // Если что-то нашлось, выносим в отдельную строку
            $end_of_code = '';
            if($matches[2]) {
                $end_of_code = $matches[2];
            }

            // Обрабатываем всё до последней }
            $code_without_end = $this->parse_root($code_without_end);
            // Склеиваем обратно
            $this->code['resorted'] = $code_without_end.$end_of_code;
        }

        // TODO: Написать тесты для этой части и переписать код
        if ($this->mode === 'style-attribute') {

            $this->code['resorted'] = $this->code['edited'];

            preg_match_all('@
                .*?[^"\']
                style=
                ["\']
                (.*?)
                ["\']
                @ismx', $this->code['edited'], $matches);

            $properties = $matches[1];

            //TODO: вынести вызов parse_prop в csscomb(), сделать чтобы parse_rules возвращала результат своей работы в виде $rules
            foreach ($properties as $props) {
                $r = $this->parse_properties($props);
                $this->code['resorted'] = str_replace($props, $r, $this->code['resorted']).$end_of_code;
            }
        }

        if ($this->mode === 'properties') {
            $this->code['edited'] = "\n".$this->code['edited'];
            $this->code['resorted'] = $this->parse_child($this->code['edited']);
            $this->code['resorted'] = substr($this->code['resorted'], 1);
        }
    }

    /**
     * Ищем парные {} первого уровня
     *
     */
    function parse_root($css = '') {
        preg_match_all('@
            \{(((?>[^\{\}]+)|(?R))*)\}
        @ismx', $css, $matches);

      // Парсим содержимое каждой пары {}
      foreach ($matches[1] as &$value) {
        $old_value = $value;
        $value = $this->parse_child($value);
        $css = str_replace($old_value, $value, $css);
      }
      return $css;
    }

    /**
     * Разбиваем код на группы:
     *   - вложенные {}
     *   - переменные ($tomato, @tomato)
     *   - включения (@import, @include, @extend)
     *   - простые свойства (color: white;)
     * TODO: добавить поддержку сложных свойств (border: {...})
     *
     */
    function parse_child($value = '') {
      $block_imports = array();
      // 1. Ищем «детей» (вложенные селекторы)
      preg_match_all('@
        [^};]*?
        {
            (
                (
                    ([^\{\}]+)|(?R)
                )*
            )
        }
        @ismx', $value, $nested);

      // TODO: возможно, вынести отдельной функцией, т.к. часто повторяется
      foreach ($nested[0] as $key => &$nest) {
        $value = str_replace($nest, '', $value);
        if(strpos(trim($nest), '@include') === 0) {
            $value = str_replace($nest, '', $value);
            $old_nest = $nested[1][$key];
            $new_nest = $this->parse_child($nested[1][$key]);
            $nest = str_replace($old_nest, $new_nest, $nest);
            $block_imports[] = $nest;
            unset($nested[0][$key]);
            unset($nested[1][$key]);
        }
      }

      // Сохраняем всех «детей» в строку для последующей замены
      // TODO: убрать, если без этого можно обойтись
      $nested_string = implode('', $nested[0]);

      // Рекурсия, ahoj!
      // Сортируем содержимое «детей»
      foreach ($nested[1] as &$child) {
        $old_child = $child;
        $new_child = $this->parse_child($child);
        $nested_string = str_replace($old_child, $new_child, $nested_string);
      }

      // Остались без «детей»

      // 2. Выносим переменные в отдельный массив $vars
      preg_match_all('@
        (\s*/\*[^\*/]*?\*/)?
        (\s*//.*?)?
        \s*(\$|\@)[^;\}]+?:[^;]+?;
        @ismx', $value, $vars);
      // Удаляем их из общей строки
      foreach ($vars[0] as $var) {
        $value = str_replace($var, '', $value);
      }

      // 3. Выносим импорты в отдельный массив $imports
      // TODO: объединить в одно выражение

      // Включения, следующие сразу за {
      preg_match_all('@
        (^\s*\@[^;]+?[;])|(^\s*\.[^;:]+?[;])
        @isx', $value, $first_imports);
      foreach ($first_imports[0] as &$first_import) {
        $value = str_replace($first_import, '', $value);
      }

      // Все остальные
      preg_match_all('@
        (?<=[;}])(\s*\@[^;]+?[;])|(?<=[;}])(\s*\.[^;:]+?[;])
        @ismx', $value, $imports);
      // Удаляем их из общей строки
      foreach ($imports[1] as &$import) {
        $value = str_replace($import, '', $value);
      }
      foreach ($imports[2] as &$import) {
        $value = str_replace($import, '', $value);
      }

      // 4. Выносим простые свойства в массив $properties
      preg_match_all('@
        \s*[^;]+?:[^;]+?;
        (\s*/\*.*?[^\*/]\*/)?
        (\s{0,1}/\*\*/)?
        @ismx', $value, $properties);
      // Удаляем их из общей строки
      foreach ($properties[0] as &$property) {
        $value = str_replace($property, '', $value);  
      }
      // Сортируем свойства
      $props = $properties[0];
      $props = $this->resort_properties($props);

      // 5. Если осталось ещё что-то, оставляем «как есть»
      
      // 6. Склеиваем всё обратно в следующем порядке:
      //   переменные, включения, простые свойства, вложенные {}
      $value = implode('', $vars[0]).implode('', $first_imports[0]).implode('', $imports[1]).implode('', $imports[2]).implode('', $block_imports).implode('', $props).$nested_string.$value;
      return $value;
    }


    /**
     * Сильно зависит от $this->mode
     *
     * Парсит CSS-декларации из строки
     * @param css {string}
     *
     */
    function parse_properties($css = '') {
        if ($this->mode === 'css-file') {
            // отделяем фигурную скобку
            $matches = null;
            preg_match('@

                ^
                (.*?)
                (
                    #(\s*/\*.*\*/;)*?
                    \s*?
                    }
                )

            @ismx', $css, $matches);

            $all = null;
            preg_match_all('@
                ^
                (
                    \s*
                    /\*.*\*/
                )
                ;
                (
                    \s*
                    }
                )
            @ismx', $css, $all);

            if (count($all[0]) > 0 and $all[0][0] !== null and $all[0][0] === $css) { // Если в этом участке кода ничего нет кроме одиногоко /* ... */ и закрывающей }
                $all[0][0] = '';
                return $all[1][0].$all[2][0];
            }

            if (sizeof($matches) > 0 and strlen($matches[1]) > 0) { // если есть и свойства и скобка и хотя бы одно :
                $properties = $matches[1];
                $brace = $matches[2];

                if (is_array($this->sort_order[0])) { // Если порядок сортировки разбит на группы свойств
                    /**
                     * Если CSS-свойства уже были разделены на группы пустой 
                     * строкой, то нужно поудалять это разделение, чтобы сделать 
                     * новое.
                     */
                    $properties = preg_replace('/
                        \r?\n
                        \ *?
                        \r?\n
                        /ismx', "\n", $properties);

                }

                /* отделяем первый комментарий, который находится на той же строке, где и была скобка */
                $matches = null;
                $first_spaces = $first_comment = '';
                preg_match('@

                    ^
                    (.*?)
                    (\s*?)
                    (/\* .* \*/)
                    (.*)
                    $

                    @ismx', $properties, $matches);

                if (
                    count($matches) === 5 and              // все распарсилось как надо
                    strlen($matches[1]) === 0 and       // комментарий действительно идет первым
                    strpos($matches[2], "\n") !== 0     // перед комментарием нет переноса строки, следовательно предпологаем, что он относится к скобке с селектором
                ) {
                    $first_spaces = $matches[2];
                    $first_comment = $matches[3];
                    $properties = $matches[4];
                }

                $matches = null;
                preg_match_all('@

                    \s*
                    (
                        .[^:]*
                        [:>]
                        .[^;]*
                        ;
                        (               # На этой же строке (после ;) может быть комментарий. Он тоже пригодится.
                            \s*
                            /\*
                            .*?[^\*/]
                            \*/
                        )
                        ?
                        (\s{0,1}/\*\*/)?

                    )

                    @ismx', $properties, $matches);

                $props = $matches[0];

                $props = $this->resort_properties($props);
                $props = $first_spaces.$first_comment.implode($props).$brace;

            }
            else $props = $css;
        }

        if ($this->mode === 'properties' OR $this->mode === 'style-attribute') {
            preg_match_all('@

                    \s*
                    (
                        .[^:]*          # все что угодно, но не :
                        :
                        .[^;]*          # все что угодно, но не ;
                        ;
                        (               # На этой же строке (после ;) может быть комментарий. Он тоже пригодится.
                            \s*
                            /\* .* \*/
                        )
                        *?
                    )

                    @ismx', $css, $matches);

            $props = $matches[0];

            if (sizeof($props) > 0) { // если есть и свойства и скобка и хотя бы одно :
                $props = $this->resort_properties($props);
                $props = implode($props);
            }
            else {
                $props = $css;
            }
        }

        return $props;
    }


    /**
     * Функция выполняет сортировку свойств
     *
     */
    function resort_properties($prop) {
        $resorted = $undefined = array();

        foreach ($prop as $k => $val) {
            $index = null; // Дефолтное значение индекса порядка для свойства. Если свойство не знакомо, то index так и останется null.
            preg_match_all('@\s*?(.*?[^:]:).*@ism', $val, $matches, PREG_SET_ORDER);
            // Решаем проблему с пробелами перед :
            $property = preg_replace('@\s*:@ism', ':', (trim($matches[0][1])));

            if (is_array($this->sort_order[0])) { // Если порядок сортировки разбит на группы свойств

                foreach ($this->sort_order as $pos => $key) { // для каждой группы свойств
                    foreach ($this->sort_order[$pos] as $p => $k) { // для каждого свойства
                        if (
                            /**
                             * Пробел в начале добавляется специально, чтобы избежать совпадений по вхождению
                             * одной строки в другую. Например: top не должно совпадать с border-top
                             */
                            strpos(' '.trim($property), ' '.$k.':') !== FALSE OR
                            strpos(' '.trim($property), ' commented__'.$k.':') !== FALSE

                        ) {
                            $through_number = $this->get_through_number($k); // определяем "сквозной" порядковый номер
                            if ($through_number !== false) $index = $through_number;
                        }
                    }
                }

            }
            else {
                foreach ($this->sort_order as $pos => $key) {
                    if (
                        // пробел в начале добавляется специально.
                        strpos(' '.trim($property), ' '.$key.':') !== FALSE OR
                        strpos(' '.trim($property), ' commented__'.$key.':') !== FALSE
                    ) {
                        $index = $pos;
                    }
                }

            }

            if ($index === null OR strpos($val, 'exp')) {
                $undefined[] = $val;
            }
            else {
                // Добавляет к уже существующей записи с определенном порядковым номером еще одну запись с таким же порядковым номером
                // либо создает новую запись если с таким порядковым номером ничего еще не встречалось
                if (isset($resorted[$index])) {
                    $resorted[$index] .= $val;
                }
                else {
                    $resorted[$index] = $val;
                }
            }
        }
        ksort($resorted);
        if (is_array($this->sort_order[0])) {
            if (count($resorted) > 0) { // Если свойства разделены на группы
                $resorted = $this->separate_property_group($resorted);
            }
            if (count($undefined) > 0) {
                $undefined[0] = "\n".$undefined[0];
            }
        }

        $resorted = array_merge($resorted, $undefined); // добавляем в конец нераспознанное

        return $resorted;
    }


    /**
     * Склеивает многомерный массив в строку
     */
    function array_implode($arrays, &$target = array()) {
        foreach ($arrays as $item) {
            if (is_array($item)) {
                $this->array_implode($item, $target);
            }
            else {
                $target[] = $item;
            }
        }
        return $target;
    }


    /**
     * Постпроцесс, убираем все подстановки и возвращаем на место всё, что мешало сортировке
     */
    function postprocess() {
        // 1. экранирование хаков с использованием ключевых символов например voice-family: "\"}\"";
        if (is_array($this->code['hacks'])) { // если были обнаружены и вырезаны хаки
            foreach ($this->code['hacks'] as $key => $val) {
                if (strpos($this->code['resorted'], 'hack'.$key.'__')) $this->code['resorted'] = str_replace('hack'.$key.'__', $val, $this->code['resorted']); // заменяем значение expression обратно
            }
        }

        // 2. expressions
        if (is_array($this->code['expressions'])) { // если были обнаружены и вырезаны expression
            foreach ($this->code['expressions'] as $key => $val) {
                if (strpos($this->code['resorted'], 'exp'.$key.'__')) $this->code['resorted'] = str_replace('exp'.$key.'__', 'expression('.$val.')', $this->code['resorted']); // заменяем значение expression обратно
            }
        }

        // 3. datauri
        if (is_array($this->code['datauri'])) { // если были обнаружены и вырезаны data uri
            foreach ($this->code['datauri'] as $key => $val) {
                if (strpos($this->code['resorted'], 'datauri'.$key.'__')) $this->code['resorted'] = str_replace('datauri'.$key.'__', $val, $this->code['resorted']); // заменяем значение expression обратно
            }
        }

        // 4. Interpolated variables
        preg_match_all('#interpolation(\d)__#ismx', $this->code['resorted'], $new_vars);
        foreach ($new_vars[1] as $key => $value) {
            $this->code['resorted'] = str_replace($new_vars[0][$key], $this->code['interpolations'][0][$key], $this->code['resorted']);    
        }

        // 5. Удаляем искусственно созданные 'commented__'
        while(strpos($this->code['resorted'], 'commented__') !== FALSE) {
            $this->code['resorted'] = preg_replace(
                '#
                    commented__
                    (.*?[^:]
                    :
                    .*?[^;]
                    ;)
                #ismx',
                '/* $1 */',
                $this->code['resorted']
            );
        }

        // 6. Удаляем искусственно созданные 'brace__'
        if (is_array($this->code['braces'])) { // если были обнаружены и вырезаны хаки
            foreach ($this->code['braces'] as $key => $val) {
                if (strpos($this->code['resorted'], 'brace__'.$key.'{') !== FALSE) {
                    $this->code['resorted'] = str_replace('brace__'.$key.'{', $val, $this->code['resorted']);
                }
                if (strpos($this->code['resorted'], '}brace__'.$key) !== FALSE) {
                    $this->code['resorted'] = str_replace('}brace__'.$key, $val, $this->code['resorted']);
                }
            }
        }


        // 7. Entities
        if (is_array($this->code['entities'])) { // если были обнаружены и вырезаны entities
            foreach ($this->code['entities'] as $key => $val) {
                if (strpos($this->code['resorted'], 'entity__'.$key) !== FALSE) {
                    $this->code['resorted'] = str_replace('entity__'.$key, $val, $this->code['resorted']);
                }
            }
        }

    }



    function end_of_process() {
        // TODO: WTF???
        if ($this->code['edited'] !== '' AND $this->output !== false) {
            echo '<style>
    body{margin:0;}
    .diff{
        width:100%;
        height:400px;
        overflow:auto;
        }
        .diff textarea{
            width:50%;
            height:9999px;
            padding:0;
            margin:0;
            border:0;
            background:#f5f5f5;
            }
</style>
<div class="diff">
<textarea name="in" id="in" cols="30" rows="10">'.$this->code['original'].'</textarea><textarea name="out" id="out" cols="30" rows="10">'.$this->code['resorted'].'</textarea>
</div>';
        }

        if ($this->output === false) return $this->code['resorted'];
    }


    function log($before, $after) {
        echo '
        <style>pre{word-wrap: break-word;}</style>
        <div class="php"><pre class="php"><code>'.$before.'';
        echo '<br>';
        echo '<br>';
        echo ''.var_dump($after).'</code></pre></div>';
    }



    /**
     * Возвращает сквозной прядковый номер элемента двумерного массива так, как если бы этот массив был одномерным
     * @param  {string}
     * @return {bool|int}
     */
    private function get_through_number($value) {
        $i = 0;
        foreach ($this->sort_order as $property_group) {
            foreach ($property_group as $key => $val) {
                if ($val == $value) return $i;
                else $i++;
            }
        }
        return false;
    }

    /**
     * Разделяет свойства на группы пустой строкой
     * Внимание: вызывать только когда есть разделение на группы, иначе вернет входной массив без изменений
     * @param  {array}
     * @return {array}
     */
    private function separate_property_group($properties) {
        if (is_array($this->sort_order[0])) { // Если в настройках нет разбиения на группы, то выводим входной массив без изменений
            foreach ($properties as $key => &$property) {
                $property = preg_replace('@\n\s*?(\n\s*?)@ismx', '$1', $property);
                $array = explode(':', $property);
                $prop_name[$key] = trim($array[0]);
            }
            foreach ($this->sort_order as $group_num => $property_group) { // Перебираем группы свойств
                $intersect = array_intersect($prop_name, $property_group);
                if (count($intersect) > 0) {
                    $num = array_keys($intersect);
                    $last_key = null;
                    foreach ($num as $n) {
                        $last_key = $n;
                    }
                    if ($properties[$last_key] !== end($properties)) {
                        $properties[$last_key] = $properties[$last_key]."\n";
                    }
                }
            }
        }
        return $properties;
    }

}

