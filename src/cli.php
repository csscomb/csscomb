<?
/**
 * tool for command line
 */
class tool {

    var $argc = '',
        $argv = '',
        $sort = null,
        $in = null,
        $out = null;

/**
 * print man
 */
function man(){
?>

CSSComb 2.10 (build 5b53b10-1204152043)                Command line tool for resort CSS code.

SYNOPSIS
    $ php <?php echo $this->argv[0]; ?> -s <file with JSON array> -i <path to input css file> -o <path to result css file>

DESCRIPTION
    options:
    -s, --sort-order    specify file with custom sort order. File must contain JSON data. For detail information run '<?php echo $this->argv[0]; ?> --help-sort-order'
    -i, --input         must be directory name or file that needs to be sorted
    -o, --output        sort result file. Use output when input is not a directory name, otherwise output param ignored. If output filename does not exist, the file is created. Otherwise, the existing file is overwritten.

    --help, -help, -h, -? or no options will print this man.

EXAMPLE
    <?php echo $this->argv[0]; ?> -s my-custom-sort-order.json -i css/style.css -o css/style-resorted.css

EXAMPLE 2
    <?php echo $this->argv[0]; ?> -i some_directory_name

SEE ALSO
    http://csscomb.com/

<?php
}

/**
 * init
 */
function init($argc, $argv){

    $this->argc = $argc;
    $this->argv = $argv;

    //echo "argc: \n".$this->argc."\n\n";
    //echo "argv: \n"; var_dump($this->argv); echo "\n\n";


    for ($i = 0; $i < $this->argc; $i++) {
        switch ($this->argv[$i]) {
        case '-s':
            $this->sort = $this->argv[$i+1];
            //echo "sort order from: ".$this->sort."\n";
            break;
        case '-i':
            $this->in = $this->argv[$i+1];
            //echo "input file: ".$this->in."\n";
            break;
        case '-o':
            $this->out = $this->argv[$i+1];
            //echo "output file: ".$this->out."\n";
            break;
        }
    }
}



function tool($argc, $argv){
    $this->init($argc, $argv);

    if($this->argc == 1 || in_array($this->argv[1], array('--help', '-help', '-h', '-?'))) {
        $this->man();
        exit(1);
    }
    else {

        if($this->in != null) {

            $c = new csscomb('', false, 'yandex');

            if(is_dir($this->in)) {
                $files = $this->getArrayOfCssFilenames($this->in);

                foreach($files as $file) {
                    echo "Sorting ".$file."...\n";
                    $result = $c->csscomb(file_get_contents($file));
                    file_put_contents($file, $result);
                }
            }
            elseif($this->out != null){
                echo "Sorting ".$this->in."...\n";
                if (mime_content_type($this->in) === 'text/plain') {
                    $result = $c->csscomb(file_get_contents($this->in));
                    file_put_contents($this->out, $result);
                } else {
                    echo("Wrong input file mime type.");
                    exit(1);
                }
            }
            echo "Done.\n";
            exit(0);


        } else {
            echo "No input file\n";
            $this->man();
            exit(1);
        }
    }
}

/**
 * Возвращает массив с путями до CSS-файлов
 * @param: $dir директория, где искать
 * @param: $extensions массив с расширениями файлов, в которых CSS-код.
 */
function getArrayOfCssFilenames($dir, $extensions = Array('.css','.sass','.less','.scss')) {
    $files = Array();

    if($handle = opendir($dir)) {
      while(false !== ($filename = readdir($handle))) {
        if($filename != '.' && $filename != '..') {
          if(is_dir($dir.'/'.$filename)) {
              $files = array_merge($files, $this->getArrayOfCssFilenames($dir.'/'.$filename, $extensions));
          }
          else {
              $pos = strrpos($filename, '.');
              $ext = substr($filename, $pos, strlen($filename) - $pos);

              if($extensions) {
                  if(in_array($ext, $extensions)) {
                      $files[] = $dir.'/'.$filename;
                  }
              }
              else {
                  $files[] = $dir.'/'.$filename;
              }
          }
        }
      }
      closedir($handle);
    }
    return $files;
}



}

$tool = new tool($argc, $argv);
?>
