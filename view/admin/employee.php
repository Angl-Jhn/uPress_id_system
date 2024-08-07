            <?php
            include_once("././model/presidentListModal.php");
            $obj = new PresidentListModal();
            $get = $obj->getList();
            $setDefault = $obj->getDefault();
            ?>

            <main class="content px-3 py-2" style="height: 100vh;">
                <div class="container-fluid h-100 w-75 d-flex justify-content-center align-items-center">
                    <div class="row layout py-3 px-2 gap-4 justify-content-center text-center bg-info-subtle">
                        <div class="col-md-12 text-center py-2">
                            <div class="card-header">
                                <h2>Employee ID</h2>
                            </div>
                        </div>
                        <div class="col-md-5 py-3">
                            <div style="position: relative; left: 50%; transform: translateX(-50%); display: block; 
                                background-image: url('../../assets/id_layouts/EMPLOYEE/CoE_&_CCS.png'); width:316px; height: 204px; 
                                background-size: 321px 204px; background-position: center; background-repeat: no-repeat; 
                                border: 1px solid black; border-radius: 10px">
                                <img src="../../assets/id_layouts/sample.png" style="position: absolute; left: 12px; 
                                    bottom: 19px; max-width: 120px; display: block; margin: auto;">
                                <p style="position: absolute; left: 45px; bottom: -14px; color: black; 
                                    text-align: center; z-index: 1; font-weight: bold; font-size: 9px">
                                    A</p>
                                <p style="position: absolute; left: 145px; right: 10px; top: 62px; color: black; 
                                    text-align: center; z-index: 1; font-weight: 600; font-size: 12px;">
                                    A</p>
                                <p style="position: absolute; left: 145px; right: 10px; top: 80px; color: black; 
                                    text-align: center; z-index: 1; font-weight: 600; font-size: 9px;">
                                    A</p>
                                <p style="position: absolute; left: 145px; right: 10px; top: 93px; color: black;
                                    text-align: center; z-index: 1; font-weight: 600; font-size: 9px;">
                                    A</p>
                                <img src="../../assets/id_layouts/signature.png" style="position: absolute; right: 60px; 
                                    bottom: 10px; max-width:60px; max-height:30px; display: block; margin: auto;">
                                <p style="position: absolute; left: 158px; right: 20px; bottom: -6px; color: black; 
                                    text-align: center; z-index: 1; font-weight: 800; font-size: 6px">
                                    <?php 
                                        echo $setDefault['title'].' '.$setDefault['firstName'].' '.$setDefault['middleName'].' '
                                        .$setDefault['familyName'].' '.$setDefault['suffix'];
                                    ?></p>
                                <p style="position: absolute; right: 75px; bottom: 4px; color: black; text-align: center; 
                                    z-index: 1; font-size: 6px; font-weight: bold; padding-bottom: 0px; margin: 0px;">
                                    President</p>
                            </div>
                        </div>
                        <div class="col-md-5 py-3">
                            <div style="position: relative; left: 50%; transform: translateX(-50%); display: block; 
                                background-image: url('../../assets/id_layouts/EMPLOYEE/EMPLOYEE-ID-BACK.png'); 
                                width:316px; height: 204px; background-size: 321px 204px; background-position: center; 
                                background-repeat: no-repeat; border: 1px solid black; border-radius: 10px">
                                <p style="position: absolute; left: 0; right: 0; top: 84px; color: black; text-align: center; 
                                    z-index: 1; font-weight: 900; font-size: 10px;">
                                    A</p>
                                <p style="position: absolute; left: 60px; bottom: 69.6px; color: black; 
                                    font-size: 5px; font-weight: 900;">
                                    A</p>
                                <p style="position: absolute; left: 57px; bottom: 53.5px; color: black; 
                                    font-size: 5px; font-weight: 900;">
                                    A</p>
                                <p style="position: absolute; left: 145px; bottom: 69.6px; color: black; 
                                    font-size: 5px; font-weight: 900;">
                                    A</p>
                                <p style="position: absolute; left: 145px; bottom: 53.5px; color: black;
                                    font-size: 5px; font-weight: 900;">
                                    A</p>
                                <p style="position: absolute; left: 205px; bottom: 45px; color: black; 
                                    font-size: 8px; font-weight: 900;">
                                    A</p>
                                <p style="position: absolute; left: 175px; bottom: 30px; color: black; 
                                    font-size: 6px; font-weight: 900;">
                                    A</p>
                                <p style="position: absolute; left: 210px; bottom: 11px; color: black; 
                                    font-size: 8px; font-weight: 900;">
                                    A</p>
                                <img src="../../assets/id_layouts/" style="position: absolute; 
                                    left: 65px; bottom: 20px; max-width:60px; max-height:30px; 
                                    display: block; margin: auto;">
                            </div>
                        </div>
                        <div class="col-md-12 pb-4">
                            <button type="button" class="managePresident btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#employeeID">MANAGE PRESIDENT</button>
                        </div>
                    </div>
            </main>
            <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
            <!-- List of President Modal -->
            <div class="modal fade" id="employeeID" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">List of President
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="height: calc(100vh - 120px); overflow-y: auto;">
                            <div class="row">
                                <div class="col-sm-12 d-flex justify-content-end">
                                    <button type="button" class="btn btn-success addbtn" data-bs-toggle="modal"
                                        data-bs-target="#PresidentModal">New President</button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="presList" class="table table-striped table-hover" style="width: 100%;">
                                    <thead>
                                        <th scope="col">No.</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Signature</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </thead>
                                    <tbody class="table-group-divider" id="">
                                        <?php
                                            if($get) {
                                                foreach($get as $item){
                                        ?>
                                        <tr>
                                            <td class="presidentID" style="width: 20px;"><?=$item['id']?></td>
                                            <td style="max-width: 60px;"><?= $item['title'] ?></td>
                                            <td style="max-width: 150px; overflow: hidden; text-overflow: ellipsis;"
                                                title="<?= $item['firstName']." ".$item['middleName']." ".$item['familyName']." ".$item['suffix'] ?>">
                                                <?= strlen($item['firstName']." ".$item['middleName']." ".$item['familyName']." ".$item['suffix']) > 25 ?
                                                substr($item['firstName']." ".$item['middleName']." ".$item['familyName']." ".$item['suffix'], 0, 25) . '...' :
                                                $item['firstName']." ".$item['middleName']." ".$item['familyName']." ".$item['suffix'] ?>
                                            </td>
                                            <td><img src="uploads/account/" style="max-height: 60px; max-width: 60px;">
                                            <td>
                                                <?php
                                                    if ($item['status'] == 0) {
                                                        $item['status'] = 'non-default';
                                                    } else if ($item['status'] == 1) {
                                                        $item['status'] = 'default';
                                                    }
                                                ?>
                                                <span
                                                    class="badge text-bg-<?= $item['status'] == 'default' ? 'success' : 'danger' ?>">
                                                    <?= $item['status'] == 'default' ? 'Default' : 'Non-default' ?>
                                                </span>
                                            </td>
                                            <td style="width: 30px;"><?= $item['createdAt'] ?></td>
                                            <td>
                                                <div class="row">
                                                    <div class="col">
                                                        <?php
                                                        if ($item['status'] == 'non-default') {
                                                        ?>
                                                        <button type="button" class="btn btn-primary btn-sm default-btn"
                                                            data-bs-toggle="modal" data-bs-placement="top"
                                                            data-bs-title="Make Default" data-id="<?= $item['id']; ?>">
                                                            <i class="fa-solid fa-house" style="padding: 0;"></i>
                                                            <!-- default -->
                                                        </button>
                                                        <?php
                                                        } else if ($item['status'] == 'default') {
                                                        ?>
                                                        <button type="button"
                                                            class="btn btn-secondary btn-sm default-btn"
                                                            data-bs-toggle="modal" data-bs-placement="top"
                                                            data-bs-title="Make Default" data-id="<?= $item['id']; ?>"
                                                            disabled>
                                                            <i class="fa-solid fa-house" style="padding: 0;"></i>
                                                            <!-- default -->
                                                        </button>
                                                        <?php
                                                        }
                                                        ?>
                                                        <button type="button" class="btn btn-success btn-sm edit-btn"
                                                            data-bs-toggle="modal" data-bs-placement="top"
                                                            data-bs-title="Edit" data-id="<?= $item['id']; ?>"
                                                            data-bs-target="#PresidentModal">
                                                            <i class="fa-solid fa-pen-to-square"
                                                                style="padding: 0;"></i>
                                                            <!-- edit -->
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-sm delete-btn"
                                                            data-bs-toggle="modal" data-bs-placement="top"
                                                            data-bs-title="Delete" data-id="<?= $item['id']; ?>">
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
            </div>
            <div class="modal fade" id="PresidentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
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
                            <button type="submit" name="" class="btn btn-primary"></button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
document.addEventListener('DOMContentLoaded', function() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="modal"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
});
            </script>

            <script>
$(document).ready(function() {
    let table;
    $('#employeeID').on('shown.bs.modal', function() {
        // Initialize DataTable if it hasn't been initialized
        if (!$.fn.DataTable.isDataTable('#presList')) {
            table = $('#presList').DataTable({
                // dom: 'Bfrtip'
            });
        }
    });
    $('#PresidentModal').on('hidden.bs.modal', function() {
        // Open the #studentID modal
        $('#employeeID').modal('show');
    });

    // on click modals
    $(document).on('click', '.addbtn', function() {
        $('#PresidentModal').find('input, select, textarea').val('');
        $('#PresidentModal h1').text("Add New President");
        $('#PresidentModal form').attr('id', 'insertPresident');
        $('#PresidentModal button[type="submit"]').attr('name', 'newPresident').text('Add');
        console.log("Form ID: " + $('#PresidentModal form').attr('id'));
        console.log("Button 'name': " + $('#PresidentModal button[type="submit"]').attr('name'));
    });
    $(document).on('click', '.edit-btn', function() {
        $('#PresidentModal h1').text("Update President");
        $('#PresidentModal form').attr('id', 'updatePresident');
        $('#PresidentModal button[type="submit"]').attr('name', 'savePresident').text('Save');
        console.log("Form ID: " + $('#PresidentModal form').attr('id'));
        console.log("Button 'name': " + $('#PresidentModal button[type="submit"]').attr('name'));


    });

    // $(document).on('click', '.default-btn', function(e) {
    //     // $('#studentID h1').text("wawaw");
    //     e.preventDefault();
    //     let buttonId = $(this).data('id');

    //     $.ajax({
    //         type: 'GET',
    //         url: "",
    //         data: {
    //             id: buttonId
    //         },
    //         contentType: false,
    //         processData: false,
    //         success: function(response) {
    //             var res = JSON.parse(response);
    //             console.log(res);
    //             // if (res.status == 'success') {
    //             //     alert(res.message);
    //             //     $('.default-btn').each(function() {
    //             //         $(this).data('status', 0);
    //             //     });

    //             //     $(this).data('status', 1);
    //             // } else {
    //             //     alert(res.message);
    //             // }
    //         },
    //         error: function(error) {
    //             console.log(error);
    //             alert('Error submitting form');
    //         }
    //     });
    // });

});
            </script>