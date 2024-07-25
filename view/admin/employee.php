            <main class="content px-3 py-2" style="height: 100vh;">
                <div class="container-fluid h-100 w-75 d-flex justify-content-center align-items-center">
                    <div class="row layout py-3 px-2 gap-4 justify-content-center text-center bg-dark-subtle">
                        <div class="col-md-12 text-center py-2">
                            <div class="card-header">
                                <h2>Employee ID</h2>
                            </div>
                        </div>
                        <div class="col-md-5 py-3">
                            <div style="position: relative; left: 50%; transform: translateX(-50%); display: block; 
                                background-image: url('../../assets/id_layouts/EMPLOYEE/CSM.png'); width:316px; height: 204px; 
                                background-size: 321px 204px; background-position: center; background-repeat: no-repeat; 
                                border: 1px solid black; border-radius: 10px">
                                <img src="../../assets/id_layouts/sample.png" style="position: absolute; left: 12px; 
                                    bottom: 19px; max-width: 120px; display: block; margin: auto;">
                                <p style="position: absolute; left: 45px; bottom: -14px; color: black; 
                                    text-align: center; z-index: 1; font-weight: bold; font-size: 9px">
                                    00149</p>
                                <p style="position: absolute; left: 145px; right: 10px; top: 62px; color: black; 
                                    text-align: center; z-index: 1; font-weight: 600; font-size: 12px;">
                                    JUAN DELA CRUZ</p>
                                <p style="position: absolute; left: 145px; right: 10px; top: 80px; color: black; 
                                    text-align: center; z-index: 1; font-weight: 600; font-size: 9px;">
                                    University Professor</p>
                                <p style="position: absolute; left: 145px; right: 10px; top: 93px; color: black;
                                    text-align: center; z-index: 1; font-weight: 600; font-size: 9px;">
                                    College of Computing Studies</p>
                                <img src="../../assets/id_layouts/signature.png" style="position: absolute; right: 60px; 
                                    bottom: 10px; max-width:60px; max-height:30px; display: block; margin: auto;">
                                <p style="position: absolute; left: 158px; right: 20px; bottom: -6px; color: black; 
                                    text-align: center; z-index: 1; font-weight: 800; font-size: 6px">
                                    MA. CARLA A. OCHOTORENA, RN, Ph.D</p>
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
                                    San Roque, Gil S. Estrada Compound, Z.C.</p>
                                <p style="position: absolute; left: 60px; bottom: 69.6px; color: black; 
                                    font-size: 5px; font-weight: 900;">
                                    03/27/2003</p>
                                <p style="position: absolute; left: 57px; bottom: 53.5px; color: black; 
                                    font-size: 5px; font-weight: 900;">
                                    09451830519</p>
                                <p style="position: absolute; left: 145px; bottom: 69.6px; color: black; 
                                    font-size: 5px; font-weight: 900;">
                                    O+</p>
                                <p style="position: absolute; left: 145px; bottom: 53.5px; color: black;
                                    font-size: 5px; font-weight: 900;">
                                    Single</p>
                                <p style="position: absolute; left: 205px; bottom: 45px; color: black; 
                                    font-size: 8px; font-weight: 900;">
                                    Amelia Dela Cruz</p>
                                <p style="position: absolute; left: 175px; bottom: 30px; color: black; 
                                    font-size: 6px; font-weight: 900;">
                                    San Roque, Gil S. Estrada Compound, Z.C.</p>
                                <p style="position: absolute; left: 210px; bottom: 11px; color: black; 
                                    font-size: 8px; font-weight: 900;">
                                    09061648927</p>
                                <img src="../../assets/id_layouts/signature.png" style="position: absolute; 
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
            <div class="modal fade" id="PresidentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">New President
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="height: calc(100vh - 200px); overflow-y: auto;">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
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
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#PresidentModal">New President</button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="presList" class="table table-striped table-hover" style="width: 100%;">
                                    <thead>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Signature</th>
                                        <th scope="col">Status</th>
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


            <script>
$(document).ready(function() {
    let table = $('#presList').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'pdf'
        ]
    });

    $('#employeeID').on('hidden.bs.modal', function() {
        // Destroy DataTable to reset and prevent reinitialization issues
        table.destroy();
        // Optionally, reinitialize the DataTable if you want to keep it ready  
        table = $('#presList').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'pdf'
            ]
        });
    });
});
            </script>