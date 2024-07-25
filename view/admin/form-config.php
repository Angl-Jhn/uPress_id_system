            <?php
            include_once("././model/formConfigurationModel.php");
            $obj = new formConfigModel();
            $get = $obj->getForm();
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
                                <div class="row g-3 d-flex justify-content-center align-items-center">
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
                        <div class="col-md-12 config py-3 px-5 text-center align-items-center bg-info-subtle">
                            <div class="row">
                                <div class="col-sm-12 d-flex justify-content-between">
                                    <div class="card-header">
                                        <h4>School Program List</h4>
                                    </div>
                                    <button type="button" class="btn btn-success addbtn" data-bs-toggle="modal"
                                        data-bs-target="#PresidentModal">New President</button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="presList" class="table table-striped table-hover" style="width: 100%;">
                                    <thead>
                                        <th scope="col">No.</th>
                                        <th scope="col">School Program</th>
                                        <th scope="col">Program Category</th>
                                        <th scope="col">Specialization</th>
                                        <th scope="col">Action</th>
                                    </thead>
                                    <tbody class="table-group-divider" id="">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <script src="../../node_modules/jquery/dist/jquery.min.js"></script>

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
            </script>