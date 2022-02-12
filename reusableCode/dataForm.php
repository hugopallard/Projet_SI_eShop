<form method="post" action="landing.php" id="dataForm">
    <div>
        <input type="hidden" name="email" class="form-control" id="email" aria-describedby="emailHelp" value="<?php echo $email; ?>">
    </div>
    <div>
        <input type="hidden" name="password" class="form-control" id="password" value="<?php echo $password; ?>">
    </div>
    <div>
        <input type="hidden" name="firstName" class="form-control" id="firstName" value="<?php echo $firstName; ?>">
    </div>
    <div>
        <input type="hidden" name="lastName" class="form-control" id="lastName" value="<?php echo $lastName; ?>">
    </div>
    <?php
    if (isset($hasBeenShowed)) {  ?>
        <div>
            <input type="hidden" name="hasBeenShowed" class="form-control" id="hasBeenShowed" value="<?php echo $hasBeenShowed; ?>">
        </div>
    <?php
    }
    if (isset($userFound)) {  ?>
        <div>
            <input type="hidden" name="userFound" class="form-control" id="userFound" value="<?php echo $userFound; ?>">
        </div>
    <?php
    }
    if (isset($userCreated)) {  ?>
        <div>
            <input type="hidden" name="userCreated" class="form-control" id="userCreated" value="<?php echo $userCreated; ?>">
        </div>
    <?php
    }
    if (isset($currentPage)) {  ?>
        <div>
            <input type="hidden" name="currentPage" class="form-control" id="currentPage" value="<?php echo $currentPage; ?>">
        </div>
    <?php
    }
    if (isset($dataModified)) {  ?>
        <div>
            <input type="hidden" name="dataModified" class="form-control" id="dataModified" value="<?php echo $dataModified; ?>">
        </div>
    <?php
    }
    ?>

</form>