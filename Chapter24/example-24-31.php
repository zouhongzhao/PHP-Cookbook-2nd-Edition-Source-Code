$search->bodyRegex = '#<!-- search-start -->(.*' . preg_quote($_REQUEST['term'],'#'). 
              '.*)<!-- search-end -->#Sis';