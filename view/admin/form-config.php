            <?php
            include_once("././model/formConfigurationModel.php");
            $obj = new formConfigModel();
            $get = $obj->getForm();
            $programs = $obj->getPrograms();
            $progCat = $obj->getProgCat();
            $data = $obj->getall();
            ?>
            <main class="content px-3 py-2" style="height: 100vh;">
                <div class="container-fluid h-100">
                    <div class="row d-flex justify-content-evenly align-items-center gap-4">
                        <div class="col-md-12 text-start py-4">
                            <div class="card-header">
                                <h2>Form Configuration</h2>
                            </div>
                        </div>
                        <div class="col-md-5 config py-3 px-2 text-center align-items-center bg-info-subtle">
                            <div class="col-md-12 text-center py-2">
                                <div class="card-header">
                                    <h4>Student Form</h4>
                                </div>
                            </div>
                            <div class="col-md-12 col-12 py-1 px-0 d-flex justify-content-center" style="width: 100%;">
                                <div class="row g-3 d-flex justify-content-center align-items-center">
                                    <div class="col-sm-4">
                                        <label for="UpressFRS" class="col-form-label">WMSU-UPRESS-FR-</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" id="UpressFRS" class="form-control text-center"
                                            name="UpressFRS"
                                            value="<?=htmlspecialchars($get['StudentFormVersion']['value'])?>">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="EffDateS" class="col-form-label">Effective Date</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" id="EffDateS" class="form-control text-center"
                                            name="EffDateS"
                                            value="<?=htmlspecialchars($get['StudentFormEDate']['value'])?>">
                                    </div>
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success btn-cirlce btn-sm edit-btn "
                                            data-id="<?= $get['StudentFormEDate']['id']; ?>" data-type="student"
                                            onclick="update(this);return false;">Update
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 config py-3 px-2 text-center align-items-center bg-info-subtle">
                            <div class="col-md-12 text-center py-2">
                                <div class="card-header">
                                    <h4>Employee Form</h4>
                                </div>
                            </div>
                            <div class="col-md-12 col-12 py-1 px-0 d-flex justify-content-center" style="width: 100%;">
                                <div class="row g-3 d-flex justify-content-center align-items-center    ">
                                    <div class="col-sm-4">
                                        <label for="UpressFRE" class="col-form-label">WMSU-UPRESS-FR-</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" id="UpressFRE" class="form-control text-center"
                                            name="UpressFRE"
                                            value="<?=htmlspecialchars($get['EmployeeFormVersion']['value'])?>">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="EffDateE" class="col-form-label">Effective Date</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" id="EffDateE" class="form-control text-center"
                                            name="EffDateE"
                                            value="<?=htmlspecialchars($get['EmployeeFormEDate']['value'])?>">
                                    </div>
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success btn-cirlce btn-sm edit-btn "
                                            data-id="<?= $get['EmployeeFormVersion']['id']; ?>" data-type="employee"
                                            onclick="update(this);return false;">Update
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Program Table -->
                        <div class="col-md-12 config py-3 px-5 text-center align-items-center bg-info-subtle">
                            <div class="row">
                                <div class="col-sm-12 d-flex justify-content-between">
                                    <div class="card-header">
                                        <h4>School Program List</h4>
                                    </div>
                                    <button type="button" class="btn btn-success addbtn" data-bs-toggle="modal"
                                        data-bs-target="#programsModal">Add New</button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="presList" class="table table-striped table-hover" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Programs</th>
                                            <th scope="col">Program Category</th>
                                            <th scope="col">Major/Specialization</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        <?php if ($data): ?>
                                        <?php $count = 1; ?>
                                        <?php foreach ($data as $programId => $program): ?>
                                        <?php foreach ($program['progcategory'] as $category): ?>
                                        <tr>
                                            <td><?php echo $count++; ?></td>
                                            <td><?php echo htmlspecialchars($program['programName']); ?></td>
                                            <td><?php echo htmlspecialchars($category['programCatg']); ?></td>
                                            <td>
                                                <?php if (!empty($category['specialization'])): ?>
                                                <?php foreach ($category['specialization'] as $specialization): ?>
                                                <div><?php echo htmlspecialchars($specialization['specialization']); ?>
                                                </div>
                                                <?php endforeach; ?>
                                                <?php else: ?>
                                                N/A
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <!-- Add your action buttons here -->
                                                <button type="button" class="btn btn-success btn-sm edit-btn2"
                                                    data-type="Student" data-bs-toggle="modal" data-bs-placement="top"
                                                    data-bs-title="Edit" data-bs-target="#programsModal">
                                                    <i class="fa-solid fa-pen-to-square" style="padding: 0;"></i>
                                                    <!-- edit -->
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm delete-btn2"
                                                    data-bs-toggle="modal" data-bs-placement="top"
                                                    data-bs-title="Delete" data-id="<?= $item['client_id']; ?>">
                                                    <i class="fa-solid fa-trash" style="padding: 0;"></i>
                                                    <!-- delete -->
                                                </button>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                        <tr>
                                            <td colspan="5" class="text-center">No data available</td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <!-- modal -->
            <div class="modal fade" id="programsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="" method="post" id="" enctype="multipart/form-data">
                            <div class="modal-body" style="height: calc(100vh - auto); overflow-y: auto;">
                                <div class="container-fluid">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-sm-12">
                                            <div class="mb-1">
                                                <label for="">Programs</label>
                                                <select class="program-select" name="programName" id="programName"
                                                    required style="width: 100%;">
                                                    <option value=""></option>
                                                    <?php
                                                    if (count($programs) > 0) {
                                                        foreach ($programs as $row) {
                                                            echo '<option value="'.($row['id']).'">'. ($row['programName']). '</option>';
                                                        }
                                                    } else {
                                                        echo '<option value="">No programs available</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="mb-1">
                                                <label for="" class="form-label">Program Category</label>
                                                <select class="program-category" name="programCatg" id="programCatg"
                                                    required style="width: 100%;">
                                                    <option value=""></option>
                                                    <?php
                                                    if (count($progCat) > 0) {
                                                        foreach ($progCat as $row) {
                                                            echo '<option value="'.($row['id']).'">'. ($row['programCatg']). '</option>';
                                                        }
                                                    } else {
                                                        echo '<option value="">No program category available</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="mb-1">
                                                <label for="">Major/Specialization</label>
                                                <input type="text" class="form-control" name="specialization"
                                                    id="specialization">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                                <button type="submit" name="" class="btn btn-primary"></button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <script src="../../node_modules/jquery/dist/jquery.min.js"></script>

            <script>
$(document).ready(function() {
    var table = $('#presList').DataTable({
        // dom: 'Bfrtip',
        layout: {
            topStart: {
                buttons: [
                    'copy', 'csv', 'pdf'
                ]
            }
        }
    });
});
$(document).ready(function() {
    $(".program-select").select2({
        placeholder: "Program Offerings",
        theme: 'bootstrap',
        tags: true,
        dropdownParent: $('#programsModal')
    });

    $(".program-category").select2({
            // placeholder: "asdasda",
            theme: 'bootstrap',
            tags: true,
            dropdownParent: $('#programsModal')
        })
        .on('select2:close', function() {
            var element = $(this);
            var new_cat = $.trim(element.val());
            var formdata = new FormData();
            formdata.append('programCatg', new_cat);
            formdata.append('action', 'AddProgramCategory');
            if (new_cat != '') {
                $.ajax({
                    url: "/add-program-cat",
                    method: "post",
                    data: formdata,
                    success: function(response) {
                        element.append('<option value="' + new_cat + '">' + new_cat +
                            '</option>').val
                    }
                });
            }
        });
});
            </script>
            <script>
function update(val) {
    var id = $(val).attr('data-id');
    let version = "";
    let effectiveDate = "";
    if (confirm('Are you sure you want to update form?')) {
        if ($(val).attr('data-type') == 'student') {
            version = $("#UpressFRS").val();
            effectiveDate = $("#EffDateS").val();
        } else {
            version = $("#UpressFRE").val();
            effectiveDate = $("#EffDateE").val();
        }
        var formdata = new FormData();
        formdata.append('id', id);
        formdata.append('version', version);
        formdata.append('effectiveDate', effectiveDate);
        formdata.append('type', $(val).attr('data-type'));
        formdata.append('ignoreHeaderFooter', 1);
        formdata.append('action', 'updateForm');
        $.ajax({
            type: 'POST',
            url: "/update-config",
            data: formdata,
            contentType: false,
            processData: false,
            success: function(response) {
                var res = JSON.parse(response);
                if (res.status == 'success') {
                    alert(res.message);
                    //location.reload();
                } else {
                    alert(res.message);
                }
            },
            error: function(error) {
                console.log(error);
                alert('Error submitting form');
            }
        });
    }
}


$(document).ready(function() {
    $(document).on('click', '.addbtn', function() {
        $('#programsModal').find('input, select, textarea').val('');
        $('#programsModal h1').text('New Program');
        $('#programsModal form').attr('id', 'insertProgram');
        console.log("Form ID: " + $('#programsModal form').attr('id'));
        $('#programsModal button[type="submit"]').attr('name', 'addprog').text('Add New');
    });

    $(document).on('submit', '#insertProgram', function(e) {
        e.preventDefault();
        var formdata = new FormData(this);
        formdata.append('action', 'insertNew');
        formdata.append("ignoreHeaderFooter", 1);

        $.ajax({
            type: 'POST',
            url: "/insert-program",
            data: formdata,
            contentType: false,
            processData: false,
            success: function(response) {
                var res = JSON.parse(response);
                if (res.status == 'success') {
                    alert(res.message);
                    // location.reload();
                } else {
                    alert(res.message);
                }
                $('#insertProgram').find('input').val('');
                $('#insertProgram').find('select').val('');
            },
            error: function(error) {
                console.log(error);
                alert('Error submitting form');
            }
        });
    });

});
            </script>

            <script>
document.addEventListener('DOMContentLoaded', function() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="modal"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
});
            </script>