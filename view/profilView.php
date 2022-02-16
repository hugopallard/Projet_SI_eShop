<?php $tittle = "MyWine"; ?>
<?php $alert = NULL; ?>

<?php ob_start(); ?>
<div id="profilContent">

    <div class="vh-100">
        <div class="row">
            <div class="col-12 text-center pt-5 ">
                <h1>My profil</h1>
            </div>
            <div class="col-6 text-center align-items-center justify-content-center ">
                <img src="images/myWineIcon.png" alt="">
            </div>
            <div class="col-6 d-flex align-items-center justify-content-center ">
                <form method="post" action="index.php?action=modifyUser" id="profilForm">
                    <div class="mb-3 form-control-sm">
                        <input type="email" name="profilEmail" class="form-control" id="profilEmail" aria-describedby="emailHelp" value="<?php echo $myProfil['email']; ?>" disabled>
                    </div>
                    <div class="mb-3 form-control-sm">
                        <input type="password" name="profilPassword" class="form-control" id="profilPassword" value="<?php echo $myProfil['password']; ?>" disabled>
                    </div>
                    <div class="mb-3 form-control-sm">
                        <input type="text" name="profilFirstName" class="form-control" id="profilFirstName" value="<?php echo $myProfil['firstName']; ?>" disabled>
                    </div>
                    <div class="mb-3 form-control-sm">
                        <input type="text" name="profilLastName" class="form-control" id="profilLastName" value="<?php echo $myProfil['lastName']; ?>" disabled>
                    </div>
                    <div class="text-center">
                        <!-- <button type="button" class="btn btn-primary" id="annulModifyAction" onclick="annul()">Annul</button> -->
                        <button type="button" class="btn btn-primary" id="modifyDataButton" onclick="modifyMyData()">Modify my data</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>
<script>
    document.getElementById("myProfilButton").style.display = "none";
    // document.getElementById("annulModifyAction").style.display = "none";

    function modifyMyData() {
        document.getElementById("profilEmail").disabled = false;
        document.getElementById("profilPassword").disabled = false;
        document.getElementById("profilFirstName").disabled = false;
        document.getElementById("profilLastName").disabled = false;
        document.getElementById("modifyDataButton").innerHTML = "Send";
        // document.getElementById("annulModifyAction").style.display = "block";
        document.getElementById("modifyDataButton").onclick = function() {
            document.getElementById("profilForm").submit();
        };
    }

    // function annul() {
    //     document.getElementById("profilEmail").disabled = true;
    //     document.getElementById("profilPassword").disabled = true;
    //     document.getElementById("profilFirstName").disabled = true;
    //     document.getElementById("profilLastName").disabled = true;
    //     document.getElementById("modifyDataButton").innerHTML = "Modify my data";
    //     document.getElementById("annulModifyAction").style.display = "none";
    //     document.getElementById('modifyDataButton').setAttribute('onclick', 'modifyMyData()');

    // }
</script>
<?php $content = ob_get_clean(); ?>