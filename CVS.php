<?php
/**
 * Class CVS
 *
 * Linkedin : https://www.linkedin.com/in/gokhan-gunes/
 * author :  Gökhan GÜNEŞ
 */

class CVS_ARRAY
{

    /**
     * @var string
     */
    protected $filename;

    /**
     * @var string
     */
    protected $content;

    /**
     * @param string $fileName
     */
    public function setFileName(string $fileName)
    {
        $this->filename = $fileName;
    }

    /**
     * @return string
     */
    public function getFileName(): string
    {
        return $this->filename;
    }

    /**
     * @param array $array
     */
    public function setContent(array $array)
    {
        $this->content = $array;
    }

    /**
     * @return array
     */
    public function getContent(): array
    {
        return $this->content;
    }

    /**
     * @param bool $header
     */
    public function toArray(bool $header = true){
        $rowId = 0;
        $content = file_get_contents($this->getFileName());
        $content = iconv(mb_detect_encoding($content, 'auto'), 'UTF-8', $content);
        $data = [];
        foreach (explode(PHP_EOL,$content) as $row){

            if ($rowId == 0){
                    foreach (explode(";", $row) as $item => $header) {
                        if ($header == true) {
                            $data[0][] = str_replace(" ", "_", $header);
                        }
                        else {
                            $data[0][] = $item;
                        }
                }
            }
            else {
                foreach (explode(";", $row) as  $itemId => $column){
                    $data[$rowId][$data[0][$itemId]] = $column;
                }
            }
            $rowId++;
        }
        $this->setContent($data);

        return $data;
    }
}