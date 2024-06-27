            <?php
            include_once("././model/accountManageModel.php");
            $obj = new AccountManageModel();
            $getAcc = $obj->getAccount();
            ?>

            <!-- Add Modal -->
            <div class="modal fade" id="addAccountModal" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Account</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/add-account" method="post" id="addAccount">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="" class="form-label">Username</label>
                                    <input type="text" name="uname" id="username" class="form-control"
                                        placeholder="e.g. admin?">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Password</label>
                                    <input type="password" name="pw" id="password" class="form-control"
                                        placeholder="********">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">First name</label>
                                    <input type="text" name="fname" id="firstName" class="form-control"
                                        placeholder="e.g. Sanicare">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Middle name</label>
                                    <input type="text" name="mname" id="middleName" class="form-control"
                                        placeholder="e.g. Plastic">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Last name</label>
                                    <input type="text" name="lname" id="lastName" class="form-control"
                                        placeholder="e.g. Stem">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Name Ext.</label>
                                    <input type="text" name="nameExt" id="nameExt" class="form-control"
                                        placeholder="e.g. Sr./Jr.">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Role</label>
                                    <select class="form-control js-example-basic-single" name="role" id="role"
                                        style="width: 100%;">
                                        <option value="">Select Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="super_admin">Super Admin</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Insert photo</label>
                                    <input class="form-control" name="accountPhoto[]" id="accountPhoto" type="file"
                                        id="formFile">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="add" class="btn btn-primary">Add Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Edit Modal -->
            <div class="modal fade" id="editAccountModal" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Account</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="editAccountForm" action="/edit-account" method="post">
                            <div class="modal-body">
                                <input type="hidden" id="id" name="id">
                                <div class="mb-3">
                                    <label for="edit_uname">Username</label>
                                    <input type="text" id="edit_uname" name="uname" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="edit_pw">Password</label>
                                    <input type="password" id="edit_pw" name="pw" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="edit_fname">First Name</label>
                                    <input type="text" id="edit_fname" name="fname" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="edit_mname">Middle Name</label>
                                    <input type="text" id="edit_mname" name="mname" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="edit_lname">Last Name</label>
                                    <input type="text" id="edit_lname" name="lname" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="edit_nameExt">Name Extension</label>
                                    <input type="text" id="edit_nameExt" name="nameExt" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="edit_role">Role</label>
                                    <select id="edit_role" name="role" class="form-control js-example-basic-single">
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                        <!-- Add other roles as needed -->
                                    </select>
                                </div>
                                <!-- <div class="mb-3">
                                    <label for="edit_accountPhoto">Account Photo</label>
                                    <input type="file" id="edit_accountPhoto" name="accountPhoto[]"
                                        class="form-control">
                                </div> -->
                                <div class="mb-3">
                                    <label for="edit_accountPhoto">Account Photo</label>
                                    <div class="current-photo mb-2">
                                        <img id="currentPhoto" src="uploads/account/<?= $item['accountPhoto']; ?>"
                                            style="max-height: 60px; max-width: 60px;">
                                    </div>
                                    <input type="file" id="edit_accountPhoto" name="accountPhoto[]"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

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
                                        <th scope="col">Status</th>
                                        <th scope="col">Date Added</th>
                                        <th scope="col">Action</th>
                                    </thead>
                                    <tbody class="table-group-divider" id="">
                                        <?php
                                            if ($getAcc) {
                                                foreach ($getAcc as $item) {
                                         ?>
                                        <tr>
                                            <td><?= $item['id'] ?></td>
                                            <td><?= $item['username'] ?></td>
                                            <td><?= $item['password'] ?></td>
                                            <td><?= $item['firstName']." ".$item['middleName']." ".$item['lastName']." ".$item['nameExt'] ?>
                                            </td>
                                            <td><?= $item['role'] ?></td>
                                            <td><img src="uploads/account/<?= $item['accountPhoto'] ?>"
                                                    style="max-height: 60px; max-width: 60px;"></td>
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
                                            <td><?= $item['createdAt'] ?></td>
                                            <td>
                                                <div class="row">
                                                    <div class="col">
                                                        <button type="button" class="btn btn-success edit-btn"
                                                            data-id="<?= $item['id']; ?>"
                                                            data-username="<?= $item['username']; ?>"
                                                            data-password="<?= $item['password']; ?>"
                                                            data-firstname="<?= $item['firstName']; ?>"
                                                            data-middlename="<?= $item['middleName']; ?>"
                                                            data-lastname="<?= $item['lastName']; ?>"
                                                            data-nameext="<?= $item['nameExt']; ?>"
                                                            data-role="<?= $item['role']; ?>"
                                                            data-accountphoto="<?= $item['accountPhoto']; ?>"
                                                            data-bs-toggle="modal" data-bs-target="#editAccountModal">
                                                            <i class="fa-solid fa-pen-to-square"
                                                                style="padding: 0;"></i>
                                                        </button>

                                                        <button type="button" class="btn btn-danger delete-btn"
                                                            data-id="<?= $item['id'] ?>">
                                                            <i class="fa-solid fa-trash" style="padding: 0;"></i>
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

            <script>
$(document).ready(function() {
    $('#addAccountModal .js-example-basic-single').select2({
        placeholder: 'Select An Option',
        dropdownParent: $('#addAccountModal')
    });

    // Initialize Select2 for Edit Account Modal
    $('#editAccountModal .js-example-basic-single').select2({
        placeholder: 'Select An Option',
        dropdownParent: $('#editAccountModal')
    });
    var table = $('#user').DataTable({
        // dom: 'Bfrtip',
        layout: {
            topStart: {
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            }
        }
    });

    $('#addAccount').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append("type", "add"); // Add the additional field
        console.log(formData);
        $.ajax({
            type: 'POST',
            url: '/add-account',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
                alert('Form submitted successfully');
                $("#uname").val("");
                $("#pw").val("");
                $("#fname").val("");
                $("#mname").val("");
                $("#lname").val("");
                $("#nameExt").val("");
                $("#role").val("");
                $("#accountPhoto").val("");

                location.reload(); //refresh page
            },
            error: function(error) {
                console.log(error);
                alert('Error submitting form');
            }
        });
    });
    $('#editAccountForm').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData($('#editAccountForm')[0]);
        formData.append("type", "save"); // Add the additional field
        console.log(formData);
        $.ajax({
            type: 'POST',
            url: '/edit-account',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
                alert('Updated successfully');
                // location.reload(); //refresh page
            },
            error: function(error) {
                console.log(error);
                alert('Error submitting form');
            }
        });
    });

    $('.edit-btn').click(function() {
        // Fetch data attributes from the clicked edit button
        var id = $(this).data('id');
        var username = $(this).data('username');
        var password = $(this).data('password');
        var firstname = $(this).data('firstname');
        var middlename = $(this).data('middlename');
        var lastname = $(this).data('lastname');
        var nameext = $(this).data('nameext');
        var role = $(this).data('role');
        var accountphoto = $(this).data('accountphoto');

        var currentPhoto = "uploads/account/" + accountPhoto;
        $('#currentPhoto').attr('src', currentPhoto);
        // Populate the edit modal fields with fetched data
        $('#id').val(id);
        $('#edit_uname').val(username);
        $('#edit_pw').val(password);
        $('#edit_fname').val(firstname);
        $('#edit_mname').val(middlename);
        $('#edit_lname').val(lastname);
        $('#edit_nameExt').val(nameext);
        $('#edit_role').val(role).trigger('change'); // Trigger change to update Select2
        // You might need to handle the account photo display separately
    });
    $('.delete-btn').click(function(e) {
        e.preventDefault();
        var id = $(this).data('id');

        if (confirm('Are you sure you want to delete this account?')) {
            var formData = new FormData();
            var formData = new FormData($('#editAccountForm')[0]);
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
                    var res = JSON.parse(response);
                    if (res.success) {
                        alert('Account deleted successfully');
                        location.reload(); // Reload the page to reflect changes
                    } else {
                        alert('Failed to delete account: ' + res
                            .message); // Log the specific error message
                    }
                },
                error: function() {
                    alert('Error occurred while deleting the account');
                }
            });
        }
    });

});
            </script>