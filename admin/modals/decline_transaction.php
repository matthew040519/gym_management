<div class="modal fade" id="modalCenterdecline<?php echo $row['member_package_id']; ?>" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle"></h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">
                                <form method="POST">
                                <?php
                                    $package_type = $row['type'];
                                    $member_package_id = $row['member_package_id'];
                                    $query2 = mysqli_query($con, "SELECT member_package.id as id, DATE_ADD(CURRENT_TIMESTAMP, INTERVAL package.count $package_type) AS end_date FROM member_package 
                                    INNER JOIN package ON package.id=member_package.package_id WHERE member_package.id = '$member_package_id'");
                                    $row1 = mysqli_fetch_array($query2);
                                ?>
                                <form method="POST">
                                    <input type="hidden" name="id" value="<?php echo $row1['id']; ?>">
                                    <input type="hidden" name="end_date" value="<?php echo $row1['end_date']; ?>">
                                
                                <h3 class="text-center" style="color: red;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" style="fill: rgba(234, 34, 34, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg><br>
                                    Do you want to decline this subscription?</h3>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                <input type="submit" class="btn btn-primary" name="decline" value="Save Changes">
                        </form>
                              </div>
                            </div>
                          </div>
                        </div>