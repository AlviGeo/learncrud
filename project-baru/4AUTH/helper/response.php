<?php
if (isset($_SESSION['msg'])) : ?>
    <div class="<?= $_SESSION['msg_type']; ?>success" role="alert">
        <?php
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
        ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">

        </button>
    </div>
<?php endif; ?>