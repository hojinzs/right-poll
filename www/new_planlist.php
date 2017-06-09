<?php
foreach ($plans as $plan) {

    $name = $plan['name'];

    if ($plan['parents_id'] == $plan['id']) {
        echo "<p>$name</p>";
    } else {
        echo "<p>&raquo; $name</p>";
    }

}
