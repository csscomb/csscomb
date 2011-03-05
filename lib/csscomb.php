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
        'resorted' => null,  // конечный, пересортированный CSS-код
        // TODO: избавиться от resorted
        'expressions' => null,  // если найдены expression, то эта переменная станет массивом, ячейки которого будут содержать код каждого найденного expression
        'datauri' => null,  // если найдены data uri, то эта переменная станет массивом...
        'hacks' => null  // если найдены CSS-хаки мешающие парсить, то эта переменная станет массивом...
    ),

    /*
     * css-file - только CSS-код
     * style-attribute - найден атрибут style="..."
     * properties - не найдено фигурных скобок, зато присутствуют точки с запятой и двоеточия.
     *
     */
    $mode = 'css',

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


    function set_sort_order($json_array = null){
		if($json_array!=null){
			$custom_sort_order = json_decode($json_array);
			if(is_array($custom_sort_order) AND count($custom_sort_order)>0){
				$this->sort_order = $custom_sort_order;
			}
			else $this->sort_order = json_decode($this->default_sort_order);
		}
		else $this->sort_order = json_decode($this->default_sort_order);
	}



    function set_mode(){
        if(strpos($this->code['original'], '{')){ // если есть фигурные скобки
                $this->mode = 'css-file';
        }
        else { // если нет фигурных скобок
            if(strpos($this->code['original'], "style='") OR strpos($this->code['original'], 'style="')){ // если есть атрибут
                $this->mode = 'style-attribute';
            }
            // если есть двоеточия и точки с запятой то это набор свойств
            else if(strpos($this->code['original'], ':') AND strpos($this->code['original'], ';')){
                $this->mode = 'properties';
            }
        }
    }


    function csscomb($css = '', $echo = false, $custom_sort_order = null){
        if($echo===0 or $echo===false) $this->output = false;

        $this->code['original'] = $this->code['edited'] = $css;

        $this->set_mode();
        $this->set_sort_order($custom_sort_order);    // 1 задаем порядок сортировки

        $this->preprocess();        // 2 препроцессинг
        $this->parse_rules();       // 3,4,5 парсим на части по скобкам
        $this->postprocess();       // 6 постпроцессинг

//        return $this->mode.' '.$this->end_of_process();
        return $this->end_of_process();

//        $this->result();          // 7 возвращаем результат
    }


    function preprocess(){
        // 1. экранирование хаков, которые мешают парсить
        if(strpos($this->code['edited'], '"\\"}\\""')){ // разбираемся со страшным хаком "\"}\""
            $i = 0;
            $this->code['expressions'] = array();
            while(strpos($this->code['edited'], '"\\"}\\""')):
                $this->code['hacks'][] = '"\\"}\\""';
				$this->code['edited'] = str_replace('"\\"}\\""', 'hack'.$i++.'__', $this->code['edited']);
			endwhile;
//            $this->log('hacks detected', $this->code['edited']);
        }

        // 2. expressions
        if(strpos($this->code['edited'], 'expression')){ // разбираемся с expression если они присутствуют
			$i = 0;
			$this->code['expressions'] = array();
			while(strpos($this->code['edited'], 'expression')):
				preg_match_all('#(.*)expression\((.*)\)#ism', $this->code['edited'], $match, PREG_SET_ORDER); // вылавливаем expression
				$this->code['expressions'][] = $match[0][2]; // собираем значения expression(...)
				$this->code['edited'] = str_replace('expression('.$match[0][2].')', 'exp'.$i++.'__', $this->code['edited']);
			endwhile;
		}
//        $this->log('expressions', $this->code['expressions']);

        // 3. data uri
        if(strpos($this->code['edited'], 'data:')){
            $i = 0;
			$this->code['datauri'] = array();
			while(strpos($this->code['edited'], ';base64,')):
				preg_match_all('#(;base64,[A-Z0-9\+\/\=]*)#ism', $this->code['edited'], $match, PREG_SET_ORDER); // вылавливаем data uri
                $this->code['datauri'][] = $match[0][1]; // собираем значения
                $this->code['edited'] = str_replace($match[0][1], 'datauri'.$i++.'__', $this->code['edited']);
			endwhile;
        }

        // 4. ; в конце
        $this->code['edited'] = str_replace('{}','{ }', $this->code['edited']); // закрываем сложности парсинга {}
        $this->code['edited'] = preg_replace('/(.*?[^\s])(\s*?})/','$1;$2', $this->code['edited']); // закрываем сложности с отсутствующей последней ; перед }
//        $this->code['edited'] = preg_replace('@;(\s*/\*.*?[^\*\/]*/)@ism','$1;', $this->code['edited']); // перемещаем построчные комментарии к свойству за ;


        // 5. Комментарии
        if(preg_match_all('#
            (
            \s*
            /\*
            .*?[^\*/]
            \*/
            )
            #ismx', $this->code['edited'], $test)){

            // 1. Текстовый комментарий несодержащий свойств: всё, где нет ни :, ни ;, ни {|}, но есть какие-то буквы/цифры
            // Ничего не делаем.

            // 2. Одно свойство: есть : и ; но после ; ничего нет кроме \s.
            // заменяем на commented_border: 1ps solid red;
            if(preg_match_all('#
                (\s*)
                /\*
                (.+?[^:])
                :
                (.+?[^;])
                ;
                \s*?
                \*/
                #ismx', $this->code['edited'], $comments)){

                $this->code['edited'] = preg_replace(
                    '#
                        (\s*)
                        /\*
                        (.*?[^:])
                        :
                        (.*?[^\*/])
                        ;
                        (\s*?)
                        \*/
                        #ismx',
                    '$1commented_$2:$3;$4',
                    $this->code['edited']
                );
                $this->log('2. Одно свойство: есть : и ; но после ; ничего нет кроме \s.', $comments);
                $this->log('2. Одно свойство: есть : и ; но после ; ничего нет кроме \s.', $this->code['edited']);
            }

            // 3. Несколько свойств: повторяющийся паттерн *:*; \s*?
            // приводим к виду пункта 3 и вперед.

            // 4. Текст и свойства вперемешку
            // приводим к виду пункта 3 и вперед.

            // 5. Пустой комментарий: если сделать трим то ничего не останется
            // Ничего не делаем.

            // 6. Обрывки закомментированных деклараций: присутствует сначала } а потом возможно и {, но не наоборот.
            // Ничего не делаем. Пока.


            //$this->log('comments', $comments);
        }
    }


    function parse_rules(){
        if($this->mode == 'css-file'){
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

//            $this->log('$matches', $matches);


            $rules = $matches[0]; // CSS-код разрезанный по фигурным скобкам

    //        $this->log('rules', $rules);
            foreach($rules as $key=>$val){
                $rules[$key] = $this->parse_properties($val);  // 4 парсим и сортируем каждую часть
            }
    //        $this->log('rules', $rules);

            $this->code['resorted'] = implode($this->array_implode($rules)).$end_of_code;            // 5 склеиваем части
        }


        if($this->mode == 'style-attribute'){
            $this->code['resorted'] = $this->code['edited'];

            preg_match_all('@

                .*?[^"\']

                style=
                ["\']
                (.*?)
                ["\']


            @ismx', $this->code['edited'], $matches);

//            $this->log('$matches[1]', $matches[1]);
            $properties = $matches[1];

            foreach($properties as $props){
                $r = $this->parse_properties($props);
                $this->code['resorted'] = str_replace($props, $r, $this->code['resorted']);
            }

        }



        if($this->mode == 'properties'){
            $rules[0] = $this->parse_properties($this->code['edited']);
            $this->code['resorted'] = implode($this->array_implode($rules)).$end_of_code;            // склеиваем части
        }
    }


    function parse_properties($css = ''){
        if($this->mode == 'css-file'){
            // отделяем фигурную скобку
            $matches = null;
            preg_match('@

                ^
                (.*?)
                (
                    \s*?
                    }
                )

            @ismx', $css, $matches);

//           $this->log($css, $matches);

            if(sizeof($matches)>0){ // если есть и свойства и скобка и хотя бы одно :
                $properties = $matches[1];

                if(is_array($this->sort_order[0])){ // Если порядок сортировки разбит на группы свойств
                    $properties = str_replace("\n\n", "\n", $properties);
                }

                $brace = $matches[2];

                /* отделяем первый комментарий, который находится на той же строке где и была скобка */
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

                if(
                    count($matches)==5 and              // все распарсилось как надо
                    strlen($matches[1]) === 0 and       // комментарий действительно идет первым
                    strpos($matches[2], "\n") !== 0     // перед комментарием нет переноса строки, следовательно предпологаем, что он относится к скобке с селектором
                ){
                    $first_spaces = $matches[2];
                    $first_comment = $matches[3];
                    $properties = $matches[4];
                }

                //                die();

                $matches = null;
                preg_match_all('@

                    \s*
                    (
                        .[^:]*          # все что угодно, но не :
                        [:>]
                        .[^;]*          # все что угодно, но не ;
                        ;
                        (               # На этой же строке (после ;) может быть комментарий. Он тоже пригодится.
                            \s*
                            /\* .* \*/
                        )
                        *?
                    )

                    @ismx', $properties, $matches);

                $props = $matches[0];

//              $this->log('props', $props);

                $props = $this->resort_properties($props);
                $props = $first_spaces.$first_comment.implode($props).$brace;

            }
            else $props = $css;
        }

        if($this->mode == 'properties' OR $this->mode == 'style-attribute'){
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

            $props = $this->resort_properties($props);
            $props = implode($props);
        }

        return $props;
    }


    function resort_properties($prop){
        $resorted = $undefined = array();

//        $this->log('new', $prop);
        foreach($prop as $k=>$val){
            $index = null; // Дефолтное значение индекса порядка для свойства. Если свойство не знакомо, то index так и останется null.
            preg_match_all('@\s*?(.*?[^:]:).*@ism', $val, $matches, PREG_SET_ORDER);
            $property = trim($matches[0][1]);

            if(is_array($this->sort_order[0])){ // Если порядок сортировки разбит на группы свойств

                foreach($this->sort_order as $pos=>$key){ // для каждой группы свойств
                    foreach($this->sort_order[$pos] as $p=>$k){ // для каждого свойства
                        if(strpos(' '.trim($property),' '.$k.':')!==false){
                            $through_number = $this->get_through_number($k); // определяем "сквозной" порядковый номер
                            if($through_number!==false) $index = $through_number;
                        }
                    }
                }

            }
            else{
                foreach($this->sort_order as $pos=>$key){
                    if(strpos(' '.trim($property), ' '.$key.':')!==false){
                        $index = $pos;
                    }
                }

            }

            if($index === null OR strpos($val, 'exp')){
                $undefined[] = $val;
            }
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

        if(is_array($this->sort_order[0]) AND count($resorted)>0){ // Если свойства разделены на группы
            $resorted = $this->separate_property_group($resorted);
        }

        if(is_array($this->sort_order[0]) AND count($undefined)>0){
            $undefined[0] = "\n".$undefined[0];
        }

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
        // 1. экранирование хаков с использованием ключевых символов например voice-family: "\"}\"";
//        $this->log('hacks', $this->code['hacks']);
        if(is_array($this->code['hacks'])){ // если были обнаружены и вырезаны expression
            foreach($this->code['hacks'] as $key=>$val){
                if(strpos($this->code['resorted'], 'hack'.$key.'__')) $this->code['resorted'] = str_replace('hack'.$key.'__', $val, $this->code['resorted']); // заменяем значение expression обратно
            }
		}

        // 2. expressions
        if(is_array($this->code['expressions'])){ // если были обнаружены и вырезаны expression
            foreach($this->code['expressions'] as $key=>$val){
                if(strpos($this->code['resorted'], 'exp'.$key.'__')) $this->code['resorted'] = str_replace('exp'.$key.'__', 'expression('.$val.')', $this->code['resorted']); // заменяем значение expression обратно
            }
		}

        // 3. datauri
        if(is_array($this->code['datauri'])){ // если были обнаружены и вырезаны data uri
            foreach($this->code['datauri'] as $key=>$val){
                if(strpos($this->code['resorted'], 'datauri'.$key.'__')) $this->code['resorted'] = str_replace('datauri'.$key.'__', $val, $this->code['resorted']); // заменяем значение expression обратно
            }
		}

//        $this->code['resorted'] = preg_replace('@(\s*/\*.*?[^\*\/]*/);+@ism',';$1', $this->code['resorted']); // возвращаем на место комментарии
    }



    function end_of_process(){
        if($this->code['edited']!='' AND $this->output!==false){
            echo '
    <style>
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
</div>
<!--table width="100%" style="font:1em monospace;">
    <tr>
        <td width="50%" style="vertical-align:top;white-space:pre;">'.$this->code['original'].'</td>
        <td style="vertical-align:top;white-space:pre;">'.$this->code['resorted'].'</td>
    </tr>
</table-->';
        }

        if($this->output===false) return $this->code['resorted'];
    }


    function log($before, $after){
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
	private function get_through_number($value){
		$i = 0;
		foreach($this->sort_order as $property_group){
			foreach($property_group as $key=>$val){
				if($val==$value) return $i;
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
	private function separate_property_group($properties){
		if(is_array($this->sort_order[0])){ // Если в настройках нет разбиения на группы, то выходим входной массив без изменений
			foreach($properties as $key=>$property){
				$array = explode(':', $property);
				$prop_name[$key] = trim($array[0]);
			}
			foreach($this->sort_order as $group_num=>$property_group){ // Перебираем группы свойств
				$intersect = array_intersect($prop_name, $property_group);
				if(count($intersect)>0){
					$num = array_keys($intersect);
					$last_key = null;
					foreach($num as $n)	$last_key = $n;
					if($properties[$last_key] != end($properties)) $properties[$last_key] = $properties[$last_key]."\n";
				}
			}
		}
		return $properties;
	}

}
