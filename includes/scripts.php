<script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
<script src="../../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../../node_modules/select2/dist/js/select2.min.js"></script>

<script src="../../node_modules/jszip/dist/jszip.js"></script>
<script src="../../node_modules/pdfmake/build/pdfmake.js"></script>
<script src="../../node_modules/pdfmake/build/vfs_fonts.js"></script>
<script src="../../node_modules/datatables.net/js/dataTables.js"></script>
<script src="../../node_modules/datatables.net-bs5/js/dataTables.bootstrap5.js"></script>
<script src="../../node_modules/datatables.net-buttons/js/dataTables.buttons.js"></script>
<script src="../../node_modules/datatables.net-buttons-bs5/js/buttons.bootstrap5.js"></script>
<script src="../../node_modules/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="../../node_modules/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="../../node_modules/datatables.net-responsive/js/dataTables.responsive.js"></script>
<script src="../../node_modules/datatables.net-responsive-bs5/js/responsive.bootstrap5.js"></script>

<script src="./includes/stepper.js"></script>
<script src="./includes/sidebar-toggle.js"></script>


<!-- stepper script -->
<script>
$(document).ready(function() {
    text(0);
});

function text(x) {
    clearViews();
    if (x == 0) {
        // student
        $('.stud-replacement').hide();
        $('.stud-affidavit').hide();
        // employee
        $('.hrmo').show();
        $('.hrmo-lost').hide();
        $('.emp-affidavit').hide();
    } else if (x == 1) {
        // student
        $('.stud-replacement').show();
        $('.stud-affidavit').hide();
        // employee
        $('.hrmo').show();
        $('.hrmo-lost').hide();
        $('.emp-affidavit').hide();
    } else {
        // student
        $('.stud-replacement').hide();
        $('.stud-affidavit').show();
        // employee
        $('.hrmo').hide();
        $('.hrmo-lost').show();
        $('.emp-affidavit').show();
    }
};
$('#new').click(function() {
    text(0);
});
$('#rep').click(function() {
    text(1);
});
$('#lost').click(function() {
    text(2);
});

function clearViews() {
    // student
    $('.stud-replacement').hide();
    $('.stud-affidavit').hide();
    // employee
    $('.hrmo').show();
    $('.hrmo-lost').hide();
    $('.emp-affidavit').hide();

}
</script>
<!-- stepper script end -->