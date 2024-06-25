<div class="form-container container-fluid px-0 py-3 m-0">
    <!-- tabs -->
    <div class="nav-box container-fluid mb-2">
        <ul class="nav nav-pills justify-content-center align-item-center" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="student" data-bs-toggle="pill" 
                    data-bs-target="#pills-student" type="button" role="tab" aria-controls="pills-student" 
                    aria-selected="true">Student</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="employee" data-bs-toggle="pill" 
                data-bs-target="#pills-employee" type="button" role="tab" aria-controls="pills-employee" 
                aria-selected="false">Employee</button>
            </li>
        </ul>
    </div>
    <!-- content -->
    <div class="tab-content" id="pills-tabContent">
        <!-- student tab -->
        <div class="tab-pane fade show active" id="pills-student"
            role="tabpanel" aria-labelledby="student" tabindex="0">
            <div class="row p-0 m-0">
                <div class="col-lg-7 col-md-12 py-1">
                    <div id="page" class="site">
                        <div class="form-box">
                            <div class="form-progress text-center">
                                <div class="form-type"><h2 class="m-0 pb-1"><span>Student</span> Form</h2></div>
                                <div class="update-text py-2 mb-4">
                                    <p class="lead" id="upressFR">WMSU-UPRESS-FR-003.00</p>
                                    <p class="lead" id="effectDate">Effective Date: 01-Mar-2017</p>
                                </div>
                                <ul class="progress-steps text-start px-2">
                                    <li class="step active">
                                        <span>1</span>
                                        <p>Basic <br><span>90 secs to complete</span></p>
                                    </li>
                                    <li class="step">
                                        <span>2</span>
                                        <p>Emergency <br><span>60 secs to complete</span></p>
                                    </li>
                                    <li class="step">
                                        <span>3</span>
                                        <p>Attachments <br><span>80 secs to complete</span></p>
                                    </li> 
                                </ul>
                            </div>
                            <form id="studentForm" action="post">
                                <div class="form-one form-step active">
                                    <h3>Student Info</h3>
                                    <p>Enter your basic information correctly</p>
                                    <!-- Radio Buttons -->
                                    <div class="container-fluid d-flex flex-row justify-content-center align-content-center m-0 py-2 gap-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="radioType" value="new" id="new" checked
                                                onclick="text(0)">
                                            <label class="form-check-label ps-2" for="new">New</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="radioType" value="replacement" id="rep" 
                                                onclick="text(1)">
                                            <label class="form-check-label ps-2" for="rep">Replacement</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="radioType" value="lost" id="lost"
                                                onclick="text(2)">
                                            <label class="form-check-label ps-2" for="lost">Lost</label>
                                        </div>
                                    </div>
                                    <!-- Radio Buttons End -->
                                    <div>
                                        <label for="">Student Number</label>
                                        <input type="text" name="studentId" placeholder="e.g. 2021-00398">
                                    </div>
                                    <div>
                                        <label for="">WMSU Email</label>
                                        <input type="text" name="studentEmail" placeholder="e.g. qb202100398@wmsu.edu.ph">
                                    </div>
                                    <div>
                                        <label for="">First Name</label>
                                        <input type="text" name="firstName" placeholder="e.g. Angelo John">
                                    </div>
                                    <div>
                                        <label for="">Middle Name</label>
                                        <input type="text" name="middleName" placeholder="e.g. Sinsuan">
                                    </div>
                                    <div>
                                        <label for="">Family Name</label>
                                        <input type="text" name="familyName" placeholder="e.g. Landiao">
                                    </div>
                                    <div>
                                        <label for="">Name Ext.</label>
                                        <input type="text" name="nameExt" placeholder="e.g. Sr./Jr.">
                                    </div>
                                    <div>
                                        <label for="">Program/Strand</label>
                                        <select class="js-example-theme-single" name="programs" id="select-program">
                                            <option value="">Select a program</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-two form-step">
                                    <h3>In Case of Emergency Please Notify:</h3>
                                    <div>
                                        <label for="">First Name</label>
                                        <input type="text" name="firstNameEmg" placeholder="e.g. Jazelle Anne">
                                    </div>
                                    <div>
                                        <label for="">Middle Name</label>
                                        <input type="text" name="middleNameEmg" placeholder="e.g. Sinsuan">
                                    </div>
                                    <div>
                                        <label for="">Family Name</label>
                                        <input type="text" name="familyNameEmg" placeholder="e.g. Landiao">
                                    </div>
                                    <div>
                                        <label for="">Name Ext.</label>
                                        <input type="text" name="nameExtEmg" placeholder="e.g. Sr./Jr.">
                                    </div>
                                    <div>
                                        <label for="">Address</label>
                                        <input type="text" name="address" placeholder="e.g. House #, Street name, Brgy/Subdivision, Town/City">
                                    </div>
                                    <div>
                                        <label for="">Contact Number</label>
                                        <input type="tel" name="contactNumber" placeholder="e.g. 09xxxxxxxxx">
                                    </div>
                                </div>
                                <div class="form-three form-step">
                                    <h3>Attachments</h3>
                                    <div class="mb-3">
                                        <label for="user-pic" class="form-label">2x2 Picture</label>
                                        <input class="form-control" name="userPic" type="file" id="user-pic">
                                    </div>
                                    <div class="mb-3">
                                        <label for="signature" class="form-label">Signature</label>
                                        <input class="form-control" name="signature" type="file" id="signature">
                                    </div>
                                    <div class="mb-3">
                                        <label for="CoR" class="form-label">Certificate of Registration</label>
                                        <input class="form-control" name="certificate" type="file" id="CoR">
                                    </div>
                                    <div class="stud-replacement mb-3">
                                        <label for="frontID" class="form-label">Old ID - Front</label>
                                        <input class="form-control" name="oldId" type="file" id="frontID">
                                    </div>
                                    <div class="stud-replacement mb-3">
                                        <label for="backID" class="form-label">Old ID - Back</label>
                                        <input class="form-control" name="oldIdBack" type="file" id="backID">
                                    </div>
                                    <div class="stud-affidavit mb-3">
                                        <label for="affidavit" class="form-label">Affidavit of Loss</label>
                                        <input class="form-control" name="affidavit" type="file" id="affidavit">
                                    </div>
                                </div>
                                <div class="group-btn">
                                    <button type="button" class="btn-prev" disabled>Back</button>
                                    <button type="button" class="btn-next">Next Step</button>
                                    <button type="submit" class="btn-submit" disabled>Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- id layout -->
                <div class="col-lg-5 col-md-12 py-1 px-5 text-center">
                    <h2 class="pb-4">ID Layout</h2>
                    <div class="row flex-row">
                        <div class="col-md-6">
                            <img src="../../assets/custom/id-layout/front-student.svg" class="img-fluid" alt="Student ID Front">
                        </div>
                        <div class="col-md-6">
                            <img src="../../assets/custom/id-layout/back-student.svg" class="img-fluid" alt="Student ID Back">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- employee tab -->
        <div class="tab-pane fade" id="pills-employee" 
            role="tabpanel" aria-labelledby="employee" tabindex="0">
            <div class="row p-0 m-0">
                <div class="col-lg-7 col-md-12 py-1">
                    <div id="page" class="site">
                        <div class="form-box">
                            <div class="form-progress text-center">
                                <div class="form-type"><h2 class="m-0 pb-1"><span>Employee</span> Form</h2></div>
                                <div class="update-text py-2 mb-4">
                                    <p class="lead" id="upressFR">WMSU-UPRESS-FR-004A</p>
                                    <p class="lead" id="effectDate">Effective Date: 15-Jan-2024</p>
                                </div>
                                <ul class="progress-steps text-start px-2">
                                    <li class="step active">
                                        <span>1</span>
                                        <p>Basic Info <br><span>90 secs to complete</span></p>
                                    </li>
                                    <li class="step">
                                        <span>2</span>
                                        <p>Emergency <br><span>60 secs to complete</span></p>
                                    </li>
                                    <li class="step">
                                        <span>3</span>
                                        <p>Attachments <br><span>80 secs to complete</span></p>
                                    </li> 
                                </ul>
                            </div>
                            <form id="employeeForm" action="">
        <div class="form-one form-step active">
            <h3>Employee Info</h3>
            <p>Enter your basic information correctly</p>
            <!-- Radio Buttons -->
            <div class="container-fluid d-flex flex-row justify-content-center align-content-center m-0 py-2 gap-2">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="radioType" value="new" id="new" checked onclick="text(0)">
                    <label class="form-check-label ps-2" for="new">New</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="radioType" value="replacement" id="rep" onclick="text(1)">
                    <label class="form-check-label ps-2" for="rep">Replacement</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="radioType" value="lost" id="lost" onclick="text(2)">
                    <label class="form-check-label ps-2" for="lost">Lost</label>
                </div>
            </div>
            <!-- Radio Buttons End -->
            <div>
                <label for="">ID Number</label>
                <input type="text" name="idNumber" placeholder="e.g. 2021-??">
            </div>
            <div>
                <label for="">WMSU Email</label>
                <input type="text" name="wmsuEmail" placeholder="e.g. qb202100398@wmsu.edu.ph">
            </div>
            <div>
                <label for="">First Name</label>
                <input type="text" name="firstName" placeholder="e.g. Angelo John">
            </div>
            <div>
                <label for="">Middle Name</label>
                <input type="text" name="middleName" placeholder="e.g. Sinsuan">
            </div>
            <div>
                <label for="">Family Name</label>
                <input type="text" name="familyName" placeholder="e.g. Landiao">
            </div>
            <div>
                <label for="">Name Ext.</label>
                <input type="text" name="nameExt" placeholder="e.g. Sr./Jr.">
            </div>
            <div>
                <label for="">Academic Rank/Plantilla Position</label>
                <input type="text" name="academicRank" placeholder="e.g. san juan">
            </div>
            <div>
                <label for="">Unit/Office/College/Department</label>
                <input type="text" name="unit" placeholder="e.g. san juan ambot">
            </div>
            <div>
                <label for="">Residential Address</label>
                <input type="text" name="residentialAddress" placeholder="e.g. san juan ambot">
            </div>
            <div class="birth">
                <label for="">Date of Birth</label>
                <div class="grouping">
                    <input type="text" pattern="[0-9]*" name="day" placeholder="DD">
                    <input type="text" pattern="[0-9]*" name="month" placeholder="MM">
                    <input type="text" pattern="[0-9]*" name="year" placeholder="YYYY">
                </div>
            </div>
            <div>
                <label for="">Contact Number</label>
                <input type="number" name="contactNumber" placeholder="09XXXXXXXX">
            </div>
            <div>
                <label for="">Civil Status</label>
                <select class="js-example-theme-single" name="civilStatus" id="civilStatus">
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
        <div class="form-two form-step">
            <h3>In Case of Emergency Please Notify:</h3>
            <div>
                <label for="">First Name</label>
                <input type="text" name="emergencyFirstName" placeholder="e.g. Jazelle Anne">
            </div>
            <div>
                <label for="">Middle Name</label>
                <input type="text" name="emergencyMiddleName" placeholder="e.g. Sinsuan">
            </div>
            <div>
                <label for="">Family Name</label>
                <input type="text" name="emergencyFamilyName" placeholder="e.g. Landiao">
            </div>
            <div>
                <label for="">Name Ext.</label>
                <input type="text" name="emergencyNameExt" placeholder="e.g. Sr./Jr.">
            </div>
            <div>
                <label for="">Address</label>
                <input type="text" name="emergencyAddress" placeholder="e.g. House #, Street name, Brgy/Subdivision, Town/City">
            </div>
            <div>
                <label for="">Contact Number</label>
                <input type="tel" name="emergencyContactNumber" placeholder="e.g. 09xxxxxxxxx">
            </div>
        </div>
        <div class="form-three form-step">
            <h3>Attachments</h3>
            <div class="mb-3">
                <label for="formFile1" class="form-label">2x2 Picture</label>
                <input class="form-control" type="file" id="formFile1" name="picture">
            </div>
            <div class="mb-3">
                <label for="formFile2" class="form-label">Signature</label>
                <input class="form-control" type="file" id="formFile2" name="signature">
            </div>
            <div class="hrmo mb-3">
                <label for="formFile3" class="form-label">Scanned Copy of HRMO Form</label>
                <input class="form-control" type="file" id="formFile3" name="hrmoForm">
            </div>
            <div class="hrmo-lost mb-3">
                <label for="formFile4" class="form-label">HRMO Form</label>
                <input class="form-control" type="file" id="formFile4" name="hrmoFormLost">
            </div>
            <div class="emp-affidavit mb-3">
                <label for="emp-affidavit" class="form-label">Affidavit of Loss</label>
                <input class="form-control" type="file" id="emp-affidavit" name="affidavitOfLoss">
            </div>
        </div>
        <div class="group-btn">
            <button type="button" class="btn-prev" disabled>Back</button>
            <button type="button" class="btn-next">Next Step</button>
            <button type="submit" class="btn-submit" disabled>Submit</button>
        </div>
    </form>
                        </div>
                    </div>
                </div>
                <!-- id layout -->
                <div class="col-lg-5 col-md-12 py-1 px-5 text-center">
                    <h2 class="pb-4">ID Layout</h2>
                    <div class="row flex-row">
                        <div class="col-md-6">
                            <img src="../../assets/custom/id-layout/front-student.svg" class="img-fluid" alt="Student ID Front">
                        </div>
                        <div class="col-md-6">
                            <img src="../../assets/custom/id-layout/back-student.svg" class="img-fluid" alt="Student ID Back">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        //var $disabledResults = $(".js-example-theme-single");

        /*var category= [
            "Master of Public Administration (MPA)", "Master of Arts in Education (MAED)", "Master of Arts in Science Education (MA SciEd)"

        ];*/
        
        $('.js-example-theme-single').select2({
            theme: "classic"
        });
        // $('#select-program').select2({
        //     data:category
        // });
        $('#studentForm').on('submit',function(e){
            e.preventDefault();
            var formData = new FormData(this);
            formData.append("type", "student"); // Add the additional field
            console.log(formData);
            $.ajax({
                    type: 'POST',
                    url: '/request-id',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        console.log(response);
                        alert('Form submitted successfully');
                    },
                    error: function(error){
                        console.log(error);
                        alert('Error submitting form');
                    }
                });
        });
        $('#employeeForm').on('submit', function(e){
            e.preventDefault();
                var formData = new FormData(this);
                console.log(formData);
                /*$.ajax({
                    type: 'POST',
                    url: 'your-server-endpoint-url',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        console.log(response);
                        alert('Form submitted successfully');
                    },
                    error: function(error){
                        console.log(error);
                        alert('Error submitting form');
                    }
                });*/
            });
    });
</script>