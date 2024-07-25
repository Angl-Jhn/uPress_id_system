            <?php
            include_once("././model/formConfigurationModel.php");
            $obj = new formConfigModel();
            $get = $obj->getForm();
            ?>
            <main class="content px-3 py-2" style="height: 100vh;">
                <div class="container-fluid h-100">
                    <div class="row d-flex justify-content-center align-items-center gap-3">
                        <div class="col-md-12 text-start py-4">
                            <div class="card-header">
                                <h2>Form Configuration</h2>
                            </div>
                        </div>
                        <div class="col-md-12 config py-3 px-2 text-center align-items-center bg-dark-subtle">
                            <div class="col-md-12 text-center py-2">
                                <div class="card-header">
                                    <h4>Student Form</h4>
                                </div>
                            </div>
                            <div class="col-md-12 col-12 py-4 px-0 d-flex justify-content-center" style="width: 100%;">
                                <div class="row g-3 d-flex justify-content-center align-items-center">
                                    <div class="col-auto">
                                        <label for="UpressFR" class="col-form-label">WMSU-UPRESS-FR-</label>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" id="UpressFR" class="form-control text-center"
                                            value="<?=htmlspecialchars($get['value'])?>">
                                    </div>
                                    <div class="col-auto">
                                        <label for="EffDate" class="col-form-label">Effective Date</label>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" id="EffDate" class="form-control text-center"
                                            value="<?=htmlspecialchars($get['value'])?>">
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-success btn-cirlce btn-sm edit-btn "
                                            data-id="<?= $get['id']; ?>" data-bs-toggle="modal" data-bs-target="">Update
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 config py-3 px-2 text-center align-items-center bg-dark-subtle">
                            <div class="col-md-12 text-center py-2">
                                <div class="card-header">
                                    <h4>Employee Form</h4>
                                </div>
                            </div>
                            <div class="col-md-12 col-12 py-4 px-0 d-flex justify-content-center" style="width: 100%;">
                                <div class="row g-3 d-flex justify-content-center align-items-center">
                                    <div class="col-auto">
                                        <label for="UpressFR" class="col-form-label">WMSU-UPRESS-FR-</label>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" id="UpressFR" class="form-control text-center"
                                            value="<?=htmlspecialchars($get['value'])?>">
                                    </div>
                                    <div class="col-auto">
                                        <label for="EffDate" class="col-form-label">Effective Date</label>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" id="EffDate" class="form-control text-center"
                                            value="<?=htmlspecialchars($get['value'])?>">
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-success btn-cirlce btn-sm edit-btn "
                                            data-id="<?= $get['id']; ?>" data-bs-toggle="modal" data-bs-target="">Update
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>