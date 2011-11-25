<?
/**
 * CSScomb
 * version: 2010.08.14
 *
 * Работает так: $CSScomb->do_resort($your_css_code);
 *
 * Можно установить пользовательский порядок для сортировки: $CSScomb->set_sort_order($your_custom_order_in_json_format);
 * Можно использовать одномерный и двумерный массивы. В случае с двумерным массивом настроек CSS свойства будут разделены на группы пустой строкой.
 *
 * @author Viacheslav Oliyanchuk
 * @link http://csscomb.ru
 */
class CSScomb{
	private $sort_order = '';
	private $default_sort_order = '
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



	function CSScomb(){
		$this->set_sort_order();
	}

	/**
	 * @param  {string}
	 * @return {string}
	 */
	function do_resort($css){
		return $this->parse_medias($css);
	}


	/**
	 * @param  {string}
	 * @return void
	 */
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


	/**
	 * @param  {string}
	 * @return {string}
	 */
	private function parse_medias($string){
		$result = '';

		$comments = array();
		if(strpos($string, '/*')!==FALSE){ // разбираемся с комментариями если они присутствуют
			$i = 0;

			preg_match_all('#/\*(.*?)\*/#ism', $string, $match, PREG_SET_ORDER); // вылавливаем expression
			//gde($match);
			foreach($match as $key=>$val){
				$comments[] = $match[$key][0]; // собираем значения expression(...)
				$string = str_replace($match[$key][0], '+comment_'.$i++.'+', $string);
			}
		}

		//gde($string);

		$test = '';
		$test = preg_replace('#/\*(.*?)\*/#smi', '', $string); // избавляемся от закомментированных @media, чтобы проверить есть ли действующие
		//che($test);
		if(strpos($test, '@media')===false){

			preg_match_all('#^.*}(.*+)$#ism', $string, $m, PREG_SET_ORDER); // отрезаем все после последней }
			if(@$m[0][1]!='') $last = @$m[0][1]; else $last = '';
			$string = str_replace(@$m[0][1], '', $string);

			$result = $this->parse_selectors($string).$last;
		}
		else{
			if(preg_match_all('#(.*?)@media\s(.+?){(.*?{\s*.*?\s*}\s*)}(.*)#ism', $string, $media, PREG_SET_ORDER)){

				//che($media);
				foreach($media as $match){
					preg_match_all('#^.*}(.*+)$#ism', $match[3], $m, PREG_SET_ORDER); // отрезаем все после последней }
					if(@$m[0][1]!='') $last = @$m[0][1]; else $last = '';
					$match[3] = str_replace(@$m[0][1], '', $match[3]);

					$result .= $match[1].'@media '.$match[2].'{';
					$result .= $this->parse_selectors($match[3]).$last;
					$result .=  '}'.$match[4];
				}
			}
		}

		if(count($comments)>0){ // возвращаем назад комментарии
			foreach($comments as $key=>$val){
				if(strpos($result, '+comment_'.$key.'+')!==FALSE) $result = str_replace('+comment_'.$key.'+', $val, $result);
			}
		}
		return $result;
	}


	/**
	 *
	 * @param  {string}
	 * @return {string}
	 */
	private function parse_selectors($string){
		$result = '';                                          //[\s/\*[:alnum:]\.\+\=\#\-\;\:\!\(\)\@\$\%\^\&\_\|]

		preg_match_all('#(.*?){(.*?)}#ism', $string, $match, PREG_SET_ORDER);
//		gde($match);
		foreach($match as $selector){
			preg_match_all('#[A-Za-z0-9]#ism', $selector[2], $test, PREG_SET_ORDER); // проверяем есть ли css свойства внутри {} если нет, то пересортировка не нужна
			if(count($test)>0) $result .= $selector[1]."{\n".implode("\n", $this->parse_selector_rules($selector[2])).'}';
			else $result .= $selector[1]."{".$selector[2]."}";
		}
		return $result;
	}


	/**
	 * @param  {string}
	 * @return {array}
	 */
	private function parse_selector_rules($string){
		$resorted = $undefined = array();

		$string = preg_replace('#\+comment_(.*?)\+#smi', '', $string); // избавляемся от комментариев в рамках одного селектора внутри фигурных скобок

		if(strpos($string, 'expression')){ // разбираемся с expression если они присутствуют
			$i = 0;
			$expressions = array();
			while(strpos($string, 'expression')):
				preg_match_all('#(.*)expression\((.*)\)#ism', $string, $match, PREG_SET_ORDER); // вылавливаем expression
				$expressions[] = $match[0][2]; // собираем значения expression(...)
				$string = str_replace('expression('.$match[0][2].')', 'exp'.$i++, $string);
			endwhile;
		}

		$test = trim($string);
		if(empty($test)) return array(); // Если внутри {} все заккоментировано

		$lines = explode("\n", $string);

		$last = ''; // сохраняем форматирование после последнего \n если свойства были по одному на строке, а не div {display: inline-block; *display: inline;}
		if(count($lines)>1 AND trim($lines[count($lines)-1])=='') $last = $lines[count($lines)-1];


		foreach($lines as $key=>$val) if(trim($val)=='') unset($lines[$key]); // избавляемся от пустых элементов полученных в результате explode("\n", $line);
		/*
		  Разбираем случай, когда значение CSS свойства записано на нескольких строках.
		  Пример:
		  		background: url(a.png) top left no-repeat,
		 		url(b.png) center / 100% 100% no-repeat,
		  		url(c.png) white;
		*/
		krsort($lines);

		foreach($lines as $num=>$line){
			$test = trim($line);
			if(!empty($test) AND !strpos($line, ':')){ // если строка не пустая и не содержит двоеточия, то присоединяем ее к предыдущей
				$lines[$num-1] = $lines[$num-1].$lines[$num];
				unset($lines[$num]);
			}
		}
		ksort($lines);


		foreach($lines as $line){

			if(strpos($line, ';')!==false) $properties = explode(";", $line); // если на одной строке несколько записей разделенных ;
			else { // если на строке нет ни одной ;
				$properties[] = rtrim($line); // Удаляем все пробелы (\s) в конце строки
			}

			foreach($properties as $key=>$val) if(trim($val)=='') unset($properties[$key]); // избавляемся от пустых элементов полученных в результате explode(";", $line);

			foreach($properties as $property){
				$index = null; // Дефолтное значение индекса порядка для свойства. Если свойство не знакомо, то index так и останется null.

				if(!is_array($this->sort_order[0])){ // Если порядок сортировки не разбит на группы свойств
					foreach($this->sort_order as $pos=>$key){
						if(strpos(' '.trim($property), ' '.$key.':')!==false) $index = $pos;
					}
				}
				else{
					foreach($this->sort_order as $pos=>$key){ // для каждой группы свойств
						foreach($this->sort_order[$pos] as $p=>$k){ // для каждого свойства
							if(strpos(' '.trim($property),' '.$k.':')!==false){
								$through_number = $this->get_through_number($k); // определяем "сквозной" порядковый номер
								if($through_number!==false) $index = $through_number;
							}
						}
					}
				}

				if(count($lines)>1){
					if($index === null OR strpos($property, 'exp')) $undefined[] = $property.';';
					else{
						/*
						   Добавляет к уже существующей записи с определенном порядковым номером еще одну запись с таким же порядковым номером
						   либо создает новую запись если с таким порядковым номером ничего еще не встречалось
						*/
						if(isset($resorted[$index])) $resorted[$index] .= "\n".$property.';';
						else $resorted[$index] = $property.';';
					}
				}
				else{
					if($index === null OR strpos($property, 'exp')) $undefined[] = "\t".trim($property).';';
					else $resorted[$index] = "\t".trim($property).';';
				}
			}
		}

		ksort($resorted); // сортируем по ключам
		if(is_array($this->sort_order[0]) AND count($resorted)>0) $resorted = $this->separate_property_group($resorted); // Если свойства разделены на группы

		if(is_array($this->sort_order[0]) AND count($undefined)>0) $undefined[0] = "\n".$undefined[0];
		$undefined[count($undefined)] = $last; // бережно сохраняем форматирование перед }

		$resorted = array_merge($resorted, $undefined); // добавляем в конец нераспознанное

		if(isset($expressions) AND count($expressions)>0){ // если были обнаружены и вырезаны expression
			foreach($resorted as $num=>$line){
				foreach($expressions as $key=>$val){
					if(strpos($line, 'exp'.$key)) $resorted[$num] = str_replace('exp'.$key, 'expression('.$val.')', $line); // заменяем значение expression обратно
				}
			}
		}

		return $resorted;
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
