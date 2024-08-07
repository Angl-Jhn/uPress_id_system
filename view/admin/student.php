            <?php
            include_once("././model/dsaListModel.php");
            $obj = new DsaListModel();
            $get = $obj->getList();
            $setDefault = $obj->getDefault();
            ?>
            <main class="content px-3 py-2" style="height: 100vh;">
                <div class="container-fluid h-100 w-75 d-flex justify-content-center align-items-center">
                    <div class="row layout py-3 px-2 gap-4 justify-content-center text-center bg-info-subtle">
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
                                </p>
                                <p style="position: absolute; left: 0; right: 0; top: 230px; color: black; 
                                    text-align: center; z-index: 1; font-weight: 900; font-size: 16px; color: maroon">
                                </p>
                                <p style="position: absolute; left: 0; right: 0; top: 250px; color: black;
                                    text-align: center; z-index: 1; font-weight: bold; font-size: 16px;">
                                </p>
                                <img src="../../assets/id_layouts/signature.png" style="position: absolute; left: 0; right: 0; 
                                    top: 270px; max-width:60px; max-height:30px; display: block; margin: auto;">
                                <p style="position: absolute; left: 0; right: 0; bottom: 1px; color: black; 
                                    text-align: center; z-index: 1; font-weight: bold; font-size: 8px">
                                    <?php 
                                        echo $setDefault['title'].' '.$setDefault['firstName'].' '.$setDefault['middleName'].' '
                                        .$setDefault['familyName'].' '.$setDefault['suffix'];
                                    ?>
                                </p>
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
                                </p>
                                <p style="position: absolute; left: 0; right: 0; top: 100px; color: black; 
                                    text-align: center; font-size: 10px;">
                                </p>
                                <p style="position: absolute; left: 0; right: 0; top: 120px; color: black; 
                                    text-align: center; font-size: 12px; font-weight: 900;">
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
                                <p style="position: absolute; left: 11px; bottom: <?php echo 115 - ($index * 17); ?>px;
                                    color: black; font-size: 5px; font-weight: bold;">
                                    <?php echo $range; ?>
                                </p>
                                <?php } ?>
                                <img src="../../assets/id_layouts/" style="position: absolute; 
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
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">DSA List
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
                                        <th scope="col">No.</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Signature</th>
                                        <th scope="col">School Year</th>
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
                                            <td class="dsaID" style="width: 20px;"><?=$item['id']?></td>
                                            <td style="width: 40px;"><?= $item['title'] ?></td>
                                            <td style="max-width: 60px; overflow: hidden; text-overflow: ellipsis;"
                                                title="<?= $item['firstName']." ".$item['middleName']." ".$item['familyName']." ".$item['suffix'] ?>">
                                                <?= strlen($item['firstName']." ".$item['middleName']." ".$item['familyName']." ".$item['suffix']) > 25 ?
                                                substr($item['firstName']." ".$item['middleName']." ".$item['familyName']." ".$item['suffix'], 0, 25) . '...' :
                                                $item['firstName']." ".$item['middleName']." ".$item['familyName']." ".$item['suffix'] ?>
                                            </td>
                                            <td><img src="uploads/account/" style="max-height: 60px; max-width: 60px;">
                                            <td style="width: 30px;"><?= $item['year'] ?></td>
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
                                                            onClick="makeDefault('<?= $item['id'] ?>');return false;"
                                                            data-bs-title="Make Default" data-id="<?= $item['id']; ?>">
                                                            <i class="fa-solid fa-house" style="padding: 0;"></i>
                                                            <!-- default -->
                                                        </button>
                                                        <?php
                                                        } else if ($item['status'] == 'default') {
                                                        ?>
                                                        <button type="button"
                                                            class="btn btn-secondary btn-sm default-btn"
                                                            data-bs-title="Make Default" data-id="<?= $item['id']; ?>"
                                                            onclick="makeDefault('<?= $item['id'] ?>');return false;"
                                                            disabled>
                                                            <i class="fa-solid fa-house" style="padding: 0;"></i>
                                                            <!-- default -->
                                                        </button>
                                                        <?php
                                                        }
                                                        ?>
                                                        <button type="button" class="btn btn-success btn-sm edit-btn "
                                                            data-bs-toggle="modal" data-bs-placement="top"
                                                            data-bs-title="Edit" data-id="<?= $item['id']; ?>"
                                                            data-bs-target="#DSAModal">
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
            <div class="modal fade" id="DSAModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="" method="post" id="" enctype="multipart/form-data">
                            <div class="modal-body" style="max-height: calc(100vh - 100px); overflow-y: auto;">
                                <div class="container-fluid">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-sm-12">
                                            <div class="mb-1">
                                                <label for="">Title</label>
                                                <input type="text" class="form-control" name="title" id="title">
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

                            <div class="modal-footer">
                                <button type="submit" name="" class="btn btn-primary"></button>
                            </div>
                        </form>
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
function makeDefault(val) {
    var formData = new FormData();
    formData.append("action", "makeDefault"); // Add the additional field
    formData.append("ignoreHeaderFooter", 1);
    formData.append("id", val);
    $.ajax({
        type: 'POST',
        url: '/make-default',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            var res = JSON.parse(response);
            if (res.status === 'success') {
                alert(res.message);
                console.log(res);
                location.reload();
            } else {
                alert(res.message);
            }
        },
        error: function(error) {
            console.log('Error:', error);
            alert('Error submitting form');
        }
    });
}
$(document).ready(function() {
    let table;
    $('#studentID').on('shown.bs.modal', function() {
        // Initialize DataTable if it hasn't been initialized
        if (!$.fn.DataTable.isDataTable('#dsaList')) {
            table = $('#dsaList').DataTable({
                // dom: 'Bfrtip'
            });
        }
    });
    $('#DSAModal').on('hidden.bs.modal', function() {
        // Open the #studentID modal
        $('#studentID').modal('show');
    });

    // on click modals
    $(document).on('click', '.addbtn', function() {
        $('#DSAModal').find('input, select, textarea').val('');
        $('#DSAModal h1').text("Add New Director of Student Affairs");
        $('#DSAModal form').attr('id', 'insertDirector');
        $('#DSAModal button[type="submit"]').attr('name', 'newDirector').text('Add');
        console.log("Form ID: " + $('#DSAModal form').attr('id'));
        console.log("Button 'name': " + $('#DSAModal button[type="submit"]').attr('name'));
    });
    $(document).on('click', '.edit-btn', function() {
        $('#DSAModal h1').text("Update Director of Student Affairs");
        $('#DSAModal form').attr('id', 'updateDirector');
        $('#DSAModal button[type="submit"]').attr('name', 'saveDirector').text('Save');
        console.log("Form ID: " + $('#DSAModal form').attr('id'));
        console.log("Button 'name': " + $('#DSAModal button[type="submit"]').attr('name'));
    });



    $(document).on('submit', '#insertDirector', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append("action", "addDirector"); // Add the additional field
        formData.append("ignoreHeaderFooter", 1);
        console.log(formData);

        $.ajax({
            type: 'POST',
            url: '/add-director',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                var res = response;
                if (res.status === 'success') {
                    alert(res.message);
                    console.log(res);
                } else {
                    alert(res.message);
                }
                $('#insertDirector').find('input').val('');
                $('#insertDirector').find('select').val('');
            },
            error: function(error) {
                console.log('Error:', error);
                alert('Error submitting form');
            }
        });
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