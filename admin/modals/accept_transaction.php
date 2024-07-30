<div class="modal fade" id="modalCenter<?php echo $row['member_package_id']; ?>" tabindex="-1" aria-hidden="true">
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
                                    // $package_type = rtrim($row['type'], "s");
                                    $package_type = $row['type'];
                                    $package_count = $row['count'];
                                    $member_package_id = $row['member_package_id'];
                                    $query2 = mysqli_query($con, "SELECT member_package.id as id, DATE_ADD(CURRENT_TIMESTAMP, INTERVAL $package_count $package_type) AS end_date FROM member_package 
                                    INNER JOIN package ON package.id=member_package.package_id WHERE member_package.id = '$member_package_id'");
                                    $row1 = mysqli_fetch_array($query2);
                                ?>
                                <form method="POST">
                                    <input type="hidden" name="id" value="<?php echo $row1['id']; ?>">
                                    <input type="hidden" name="end_date" value="<?php echo $row1['end_date']; ?>">
                                    
                                <h3 class="text-center" style="color: green;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" style="fill: rgba(40, 190, 39, 1);"><path d="M4.035 15.479A3.976 3.976 0 0 0 4 16c0 2.378 2.138 4.284 4.521 3.964C9.214 21.198 10.534 22 12 22s2.786-.802 3.479-2.036C17.857 20.284 20 18.378 20 16c0-.173-.012-.347-.035-.521C21.198 14.786 22 13.465 22 12s-.802-2.786-2.035-3.479C19.988 8.347 20 8.173 20 8c0-2.378-2.143-4.288-4.521-3.964C14.786 2.802 13.466 2 12 2s-2.786.802-3.479 2.036C6.138 3.712 4 5.622 4 8c0 .173.012.347.035.521C2.802 9.214 2 10.535 2 12s.802 2.786 2.035 3.479zm1.442-5.403 1.102-.293-.434-1.053A1.932 1.932 0 0 1 6 8c0-1.103.897-2 2-2 .247 0 .499.05.73.145l1.054.434.293-1.102a1.99 1.99 0 0 1 3.846 0l.293 1.102 1.054-.434C15.501 6.05 15.753 6 16 6c1.103 0 2 .897 2 2 0 .247-.05.5-.145.73l-.434 1.053 1.102.293a1.993 1.993 0 0 1 0 3.848l-1.102.293.434 1.053c.095.23.145.483.145.73 0 1.103-.897 2-2 2-.247 0-.499-.05-.73-.145l-1.054-.434-.293 1.102a1.99 1.99 0 0 1-3.846 0l-.293-1.102-1.054.434A1.935 1.935 0 0 1 8 18c-1.103 0-2-.897-2-2 0-.247.05-.5.145-.73l.434-1.053-1.102-.293a1.993 1.993 0 0 1 0-3.848z"></path><path d="m15.742 10.71-1.408-1.42-3.331 3.299-1.296-1.296-1.414 1.414 2.704 2.704z"></path></svg><br>
                                  Do you want to accept this subscription?</h3>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                <input type="submit" class="btn btn-primary" name="accept" value="Save Changes">
                        </form>
                              </div>
                            </div>
                          </div>
                        </div>

                       