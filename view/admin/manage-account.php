            <?php
            include_once("././model/accountManageModel.php");
            $obj = new AccountManageModel();
            $getAcc = $obj->getAccount();
            ?>

            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="row text-start py-3 px-2">
                        <div class="col-md-8 col-12 align-items-center d-flex justify-content-start">
                            <div class="card-header">
                                <h2>Account Management</h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-12 align-items-center d-flex justify-content-end">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addAccountModal">
                                <i class="fa-solid fa-circle-plus"></i> Account
                            </button>
                        </div>
                        <div class="col-md-12 col-12 align-items-center py-4 px-0 text-center d-flex justify-content-center"
                            style="width: 100%;">
                            <div class="table-responsive">
                                <table class="table caption-top table-striped table-hover" id="user"
                                    style="width: 100%;">
                                    <thead class="table-dark">
                                        <th scope="col">ID</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Password</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Photo</th>
                                        <th scope="col">Date Added</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </thead>
                                    <tbody class="table-group-divider" id="">
                                        <?php
                                            if ($getAcc) {
                                                foreach ($getAcc as $item) {
                                         ?>
                                        <tr>
                                            <td class="accID" style="width: 40px;"><?= $item['id'] ?></td>
                                            <td style="max-width: 70px; overflow: hidden; text-overflow: ellipsis;"
                                                title="<?= $item['username'] ?>">
                                                <?= strlen($item['username']) > 10 ? substr($item['username'], 0, 10) . '...' : $item['username'] ?>
                                            </td>
                                            <td style="max-width: 80px; overflow: hidden; text-overflow: ellipsis;"
                                                title="<?= $item['password'] ?>">
                                                <?= strlen($item['password']) > 15 ? substr($item['password'], 0, 15) . '...' : $item['password'] ?>
                                            </td>
                                            <td style="max-width: 60px; overflow: hidden; text-overflow: ellipsis;"
                                                title="<?= $item['firstName']." ".$item['middleName']." ".$item['lastName']." ".$item['nameExt'] ?>">
                                                <?= strlen($item['firstName']." ".$item['middleName']." ".$item['lastName']." ".$item['nameExt']) > 15 ?
                                                substr($item['firstName']." ".$item['middleName']." ".$item['lastName']." ".$item['nameExt'], 0, 15) . '...' :
                                                $item['firstName']." ".$item['middleName']." ".$item['lastName']." ".$item['nameExt'] ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($item['role'] == 'admin') {
                                                    $item['role'] = "Admin";
                                                } else if ($item['role'] == 'operator'){
                                                    $item['role'] = "Operator";
                                                }
                                                ?>
                                                <?= $item['role'] ?>
                                            </td>
                                            <td><img src="uploads/account/<?= $item['accountPhoto'] ?>"
                                                    style="max-height: 60px; max-width: 60px;"></td>
                                            <td style="width: 80px !important;"><?= $item['createdAt'] ?></td>
                                            <td>
                                                <?php
                                                    if ($item['status'] == 0) {
                                                        $item['status'] = 'active';
                                                    } else if ($item['status'] == 1) {
                                                        $item['status'] = 'inactive';
                                                    }
                                                ?>
                                                <span
                                                    class="badge text-bg-<?= $item['status'] == 'active' ? 'success' : 'danger' ?>">
                                                    <?= $item['status'] == 'active' ? 'Active' : 'Inactive' ?>
                                                </span>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col">
                                                        <button type="button"
                                                            class="btn btn-success btn-cirlce btn-sm edit-btn "
                                                            data-id="<?= $item['id']; ?>" data-bs-toggle="modal"
                                                            data-bs-target="#editAccountModal">
                                                            <i class="fa-solid fa-pen-to-square"
                                                                style="padding: 0;"></i>
                                                            <!-- edit -->
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-danger btn-cirlce btn-sm delete-btn"
                                                            data-id="<?= $item['id']; ?>">
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
            <div class="modal fade" id="addAccountModal" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Account</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post" action="" id="addAccount">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="" class="form-label">Username</label>
                                    <input type="text" name="uname" class="form-control" placeholder="admin" required>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Password</label>
                                    <input type="password" name="pw" class="form-control" placeholder="********"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">First name</label>
                                    <input type="text" name="fname" class="form-control" placeholder="" required>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Middle name</label>
                                    <input type="text" name="mname" class="form-control" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Last name</label>
                                    <input type="text" name="lname" class="form-control" placeholder="" required>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Name Ext.</label>
                                    <input type="text" name="nameExt" class="form-control" placeholder="Sr / Jr">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Role</label>
                                    <select class="form-control js-example-basic-single" name="role" id="role" required
                                        style="width: 100%;">
                                        <option value="">Select Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="operator">Operator</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Insert your photo</label>
                                    <input class="form-control" type="file" name="accountPhoto[]" id="accountPhoto"
                                        accept="image/*">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="add" class="btn btn-primary">Add account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- edit modal -->
            <div class="modal fade" id="editAccountModal" tabindex="-1" aria-labelledby="editAccountModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="editAccountForm" method="post" action="" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editAccountModalLabel">Edit Account</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <input type="hidden" id="editId" name="accId">
                                    <label for="editUname" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="editUname" name="uname" required>
                                </div>
                                <div class="mb-3">
                                    <label for="editPw" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="editPw" name="pw" required>
                                </div>
                                <div class="mb-3">
                                    <label for="editFname" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="editFname" name="fname" required>
                                </div>
                                <div class="mb-3">
                                    <label for="editMname" class="form-label">Middle Name</label>
                                    <input type="text" class="form-control" id="editMname" name="mname">
                                </div>
                                <div class="mb-3">
                                    <label for="editLname" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="editLname" name="lname" required>
                                </div>
                                <div class="mb-3">
                                    <label for="editNameExt" class="form-label">Name
                                        Extension</label>
                                    <input type="text" class="form-control" id="editNameExt" name="nameExt">
                                </div>
                                <div class="mb-3">
                                    <label for="editRole" class="form-label">Role</label>
                                    <select class="form-control js-example-basic-single" name="role" id="role" required
                                        style="width: 100%;">
                                        <option value="">Select Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="operator">Operator</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="editAccountPhoto" class="form-label">Account
                                        Photo</label>
                                    <input type="file" class="form-control" id="editAccountPhoto" name="accountPhoto[]"
                                        accept="image/*">
                                </div>
                                <!-- <input type="hidden" name="type" value="save"> -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="save">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <script>
$(document).ready(function() {
    $('#addAccountModal .js-example-basic-single').select2({
        placeholder: 'Select An Option',
        dropdownParent: $('#addAccountModal')
    });
    // Initialize Select2 for Edit Account Modald
    $('#editAccountModal .js-example-basic-single').select2({
        placeholder: 'Select An Option',
        dropdownParent: $('#editAccountModal')
    });
    var table = $('#user').DataTable({
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
            </script>
            <script>
$(document).ready(function() {
    $('#addAccount').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append("type", "add"); // Add the additional field
        formData.append("ignoreHeaderFooter", 1);
        console.log(formData);

        $.ajax({
            type: 'POST',
            url: '/add-account',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                var res = response;
                if (res.status === 'success') {
                    alert(res.message);
                    location.reload();
                } else {
                    alert(res.message);
                }
                $("#uname").val("");
                $("#pw").val("");
                $("#fname").val("");
                $("#mname").val("");
                $("#lname").val("");
                $("#nameExt").val("");
                $("#role").val("");
                $("#accountPhoto").val("");
            },
            error: function(error) {
                console.log('Error:', error);
                alert('Error submitting form');
            }
        });
    });

    $("#editAccountForm").on("submit", function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append("type", "updateUser");
        formData.append("ignoreHeaderFooter", 1);
        $.ajax({
            type: 'POST',
            url: "/edit-account",
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
        })
    });

    $(document).on('click', '.edit-btn', function(e) {
        e.preventDefault();
        var selectedID = $(this).closest('tr').find('.accID').text();

        console.log(selectedID);

        var formData = new FormData();
        formData.append("type", "viewUser");
        formData.append('accId', selectedID);
        formData.append("ignoreHeaderFooter", 1);

        $.ajax({
            type: 'POST',
            url: '/edit-account',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                var res = JSON.parse(response);
                console.log(res);
                $("#editUname").val(res.username);
                $("#editPw").val(res.password);
                $("#editFname").val(res.firstName);
                $("#editMname").val(res.middleName);
                $("#editLname").val(res.lastName);
                $("#editNameExt").val(res.nameExt);
                $("#editRole").val(res.role);
                $("#editId").val(res.id);
            }
        });
    });

    $(document).on('click', '.delete-btn', function(e) {
        e.preventDefault();
        var id = $(this).data('id');

        if (confirm('Are you sure you want to delete this account?')) {
            var formData = new FormData();
            formData.append('id', id);
            formData.append('type', 'delete');
            $.ajax({
                url: 'del-account',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    var res = response;
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
});
            </script>