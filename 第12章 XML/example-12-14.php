// Load XSL template
$xsl = newDOMDocument;
$xsl->load('stylesheet.xsl');

// Create new XSLTProcessor
$xslt = new XSLTProcessor();                                                                                                                       
// Load stylesheet
$xslt->importStylesheet($xsl);