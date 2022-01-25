<footer class="footer">
    <div class="container-fluid">

        <div class="copyright ml-auto">
            Copyright © E-PESANTREN | AL - MASHDUQIAH <?= date('Y') ?> All Right Reserved.
        </div>
    </div>
</footer>
</div>


</div>




<!--   Core JS Files   -->

<script src="<?= base_url('assets') ?>/template/js/core/popper.min.js"></script>
<script src="<?= base_url('assets') ?>/template/js/core/bootstrap.min.js"></script>
<!-- jQuery UI -->
<script src="<?= base_url('assets') ?>/template/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="<?= base_url('assets') ?>/template/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
<!-- ZOOM -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<!-- jQuery Scrollbar -->
<script src="<?= base_url('assets') ?>/template/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<!-- Datatables -->
<script src="<?= base_url('assets') ?>/template/js/plugin/datatables/datatables.min.js"></script>
<!-- DATEPICKER -->
<script src="<?= base_url('assets') ?>/template/js/bootstrap-datepicker.js"></script>
<!-- Atlantis JS -->
<script src="<?= base_url('assets') ?>/template/js/atlantis.min.js"></script>

<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.12.0/js/mdb.min.js"></script>

<script>
$(document).ready(function() {
    var tb = $('#basic-datatables').DataTable({});
    var tb2 = $('#basic-datatables2').DataTable({});
    $('#fil').on('change', function() {
        tb.search(this.value).draw()
    });
    $('#fil').on('change', function() {
        tb2.search(this.value).draw()
    });

});
$(function() {
    $(".datepicker").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
    });
});
$(function() {
    $('#datetimepicker1').datetimepicker();
});
$('.image-popup-vertical-fit').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    mainClass: 'mfp-img-mobile',
    image: {
        verticalFit: true
    }

});
</script>
<script>
$(document).ready(function() {
    $('.lembaga').change(function() {
        var id = $(this).val();
        var idk = $(this).val();
        $.ajax({
            url: "<?php echo base_url(); ?>index.php/admin/admin/get_marhalah",
            method: "POST",
            data: {
                id: id
            },
            async: false,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                for (i = 0; i < data.length; i++) {
                    html += '<option>' + data[i].marhalah + '</option>';
                }
                $('.marhalah').html(html);

            }
        });

    });
    return false;
});
</script>
<script>
$(document).ready(function() {
    $('.lembaga2').change(function() {
        var id = $(this).val();
        var idk = $(this).val();
        $.ajax({
            url: "<?php echo base_url(); ?>index.php/admin/admin/get_marhalah",
            method: "POST",
            data: {
                id: id
            },
            async: false,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                for (i = 0; i < data.length; i++) {
                    html += '<option>' + data[i].marhalah + '</option>';
                }
                $('.marhalah2').html(html);

            }
        });

    });
    return false;
});

window.setInterval("waktu()", 1000);

function waktu() {
    var waktu = new Date();


    document.getElementById("jam").innerHTML = waktu.getHours();
    document.getElementById("menit").innerHTML = waktu.getMinutes();
    document.getElementById("detik").innerHTML = waktu.getSeconds();

    document.getElementById("jem").innerHTML = waktu.getHours();
    document.getElementById("mnit").innerHTML = waktu.getMinutes();
    document.getElementById("dtik").innerHTML = waktu.getSeconds();


}
</script>

</body>

</html>