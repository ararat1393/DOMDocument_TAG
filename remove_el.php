    /**
     * @param $html
     * @param $tag
     * @return bool
     */
    public function removeByTagName(&$html , $tag )
    {
        $dom = new \DOMDocument();
        $dom->preserveWhiteSpace = false;
        
        libxml_use_internal_errors(true);
        $dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));

//        remove the only first element
        if($el = $dom->getElementsByTagName($tag)->item(0)){
            $el->parentNode->removeChild($el);
        }

//        remove all elements
        foreach($dom->getElementsByTagName($tag) as $href){
//            if($href->nodeValue == 'First')
            $href->parentNode->removeChild($href);
        }
        $html =  $dom->saveHTML();
        return true;
    }
