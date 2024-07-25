            <main class="content px-3 py-2" style="height: 100vh;">
                <div class="container-fluid h-100 w-75 d-flex justify-content-center align-items-center">
                    <div class="row layout py-3 px-2 gap-4 justify-content-center text-center bg-dark-subtle">
                        <div class="col-md-12 text-center py-2">
                            <div class="card-header">
                                <h2>Student ID</h2>
                            </div>
                        </div>
                        <div class="col-md-4 py-3">
                            <div style="position: relative; left: 50%; transform: translateX(-50%); display: block; 
                                background-image: url('../../assets/id_layouts/STUDENT/STUDENT-ID-FRONT.png'); 
                                width:204px; height:316px; background-size: 204px 321px; background-position: center; 
                                background-repeat: no-repeat; border: 1px solid black; border-radius: 10px">
                                <img src="../../assets/id_layouts/sample.png" style="position: absolute;
                                    left: 0; right: 0; bottom: 97px; max-width: 150px; margin: auto;">
                                <p style="position: absolute; left: 45px; top: 215px; color: black;
                                    text-align: center; z-index: 1; font-weight: bold; font-size: 10px">
                                    2021-00149</p>
                                <p style="position: absolute; left: 0; right: 0; top: 230px; color: black; 
                                    text-align: center; z-index: 1; font-weight: 900; font-size: 16px; color: maroon">
                                    BS CS</p>
                                <p style="position: absolute; left: 0; right: 0; top: 250px; color: black;
                                    text-align: center; z-index: 1; font-weight: bold; font-size: 16px;">
                                    JUAN DELA CRUZ</p>
                                <img src="../../assets/id_layouts/signature.png" style="position: absolute; left: 0; right: 0; 
                                    top: 270px; max-width:60px; max-height:30px; display: block; margin: auto;">
                                <p style="position: absolute; left: 0; right: 0; bottom: 1px; color: black; 
                                    text-align: center; z-index: 1; font-weight: bold; font-size: 8px">
                                    PM Winston Churchill</p>
                                <p style="position: absolute; left: 0; right: 0; bottom: 10px; color: black; 
                                    text-align: center; z-index: 1; font-size: 8px; padding-bottom: 0px; margin: 0px;">
                                    Director, Student Affairs</p>
                            </div>
                        </div>
                        <div class="col-md-4 py-3">
                            <div style="position: relative; left: 50%; transform: translateX(-50%); display: block; 
                                background-image: url('../../assets/id_layouts/STUDENT/STUDENT-ID-BACK.svg'); 
                                width:204px; height:316px; background-size: 204px 321px; background-position: center; 
                                background-repeat: no-repeat; border: 1px solid black; border-radius: 10px">
                                <p style="position: absolute; left: 0; right: 0; top: 73px; color: black; 
                                    text-align: center; font-size: 14px; font-weight: 900;">
                                    AMELIA DELA CRUZ</p>
                                <p style="position: absolute; left: 0; right: 0; top: 100px; color: black; 
                                    text-align: center; font-size: 10px;">
                                    San Roque Gil S. Estrada Compound Z.C.</p>
                                <p style="position: absolute; left: 0; right: 0; top: 120px; color: black; 
                                    text-align: center; font-size: 12px; font-weight: 900;">
                                    0906-164-8925</p>
                                <p style="position: absolute; left: 11px; bottom: 115px; color: black;
                                    font-size: 5px; font-weight: bold;">
                                    2024-2025</p>
                                <p style="position: absolute; left: 11px; bottom: 98px; color: black; 
                                    font-size: 5px; font-weight: bold;">
                                    2025-2026</p>
                                <p style="position: absolute; left: 11px; bottom: 80px; color: black; 
                                    font-size: 5px; font-weight: bold;">
                                    2026-2027</p>
                                <p style="position: absolute; left: 11px; bottom: 63px; color: black; 
                                    font-size: 5px; font-weight: bold;">
                                    2027-2028</p>
                                <img src="../../assets/id_layouts/signature.png" style="position: absolute; 
                                    left: 0; right: 0; bottom: 25px; max-width:80px; max-height:40px; display: 
                                    block; margin: auto;">
                            </div>
                        </div>
                        <div class="col-md-12 pb-1">
                            <button type="button" class="manageDSA btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#studentID">MANAGE DSA</button>
                        </div>
                    </div>
                </div>
            </main>
            <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
            <!-- List of DSA Modal -->
            <div class="modal fade" id="studentID" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">List of Director, Student Affairs
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="height: calc(100vh - 120px); overflow-y: auto;">
                            <div class="row">
                                <div class="col-sm-12 d-flex justify-content-end">
                                    <button type="button" class="btn btn-success addbtn" data-bs-toggle="modal"
                                        data-bs-target="#DSAModal">New DSA</button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="dsaList" class="table table-striped table-hover" style="width: 100%;">
                                    <thead>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Signature</th>
                                        <th scope="col">School Year</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </thead>
                                    <tbody class="table-group-divider" id="">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="DSAModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="" method="post" id="directorForm" enctype="multipart/form-data">
                            <div class="modal-body" style="height: calc(100vh - 200px); overflow-y: auto;">
                                <div class="container-fluid">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-sm-12">
                                            <div class="mb-1">
                                                <label for="">Title</label>
                                                <input type="text" class="form-control" name="title" id="title"
                                                    required>
                                            </div>
                                            <div class="mb-1">
                                                <label for="">First Name</label>
                                                <input type="text" class="form-control" name="firstName" id="fname"
                                                    required>
                                            </div>
                                            <div class="mb-1">
                                                <label for="">Middle Name</label>
                                                <input type="text" class="form-control" name="middleName" id="mname">
                                            </div>
                                            <div class="mb-1">
                                                <label for="">Family Name</label>
                                                <input type="text" class="form-control" name="familyName" id="famname"
                                                    required>
                                            </div>
                                            <div class="mb-1">
                                                <label for="">Suffix</label>
                                                <input type="text" class="form-control" name="nameExt" id="ext"
                                                    placeholder="Sr./Jr.">
                                            </div>
                                            <div class="mb-1">
                                                <label for="">ID School Year</label>
                                                <input type="text" class="form-control" name="year" id="year">
                                            </div>
                                            <div class="mb-1">
                                                <label for="">Signature</label>
                                                <input type="file" class="form-control" name="signature[]"
                                                    id="signature">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                            <button type="submit" name="newDirector" class="btn btn-primary">Add Director</button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
$(document).ready(function() {
    let table;
    $('#studentID').on('shown.bs.modal', function() {
        // Initialize DataTable if it hasn't been initialized
        if (!$.fn.DataTable.isDataTable('#dsaList')) {
            table = $('#dsaList').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'pdf'
                ]
            });
        }
    });
    $('#studentID').on('hidden.bs.modal', function() {
        // Destroy DataTable to reset and prevent reinitialization issues
        if ($.fn.DataTable.isDataTable('#dsaList')) {
            table.destroy();
        }
    });

    // on click modals
    $(document).on('click', '.addbtn', function() {
        // $('#studentID').find('input, select, textarea').val('');
        $('#studentID h1').text('Generate Student ID');
        $('#studentID form').attr('id', 'insertStudent');
        console.log("Form ID: " + $('#studentID form').attr('id'));
        // $('#studentID button[type="submit"]').attr('name', 'addStud').text('Add Student');
    });
});
            </script>