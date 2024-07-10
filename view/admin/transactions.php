            <?php
            include_once("././model/transactionManageModel.php");
            $obj = new TransactionManageModel();
            $get = $obj->getAll();
            ?>

            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="row text-start py-3 px-2">
                        <!-- <div class="col-md-8 col-12 align-items-center d-flex justify-content-start">
                            <div class="card-header">
                                <h2>Client Transactions</h2>
                            </div>
                        </div> -->
                        <div class="col-md-12 col-12 align-items-center d-flex justify-content-end gap-3">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#StudentModal">
                                <i class="fa-solid fa-circle-plus"></i> Student
                            </button>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#EmployeeModal">
                                <i class="fa-solid fa-circle-plus"></i> Employee
                            </button>
                        </div>
                        <div class="col-md-12 col-12 align-items-center py-4 px-0 text-center d-flex justify-content-center"
                            style="width: 100%;">
                            <div class="table-responsive">
                                <table class="table caption-top table-striped table-hover" id="transactions"
                                    style="width: 100%;">
                                    <thead class="table-dark">
                                        <th scope="col">Client ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Role</th>
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
                                            <td class="clientID" style="width: 40px;"><?= $item['client_id'] ?></td>
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
                                                        <button type="button"
                                                            class="btn btn-info btn-cirlce btn-sm view-btn2"
                                                            data-id="<?= $item['client_id']; ?>" data-bs-toggle="modal"
                                                            data-bs-target="#view">
                                                            <i class="fa-solid fa-eye" style="padding: 0;"></i>
                                                            <!-- view -->
                                                        </button>
                                                        <?php
                                                        if($item['clientType'] == 'student') {
                                                        ?>
                                                        <button type="button"
                                                            class="btn btn-success btn-cirlce btn-sm edit-btn2"
                                                            data-id="<?= $item['client_id']; ?>" data-type="student"
                                                            data-bs-toggle="modal" data-bs-target="#editStudentModal">
                                                            <i class="fa-solid fa-pen-to-square"
                                                                style="padding: 0;"></i>
                                                            <!-- edit -->
                                                        </button>
                                                        <?php
                                                        } else {
                                                        ?>
                                                        <button type="button"
                                                            class="btn btn-success btn-cirlce btn-sm edit-btn2"
                                                            data-id="<?= $item['client_id']; ?>" data-type="employee"
                                                            data-bs-toggle="modal" data-bs-target="#editEmployeeModal">
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
            <!-- Add Modal -->
            <div class="modal fade" id="StudentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-2" id="staticBackdropLabel">Student Info</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post" id="addStudent" enctype="multipart/form-data">
                            <div class="modal-body" style="max-height: calc(100vh - 200px); overflow-y: auto;">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- Radio Buttons -->
                                            <div
                                                class="container-fluid d-flex flex-row justify-content-center align-content-center m-0 py-2 gap-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="formType"
                                                        value="New" id="new" checked onclick="text(0)">
                                                    <label class="form-check-label ps-2" for="new">New</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="formType"
                                                        value="Replacement" id="rep" onclick="text(1)">
                                                    <label class="form-check-label ps-2" for="rep">Replacement</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="formType"
                                                        value="Lost" id="lost" onclick="text(2)">
                                                    <label class="form-check-label ps-2" for="lost">Lost</label>
                                                </div>
                                            </div>
                                            <!-- Radio Buttons End -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h3>Enter your basic information correctly</h3>
                                            <div class="mb-3">
                                                <label for="">Student Number</label>
                                                <input type="text" name="studnum" id="studId"
                                                    placeholder="e.g. 2021-00398" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">WMSU Email</label>
                                                <input type="text" name="wmsuEmail" id="wmsuEmail"
                                                    placeholder="e.g. qb202100398@wmsu.edu.ph" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">First Name</label>
                                                <input type="text" name="firstName" id="fname"
                                                    placeholder="e.g. Angelo John" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Middle Name</label>
                                                <input type="text" name="middleName" id="mname"
                                                    placeholder="e.g. Sinsuan">
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Family Name</label>
                                                <input type="text" name="familyName" id="famname"
                                                    placeholder="e.g. Landiao" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Name Ext.</label>
                                                <input type="text" name="nameExt" id="ext" placeholder="e.g. Sr./Jr.">
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Program/Strand</label>
                                                <select class="js-example-theme-single" name="programs"
                                                    id="select-program">
                                                    <option value="">Select a program</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <h3>In Case of Emergency Please Notify:</h3>
                                            <div class="mb-3">
                                                <label for="">First Name</label>
                                                <input type="text" name="firstNameEmg" id="fnameEmg"
                                                    placeholder="e.g. Jazelle Anne" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Middle Name</label>
                                                <input type="text" name="middleNameEmg" id="mnameEmg"
                                                    placeholder="e.g. Sinsuan" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Family Name</label>
                                                <input type="text" name="familyNameEmg" id="famnameEmg"
                                                    placeholder="e.g. Landiao" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Name Ext.</label>
                                                <input type="text" name="nameExtEmg" id="extEmg"
                                                    placeholder="e.g. Sr./Jr." required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Address</label>
                                                <input type="text" name="address" id="addEmg"
                                                    placeholder="e.g. House #, Street name, Brgy/Subdivision, Town/City"
                                                    required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Contact Number</label>
                                                <input type="number" name="contactNumber" id="contactEmg"
                                                    placeholder="e.g. 09xxxxxxxxx" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <h3>Attachments</h3>
                                            <div class="mb-1">
                                                <label for="user-pic" class="form-label">2x2 Picture</label>
                                                <input class="form-control" name="userPhoto[]" type="file"
                                                    id="userPhoto">
                                            </div>
                                            <div class="mb-1">
                                                <label for="signature" class="form-label">Signature</label>
                                                <input class="form-control" name="signature[]" type="file"
                                                    id="signature">
                                            </div>
                                            <div class="mb-1">
                                                <label for="CoR" class="form-label">Certificate of Registration</label>
                                                <input class="form-control" name="cor[]" type="file" id="cor">
                                            </div>
                                            <div class="stud-replacement mb-1">
                                                <label for="frontID" class="form-label">Old ID - Front</label>
                                                <input class="form-control" name="oldId[]" type="file" id="frontId">
                                            </div>
                                            <div class="stud-replacement mb-1">
                                                <label for="backID" class="form-label">Old ID - Back</label>
                                                <input class="form-control" name="oldIdBack[]" type="file" id="backId">
                                            </div>
                                            <div class="stud-affidavit mb-1">
                                                <label for="affidavit" class="form-label">Affidavit of Loss</label>
                                                <input class="form-control" name="aol[]" type="file" id="affidavit">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="addStud" id="add" class="btn btn-primary">Add
                                    Student</button>
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
                            <h1 class="modal-title fs-2" id="staticBackdropLabel">Employee Info</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post" id="addStudent" enctype="multipart/form-data">
                            <div class="modal-body" style="max-height: calc(100vh - 200px); overflow-y: auto;">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- Radio Buttons -->
                                            <div
                                                class="container-fluid d-flex flex-row justify-content-center align-content-center m-0 py-2 gap-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="formType"
                                                        value="New" id="new" checked onclick="text(0)">
                                                    <label class="form-check-label ps-2" for="new">New</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="formType"
                                                        value="Replacement" id="rep" onclick="text(1)">
                                                    <label class="form-check-label ps-2" for="rep">Replacement</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="formType"
                                                        value="Lost" id="lost" onclick="text(2)">
                                                    <label class="form-check-label ps-2" for="lost">Lost</label>
                                                </div>
                                            </div>
                                            <!-- Radio Buttons End -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h3>Enter your basic information correctly</h3>
                                            <div>
                                                <label for="">ID Number</label>
                                                <input type="number" name="idNumber" id="idNumber"
                                                    placeholder="e.g. 2021-??" required>
                                            </div>
                                            <div>
                                                <label for="">WMSU Email</label>
                                                <input type="text" name="wmsuEmail" id="wmsuEmail"
                                                    placeholder="e.g. qb202100398@wmsu.edu.ph" required>
                                            </div>
                                            <div>
                                                <label for="">First Name</label>
                                                <input type="text" name="firstName" id="firstName"
                                                    placeholder="e.g. Angelo John" required>
                                            </div>
                                            <div>
                                                <label for="">Middle Name</label>
                                                <input type="text" name="middleName" id="middleName"
                                                    placeholder="e.g. Sinsuan">
                                            </div>
                                            <div>
                                                <label for="">Family Name</label>
                                                <input type="text" name="familyName" id="familyName"
                                                    placeholder="e.g. Landiao" required>
                                            </div>
                                            <div>
                                                <label for="">Name Ext.</label>
                                                <input type="text" name="nameExt" id="nameExt"
                                                    placeholder="e.g. Sr./Jr.">
                                            </div>
                                            <div>
                                                <label for="">Academic Rank/Plantilla Position</label>
                                                <input type="text" name="academicRank" id="academicRank"
                                                    placeholder="e.g. san juan" required>
                                            </div>
                                            <div>
                                                <label for="">Unit/Office/College/Department</label>
                                                <input type="text" name="designation" id="designation"
                                                    placeholder="e.g. san juan ambot" required>
                                            </div>
                                            <div>
                                                <label for="">Residential Address</label>
                                                <input type="text" name="residentialAddress" id="residentialAddress"
                                                    placeholder="e.g. san juan ambot" required>
                                            </div>
                                            <div class="birth">
                                                <label for="">Date of Birth</label>
                                                <input type="date" name="dateofbirth" id="dateofbirth" required>
                                                <!-- <div class="grouping">
                                            <input type="text" pattern="[0-9]*" name="day" placeholder="DD">
                                            <input type="text" pattern="[0-9]*" name="month" placeholder="MM">
                                            <input type="text" pattern="[0-9]*" name="year" placeholder="YYYY">
                                        </div> -->
                                            </div>
                                            <div>
                                                <label for="">Contact Number</label>
                                                <input type="number" name="contactNumber" id="contactNumber"
                                                    placeholder="09XXXXXXXX" required>
                                            </div>
                                            <div>
                                                <label for="">Civil Status</label>
                                                <select class="js-example-theme-single" name="civilStatus"
                                                    id="civilStatus">
                                                    <option value="">Single</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label for="">Blood Type</label>
                                                <select class="js-example-theme-single" name="bloodType" id="bloodType">
                                                    <option value="">A</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <h3>In Case of Emergency Please Notify:</h3>
                                            <div class="mb-3">
                                                <label for="">First Name</label>
                                                <input type="text" name="firstNameEmg" id="fnameEmg"
                                                    placeholder="e.g. Jazelle Anne" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Middle Name</label>
                                                <input type="text" name="middleNameEmg" id="mnameEmg"
                                                    placeholder="e.g. Sinsuan" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Family Name</label>
                                                <input type="text" name="familyNameEmg" id="famnameEmg"
                                                    placeholder="e.g. Landiao" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Name Ext.</label>
                                                <input type="text" name="nameExtEmg" id="extEmg"
                                                    placeholder="e.g. Sr./Jr." required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Address</label>
                                                <input type="text" name="address" id="addEmg"
                                                    placeholder="e.g. House #, Street name, Brgy/Subdivision, Town/City"
                                                    required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Contact Number</label>
                                                <input type="number" name="contactNumber" id="contactEmg"
                                                    placeholder="e.g. 09*******" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <h3>Attachments</h3>
                                            <div class="mb-3">
                                                <label for="formFile1" class="form-label">2x2 Picture</label>
                                                <input class="form-control" type="file" id="userPhoto"
                                                    name="userPhoto[]">
                                            </div>
                                            <div class="mb-3">
                                                <label for="formFile2" class="form-label">Signature</label>
                                                <input class="form-control" type="file" id="signature"
                                                    name="signature[]">
                                            </div>
                                            <div class="hrmo mb-3">
                                                <label for="formFile3" class="form-label">Scanned Copy of HRMO
                                                    Form</label>
                                                <input class="form-control" type="file" id="hrmoScanned"
                                                    name="hrmoScanned[]">
                                            </div>
                                            <div class="hrmo-lost mb-3">
                                                <label for="formFile4" class="form-label">New HRMO Form</label>
                                                <input class="form-control" type="file" id="hrmoNew" name="hrmoNew[]">
                                            </div>
                                            <div class="emp-affidavit mb-3">
                                                <label for="emp-affidavit" class="form-label">Affidavit of Loss</label>
                                                <input class="form-control" type="file" id="aol" name="aol[]">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="addStud" id="add" class="btn btn-primary">Add
                                    Student</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- edit modal -->
            <div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="editStudentModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-2" id="staticBackdropLabel">Student Info</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post" id="editStudent" enctype="multipart/form-data">
                            <div class="modal-body" style="max-height: calc(100vh - 200px); overflow-y: auto;">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="hidden" id="editformId" name="clientID">
                                            <!-- Radio Buttons -->
                                            <div
                                                class="container-fluid d-flex flex-row justify-content-center align-content-center m-0 py-2 gap-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="formType"
                                                        value="New" id="editType" checked onclick="text(0)">
                                                    <label class="form-check-label ps-2" for="new">New</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="formType"
                                                        value="Replacement" id="editType" onclick="text(1)">
                                                    <label class="form-check-label ps-2" for="rep">Replacement</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="formType"
                                                        value="Lost" id="editType" onclick="text(2)">
                                                    <label class="form-check-label ps-2" for="lost">Lost</label>
                                                </div>
                                            </div>
                                            <!-- Radio Buttons End -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h3>Enter your basic information correctly</h3>
                                            <div class="mb-3">
                                                <label for="">Student Number</label>
                                                <input type="text" name="studnum" id="edit-studId" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">WMSU Email</label>
                                                <input type="text" name="wmsuEmail" id="edit-wmsuEmail" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">First Name</label>
                                                <input type="text" name="firstName" id="edit-fname" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Middle Name</label>
                                                <input type="text" name="middleName" id="edit-mname">
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Family Name</label>
                                                <input type="text" name="familyName" id="edit-famname" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Name Ext.</label>
                                                <input type="text" name="nameExt" id="edit-ext">
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Program/Strand</label>
                                                <select class="js-example-theme-single" name="programs"
                                                    id="edit-select-program">
                                                    <option value="">Select a program</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <h3>In Case of Emergency Please Notify:</h3>
                                            <div class="mb-3">
                                                <label for="">First Name</label>
                                                <input type="text" name="firstNameEmg" id="edit-fnameEmg" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Middle Name</label>
                                                <input type="text" name="middleNameEmg" id="edit-mnameEmg" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Family Name</label>
                                                <input type="text" name="familyNameEmg" id="edit-famnameEmg" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Name Ext.</label>
                                                <input type="text" name="nameExtEmg" id="edit-extEmg" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Address</label>
                                                <input type="text" name="address" id="edit-addEmg" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Contact Number</label>
                                                <input type="number" name="contactNumber" id="edit-contactEmg" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <h3>Attachments</h3>
                                            <div class="mb-1">
                                                <label for="user-pic" class="form-label">2x2 Picture</label>
                                                <input class="form-control" name="userPhoto[]" type="file"
                                                    id="userPhoto">
                                            </div>
                                            <div class="mb-1">
                                                <label for="signature" class="form-label">Signature</label>
                                                <input class="form-control" name="signature[]" type="file"
                                                    id="signature">
                                            </div>
                                            <div class="mb-1">
                                                <label for="CoR" class="form-label">Certificate of Registration</label>
                                                <input class="form-control" name="cor[]" type="file" id="cor">
                                            </div>
                                            <div class="stud-replacement mb-1">
                                                <label for="frontID" class="form-label">Old ID - Front</label>
                                                <input class="form-control" name="oldId[]" type="file" id="frontId">
                                            </div>
                                            <div class="stud-replacement mb-1">
                                                <label for="backID" class="form-label">Old ID - Back</label>
                                                <input class="form-control" name="oldIdBack[]" type="file" id="backId">
                                            </div>
                                            <div class="stud-affidavit mb-1">
                                                <label for="affidavit" class="form-label">Affidavit of Loss</label>
                                                <input class="form-control" name="aol[]" type="file" id="affidavit">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="addStud" id="add" class="btn btn-primary">Add
                                    Student</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="editEmployeeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-2" id="staticBackdropLabel">Employee Info</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post" id="editStudent" enctype="multipart/form-data">
                            <div class="modal-body" style="max-height: calc(100vh - 200px); overflow-y: auto;">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="hidden" id="editformId" name="clientID">
                                            <!-- Radio Buttons -->
                                            <div
                                                class="container-fluid d-flex flex-row justify-content-center align-content-center m-0 py-2 gap-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="formType"
                                                        value="New" id="editType" checked onclick="text(0)">
                                                    <label class="form-check-label ps-2" for="new">New</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="formType"
                                                        value="Replacement" id="editType" onclick="text(1)">
                                                    <label class="form-check-label ps-2" for="rep">Replacement</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="formType"
                                                        value="Lost" id="editType" onclick="text(2)">
                                                    <label class="form-check-label ps-2" for="lost">Lost</label>
                                                </div>
                                            </div>
                                            <!-- Radio Buttons End -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h3>Enter your basic information correctly</h3>
                                            <div>
                                                <label for="">ID Number</label>
                                                <input type="number" name="idNumber" id="edit-idNumber" required>
                                            </div>
                                            <div>
                                                <label for="">WMSU Email</label>
                                                <input type="text" name="wmsuEmail" id="edit-wmsuEmail" required>
                                            </div>
                                            <div>
                                                <label for="">First Name</label>
                                                <input type="text" name="firstName" id="edit-fname" required>
                                            </div>
                                            <div>
                                                <label for="">Middle Name</label>
                                                <input type="text" name="middleName" id="edit-mname">
                                            </div>
                                            <div>
                                                <label for="">Family Name</label>
                                                <input type="text" name="familyName" id="edit-famname" required>
                                            </div>
                                            <div>
                                                <label for="">Name Ext.</label>
                                                <input type="text" name="nameExt" id="edit-ext">
                                            </div>
                                            <div>
                                                <label for="">Academic Rank/Plantilla Position</label>
                                                <input type="text" name="plantillaPos" id="edit-plantillaPos" required>
                                            </div>
                                            <div>
                                                <label for="">Unit/Office/College/Department</label>
                                                <input type="text" name="designation" id="edit-designation" required>
                                            </div>
                                            <div>
                                                <label for="">Residential Address</label>
                                                <input type="text" name="residentialAddress"
                                                    id="edit-residentialAddress" required>
                                            </div>
                                            <div class="birth">
                                                <label for="">Date of Birth</label>
                                                <input type="date" name="dateofbirth" id="edit-dateofbirth" required>
                                            </div>
                                            <div>
                                                <label for="">Contact Number</label>
                                                <input type="number" name="contactNumber" id="edit-contactNumber"
                                                    required>
                                            </div>
                                            <div>
                                                <label for="">Civil Status</label>
                                                <select class="js-example-theme-single" name="civilStatus"
                                                    id="edit-civilStatus">
                                                    <option value="">Single</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label for="">Blood Type</label>
                                                <select class="js-example-theme-single" name="bloodType"
                                                    id="edit-bloodType">
                                                    <option value="">A</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <h3>In Case of Emergency Please Notify:</h3>
                                            <div class="mb-3">
                                                <label for="">First Name</label>
                                                <input type="text" name="firstNameEmg" id="edit-fnameEmg" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Middle Name</label>
                                                <input type="text" name="middleNameEmg" id="edit-mnameEmg" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Family Name</label>
                                                <input type="text" name="familyNameEmg" id="edit-famnameEmg" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Name Ext.</label>
                                                <input type="text" name="nameExtEmg" id="edit-extEmg" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Address</label>
                                                <input type="text" name="address" id="edit-addEmg" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Contact Number</label>
                                                <input type="number" name="contactNumber" id="edit-contactEmg" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <h3>Attachments</h3>
                                            <div class="mb-3">
                                                <label for="formFile1" class="form-label">2x2 Picture</label>
                                                <input class="form-control" type="file" id="userPhoto"
                                                    name="userPhoto[]">
                                            </div>
                                            <div class="mb-3">
                                                <label for="formFile2" class="form-label">Signature</label>
                                                <input class="form-control" type="file" id="signature"
                                                    name="signature[]">
                                            </div>
                                            <div class="hrmo mb-3">
                                                <label for="formFile3" class="form-label">Scanned Copy of HRMO
                                                    Form</label>
                                                <input class="form-control" type="file" id="hrmoScanned"
                                                    name="hrmoScanned[]">
                                            </div>
                                            <div class="hrmo-lost mb-3">
                                                <label for="formFile4" class="form-label">New HRMO Form</label>
                                                <input class="form-control" type="file" id="hrmoNew" name="hrmoNew[]">
                                            </div>
                                            <div class="emp-affidavit mb-3">
                                                <label for="emp-affidavit" class="form-label">Affidavit of Loss</label>
                                                <input class="form-control" type="file" id="aol" name="aol[]">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="addStud" id="add" class="btn btn-primary">Add
                                    Student</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <script>
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

    // $('#addAccountModal .js-example-basic-single').select2({
    //     placeholder: 'Select An Option',
    //     dropdownParent: $('#addAccountModal')
    // });
    // // Initialize Select2 for Edit Account Modal
    // $('#editAccountModal .js-example-basic-single').select2({
    //     placeholder: 'Select An Option',
    //     dropdownParent: $('#editAccountModal')
    // });

    $(document).on('submit', '#addStudent', function(e) {
        e.preventDefault();
        var formdata = new FormData(this);
        formdata.append("type", "addStud");
        //formdata.append("type2", "addStud");
        formdata.append("ignoreHeaderFooter", 1);

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
                $('#addStudent').find('input').val('');
                $('#addStudent').find('select').val('');
            },
            error: function(error) {
                console.log(error);
                alert('Error submitting form');
            }
        });
    });
    $("#editStudent").on("submit", function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append("type2", "updateClient");
        formData.append("ignoreHeaderFooter", 1);
        /*$.ajax({
            type: 'POST',
            url: "",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                var res = JSON.parse(response);
                if (res.status == 'success') {
                    alert(res.message);
                    location.reload();
                }
                console.log(response);
            }
        })*/
    });

    $(document).on('click', '.edit-btn2', function(e) {
        e.preventDefault();
        var selectedID = $(this).closest('tr').find('.clientID').text();

        console.log(e.currentTarget.getAttribute('data-type'));

        var formData = new FormData();
        formData.append("type", "viewClients");
        formData.append("selectedType", e.currentTarget.getAttribute('data-type'));
        formData.append('clientID', selectedID);
        formData.append("ignoreHeaderFooter", 1);

        $.ajax({
            type: 'POST',
            url: '/edit-users',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                var res = JSON.parse(response);
                console.log(res);
                // student
                $("#edit-studId").val(res.studentNum);
                $("#editStudentModal #edit-wmsuEmail").val(res.wmsuEmail);
                $("#editStudentModal #edit-fname").val(res.firstName);
                $("#editStudentModal #edit-mname").val(res.middleName);
                $("#editStudentModal #edit-famname").val(res.lastName);
                $("#editStudentModal #edit-ext").val(res.nameExt);
                $("#editStudentModal #edit-select-program").val(res.collegeProgram);
                $("#editStudentModal #edit-fnameEmg").val(res.emergencyFirstName);
                $("#editStudentModal #edit-mnameEmg").val(res.emergencyMiddleName);
                $("#editStudentModal #edit-famnameEmg").val(res.emergencyLastName);
                $("#editStudentModal #edit-extEmg").val(res.emergencyNameExt);
                $("#editStudentModal #edit-addEmg").val(res.emergencyAddress);
                $("#editStudentModal #edit-contactEmg").val(res.emergencyContactNum);
                // employee
                $("#edit-idNumber").val(res.empNum);
                $("#editEmployeeModal #edit-wmsuEmail").val(res.wmsuEmail);
                $("#editEmployeeModal #edit-fname").val(res.firstName);
                $("#editEmployeeModal #edit-mname").val(res.middleName);
                $("#editEmployeeModal #edit-famname").val(res.lastName);
                $("#editEmployeeModal #edit-ext").val(res.nameExt);
                $("#editEmployeeModal #edit-select-program").val(res.collegeProgram);
                $("#editEmployeeModal #edit-fnameEmg").val(res.emergencyFirstName);
                $("#editEmployeeModal #edit-mnameEmg").val(res.emergencyMiddleName);
                $("#editEmployeeModal #edit-famnameEmg").val(res.emergencyLastName);
                $("#editEmployeeModal #edit-extEmg").val(res.emergencyNameExt);
                $("#editEmployeeModal #edit-addEmg").val(res.emergencyAddress);
                $("#editEmployeeModal #edit-contactEmg").val(res.emergencyContactNum);

                $("#edit-plantillaPos").val(res.plantillaPos);
                $("#edit-designation").val(res.designation);
                $("#edit-residentialAddress").val(res.residentialAddress);
                $("#edit-dateofbirth").val(res.birthDate);
                $("#edit-contactNumber").val(res.contactNum);
                $("#edit-civilStatus").val(res.civilStatus);
                $("#edit-bloodType").val(res.bloodType);
            }
        });
    });
});

$(document).on('click', '.delete-btn2', function(e) {
    e.preventDefault();
    var id = $(this).data('client_id');
    console.log(id)
    if (confirm('Are you sure you want to delete this client?')) {
        var formData = new FormData();
        formData.append('id', id);
        formData.append('type', 'delete');
        $.ajax({
            url: '/del-client',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);
                var res = JSON.parse(response);
                if (res.success) {
                    alert(res.message);
                    row.remove();
                } else {
                    alert(res.message);
                }
                location.reload();
            },
            error: function() {
                alert(
                    'Error occurred while deleting the account');
            }
        });
    }
});
            </script>