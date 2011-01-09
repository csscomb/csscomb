<?php
/**
 * CSScomb
 * @version: 1.71
 * @author: Viacheslav Oliyanchuk (miripiruni)
 * @web: http://csscomb.ru/
 * @Date: 05.01.11
 * @Time: 19:10
 */
 
class csscomb{

    var $sort_order = Array(),
    $code = Array(
        'original' => null, // оригинальный код, без изменений, то, что пришло на вход
        'edited' => null,   // код, который может меняться в процессе выполнения алгоритма пересортировки
        'resorted' => null  // конечный, пересортированный CSS-код
    ),
    $output = true,

    $default_sort_order = '
[
	"position",
	"top",
	"right",
	"bottom",
	"left",
	"z-index",
	"float",
	"clear",
	"display",
	"visibility",
	"overflow",
	"overflow-x",
	"overflow-y",
	"overflow-style",
	"zoom",
	"clip",
	"box-sizing",
	"-webkit-box-shadow",
	"-moz-box-shadow",
	"box-shadow",
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
	"width",
	"height",
	"max-width",
	"max-height",
	"min-width",
	"min-height",
	"outline",
	"outline-offset",
	"outline-width",
	"outline-style",
	"outline-color",
	"border",
	"border-break",
	"border-collapse",
	"border-color",
	"-webkit-border-image",
	"-moz-border-image",
	"border-image",
	"border-top-image",
	"border-right-image",
	"border-bottom-image",
	"border-left-image",
	"border-corner-image",
	"border-top-left-image",
	"border-top-right-image",
	"border-bottom-right-image",
	"border-bottom-left-image",
	"border-fit",
	"border-length",
	"border-spacing",
	"border-style",
	"border-width",
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
	"-webkit-border-top-left-radius",
	"-webkit-border-top-right-radius",
	"-webkit-border-bottom-right-radius",
	"-webkit-border-bottom-left-radius",

	"-khtml-border-radius",
	"-khtml-border-top-left-radius",
	"-khtml-border-top-right-radius",
	"-khtml-border-bottom-right-radius",
	"-khtml-border-bottom-left-radius",

	"-moz-border-radius",
	"-moz-border-top-left-radius",
	"-moz-border-radius-topleft",
	"-moz-border-top-right-radius",
	"-moz-border-radius-topright",
	"-moz-border-bottom-right-radius",
	"-moz-border-radius-bottomright",
	"-moz-border-bottom-left-radius",
	"-moz-border-radius-bottomleft",

	"border-radius",
	"border-top-left-radius",
	"border-top-right-radius",
	"border-bottom-right-radius",
	"border-bottom-left-radius",

	"background",
	"filter:progid:DXImageTransform.Microsoft.AlphaImageLoader",
	"background-color",
	"background-image",
	"background-repeat",
	"background-attachment",
	"background-position",
	"background-position-x",
	"background-position-y",
	"background-break",
	"background-clip",
	"background-origin",
	"background-size",
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
	"vertical-align",
	"text-align",
	"text-align-last",
	"text-decoration",
	"text-emphasis",
	"text-height",
	"text-indent",
	"text-justify",
	"text-outline",
	"text-replace",
	"text-transform",
	"text-wrap",
	"text-shadow",
	"line-height",
	"white-space",
	"white-space-collapse",
	"word-break",
	"word-spacing",
	"word-wrap",
	"letter-spacing",
	"font",
	"font-weight",
	"font-style",
	"font-variant",
	"font-size",
	"font-size-adjust",
	"font-family",
	"font-effect",
	"font-emphasize",
	"font-emphasize-position",
	"font-emphasize-style",
	"font-smooth",
	"font-stretch",
	"opacity",
	"-ms-filter:\'progid:DXImageTransform.Microsoft.Alpha",
	"filter:progid:DXImageTransform.Microsoft.Alpha(Opacity",
	"transitions",
	"resize",
	"cursor",
	"page-break-before",
	"page-break-inside",
	"page-break-after",
	"orphans",
	"widows"
]';


    function set_sort_order($json_array = ''){
		if($json_array!=''){
			$custom_sort_order = json_decode($json_array);
			if(is_array($custom_sort_order) AND count($custom_sort_order)>0){
				$this->sort_order = $custom_sort_order;
			}
			else $this->sort_order = json_decode($this->default_sort_order);
		}
		else $this->sort_order = json_decode($this->default_sort_order);
	}


    function csscomb($css = '', $echo = true){
        if($echo===0 or $echo===false) $this->output = false;

        $this->code['original'] = $this->code['edited'] = $css;

        $this->set_sort_order();    // 1 задаем порядок сортировки
        $this->preprocess();        // 2 препроцессинг
        $this->parse_rules();       // 3,4,5 парсим на части по скобкам
        $this->postprocess();       // 6 постпроцессинг

        if($this->code['edited']!='' AND $this->output!==false){
            echo '
<table width="100%" style="font:1em monospace;">
    <tr>
        <td width="50%" style="vertical-align:top;white-space:pre;">'.$this->code['original'].'</td>
        <td style="vertical-align:top;white-space:pre;">'.$this->code['resorted'].'</td>
    </tr>
</table>';
        }

        if($this->output===false) return $this->code['resorted'];

//        $this->result();          // 7 возвращаем результат
    }


    function preprocess(){
        // 1. ; в конце

        $this->code['edited'] = str_replace('{}','{ }', $this->code['edited']); // закрываем сложности парсинга {}
        $this->code['edited'] = preg_replace('/(.*?[^\s])(\s*?})/','$1;$2', $this->code['edited']); // закрываем сложности с отсутствующей последней ; перед }
        $this->code['edited'] = preg_replace('@;(\s*/\*.*?[^\*\/]*/)@ism','$1;', $this->code['edited']); // перемещаем построчные комментарии к свойству за ;

//        $this->log('edited', $this->code['edited']);
        /*
         *
         * 2. комментарии ;*\/ ; *\/
         * 3. datauri
         * 4. экранирование хаков с использованием ключевых символов например voice-family: "\"}\"";
         * 5. expressions
         */
    }


    function parse_rules(){
        // отделяем все что после последней } если там что-то есть, конечно :)
        preg_match('@

            (
                .*[^}]
                }
            )
            (.*)

        @ismx', $this->code['edited'], $matches);

        $code_without_end = $matches[1];
        $end_of_code = $matches[2];

        /**
         * Разбиваем CSS-код на части по { или }
         * Это позволяет поддерживать LESS CSS, @media, @-webkit-keyframes и любые другие конструкции
         * использующие вложенные фигурные скобки
         */
        preg_match_all('@

            .*?[^}{]  # находим код между соседними скобками {|}
            \s*?
            [}{]

        @ismx', $code_without_end, $matches);


        $rules = $matches[0]; // CSS-код разрезанный по фигурным скобкам

//        $this->log('rules', $rules);
        foreach($rules as $key=>$val){
            $rules[$key] = $this->parse_properties($val);  // 4 парсим и сортируем каждую часть
        }
//        $this->log('rules', $rules);

        $this->code['resorted'] = implode($this->array_implode($rules)).$end_of_code;            // 5 склеиваем части

    }


    function parse_properties($css = ''){
        // отделяем фигурную скобку
        preg_match('@

            ^
            (.*?)
            (
                \s*?
                }
            )

        @ismx', $css, $first);

//        $this->log($css, $first);

        if(sizeof($first)>0){ // если есть и свойства и скобка
            $without_brace = $first[1];
            $brace = $first[2];

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

                @ismx', $without_brace, $matches);

            $props = $matches[0];

//            $this->log('props', $ma);

            $props = $this->resort_properties($props);
            $props = implode($props).$brace;

        }
        else $props = $css;

        return $props;
    }


    function resort_properties($prop){
        $resorted = $undefined = array();

//        $this->log('new', $prop);
        foreach($prop as $k=>$val){
            $index = null; // Дефолтное значение индекса порядка для свойства. Если свойство не знакомо, то index так и останется null.
            preg_match_all('@\s*?(.*?[^:]:).*@ism', $val, $matches, PREG_SET_ORDER);
            $property = trim($matches[0][1]);
            foreach($this->sort_order as $pos=>$key){
                if(strpos(' '.trim($property), ' '.$key.':')!==false) {
                    $index = $pos;
                }
            }

            if($index === null OR strpos($val, 'exp')) $undefined[] = $val;
            else{
                /*
                   Добавляет к уже существующей записи с определенном порядковым номером еще одну запись с таким же порядковым номером
                   либо создает новую запись если с таким порядковым номером ничего еще не встречалось
                */
                if(isset($resorted[$index])) $resorted[$index] .= $val;
                else $resorted[$index] = $val;
            }
        }
        ksort($resorted);
        $resorted = array_merge($resorted, $undefined); // добавляем в конец нераспознанное

        return $resorted;
    }


    function array_implode($arrays, &$target = array()){
        foreach ($arrays as $item){
            if (is_array($item)){
                $this->array_implode($item, $target);
            }
            else{
                $target[] = $item;
            }
        }
        return $target;
    }


    function postprocess(){
//        $this->code['resorted'] = preg_replace('@(\s*/\*.*?[^\*\/]*/);+@ism',';$1', $this->code['resorted']); // возвращаем на место комментарии
//        $this->log('postprocess edited',$this->code['edited']);
        /*
         * 1. ; в конце
         * 2. комментарии ;*\/ ; *\/
         * 3. datauri
         * 4. экранирование хаков с использованием ключевых символов например voice-family: "\"}\"";
         * 5. expressions
         */
    }


    function log($before, $after){
        echo '
        <div class="php"><pre class="php"><code>'.$before.'';
        echo '<br>';
        echo '<br>';
        echo ''.var_dump($after).'</code></pre></div>';
    }

}
