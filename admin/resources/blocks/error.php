<?php if (!empty($errors) && !isset($errors['success'])) { ?>
    <div class="alert alert-danger alert-styled-left alert-bordered">
        <button type="button" class="close" data-dismiss="alert"><span>×</span><span
                    class="sr-only">Close</span>
        </button>
        <?php foreach ($errors as $error) { ?>
            <span class="text-semibold"><?php echo $error; ?></span><br/>
        <?php } ?>
    </div>

<?php } ?>