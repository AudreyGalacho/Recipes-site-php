<?php
/** Get id of located display spot and insert text
 * @param string
 * @return 
 */
function insertMessage($message){
        $domDocument = new DOMDocument();

// Nous devons valider notre document avant de nous référer à l'ID
        $domDocument->validateOnParse = true;  

// Get the tag content
$tagContent = $domDocument->getElementById('my_id')->textContent;
echo $tagContent;

$idNoeud = $domDocument->getElementById('my_id');

$tagReplaceContent = $domDocument->getElementById('my_id')->textContent;
$element = $domDocument->appendChild(new DOMElement('div',
   'Hey, this is the text content of the div element.'));

$domDocument->getElementById('my_id')->insertBefore(DOMNode .$idNoeud.  , ?DOMNode .$element.);
// insertBefore(, ?DOMNode $child = null)
echo $tagReplaceContent;
// Create a DOMCdataSection 

        }