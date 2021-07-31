<?php
include 'inc/header.php';
Session::CheckSession();
$sId =  Session::get('roleid');
if ($sId === '1') { ?>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addUser'])) {

//        foreach ($_POST['users'] as $f){
//            //var_dump($f);
//
//            $userAdd = $users->addNewUserByAdmin($f);
//        }

        $count = 1;
        for ($i=0;$i<count($_POST['name']);$i++){

            //echo $count . "- " . $_POST['name'][$i] . " " . $_POST['username'][$i] . "<br>";

            $userAdd = $users->addNewMultiUsersByAdmin(
                $_POST['name'][$i],
                $_POST['username'][$i],
                $_POST['email'][$i],
                $_POST['mobile'][$i],
                $_POST['roleid'][$i],
                $_POST['password'][$i],
                $count
            );

            if (isset($userAdd)) {
                echo $userAdd;
            }

            $count++;
        }


        //var_dump($_POST['users']);

    }



//    array(7) {
//        ["name"]=>
//        array(2) {
//            [0]=> string(7) "sdgffdg" [1]=> string(8) "sdfgsdfg" } ["username"]=> array(2) {
//            [0]=> string(4) "sdfg" [1]=> string(6) "sdfgfs" } ["email"]=> array(2) {
//            [0]=> string(8) "a@eit.sa" [1]=> string(8) "a@eit.sa" } ["mobile"]=> array(2) {
//            [0]=> string(9) "966444444" [1]=> string(7) "sdfgsdf" } ["password"]=> array(2) {
//            [0]=> string(3) "555" [1]=> string(4) "sdfg" } ["roleid"]=> array(2) {
//            [0]=> string(1) "3" [1]=> string(1) "2" } ["addUser"]=> string(0) ""
//    }


    ?>


    <div class="card ">
        <div class="card-header">
            <h3 class='text-center'>Add New Multi Users</h3>
        </div>
        <div class="cad-body">


            <div style="width:800px; margin: 50px auto">

                <form action="" method="post">

                    <div id="dynamic_field">

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="name">His name</label>
                                    <input type="text" name="name[]"  class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="username">His username</label>
                                    <input type="text" name="username[]"  class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="email">His email address</label>
                                    <input type="email" name="email[]"  class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="username">His mobile</label>
                                    <input type="text" name="mobile[]" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="password">His password</label>
                                    <input type="password" name="password[]" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="sel1">Select his Role</label>
                                    <select class="form-control" name="roleid[]" id="roleid">
                                        <option value="1">Admin</option>
                                        <option value="2">Editor</option>
                                        <option value="3">User only</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>&nbsp;</label><br>
                                    <button type="button" name="add" id="add" class="btn btn-info">Add More</button>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                        </div>


                    </div>



                    <div class="form-group">
                        <button type="submit" name="addUser" class="btn btn-success">Register</button>
                    </div>


                </form>
            </div>


        </div>
    </div>

    <?php
}else{

    header('Location:index.php');



}
?>

<?php
include 'inc/footer.php';

?>

<script>
    $(document).ready(function () {
        var i = 1;
        $('#add').click(function () {
            i++;
            $('#dynamic_field').append('<div class="row" id="row' + i + '"><div class="col-md-3"><div class="form-group"><label for="name">His name</label><input type="text" name="name[]"  class="form-control"></div></div><div class="col-md-3"><div class="form-group"><label for="username">His username</label><input type="text" name="username[]"  class="form-control"></div></div><div class="col-md-3"><div class="form-group"><label for="email">His email address</label><input type="email" name="email[]"  class="form-control"></div></div><div class="col-md-3"><div class="form-group"><label for="username">His mobile</label><input type="text" name="mobile[]" class="form-control"></div></div><div class="col-md-3"><div class="form-group"><label for="password">His password</label><input type="password" name="password[]" class="form-control"></div></div><div class="col-md-3"><div class="form-group"><label for="sel1">Select his Role</label><select class="form-control" name="roleid[]" id="roleid"><option value="1">Admin</option><option value="2">Editor</option><option value="3">User only</option></select></div></div><div class="col-md-3"><div class="form-group"><label>&nbsp;</label><br><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">Remove</button></div></div><div class="col-md-12"><hr></div></div>');
        });

        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });




    });
</script>
