            <?php
            include_once("././model/transactionManageModel.php");
            $obj = new TransactionManageModel();
            $get = $obj->getAll();

            include_once("././model/dsaListModel.php");
            $DSAobj = new DsaListModel();
            $getDSA = $DSAobj->getList();
            $setDefault = $DSAobj->getDefault();

            include_once("././model/presidentListModal.php");
            $PRESobj = new PresidentListModal();
            $getPres = $PRESobj->getList();
            $setDefaultPres = $PRESobj->getDefault();
            ?>

            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="row py-3 px-2">
                        <div class="col-md-12 text-start">
                            <div class="card-header">
                                <h2>Client Transactions</h2>
                            </div>
                        </div>
                        <div class="col-md-12 col-12 align-items-center d-flex justify-content-end gap-3">
                            <button type="button" class="btn btn-primary addbtn1" data-bs-toggle="modal"
                                data-bs-target="#StudentModal">
                                <i class="fa-solid fa-circle-plus"></i> Student
                            </button>
                            <button type="button" class="btn btn-primary addbtn2" data-bs-toggle="modal"
                                data-bs-target="#EmployeeModal">
                                <i class="fa-solid fa-circle-plus"></i> Employee
                            </button>
                        </div>
                        <div class="col-md-12 col-12 align-items-center py-4 px-0 text-center d-flex justify-content-center"
                            style="width: 100%;">
                            <div class="table-responsive">
                                <table class="table caption-top table-striped table-hover" id="transactions"
                                    style="width: 100%;">
                                    <thead>
                                        <th scope="col">No.</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Transaction Type</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </thead>
                                    <tbody class="table-group-divider" id="">
                                        <?php
                                            if ($get) {
                                                foreach ($get as $item) {
                                         ?>
                                        <tr>
                                            <td class="clientID" style="width: 20px;"><?= $item['client_id'] ?></td>
                                            <td style="max-width: 60px; overflow: hidden; text-overflow: ellipsis;"
                                                title="<?= $item['firstName']." ".$item['middleName']." ".$item['lastName']." ".$item['nameExt'] ?>">
                                                <?= strlen($item['firstName']." ".$item['middleName']." ".$item['lastName']." ".$item['nameExt']) > 15 ?
                                                substr($item['firstName']." ".$item['middleName']." ".$item['lastName']." ".$item['nameExt'], 0, 15) . '...' :
                                                $item['firstName']." ".$item['middleName']." ".$item['lastName']." ".$item['nameExt'] ?>
                                            </td>
                                            <td><?= $item['clientType'] ?></td>
                                            <td><?= $item['formType'] ?></td>
                                            <td style="width: 80px !important;"><?= $item['createdAt'] ?></td>
                                            <td>
                                                <?php
                                                    if ($item['status'] == 0) {
                                                        $item['status'] = 'Pending';
                                                    } else if ($item['status'] == 1) {
                                                        $item['status'] = 'Completed';
                                                    }
                                                ?>
                                                <span
                                                    class="badge text-bg-<?= $item['status'] == 'Completed' ? 'success' : 'danger' ?>">
                                                    <?= $item['status'] ?>
                                                </span>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col">
                                                        <?php
                                                        if($item['clientType'] == 'Student') {
                                                        ?>
                                                        <button type="button"
                                                            class="btn btn-info btn-cirlce btn-sm view-btn"
                                                            data-id="<?= $item['client_id']; ?>" data-type="Student"
                                                            data-bs-toggle="modal" data-bs-target="#StudentIDView">
                                                            <i class="fa-solid fa-eye" style="padding: 0;"></i>
                                                            <!-- view -->
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-success btn-cirlce btn-sm edit-btn2"
                                                            data-id="<?= $item['client_id']; ?>" data-type="Student"
                                                            data-bs-toggle="modal" data-bs-target="#StudentModal">
                                                            <i class="fa-solid fa-pen-to-square"
                                                                style="padding: 0;"></i>
                                                            <!-- edit -->
                                                        </button>
                                                        <?php
                                                        } else if($item['clientType'] == 'Employee') {
                                                        ?>
                                                        <button type="button"
                                                            class="btn btn-info btn-cirlce btn-sm view-btn"
                                                            data-id="<?= $item['client_id']; ?>" data-type="Employee"
                                                            data-bs-toggle="modal" data-bs-target="#EmployeeIDView">
                                                            <i class="fa-solid fa-eye" style="padding: 0;"></i>
                                                            <!-- view -->
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-success btn-cirlce btn-sm edit-btn2"
                                                            data-id="<?= $item['client_id']; ?>" data-type="Employee"
                                                            data-bs-toggle="modal" data-bs-target="#EmployeeModal">
                                                            <i class="fa-solid fa-pen-to-square"
                                                                style="padding: 0;"></i>
                                                            <!-- edit -->
                                                        </button>
                                                        <?php
                                                        } else {
                                                        ?>
                                                        <button type="button"
                                                            class="btn btn-secondary btn-cirlce btn-sm edit-btn2"
                                                            disabled>
                                                            <i class="fa-solid fa-pen-to-square"
                                                                style="padding: 0;"></i>
                                                            <!-- edit -->
                                                        </button>
                                                        <?php
                                                        }
                                                        ?>

                                                        <button type="button"
                                                            class="btn btn-danger btn-cirlce btn-sm delete-btn2"
                                                            data-id="<?= $item['client_id']; ?>">
                                                            <i class="fa-solid fa-trash" style="padding: 0;"></i>
                                                            <!-- delete -->
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                                }   
                                            } else {
                                        ?>
                                        <tr>
                                            <td colspan="9" class="text-center">No data available</td>
                                        </tr>
                                        <?php
                                            }
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
            <!-- Add Edit Modal -->
            <div class="modal fade" id="StudentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-2" id="staticBackdropLabel"></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post" id="studentForm" enctype="multipart/form-data">
                            <div class="modal-body" style="max-height: calc(100vh - 200px); overflow-y: auto;">
                                <div class="container-fluid">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-md-12 pb-2">
                                            <div class="col-lg-12 text-center py-2">
                                                <h3>Student data</h3>
                                            </div>
                                            <!-- Radio Buttons -->
                                            <div class="m-0 py-2 gap-2 d-flex justify-content-center">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="formType"
                                                        data-val="New" id="new" checked onclick="view(0)">
                                                    <label class="form-check-label ps-2" for="new">New</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="formType"
                                                        data-val="Replacement" id="rep" onclick="view(1)">
                                                    <label class="form-check-label ps-2" for="rep">Replacement</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="formType"
                                                        data-val="Lost" id="lost" onclick="view(2)">
                                                    <label class="form-check-label ps-2" for="lost">Lost</label>
                                                </div>
                                            </div>
                                            <!-- Radio Buttons End -->
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-lg-5 col-md-12">
                                            <div class="mb-1">
                                                <input type="hidden" id="id" name="id">
                                                <label for="">First Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="firstName" id="fname"
                                                    required>
                                            </div>
                                            <div class="mb-1">
                                                <label for="">Middle Name</label>
                                                <input type="text" class="form-control" name="middleName" id="mname">
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-9">
                                                    <div class="mb-1">
                                                        <label for="">Family Name <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="familyName"
                                                            id="famname" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="mb-1">
                                                        <label for="">Suffix</label>
                                                        <select class="form-control select-suffix" name="nameExt"
                                                            id="ext">
                                                            <option value=""></option>
                                                            <option value="Jr.">Jr.</option>
                                                            <option value="Sr.">Sr.</option>
                                                            <option value="II">II</option>
                                                            <option value="III">III</option>
                                                            <option value="IV">IV</option>
                                                            <option value="V">V</option>
                                                            <option value="VI">VI</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-12">
                                            <div class="mb-1">
                                                <label for="">Student Number <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="studnum" id="studnum"
                                                    required>
                                            </div>
                                            <div class="mb-1">
                                                <label for="">Email <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="email" id="email"
                                                    required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Program/Strand <span class="text-danger">*</span>
                                                </label>
                                                <select class="js-example-basic-single form-control" name="programs"
                                                    id="select-program">
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-12 pt-4">
                                            <h3>Emergency data</h3>
                                            <div class="mb-1">
                                                <label for="">First Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="firstNameEmg"
                                                    id="fnameEmg" required>
                                            </div>
                                            <div class="mb-1">
                                                <label for="">Middle Name</label>
                                                <input type="text" class="form-control" name="middleNameEmg"
                                                    id="mnameEmg">
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-9">
                                                    <div class="mb-1">
                                                        <label for="">Family Name <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="familyNameEmg"
                                                            id="famnameEmg" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="mb-1">
                                                        <label for="">Suffix</label>
                                                        <select class="form-control select-suffix" name="nameExtEmg"
                                                            id="extEmg">
                                                            <option value=""></option>
                                                            <option value="Jr.">Jr.</option>
                                                            <option value="Sr.">Sr.</option>
                                                            <option value="II">II</option>
                                                            <option value="III">III</option>
                                                            <option value="IV">IV</option>
                                                            <option value="V">V</option>
                                                            <option value="VI">VI</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-1">
                                                <label for="">Address <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="address" id="addEmg"
                                                    required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Contact Number <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" name="contactNumber"
                                                    id="contactEmg" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-12 pt-4">
                                            <h3>Attachments</h3>
                                            <div class="mb-1">
                                                <div class="row d-flex justify-content-start">
                                                    <div class="col-xl-1 col-lg-2 col-md-2 col-2 pe-5">
                                                        <div class="optional">
                                                            <input type="checkbox" class="checkbox-popover"
                                                                id="toggleSwitchuserPhoto" data-bs-placement="top"
                                                                data-bs-content="I won't provide"
                                                                data-bs-trigger="focus" data-target="userPhoto">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-3 ps-0">
                                                        <label for="userPhoto" class="form-label">Photo</label>
                                                    </div>
                                                </div>
                                                <input class="form-control" name="userPhoto[]" type="file"
                                                    id="userPhoto" required>
                                            </div>
                                            <div class="mb-4">
                                                <div class="row d-flex justify-content-start">
                                                    <div class="col-xl-1 col-lg-2 col-md-2 col-2 pe-5">
                                                        <div class="optional">
                                                            <input type="checkbox" class="checkbox-popover"
                                                                id="toggleSwitchsignature" data-bs-placement="top"
                                                                data-bs-content="I won't provide"
                                                                data-bs-trigger="focus" data-target="signature">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-3 ps-0">
                                                        <label for="signature" class="form-label">Signature</label>
                                                    </div>
                                                </div>
                                                <input class="form-control" name="signature[]" type="file"
                                                    id="signature" required>
                                            </div>
                                            <div class="mb-3">
                                                <h5>Request the following files and verify</h5>
                                            </div>
                                            <div class="mb-1">
                                                <h6><input class="form-check-input me-3" name="cor" type="checkbox"
                                                        id="cor" required>Certificate of Registration</h6>
                                            </div>
                                            <div class="stud-replacement mb-1">
                                                <h6><input class="form-check-input me-3" name="oldId" type="checkbox"
                                                        id="frontId" required>Old ID Front</h6>
                                            </div>
                                            <div class="stud-replacement mb-1">
                                                <h6><input class="form-check-input me-3" name="oldIdBack"
                                                        type="checkbox" id="backId" required>Old ID Back</h6>
                                            </div>
                                            <div class="stud-affidavit mb-1">
                                                <h6><input class="form-check-input me-3" name="aol" type="checkbox"
                                                        id="affidavit" required>Affidavit of Loss</h6>
                                            </div>
                                            <div class="stud-dsa mb-1">
                                                <h6><input class="form-check-input me-3" name="dsa" type="checkbox"
                                                        id="dsa" required>DSA Form</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="" class="btn btn-primary"></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="EmployeeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-2" id="staticBackdropLabel">Add Employee</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post" id="employeeForm" enctype="multipart/form-data">
                            <div class="modal-body" style="max-height: calc(100vh - 200px); overflow-y: auto;">
                                <div class="container-fluid">
                                    <div class="row d-flex justify-content-center m-0 p-2">
                                        <div class="col-lg-12 text-center py-2">
                                            <h3>Employee data</h3>
                                        </div>
                                        <div class="col-lg-5 text-center pb-2">
                                            <!-- Radio Buttons -->
                                            <div class="m-0 py-2 gap-2 d-flex justify-content-center">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="formType"
                                                        value="New" data-val="New" id="new" checked onclick="view(0)">
                                                    <label class="form-check-label ps-2" for="new">New</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="formType"
                                                        value="Replacement" data-val="Replacement" id="rep"
                                                        onclick="view(1)">
                                                    <label class="form-check-label ps-2" for="rep">Replacement</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="formType"
                                                        value="Lost" data-val="Lost" id="lost" onclick="view(2)">
                                                    <label class="form-check-label ps-2" for="lost">Lost</label>
                                                </div>
                                            </div><!-- Radio Buttons End -->
                                        </div>
                                        <div class="col-lg-5 pb-2">
                                            <div class="m-0 py-2 gap-2 d-flex justify-content-center">
                                                <div class="form-check form-check-inline">
                                                    <input type="hidden" id="id" name="id">
                                                    <input class="form-check-input" type="radio" name="teachingnon"
                                                        id="teach" checked onclick="teachingnon(0)">
                                                    <label class="form-check-label ps-2" for="teach">Teaching</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="teachingnon"
                                                        id="nonteach" onclick="teachingnon(1)">
                                                    <label class="form-check-label ps-2"
                                                        for="nonteach">Non-Teaching</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-xl-5 col-lg-6 col-md-12">
                                            <div class="mb-1">
                                                <label for="">ID Number <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" name="idNumber" id="idNumber"
                                                    required>
                                            </div>
                                            <div class="mb-1">
                                                <label for="">Email <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="email" id="email"
                                                    required>
                                            </div>
                                            <div class="mb-1">
                                                <label for="">First Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="firstName" id="fname"
                                                    required>
                                            </div>
                                            <div class="mb-1">
                                                <label for="">Middle Name</label>
                                                <input type="text" class="form-control" name="middleName" id="mname">
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-9">
                                                    <div class="mb-1">
                                                        <label for="">Family Name <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="familyName"
                                                            id="famname" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="mb-3">
                                                        <label for="">Suffix</label>
                                                        <select class="form-control select-suffix" name="nameExt"
                                                            id="ext">
                                                            <option value=""></option>
                                                            <option value="Jr.">Jr.</option>
                                                            <option value="Sr.">Sr.</option>
                                                            <option value="II">II</option>
                                                            <option value="III">III</option>
                                                            <option value="IV">IV</option>
                                                            <option value="V">V</option>
                                                            <option value="VI">VI</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-5 col-lg-6 col-md-12">
                                            <div class="acad-rank mb-2">
                                                <label for="">Academic Rank <span class="text-danger">*</span></label>
                                                <select class="academicRank-basic-single form-control"
                                                    name="academicRank" id="academicRank" required>
                                                    <option value=""></option>
                                                    <optgroup label="Instructor">
                                                        <option value="Instructor-1">Instructor I</option>
                                                        <option value="Instructor-2">Instructor II</option>
                                                        <option value="Instructor-3">Instructor III</option>
                                                    </optgroup>
                                                    <optgroup label="Assistant Professor">
                                                        <option value="Asst-Prof-1">Assistant Professor I</option>
                                                        <option value="Asst-Prof-2">Assistant Professor II</option>
                                                        <option value="Asst-Prof-3">Assistant Professor III</option>
                                                        <option value="Asst-Prof-4">Assistant Professor IV</option>
                                                    </optgroup>
                                                    <optgroup label="Associate Professor">
                                                        <option value="Assoc-Prof-1">Associate Professor I</option>
                                                        <option value="Assoc-Prof-2">Associate Professor II</option>
                                                        <option value="Assoc-Prof-3">Associate Professor III</option>
                                                        <option value="Assoc-Prof-4">Associate Professor IV</option>
                                                        <option value="Assoc-Prof-5">Associate Professor V</option>
                                                    </optgroup>
                                                    <optgroup label="Professor">
                                                        <option value="Professor-1">Professor I</option>
                                                        <option value="Professor-2">Professor II</option>
                                                        <option value="Professor-3">Professor III</option>
                                                        <option value="Professor-4">Professor IV</option>
                                                        <option value="Professor-5">Professor V</option>
                                                        <option value="Professor-6">Professor VI</option>
                                                    </optgroup>
                                                    <optgroup label="University Professor">
                                                        <option value="University-Prof">University Professor</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="plant-pos mb-2">
                                                <label for="">Plantilla Position <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="plantillaPos"
                                                    id="plantillaPos" required>
                                            </div>
                                            <div class="mb-1">
                                                <label for="">Unit/Office/College/Department <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="designation"
                                                    id="designation" required>
                                            </div>
                                            <div class="mb-1">
                                                <label for="">Residential Address <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="residentialAddress"
                                                    id="residentialAddress" required>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="birth mb-1">
                                                        <label for="">Date of Birth <span
                                                                class="text-danger">*</span></label>
                                                        <input type="date" class="form-control" name="dateofbirth"
                                                            id="dateofbirth" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mb-1">
                                                        <label for="">Contact Number <span
                                                                class="text-danger">*</span></label>
                                                        <input type="number" class="form-control" name="contactNum"
                                                            id="contactNum" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="mb-1">
                                                        <label for="">Civil Status <span
                                                                class="text-danger">*</span></label>
                                                        <select class="civilstatus-basic-single form-control"
                                                            name="civilStatus" id="civilStatus" required>
                                                            <option value=""></option>
                                                            <option value="Single">Single</option>
                                                            <option value="Married">Married</option>
                                                            <option value="Widowed">Widowed</option>
                                                            <option value="Divorced">Divorced</option>
                                                            <option value="Separated">Separated</option>
                                                            <option value="Annulled">Annulled</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mb-1">
                                                        <label for="">Blood Type <span
                                                                class="text-danger">*</span></label>
                                                        <select class="bloodtype-basic-single form-control"
                                                            name="bloodType" id="bloodType" required>
                                                            <option value=""></option>
                                                            <option value="A+">A+</option>
                                                            <option value="A+">A-</option>
                                                            <option value="B+">B+</option>
                                                            <option value="B-">B-</option>
                                                            <option value="AB+">AB+</option>
                                                            <option value="AB-">AB-</option>
                                                            <option value="O+">O+</option>
                                                            <option value="O-">O-</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-5 col-lg-6 col-md-12 pt-4">
                                            <h3>Emergency data</h3>
                                            <div class="mb-1">
                                                <label for="">First Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="firstNameEmg"
                                                    id="fnameEmg" required>
                                            </div>
                                            <div class="mb-1">
                                                <label for="">Middle Name</label>
                                                <input type="text" class="form-control" name="middleNameEmg"
                                                    id="mnameEmg">
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-9">
                                                    <div class="mb-1">
                                                        <label for="">Family Name <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="familyNameEmg"
                                                            id="famnameEmg" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="mb-1">
                                                        <label for="">Suffix</label>
                                                        <select class="form-control select-suffix" name="nameExtEmg"
                                                            id="extEmg">
                                                            <option value=""></option>
                                                            <option value="Jr.">Jr.</option>
                                                            <option value="Sr.">Sr.</option>
                                                            <option value="II">II</option>
                                                            <option value="III">III</option>
                                                            <option value="IV">IV</option>
                                                            <option value="V">V</option>
                                                            <option value="VI">VI</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-1">
                                                <label for="">Address <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="address" id="addEmg"
                                                    required>
                                            </div>
                                            <div class="mb-1">
                                                <label for="">Contact Number <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" name="contactNumber"
                                                    id="contactEmg" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-5 col-lg-6 col-md-12 pt-4">
                                            <h3>Attachments</h3>
                                            <div class="mb-1">
                                                <div class="row d-flex justify-content-start">
                                                    <div class="col-xl-1 col-lg-2 col-md-2 col-2 pe-5">
                                                        <div class="optional">
                                                            <input type="checkbox" class="checkbox-popover"
                                                                id="toggleSwitchuserPhoto1" data-bs-placement="top"
                                                                data-bs-content="I won't provide"
                                                                data-bs-trigger="focus" data-target="userPhoto1">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-3 ps-0">
                                                        <label for="userPhoto1" class="form-label">Photo</label>
                                                    </div>
                                                </div>
                                                <input class="form-control" name="userPhoto[]" type="file"
                                                    id="userPhoto1" required>
                                            </div>
                                            <div class="mb-4">
                                                <div class="row d-flex justify-content-start">
                                                    <div class="col-xl-1 col-lg-2 col-md-2 col-2 pe-5">
                                                        <div class="optional">
                                                            <input type="checkbox" class="checkbox-popover"
                                                                id="toggleSwitchsignature1" data-bs-placement="top"
                                                                data-bs-content="I won't provide"
                                                                data-bs-trigger="focus" data-target="signature1">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-3 ps-0">
                                                        <label for="signature" class="form-label">Signature</label>
                                                    </div>
                                                </div>
                                                <input class="form-control" name="signature[]" type="file"
                                                    id="signature1" required>
                                            </div>
                                            <div class="mb-3">
                                                <h5>Request the following files and verify</h5>
                                            </div>
                                            <div class="hrmo mb-1">
                                                <h6><input class="form-check-input me-3" name="hrmoScanned"
                                                        type="checkbox" id="hrmoScanned" required>HRMO Form</h6>
                                            </div>
                                            <div class="hrmo-lost mb-1">
                                                <h6><input class="form-check-input me-3" name="hrmoNew" type="checkbox"
                                                        id="hrmoNew" required>New HRMO Form</h6>
                                            </div>
                                            <div class="emp-affidavit mb-1">
                                                <h6><input class="form-check-input me-3" name="aol" type="checkbox"
                                                        id="aol" required>Affidavit of Loss</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="" class="btn btn-primary"></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- View Modals -->
            <div class="modal fade" id="StudentIDView" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-2" id="staticBackdropLabel"></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="max-height: calc(100vh - 200px); overflow-y: auto;">
                            <div id="contentToPrint"
                                class="container-fluid h-100 w-75 d-flex justify-content-center align-items-center">
                                <div
                                    class="row layout py-3 px-2 gap-4 justify-content-center text-center bg-info-subtle">
                                    <div class="col-md-12 text-center py-2">
                                        <div class="card-header no-print">
                                            <h2>Student ID</h2>
                                        </div>
                                    </div>
                                    <div class="col-md-4 py-3 page-start">
                                        <div class="front" style="position: relative; left: 50%; transform: translateX(-50%); display: block; 
                                background-image: url('../../assets/id_layouts/STUDENT/STUDENT-ID-FRONT.svg'); 
                                width:207.87px; height:329px; background-size: 212px 330px; background-position: center; 
                                background-repeat: no-repeat; border: 1px solid black; border-radius: 10px">
                                            <p style="position: absolute; left: 45px; top: 225px; color: black; 
                                    text-align: center; z-index: 1; font-weight: bold; font-size: 10px" id="studNum">
                                            </p>
                                            <p style="position: absolute; left: 0; right: 0; top: 235px; color: black; 
                                    text-align: center; z-index: 1; font-weight: 900; font-size: 16px; color: maroon"
                                                id="programName">
                                                BS CS
                                            </p>
                                            <p style="position: absolute; left: 0; right: 0; top: 253px; color: black;
                                    text-align: center; z-index: 1; font-weight: bold; font-size: 16px;" id="studName">
                                            </p>
                                            <img src="../../assets/id_layouts/signature.png" style="position: absolute; left: 0; right: 0; 
                                    top: 275px; max-width:60px; max-height:30px; display: block; margin: auto;">
                                            <p style="position: absolute; left: 0; right: 0; bottom: -2px; color: black; 
                                    text-align: center; z-index: 1; font-weight: bold; font-size: 8px">
                                                <?php 
                                        echo $setDefault['title'].' '.$setDefault['firstName'].' '.$setDefault['middleName'].' '
                                        .$setDefault['familyName'].' '.$setDefault['suffix'];
                                    ?>
                                            </p>
                                            <p style="position: absolute; left: 0; right: 0; bottom: 5px; color: black; 
                                    text-align: center; z-index: 1; font-size: 8px; padding-bottom: 0px; margin: 0px;">
                                                Director, Student Affairs</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 py-3 page-break">
                                        <div class="back" style="position: relative; left: 50%; transform: translateX(-50%); display: block; 
                                background-image: url('../../assets/id_layouts/STUDENT/STUDENT-ID-BACK.svg'); 
                                width:207.87px; height:329px; background-size: 212px 330px; background-position: center; 
                                background-repeat: no-repeat; border: 1px solid black; border-radius: 10px">
                                            <p style="position: absolute; left: 0; right: 0; top: 75px; color: black; 
                                    text-align: center; font-size: 14px; font-weight: 900;" id="emergencyName">
                                            </p>

                                            <p style="position: absolute; left: 0; right: 0; top: 100px; color: black; 
                                    text-align: center; font-size: 10px; width: 190px; margin: auto auto; line-height: 10px;"
                                                id="emergencyAddress">
                                            </p>
                                            <p style="position: absolute; left: 0; right: 0; top: 124px; color: black; 
                                    text-align: center; font-size: 12px; font-weight: 900;" id="emergencyContact">
                                            </p>
                                            <?php
                                    function generateYearRange($startYear) { //generate the year range for a given start year
                                        $endYear = $startYear + 1;
                                        return "$startYear-$endYear";
                                    }
                                    $numberOfRanges = 4; // Number of <p> elements to display
                                    $startYear = $setDefault['year'];
                                    $yearRanges = [];
                                    for ($i = 0; $i < $numberOfRanges; $i++) {
                                        $yearRanges[] = generateYearRange($startYear + $i);
                                    }
                                ?>
                                            <?php foreach ($yearRanges as $index => $range){?>
                                            <p style="position: absolute; left: 9.5px; bottom: <?php echo 118 - ($index * 17); ?>px;
                                    color: black; font-size: 5.5px; font-weight: bold;">
                                                <?php echo $range; ?>
                                            </p>
                                            <?php } ?>
                                            <img src="../../assets/id_layouts/signature.png" style="position: absolute; 
                                    left: 0; right: 0; bottom: 28px; max-width:80px; max-height:40px; display: 
                                    block; margin: auto;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button id="printButton" name="" class="btn btn-primary"><i
                                    class="fa-solid fa-print"></i>Print</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="EmployeeIDView" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-2" id="staticBackdropLabel"></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="max-height: calc(100vh - 200px); overflow-y: auto;">
                            <div id="contentToPrint"
                                class="container-fluid h-100 w-75 d-flex justify-content-center align-items-center">
                                <div
                                    class="row layout py-3 px-2 gap-4 justify-content-center text-center bg-info-subtle">
                                    <div class="col-md-12 text-center py-2">
                                        <div class="card-header no-print">
                                            <h2>Employee ID</h2>
                                        </div>
                                    </div>
                                    <div class="col-md-5 py-3 page-start">
                                        <div class="front" style="position: relative; left: 50%; transform: translateX(-50%); display: block; 
                                background-image: url('../../assets/id_layouts/EMPLOYEE/CSM.png'); width:316px; height: 204px; 
                                background-size: 321px 204px; background-position: center; background-repeat: no-repeat; 
                                border: 1px solid black; border-radius: 10px">
                                            <p style="position: absolute; left: 45px; bottom: -14px; color: black; 
                                    text-align: center; z-index: 1; font-weight: bold; font-size: 9px" id="empNum"></p>
                                            <p style="position: absolute; left: 145px; right: 10px; top: 62px; color: black; 
                                    text-align: center; z-index: 1; font-weight: 600; font-size: 12px;" id="empName">
                                            </p>
                                            <p style="position: absolute; left: 145px; right: 10px; top: 80px; color: black; 
                                    text-align: center; z-index: 1; font-weight: 600; font-size: 9px;" id="rankPos">
                                            </p>
                                            <p style="position: absolute; left: 145px; right: 10px; top: 93px; color: black;
                                    text-align: center; z-index: 1; font-weight: 600; font-size: 9px;"
                                                id="designation">
                                            </p>
                                            <img src="../../assets/id_layouts/signature.png" style="position: absolute; right: 60px; 
                                    bottom: 10px; max-width:60px; max-height:30px; display: block; margin: auto;">
                                            <p style="position: absolute; left: 158px; right: 20px; bottom: -6px; color: black; 
                                    text-align: center; z-index: 1; font-weight: 800; font-size: 6px">
                                                <?php 
                                        echo $setDefaultPres['title'].' '.$setDefaultPres['firstName'].' '.$setDefaultPres['middleName'].' '
                                        .$setDefaultPres['familyName'].' '.$setDefaultPres['suffix'];
                                    ?></p>
                                            <p style="position: absolute; right: 75px; bottom: 4px; color: black; text-align: center; 
                                    z-index: 1; font-size: 6px; font-weight: bold; padding-bottom: 0px; margin: 0px;">
                                                President</p>
                                        </div>
                                    </div>
                                    <div class="col-md-5 py-3 page-break">
                                        <div class="back" style="position: relative; left: 50%; transform: translateX(-50%); display: block; 
                                background-image: url('../../assets/id_layouts/EMPLOYEE/EMPLOYEE-ID-BACK.png'); 
                                width:316px; height: 204px; background-size: 321px 204px; background-position: center; 
                                background-repeat: no-repeat; border: 1px solid black; border-radius: 10px">
                                            <p style="position: absolute; left: 0; right: 0; top: 84px; color: black; text-align: center; 
                                    z-index: 1; font-weight: 900; font-size: 10px;" id="residentialAddress">
                                            </p>
                                            <p style="position: absolute; left: 60px; bottom: 69.6px; color: black; 
                                    font-size: 5px; font-weight: 900;" id="birthdate">
                                            </p>
                                            <p style="position: absolute; left: 57px; bottom: 53.5px; color: black; 
                                    font-size: 5px; font-weight: 900;" id="contactNum">
                                            </p>
                                            <p style="position: absolute; left: 145px; bottom: 69.6px; color: black; 
                                    font-size: 5px; font-weight: 900;" id="bloodtype">
                                            </p>
                                            <p style="position: absolute; left: 145px; bottom: 53.5px; color: black;
                                    font-size: 5px; font-weight: 900;" id="civilstatus">
                                            </p>
                                            <p style="position: absolute; left: 205px; bottom: 45px; color: black; 
                                    font-size: 8px; font-weight: 900;" id="emergencyName">
                                            </p>
                                            <p style="position: absolute; left: 175px; bottom: 30px; color: black; 
                                    font-size: 6px; font-weight: 900;" id="emergencyAddress">
                                            </p>
                                            <p style="position: absolute; left: 210px; bottom: 11px; color: black; 
                                    font-size: 8px; font-weight: 900;" id="emergencyContact">
                                            </p>
                                            <img src="../../assets/id_layouts/" style="position: absolute; 
                                    left: 65px; bottom: 20px; max-width:60px; max-height:30px; 
                                    display: block; margin: auto;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button id="printButton" name="" class="btn btn-primary"><i
                                    class="fa-solid fa-print"></i>Print</button>
                        </div>
                    </div>
                </div>
            </div>
            <script>
$('#printButton').click(function() {
    // Find the currently visible modal
    var visibleModal = $('.modal.show').attr('id');

    if (!visibleModal) {
        alert('No modal is currently open.');
        return;
    }

    // Determine the content to print based on the modal ID
    var content = $('#' + visibleModal + ' #contentToPrint').html();

    if (!content) {
        alert('No content found to print.');
        return;
    }

    // var content = $('#contentToPrint').html();

    // Create a new window
    var printWindow = window.open('', '', 'height=600,width=800');
    printWindow.document.write('<html><head><title>Print</title>');
    printWindow.document.write(
        '<style>@media print ' +
        '{ @page { size: 210mm 297mm; margin: mm; }' +
        '.page-break { page-break-before: always; margin-top:4px;}' +
        '.no-print{display:none;} p{margin-top: 0;margin-bottom: 1rem;}' +
        '.front { transform: translateX(-189%) !important; width: 207.87px; height: 329px;' +
        'background-size: 212px 330px; background-position: center; background-repeat: no-repeat;' +
        'border: 1px solid black; border-radius: 10px;}' +
        'p#studNum {position: absolute; left: 45px; top: 225px; color: black; text-align: center; z-index: 1; font-weight: bold; font-size: 10px}' +
        '.back { transform: translateX(-189%) !important;}}</style>'
    );
    printWindow.document.write('</head><body>');
    printWindow.document.write(content);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.focus();
    printWindow.print();
});




$(document).ready(function() {
    var table = $('#transactions').DataTable({
        // dom: 'Bfrtip',
        layout: {
            topStart: {
                buttons: [
                    'copy', 'csv', 'pdf'
                ]
            }
        }
    });
    $("#StudentModal .select-suffix").select2({
        placeholder: "Jr.",
        theme: 'bootstrap',
        dropdownParent: $('#StudentModal')
    });
    $("#StudentModal .js-example-basic-single").select2({
        placeholder: "Select Program",
        theme: 'bootstrap',
        dropdownParent: $('#StudentModal')
    });
    $("#EmployeeModal .select-suffix").select2({
        placeholder: "Jr.",
        theme: 'bootstrap',
        dropdownParent: $('#StudentModal')
    });
    $("#EmployeeModal .civilstatus-basic-single").select2({
        placeholder: "Select status",
        theme: 'bootstrap',
        dropdownParent: $('#EmployeeModal')
    });
    $("#EmployeeModal .bloodtype-basic-single").select2({
        placeholder: "Select blood type",
        theme: 'bootstrap',
        dropdownParent: $('#EmployeeModal')
    });
    $("#EmployeeModal .academicRank-basic-single").select2({
        placeholder: "Select academic rank",
        theme: 'bootstrap',
        dropdownParent: $('#EmployeeModal')
    });
    // on click modals
    $(document).on('click', '.addbtn1', function() {
        $('#StudentModal').find('input, select, textarea').val('');
        $('#new').prop('checked', true);
        $('#StudentModal h1').text('Generate Student ID');
        $('#StudentModal form').attr('id', 'insertStudent');
        console.log("Form ID: " + $('#StudentModal form').attr('id'));
        $('#StudentModal button[type="submit"]').attr('name', 'addStud').text('Add Student');
    });
    $(document).on('click', '.addbtn2', function() {
        $('#EmployeeModal').find('input, select, textarea').val('');
        $('#new').prop('checked', true);
        $('#EmployeeModal h1').text('Generate Employee ID');
        $('#EmployeeModal form').attr('id', 'insertEmployee');
        console.log("Form ID: " + $('#EmployeeModal form').attr('id'));
        $('#EmployeeModal button[type="submit"]').attr('name', 'addEmploy').text('Add Employee');
    });

    $(document).on('click', '.edit-btn2', function(e) {
        var clientType = $(this).data('type');

        if (clientType === 'Student') {
            $('#StudentModal h1').text('Modify Student ID');
            $('#StudentModal button[type="submit"]').attr('name', 'updateStud').text('Save Student');
            $('#StudentModal form').attr('id', 'updateStudent');
            console.log("Form ID: " + $('#StudentModal form').attr('id'));
        } else if (clientType === 'Employee') {
            $('#EmployeeModal h1').text('Modify Employee ID');
            $('#EmployeeModal form').attr('id', 'updateEmployee');
            console.log("Form ID: " + $('#EmployeeModal form').attr('id'));
            $('#EmployeeModal button[type="submit"]').attr('name', 'updateEmploy').text(
                'Save Employee');
        }
    });
    // insert
    $(document).on('submit', '#insertStudent', function(e) {
        e.preventDefault();
        var formdata = new FormData(this);
        formdata.append("submitType", "addStud");
        formdata.append("clientType", "Student");
        formdata.append("ignoreHeaderFooter", 1);
        const checkedValue = $('#insertStudent input[name="formType"]:checked').attr('data-val');
        formdata.append('formType', checkedValue);
        $.ajax({
            type: 'post',
            url: "/add-student",
            data: formdata,
            contentType: false,
            processData: false,
            success: function(response) {
                var res = JSON.parse(response);
                console.log(res);
                if (res.status === 'success') {
                    alert(res.message);
                    location.reload();
                } else {
                    alert(res.message);
                }
                $('#insertStudent').find('input').val('');
                $('#insertStudent').find('select').val('');
            },
            error: function(error) {
                console.log(error);
                alert('Error submitting form');
            }
        });
    });
    $(document).on('submit', '#insertEmployee', function(e) {
        e.preventDefault();
        var formdata = new FormData(this);
        formdata.append("submitType", "addEmploy");
        formdata.append("clientType", "Employee");
        formdata.append("ignoreHeaderFooter", 1);
        const checkedValue = $('#insertEmployee input[name="formType"]:checked').attr('data-val');
        formdata.append('formType', checkedValue);

        $.ajax({
            type: 'POST',
            url: "/add-employee",
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
                $('#insertEmployee').find('input').val('');
                $('#insertEmployee').find('select').val('');
            },
            error: function(error) {
                console.log(error);
                alert('Error submitting form');
            }
        });
    });
    // update
    $(document).on('submit', '#updateStudent', function(e) {
        e.preventDefault();
        var formdata = new FormData(this);
        formdata.append("submitType", "updateStud");
        formdata.append("clientType", "Student");
        formdata.append("ignoreHeaderFooter", 1);

        $.ajax({
            type: 'post',
            url: "/save-student",
            data: formdata,
            contentType: false,
            processData: false,
            success: function(response) {
                var res = JSON.parse(response);
                console.log(res);
                if (res.status === 'success') {
                    alert(res.message);
                    location.reload();
                } else {
                    alert(res.message);
                }
                $('#updateStudent').find('input').val('');
                $('#updateStudent').find('select').val('');
            },
            error: function(error) {
                console.log(error);
                alert('Error submitting form');
            }
        });
    });
    $(document).on('submit', '#updateEmployee', function(e) {
        e.preventDefault();
        var formdata = new FormData(this);
        formdata.append("submitType", "updateEmploy");
        formdata.append("clientType", "Employee");
        formdata.append("ignoreHeaderFooter", 1);

        $.ajax({
            type: 'POST',
            url: "/save-employee",
            data: formdata,
            contentType: false,
            processData: false,
            success: function(response) {
                var res = JSON.parse(response);
                if (res.status == 'success') {
                    alert(res.message);
                    location.reload();
                } else {
                    alert(res.message);
                }
                $('#updateEmployee').find('input').val('');
                $('#updateEmployee').find('select').val('');
            },
            error: function(error) {
                console.log(error);
                alert('Error submitting form');
            }
        });
    });

    $(document).on('click', '.view-btn', function(e) {
        var id = $(this).attr('data-id');
        var formdata = new FormData();
        formdata.append("submitType", "viewClients");
        formdata.append('clientID', id);
        // formdata.append("selectedType", e.currentTarget.getAttribute('data-type'));
        formdata.append("ignoreHeaderFooter", 1);
        $.ajax({
            type: 'POST',
            url: '/edit-users',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(response) {
                var res = JSON.parse(response);
                $("#StudentIDView #studNum").html(res.studentNum);
                $("#StudentIDView #programName").html(res.programName);
                $("#StudentIDView #studName").html(res.firstName + " " + res.middleName
                    .charAt(0) + ". " +
                    res.lastName + " " + (res.nameExt ? res.nameExt : ""));
                $("#StudentIDView #emergencyName").html(res.emergencyFirstName + " " + res
                    .middleName
                    .charAt(0) + ". " + res.emergencyLastName + " " + (res
                        .emergencyNameExt ? res.emergencyNameExt : ""));
                $("#StudentIDView #emergencyAddress").html(res.emergencyAddress);
                $("#StudentIDView #emergencyContact").html(res.emergencyContactNum);

                $("#EmployeeIDView #empNum").html(res.empNum);
                $("#EmployeeIDView #empName").html(res.firstName + " " + res.middleName
                    .charAt(0) + ". " +
                    res.lastName + " " + (res.nameExt ? res.nameExt : ""));
                if (res.academicRank) {
                    $("#EmployeeIDView #rankPos").html(res.academicRank);
                } else {
                    $("#EmployeeIDView #rankPos").html(res.plantillaPos);
                }
                $("#EmployeeIDView #designation").html(res.designation);
                $("#EmployeeIDView #residentialAddress").html(res.residentialAddress);
                $("#EmployeeIDView #birthdate").html(res.birthDate);
                $("#EmployeeIDView #contactNum").html(res.contactNum);
                $("#EmployeeIDView #bloodtype").html(res.bloodType);
                $("#EmployeeIDView #civilstatus").html(res.civilStatus);
                $("#EmployeeIDView #emergencyName").html(res.emergencyFirstName + " " + res
                    .middleName.charAt(0) + ". " + res.emergencyLastName + " " +
                    (res.emergencyNameExt ? res.emergencyNameExt : ""));
                $("#EmployeeIDView #emergencyAddress").html(res.emergencyAddress);
                $("#EmployeeIDView #emergencyContact").html(res.emergencyContactNum);
            }
        });
        console.log();
    });
    $(document).on('click', '.edit-btn2', function(e) {
        e.preventDefault();
        var selectedID = $(this).closest('tr').find('.clientID').text();

        console.log(e.currentTarget.getAttribute('data-type'));

        var formdata = new FormData();
        formdata.append("submitType", "viewClients");
        formdata.append("selectedType", e.currentTarget.getAttribute('data-type'));
        formdata.append('clientID', selectedID);
        formdata.append("ignoreHeaderFooter", 1);
        $("#StudentModal #id").val(selectedID);
        $("#EmployeeModal #id").val(selectedID);
        $.ajax({
            type: 'POST',
            url: '/edit-users',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(response) {
                var res = JSON.parse(response);
                console.log(res);
                if (res.formType === 'New') {
                    $('#new').prop('checked', true); // Check the New radio button
                } else if (res.formType === 'Replacement') {
                    $('#rep').prop('checked', true); // Check the Replacement radio button
                } else if (res.formType === 'Lost') {
                    $('#lost').prop('checked', true); // Check the Lost radio button
                }
                // student

                $("#StudentModal #studnum").val(res.studentNum);
                $("#StudentModal #email").val(res.email);
                $("#StudentModal #fname").val(res.firstName);
                $("#StudentModal #mname").val(res.middleName);
                $("#StudentModal #famname").val(res.lastName);
                $("#StudentModal #ext").val(res.nameExt);
                $("#StudentModal #select-program").val(res.collegeProgram);
                $("#StudentModal #select-program").trigger('change');
                $("#StudentModal #fnameEmg").val(res.emergencyFirstName);
                $("#StudentModal #mnameEmg").val(res.emergencyMiddleName);
                $("#StudentModal #famnameEmg").val(res.emergencyLastName);
                $("#StudentModal #extEmg").val(res.emergencyNameExt);
                $("#StudentModal #addEmg").val(res.emergencyAddress);
                $("#StudentModal #contactEmg").val(res.emergencyContactNum);

                // employee
                $("#EmployeeModal #idNumber").val(res.empNum);
                $("#EmployeeModal #email").val(res.email);
                $("#EmployeeModal #fname").val(res.firstName);
                $("#EmployeeModal #mname").val(res.middleName);
                $("#EmployeeModal #famname").val(res.lastName);
                $("#EmployeeModal #ext").val(res.nameExt);
                $("#EmployeeModal #fnameEmg").val(res.emergencyFirstName);
                $("#EmployeeModal #mnameEmg").val(res.emergencyMiddleName);
                $("#EmployeeModal #famnameEmg").val(res.emergencyLastName);
                $("#EmployeeModal #extEmg").val(res.emergencyNameExt);
                $("#EmployeeModal #addEmg").val(res.emergencyAddress);
                $("#EmployeeModal #contactEmg").val(res.emergencyContactNum);

                $("#EmployeeModal #academicRank").val(res.academicRank);
                $("#EmployeeModal #academicRank").trigger('change');
                $("#EmployeeModal #plantillaPos").val(res.plantillaPos);
                $("#EmployeeModal #designation").val(res.designation);
                $("#EmployeeModal #residentialAddress").val(res.residentialAddress);
                $("#EmployeeModal #dateofbirth").val(res.birthDate);
                $("#EmployeeModal #contactNum").val(res.contactNum);
                $("#EmployeeModal #civilStatus").val(res.civilStatus);
                $("#EmployeeModal #civilStatus").trigger('change');
                $("#EmployeeModal #bloodType").val(res.bloodType);
                $("#EmployeeModal #bloodType").trigger('change');

            }
        });
    });

    $(document).on('click', '.delete-btn2', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var row = $(this).closest('tr');
        console.log(row)
        if (confirm('Are you sure you want to delete this client?')) {
            var formdata = new FormData();
            formdata.append('id', id);
            formdata.append('submitType', 'delete');
            formdata.append("ignoreHeaderFooter", 1);
            $.ajax({
                url: '/del-client',
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,
                success: function(response) {
                    var res = JSON.parse(response);
                    if (res.status == "success") {
                        alert(res.message);
                        row.remove();
                    } else {
                        alert(res.message);
                    }
                },
                error: function() {
                    alert(
                        'Error occurred while deleting the account');
                }
            });
        }
    });
});
            </script>