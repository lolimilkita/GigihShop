<?php if(logged_in()) : ?>
    <?php echo("anda sudah login"); ?>
<?php else : ?>
    <script>
        var ok = confirm("Anda harus login terlebih dahulu");
        if (ok){
            <?php return redirect()->to('barang2') ?>
        }
    </script>
<?php endif; ?>