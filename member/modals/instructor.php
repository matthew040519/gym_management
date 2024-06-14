<div class="modal fade" id="modalCenter<?php echo $row['id']; ?>" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <?php

                                  $instructor_id = $row['id'];

                                  $query_instructor = mysqli_query($con, "SELECT * FROM instructor WHERE id = '$id'");
                                  $row_instructor = mysqli_fetch_array($query_instructor);

                                  $countSlotsAM = mysqli_query($con, "SELECT COUNT(*) as count FROM member_package 
                                  WHERE instructor_id = '$instructor_id' AND schedule = 'AM'");
                                  $rowCountsAM = mysqli_fetch_array($countSlotsAM);
                                  $countAM = mysqli_num_rows($countSlotsAM) == 0 ? 3 : 3 - $rowCountsAM['count'];

                                  $countSlotsPM = mysqli_query($con, "SELECT COUNT(*) as count FROM member_package 
                                  WHERE instructor_id = '$instructor_id' AND schedule = 'PM'");
                                  $rowCountsPM = mysqli_fetch_array($countSlotsPM);
                                  $countPM = mysqli_num_rows($countSlotsPM) == 0 ? 3 : 3 - $rowCountsPM['count'];
                                
                                ?>
                                <h5 class="modal-title" id="modalCenterTitle"><?php echo $row_instructor['fullname']; ?></h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">
                                <form method="POST" enctype="multipart/form-data">
                                  <input type="hidden" name="instructor_id" value="<?php echo $row_instructor['id']; ?>">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="nameWithTitle" class="form-label">Schedule</label>
                                            <select name="schedule" class="form-control" id="">
                                              <option value="AM">AM</option>
                                              <option value="PM">PM</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="nameWithTitle" class="form-label">AM SLOT</label>
                                            <input type="text" value="<?php echo $countAM; ?>" readonly class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="nameWithTitle" class="form-label">PM SLOT</label>
                                            <input type="text" value="<?php echo $countPM; ?>" readonly class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="nameWithTitle" class="form-label">Mode of Payment</label>
                                            <select name="mop" class="form-control" id="mop">
                                              <option value="Cash">Cash</option>
                                              <option value="Paypal">Paypal</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div style="display: none;" id="paypal-button-container"></div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                <input type="submit" class="btn btn-primary" name="submit" value="Save Changes">
                        </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        <script src="../assets/vendor/libs/jquery/jquery.js"></script>
                        <script>
    $(document).ready(function () {

        $('#mop').change(function() {
            var mop = $('#mop').val();
            console.log(mop)
            if(mop == 'Cash')
            {
                $('#modalfooter').css('display', 'block');
                $('#paypal-button-container').css('display', 'none');
            }
            else if(mop == 'Paypal')
            {
                $('#paypal-button-container').css('display', 'block');
                $('#modalfooter').css('display', 'none');
            }
             
        });

    })
</script>