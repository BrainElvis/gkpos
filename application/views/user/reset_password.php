<script type="text/javascript">
    function checkfiled()
    {
        if (document.form1.password.value == "")
        {
            alert(
                    "Password is a required field!");
            document.form1.password.focus();
            return false;
        }

        if (document.form1.confirm_password.value == "")
        {
            alert(
                    "Confirm Password is a required field!");
            document.form1.confirm_password.focus();
            return false;
        }

        if (document.form1.password.value != document.form1.confirm_password.value)
        {
            alert(
                    "Passwords don't match. Please try again");
            document.form1.confirm_password.focus();
            return false;
        }
        return true;
    }
</script>
<div class="container contactbg">
    <div class="row">
        <h1><?php echo $current_section ?></h1>
        <?php if (isset($password_change_succ)): ?>
            <script type="text/javascript">setTimeout(
                        "submitOrder()",
                        4000);
            </script>
            <?php echo "<h3>".$password_change_succ."</h3>" ?>
        <?php else : ?>
            <div class="global_gap"> </div>
            <div class="contact-form">
                <form action="<?php echo site_url('user/resetPassword/' . $encoded_email); ?>" method="post" name="form1" id="form1" onsubmit="return checkfiled()">
                    <ul>
                        <li>
                            <label style="width: 125px;">New Password :</label>
                            <input class="contact-input register_input" name="password" type="password" id="password"  placeholder="New Password" />
                        </li>
                        <li>

                            <label style="width: 125px;">Confirm Password :</label>
                            <input  class="contact-input register_input" name="confirm_password" type="password" id="confirm_password"  placeholder="Confirm Password" />
                        </li>
                        <li>
                            <label style="width: 125px;">&nbsp;</label>
                            <input type="submit" class="common-btn" value="Update"/>
                        </li>
                    </ul>
                </form>
            </div>
        <?php endif; ?>
    </div>
</div>
<script type="text/javascript">
    function submitOrder()
    {
        window.location = '<?= base_url() ?>';
    }

</script>

