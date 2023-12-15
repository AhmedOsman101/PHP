<form class="form" method="post" novalidate action="http://localhost/Othman/php/validation/scripts/sign-up.php">
    <!-- age and gender -->
    <div class="input-group-row">
        <!-- age -->
        <div class="input-group">
            <label for="age">Age</label>
            <input type="number" name="age" id="age" placeholder="enter your age" />
        </div>
        <!-- gender -->
        <div class="radio-button-container">
            <label class="radio-button__label gender">gender:</label>
            <div class="radio-button" id="radio">
                <input type="radio" class="radio-button__input" value="male" id="radio1" name="radio_group" />
                <label class="radio-button__label" for="radio1">
                    <span class="radio-button__custom"></span>
                    Male
                </label>
            </div>
            <div class="radio-button">
                <input type="radio" class="radio-button__input" value="female" id="radio2" name="radio_group" />
                <label class="radio-button__label" for="radio2">
                    <span class="radio-button__custom"></span>
                    Female
                </label>
            </div>
        </div>
    </div>
    <!-- sign in -->
    <input type="submit" value="sign-in" class="sign" />
</form>


<?php

?>