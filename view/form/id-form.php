<?php
include_once("././model/formConfigurationModel.php");
$obj = new formConfigModel();
$get = $obj->getForm();
?>
<div class="form-container px-0 py-3 m-0">
    <div class="container-fluid">
        <!-- tabs -->
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center mb-3">
                <div class="nav-box">
                    <ul class="nav nav-pills justify-content-center align-item-center" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="Student" data-bs-toggle="pill"
                                data-bs-target="#pills-student" type="button" role="tab" aria-controls="pills-student"
                                aria-selected="true">Student</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="Employee" data-bs-toggle="pill"
                                data-bs-target="#pills-employee" type="button" role="tab" aria-controls="pills-employee"
                                aria-selected="false">Employee</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- content -->
        <div class="tab-content" id="pills-tabContent">
            <!-- student tab -->
            <div class="tab-pane fade show active" id="pills-student" role="tabpanel" aria-labelledby="student"
                tabindex="0">
                <div class="row p-0 m-0">
                    <div class=" col-md-12 py-1">
                        <div id="page" class="site">
                            <div class="form-box">
                                <div class="form-progress text-center">
                                    <div class="form-type">
                                        <h2 class="m-0 pb-1"><span>Student</span> Form</h2>
                                    </div>
                                    <?php
                                    if ($get) {
                                    ?>
                                    <div class="update-text py-2 mb-4">
                                        <p class="lead" id="upressFR">
                                            WMSU-UPRESS-FR-<?= $get['StudentFormVersion']['value'] ?></p>
                                        <p class="lead" id="effectDate">Effective Date:
                                            <?= $get['StudentFormEDate']['value'] ?></p>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                    <ul class="progress-steps text-center px-2 mb-0">
                                        <li class="step active">
                                            <span>1</span>
                                            <p>Basic <br><span>Student Information</span></p>
                                        </li>
                                        <li class="step">
                                            <span>2</span>
                                            <p>Emergency <br><span>Contact Information</span></p>
                                        </li>
                                        <li class="step">
                                            <span>3</span>
                                            <p>Attachments <br><span>Attach the specified<br>files</span></p>
                                        </li>
                                    </ul>
                                </div>
                                <form method="post" id="studentForm" enctype="multipart/form-data">
                                    <div class="form-one form-step active">
                                        <div class="container-fluid p-0">
                                            <div class="form-layout">
                                                <div class="row justify-content-center m-0 p-2">
                                                    <div class="col-lg-10 col-md-12 text-center py-2">
                                                        <h4>Student Information</h4>
                                                    </div>
                                                    <div class="col-lg-10 col-md-12 text-center py-2">
                                                        <!-- Radio Buttons -->
                                                        <div class="m-0">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="formType" value="New" id="new" checked
                                                                    onclick="view(0)">
                                                                <label class="form-check-label" for="new">New</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="formType" value="Replacement" id="rep"
                                                                    onclick="view(1)">
                                                                <label class="form-check-label"
                                                                    for="rep">Replacement</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="formType" value="Lost" id="lost"
                                                                    onclick="view(2)">
                                                                <label class="form-check-label" for="lost">Lost</label>
                                                            </div>
                                                        </div>
                                                        <!-- Radio Buttons End -->
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-2">
                                                            <label for="">First Name
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" name="firstName" id="fname" required>
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="">Middle Name</label>
                                                            <input type="text" name="middleName" id="mname">
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-9">
                                                                <div class="mb-2">
                                                                    <label for="">Family Name
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <input type="text" name="familyName" id="famname"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="mb-2">
                                                                    <label for="">Suffix</label>
                                                                    <select class="form-control select-suffix"
                                                                        name="nameExt" id="ext">
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
                                                    <div class="col-md-4">
                                                        <div class="mb-2">
                                                            <label for="">Email
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" name="email" id="wmsuEmail" required>
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="">Student ID
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" name="studnum" id="studId" required>
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="select-program">Program/Strand
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <select class="program-strand-single" name="programs"
                                                                id="select-program">
                                                                <option value=""></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-two form-step">
                                        <div class="container-fluid p-0">
                                            <div class="form-layout">
                                                <div class="row justify-content-center m-0 p-2">
                                                    <div class="col-lg-10 col-md-12 text-center py-2">
                                                        <h4>Emergency Contact Information</h4>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-2">
                                                            <label for="">First Name
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" name="firstNameEmg" id="fnameEmg"
                                                                required>
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="">Middle Name</label>
                                                            <input type="text" name="middleNameEmg" id="mnameEmg">
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="">Family Name
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" name="familyNameEmg" id="famnameEmg"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-2">
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
                                                        <div class="mb-2">
                                                            <label for="">Address
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" name="address" id="addEmg"
                                                                placeholder="House #, Street name, Barangay, Town/City"
                                                                required>
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="">Contact Number
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="number" name="contactNumber" id="contactEmg"
                                                                required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-three form-step">
                                        <div class="container-fluid p-0">
                                            <div class="form-layout">
                                                <div class="row justify-content-center m-0 p-2">
                                                    <div class="col-lg-10 col-md-12 text-center py-2">
                                                        <h4>Attachments</h4>
                                                        <p>Photo & Signature are optional.</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-2">
                                                            <div class="row d-flex justify-content-start">
                                                                <div class="col-xl-1 col-lg-2 col-md-2 col-2 pe-0">
                                                                    <div class="optional">
                                                                        <input type="checkbox" class="checkbox-popover"
                                                                            id="toggleSwitchuserPhoto"
                                                                            data-bs-placement="top"
                                                                            data-bs-content="I won't provide"
                                                                            data-bs-trigger="focus"
                                                                            data-target="userPhoto">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2 col-md-2 col-3 ps-1">
                                                                    <label for="userPhoto"
                                                                        class="form-label">Photo</label>
                                                                </div>
                                                            </div>
                                                            <input class="form-control" name="userPhoto[]" type="file"
                                                                id="userPhoto" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <div class="row d-flex justify-content-start">
                                                                <div class="col-xl-2 col-lg-2 col-md-2 col-2 pe-0">
                                                                    <div class="optional">
                                                                        <input type="checkbox" class="checkbox-popover"
                                                                            id="toggleSwitchsignature"
                                                                            data-bs-placement="top"
                                                                            data-bs-content="I won't provide"
                                                                            data-bs-trigger="focus"
                                                                            data-target="signature">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2 col-md-2 col-3 ps-1">
                                                                    <label for="signature"
                                                                        class="form-label">Signature</label>
                                                                </div>
                                                            </div>
                                                            <input class="form-control" name="signature[]" type="file"
                                                                id="signature" required>
                                                        </div>
                                                        <div class="mb-2 text-center">
                                                            <p>Please ensure the following files are provided.</p>
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="CoR" class="form-label">
                                                                Certificate of Registration
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input class="form-control" name="cor[]" type="file"
                                                                id="cor" required>
                                                        </div>
                                                        <div class="stud-replacement mb-2">
                                                            <label for="frontID" class="form-label">
                                                                Front side of old ID
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input class="form-control" name="oldId[]" type="file"
                                                                id="frontId" required>
                                                        </div>
                                                        <div class="stud-replacement mb-2">
                                                            <label for="backID" class="form-label">
                                                                Back side of old ID
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input class="form-control" name="oldIdBack[]" type="file"
                                                                id="backId">
                                                        </div>
                                                        <div class="stud-affidavit mb-2">
                                                            <label for="affidavit" class="form-label">
                                                                Affidavit of Loss
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input class="form-control" name="aol[]" type="file"
                                                                id="affidavit">
                                                        </div>
                                                        <div class="stud-dsa mb-2">
                                                            <label for="DSA" class="form-label">
                                                                DSA Form
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input class="form-control" name="dsa[]" type="file"
                                                                id="dsa">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="group-btn">
                                        <button type="button" class="btn-prev" disabled>Back</button>
                                        <button type="button" class="btn-next">Next</button>
                                        <button type="submit" class="btn-submit" disabled>Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- employee tab -->
            <div class="tab-pane fade" id="pills-employee" role="tabpanel" aria-labelledby="employee" tabindex="0">
                <div class="row p-0 m-0">
                    <div class="col-md-12 py-1">
                        <div id="page" class="site">
                            <div class="form-box">
                                <div class="form-progress text-center">
                                    <div class="form-type">
                                        <h2 class="m-0 pb-1"><span>Employee</span> Form</h2>
                                    </div>
                                    <?php
                                    if ($get) {
                                    ?>
                                    <div class="update-text py-2 mb-4">
                                        <p class="lead" id="upressFR">
                                            WMSU-UPRESS-FR-<?= $get['EmployeeFormVersion']['value'] ?></p>
                                        <p class="lead" id="effectDate">Effective Date:
                                            <?= $get['EmployeeFormEDate']['value'] ?></p>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                    <ul class="progress-steps text-center px-2 mb-0">
                                        <li class="step active">
                                            <span>1</span>
                                            <p>Basic <br><span>Employe Information</span></p>
                                        </li>
                                        <li class="step">
                                            <span>2</span>
                                            <p>Emergency <br><span>Contact Information</span></p>
                                        </li>
                                        <li class="step">
                                            <span>3</span>
                                            <p>Attachments <br><span>Attach the specified<br>files</span></p>
                                        </li>
                                    </ul>
                                </div>
                                <form method="post" id="employeeForm" enctype="multipart/form-data">
                                    <div class="form-one form-step active">
                                        <div class="container-fluid p-0">
                                            <div class="form-layout">
                                                <div class="row justify-content-center m-0 p-2">
                                                    <div class="col-lg-10 col-md-12 text-center py-2">
                                                        <h4>Employee Information</h4>
                                                    </div>
                                                    <div class="col-lg-5 col-md-12 text-center py-2">
                                                        <!-- Radio Buttons -->
                                                        <div class="container-fluid d-flex flex-row justify-content-center 
                                                            align-content-center m-0 py-2 gap-2">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="formType" value="New" id="new" checked
                                                                    onclick="view(0)">
                                                                <label class="form-check-label ps-2"
                                                                    for="new">New</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="formType" value="Replacement" id="rep"
                                                                    onclick="view(1)">
                                                                <label class="form-check-label ps-2"
                                                                    for="rep">Replacement</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="formType" value="Lost" id="lost"
                                                                    onclick="view(2)">
                                                                <label class="form-check-label ps-2"
                                                                    for="lost">Lost</label>
                                                            </div>
                                                        </div><!-- Radio Buttons End -->
                                                    </div>
                                                    <div class="col-lg-5 col-md-12 text-center py-2">
                                                        <div class="m-0 py-2 gap-2 d-flex justify-content-center">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="teachingnon" id="teach" checked
                                                                    onclick="teachingnon(0)">
                                                                <label class="form-check-label ps-2"
                                                                    for="teach">Teaching</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="teachingnon" id="nonteach"
                                                                    onclick="teachingnon(1)">
                                                                <label class="form-check-label ps-2"
                                                                    for="nonteach">Non-Teaching</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-6 col-md-12">
                                                        <div class="mb-2">
                                                            <label for="">First Name
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" name="firstName" id="firstName" required>
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="">Middle Name</label>
                                                            <input type="text" name="middleName" id="middleName">
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="">Family Name
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input type=" text" name="familyName" id="familyName"
                                                                required>
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="">Suffix</label>
                                                            <select class="form-control select-suffix" name="nameExt"
                                                                id="nameExt">
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
                                                    <div class="col-xl-4 col-lg-6 col-md-12">
                                                        <div class="mb-2">
                                                            <label for="">Email
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" name="email" id="wmsuEmail" required>
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="">ID Number
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="number" name="idNumber" id="idNumber" required>
                                                        </div>
                                                        <div class="acad-rank mb-2">
                                                            <label for="">Academic Rank
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <select class="academicRank-basic-single"
                                                                name="academicRank" id="academicRank" required>
                                                                <option value=""></option>
                                                                <optgroup label="Instructor">
                                                                    <option value="Instructor-1">Instructor I</option>
                                                                    <option value="Instructor-2">Instructor II</option>
                                                                    <option value="Instructor-3">Instructor III</option>
                                                                </optgroup>
                                                                <optgroup label="Assistant Professor">
                                                                    <option value="Asst-Prof-1">Assistant Professor I
                                                                    </option>
                                                                    <option value="Asst-Prof-2">Assistant Professor II
                                                                    </option>
                                                                    <option value="Asst-Prof-3">Assistant Professor III
                                                                    </option>
                                                                    <option value="Asst-Prof-4">Assistant Professor IV
                                                                    </option>
                                                                </optgroup>
                                                                <optgroup label="Associate Professor">
                                                                    <option value="Assoc-Prof-1">Associate Professor I
                                                                    </option>
                                                                    <option value="Assoc-Prof-2">Associate Professor II
                                                                    </option>
                                                                    <option value="Assoc-Prof-3">Associate Professor III
                                                                    </option>
                                                                    <option value="Assoc-Prof-4">Associate Professor IV
                                                                    </option>
                                                                    <option value="Assoc-Prof-5">Associate Professor V
                                                                    </option>
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
                                                                    <option value="University-Prof">University Professor
                                                                    </option>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                        <div class="plant-pos mb-2">
                                                            <label for="">Plantilla Position
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" class="form-control" name="plantillaPos"
                                                                id="plantillaPos" required>
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="">Unit/Office/College/Department
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" name="designation" id="designation"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-6 col-md-12">
                                                        <div class="mb-2">
                                                            <label for="">Residential Address
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" name="residentialAddress"
                                                                id="residentialAddress" required>
                                                        </div>
                                                        <div class="birth mb-2">
                                                            <label for="">Date of Birth
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="date" name="dateofbirth" id="dateofbirth"
                                                                required>
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="">Contact Number
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="number" name="contactNumber" id="contactNumber"
                                                                required>
                                                        </div>
                                                        <div class="mb-2">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="">Civil Status
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <select class="civilstatus-single form-control"
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
                                                                <div class="col-md-6">
                                                                    <label for="">Blood Type
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <select class="bloodType-single form-control"
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-two form-step">
                                        <div class="container-fluid p-0">
                                            <div class="form-layout">
                                                <div class="row justify-content-center m-0 p-2">
                                                    <div class="col-lg-10 col-md-12 text-center py-2">
                                                        <h4>Emergency Contact Information</h4>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-2">
                                                            <label for="">First Name
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" name="emergencyFirstName"
                                                                id="emergencyFirstName" required>
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="">Middle Name</label>
                                                            <input type="text" name="emergencyMiddleName"
                                                                id="emergencyMiddleName">
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="">Family Name
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" name="emergencyFamilyName"
                                                                id="emergencyFamilyName" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-2">
                                                            <label for="">Suffix</label>
                                                            <input type="text" name="emergencyNameExt"
                                                                id="emergencyNameExt" placeholder="(e.g., Jr., III)">
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="">Address
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" name="emergencyAddress"
                                                                id="emergencyAddress"
                                                                placeholder="House #, Street name, Barangay, Town/City"
                                                                required>
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="">Contact Number
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="number" name="emergencyContact"
                                                                id="emergencyContact" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-three form-step">
                                        <div class="container-fluid p-0">
                                            <div class="form-layout">
                                                <div class="row justify-content-center m-0 p-2">
                                                    <div class="col-lg-10 col-md-12 text-center py-2">
                                                        <h4>Attachments</h4>
                                                        <p>You may include your photo and signature if available, but
                                                            please ensure the following files are provided.</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-2">
                                                            <div class="row d-flex justify-content-start">
                                                                <div class="col-xl-1 col-lg-2 col-md-2 col-2 pe-0">
                                                                    <div class="optional">
                                                                        <input type="checkbox" class="checkbox-popover"
                                                                            id="toggleSwitchuserPhoto1"
                                                                            data-bs-placement="top"
                                                                            data-bs-content="I won't provide"
                                                                            data-bs-trigger="focus"
                                                                            data-target="userPhoto1">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2 col-md-2 col-3 ps-1">
                                                                    <label for="userPhoto"
                                                                        class="form-label">Photo</label>
                                                                </div>
                                                            </div>
                                                            <input class="form-control" name="userPhoto[]" type="file"
                                                                id="userPhoto1" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <div class="row d-flex justify-content-start">
                                                                <div class="col-xl-1 col-lg-2 col-md-2 col-2 pe-0">
                                                                    <div class="optional">
                                                                        <input type="checkbox" class="checkbox-popover"
                                                                            id="toggleSwitchsignature1"
                                                                            data-bs-placement="top"
                                                                            data-bs-content="I won't provide"
                                                                            data-bs-trigger="focus"
                                                                            data-target="signature1">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2 col-md-2 col-3 ps-1">
                                                                    <label for="signature"
                                                                        class="form-label">Signature</label>
                                                                </div>
                                                            </div>
                                                            <input class="form-control" name="signature[]" type="file"
                                                                id="signature1" required>
                                                        </div>
                                                        <div class="mb-2 text-center">
                                                            <p>Provide the scanned copy of
                                                                the following files:</p>
                                                        </div>
                                                        <div class="hrmo mb-2">
                                                            <label for="formFile3" class="form-label">
                                                                HRMO Form
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input class="form-control" type="file" id="hrmoScanned"
                                                                name="hrmoScanned[]">
                                                        </div>
                                                        <div class="hrmo-lost mb-2">
                                                            <label for="formFile4" class="form-label">
                                                                New HRMO Form
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input class="form-control" type="file" id="hrmoNew"
                                                                name="hrmoNew[]">
                                                        </div>
                                                        <div class="emp-affidavit mb-2">
                                                            <label for="emp-affidavit" class="form-label">
                                                                Affidavit of Loss
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input class="form-control" type="file" id="aol"
                                                                name="aol[]">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="group-btn">
                                        <button type="button" class="btn-prev" disabled>Back</button>
                                        <button type="button" class="btn-next">Next</button>
                                        <button type="submit" class="btn-submit" disabled>Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
// Function to reload the page and store the clicked tab ID
function reloadPage(tabId) {
    localStorage.setItem('activeTab', tabId);
    location.reload();
}

// Add event listeners to the tab buttons
document.getElementById('Student').addEventListener('click', function() {
    reloadPage('Student');
});

document.getElementById('Employee').addEventListener('click', function() {
    reloadPage('Employee');
});

// On page load, check for the stored active tab ID and set the active tab
document.addEventListener('DOMContentLoaded', function() {
    var activeTab = localStorage.getItem('activeTab');
    if (activeTab) {
        // Remove the active class from all tab links and tab contents
        document.querySelectorAll('.nav-link').forEach(function(link) {
            link.classList.remove('active');
            link.setAttribute('aria-selected', 'false');
        });
        document.querySelectorAll('.tab-pane').forEach(function(pane) {
            pane.classList.remove('show', 'active');
        });

        // Add the active class to the active tab link and content
        document.getElementById(activeTab).classList.add('active');
        document.getElementById(activeTab).setAttribute('aria-selected', 'true');
        var tabContent = document.querySelector(activeTab === 'Student' ? '#pills-student' : '#pills-employee');
        tabContent.classList.add('show', 'active');

        // Clear the stored active tab ID after setting the active tab
        localStorage.removeItem('activeTab');
    }
});
</script>

<script>
$(document).ready(function() {
    $('.select-suffix').select2({
        placeholder: 'Jr.',
        theme: 'bootstrap',
        allowClear: true,
    });
    $('.program-strand-single').select2({
        placeholder: 'Select a program',
        theme: 'bootstrap',
        allowClear: true,
        dropdownParent: $('#studentForm')
    });
    $('.academicRank-basic-single').select2({
        placeholder: 'Select Academic Rank',
        theme: 'bootstrap',
        allowClear: true,
        dropdownParent: $('#employeeForm')
    });
    $('.civilstatus-single').select2({
        placeholder: 'Single',
        theme: 'bootstrap',
        allowClear: true,
        dropdownParent: $('#employeeForm')
    });
    $('.bloodType-single').select2({
        placeholder: 'A+',
        theme: 'bootstrap',
        allowClear: true,
        dropdownParent: $('#employeeForm')
    });
});

$(document).ready(function() {
    $('#studentForm').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append("type", "Student"); // Add the additional field
        console.log(formData);
        $.ajax({
            type: 'POST',
            url: '/request-id',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
                alert('Form submitted successfully');
                $('#studentForm').find('input').val('');
                $('#studentForm').find('select').val('');
                location.reload(); //refresh page
            },
            error: function(error) {
                console.log(error);
                alert('Error submitting form');
            }
        });
    });

    $('#employeeForm').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append("type", "Employee"); // Add the additional field
        $.ajax({
            type: 'POST',
            url: '/request-id',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
                alert('Form submitted successfully');
                $('#employeeForm').find('input').val('');
                $('#employeeForm').find('select').val('');
                location.reload(); //refresh page
            },
            error: function(error) {
                console.log(error);
                alert('Error submitting form');
            }
        });
    });
});
</script>