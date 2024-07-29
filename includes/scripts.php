<script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
<script src="../../node_modules/jquery/dist/jquery.min.js"></script>


<script src="../../node_modules/jszip/dist/jszip.js"></script>
<script src="../../node_modules/pdfmake/build/pdfmake.js"></script>
<script src="../../node_modules/pdfmake/build/vfs_fonts.js"></script>
<script src="../../node_modules/select2/dist/js/select2.min.js"></script>
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
    view(0);

});

function view(x) {
    // student
    var frontId = document.getElementById('frontId');
    var backId = document.getElementById('backId');
    var affidavit = document.getElementById('affidavit');
    var dsa = document.getElementById('dsa');
    // employee
    var hrmoScanned = document.getElementById('hrmoScanned');
    var hrmoNew = document.getElementById('hrmoNew');
    var aol = document.getElementById('aol');

    clearViews();

    if (x == 0) {
        // student
        $('.stud-replacement').hide();
        $('.stud-affidavit').hide();
        $('.stud-dsa').hide();
        // employee
        $('.hrmo').show();
        $('.hrmo-lost').hide();
        $('.emp-affidavit').hide();
    } else if (x == 1) {
        // student
        frontId.setAttribute('required', 'required');
        backId.setAttribute('required', 'required');
        $('.stud-replacement').show();
        $('.stud-affidavit').hide();
        $('.stud-dsa').hide();
        // employee
        $('.hrmo').show();
        $('.hrmo-lost').hide();
        $('.emp-affidavit').hide();
    } else if (x == 2) {
        // student
        affidavit.setAttribute('required', 'required');
        // dsa.setAttribute('required', 'required');
        $('.stud-replacement').hide();
        $('.stud-affidavit').show();
        $('.stud-dsa').show();
        // employee
        hrmoScanned.removeAttribute('required');
        $('.hrmo').hide();
        hrmoNew.setAttribute('required', 'required');
        $('.hrmo-lost').show();
        aol.setAttribute('required', 'required');
        $('.emp-affidavit').show();
    }
};

function clearViews() {
    // student
    frontId.removeAttribute('required');
    backId.removeAttribute('required');
    affidavit.removeAttribute('required');
    dsa.removeAttribute('required');
    $('.stud-replacement').hide();
    $('.stud-affidavit').hide();
    $('.stud-dsa').hide();
    // employee
    hrmoScanned.setAttribute('required', 'required');
    hrmoNew.removeAttribute('required');
    aol.removeAttribute('required');
    $('.hrmo').show();
    $('.hrmo-lost').hide();
    $('.emp-affidavit').hide();
}

$(document).ready(function() {
    $('#teach').click(function() {
        teachingnon(0);
    });
    $('#nonteach').click(function() {
        teachingnon(1);
    });
    teachingnon($('#teach').is(':checked') ? 0 : 1);
});

function teachingnon(x) {
    if (x == 0) {
        $('.acad-rank').show();
        $('.plant-pos').hide();
        $('#academicRank').attr('required', true);
        $('#plantillaPos').removeAttr('required');
        $('#plantillaPos').val('');
    } else if (x == 1) {
        $('.acad-rank').hide();
        $('.plant-pos').show();
        $('#academicRank').removeAttr('required');
        $('#plantillaPos').attr('required', true);
        $('#academicRank').val('');
    }
}
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var popoverTriggerList = [].slice.call(document.querySelectorAll('.checkbox-popover'));
    var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl);
    });

    popoverTriggerList.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            var popoverInstance = bootstrap.Popover.getInstance(checkbox);
            if (checkbox.checked) {
                checkbox.setAttribute('data-bs-content', "I won't provide");
            } else {
                checkbox.setAttribute('data-bs-content', "I'll provide");
            }
            popoverInstance.setContent({
                '.popover-body': checkbox.getAttribute('data-bs-content')
            });

            var targetId = checkbox.getAttribute('data-target');
            var fileInput = document.getElementById(targetId);

            fileInput.disabled = checkbox.checked;
            if (checkbox.checked) {
                fileInput.removeAttribute('required');
            } else {
                fileInput.setAttribute('required', 'required');
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    function resetModal(modalId, formId) {
        const modal = document.getElementById(modalId);
        const form = document.getElementById(formId);

        modal.addEventListener('hidden.bs.modal', function() {
            // Reset the form
            form.reset();

            // If you are using a select2 or other special form components,
            // you may need to manually reset their values as well
            $('#select-program').val(null).trigger('change');

            // Clear file inputs manually if needed
            document.querySelectorAll(`#${formId} input[type="file"]`).forEach(input => {
                input.value = '';
            });

            // Recheck the default radio button if needed
            document.getElementById('new').checked = true;

            // Reset any popover related checkboxes and their targets
            document.querySelectorAll('.checkbox-popover').forEach(checkbox => {
                checkbox.checked = false;
                const targetId = checkbox.getAttribute('data-target');
                document.getElementById(targetId).required = true;
            });

            // Execute view(0) to reset the visibility of elements
            view(0);
        });
    }

    // Initialize modals
    resetModal('StudentModal', 'studentForm');
    resetModal('EmployeeModal', 'employeeForm');

    view(0); // reset elements to their initial state
});
</script>