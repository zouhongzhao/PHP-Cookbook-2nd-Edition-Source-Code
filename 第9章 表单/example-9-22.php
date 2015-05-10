<?php
// Set up some options for the drop-down menu
$flavors = array('Vanilla','Chocolate','Rhinoceros');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Just display the form if the request is a GET
    display_form(array());
} else {
    // The request is a POST, so validate the form
    $errors = validate_form();
    if (count($errors)) {
        // If there were errors, redisplay the form with the errors
        display_form($errors);
    } else {
        // The form data was valid, so congratulate the user
        print 'The form is submitted!';
    }
}   

function display_form($errors) {
    global $flavors;
    
    // Set up defaults
    $defaults['name'] = isset($_POST['name']) ? htmlentities($_POST['name']) : '';
    $defaults['age'] = isset($_POST['age']) ? "checked='checked'" : '';
    foreach ($flavors as $flavor) {
        if (isset($_POST['flavor']) && ($_POST['flavor'] == $flavor)) {
            $defaults['flavor'][$flavor] = "selected='selected'";
        } else {
            $defaults['flavor'][$flavor] = '';
        }
    }
    ?>

<form action='<?php echo $_SERVER['SCRIPT_NAME'] ?>' method='post'>
<dl>
<dt>Your Name:</dt>
<?php print_error('name', $errors) ?>
<dd><input type='text' name='name' value='<?php echo $defaults['name'] ?>'/></dd>
<dt>Are you over 18 years old?</dt>
<?php print_error('age', $errors) ?>
<dd><input type='checkbox' name='age' value='1' <?php echo $defaults['age'] ?>/> Yes</dd>
<dt>Your favorite ice cream flavor:</dt>
<?php print_error('flavor', $errors) ?>
<dd><select name='flavor'>
<?php foreach ($flavors as $flavor) {
    echo "<option {$defaults['flavor'][$flavor]}>$flavor</option>";
} ?>
</select></dd>
</dl>
<input type='submit' value='Send Info'/>
</form>
<?php }

// A helper function to make generating the HTML for an error message easier
function print_error($key, $errors) {
    if (isset($errors[$key])) {
        print "<dd class='error'>{$errors[$key]}</dd>";
    }
}

function validate_form() {
    global $flavors;
    
    // Start out with no errors
    $errors = array();
    
    // name is required and must be at least 3 characters
    if (! (isset($_POST['name']) && (strlen($_POST['name']) > 3))) {
        $errors['name'] = 'Enter a name of at least 3 letters';
    }
    if (isset($_POST['age']) && ($_POST['age'] != '1')) {
        $errors['age'] = 'Invalid age checkbox value.';
    }
    // flavor is optional but if submitted must be in $flavors
    if (isset($_POST['flavor']) && (! in_array($_POST['flavor'], $flavors))) {
        $errors['flavor'] = 'Choose a valid flavor.';
    }
    
    return $errors;
}
?>