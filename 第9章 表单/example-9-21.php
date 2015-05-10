<?php
// Turn on sessions
session_start();

// Figure out what stage to use
if (($_SERVER['REQUEST_METHOD'] == 'GET') || (! isset($_POST['stage']))) {
    $stage = 1;
} else {
    $stage = (int) $_POST['stage'];
}

// Save any submitted data
if ($stage > 1) {
    foreach ($_POST as $key => $value) {
        $_SESSION[$key] = $value;
    }
}

if ($stage == 1) { ?>
    
<form action='<?php echo $_SERVER['SCRIPT_NAME'] ?>' method='post'>

Name: <input type='text' name='name'/> <br/>
Age:  <input type='text' name='age'/> </br/>

<input type='hidden' name='stage' value='<?php echo $stage + 1 ?>'/>
<input type='submit' value='Next'/>
</form>

<?php } else if ($stage == 2) { ?>
    
<form action='<?php echo $_SERVER['SCRIPT_NAME'] ?>' method='post'>

Favorite Color: <input type='text' name='color'/> <br/>
Favorite Food:  <input type='text' name='food'/> </br/>


<input type='hidden' name='stage' value='<?php echo $stage + 1 ?>'/>
<input type='submit' value='Done'/>
</form>

<?php } else if ($stage == 3) { ?>

    Hello <?php echo $_SESSION['name'] ?>.
    You are <?php echo $_SESSION['age'] ?> years old.
    Your favorite color is <?php echo $_SESSION['color'] ?>
    and your favorite food is <?php echo $_SESSION['food'] ?>.

<?php } ?>