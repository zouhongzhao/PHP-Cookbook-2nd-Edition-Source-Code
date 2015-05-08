function __autoload($package_name) {
    // split on underscore  
    $folders = split('_', $package_name);
    // rejoin based on directory structure
    // use DIRECTORY_SEPARATOR constant to work on all platforms
    $path    =  join(DIRECTORY_SEPARATOR, $folders);
    // append extension
    $path   .= '.php';
   
    include $path;
}