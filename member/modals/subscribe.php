<div class="modal fade" id="modalCenter<?php echo $row['id']; ?>" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Confirmation</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">
                                <?php
                                    $package_id = $row['id'];
                                    $query2 = mysqli_query($con, "SELECT * FROM package WHERE id = '$package_id'");
                                    $row1 = mysqli_fetch_array($query2);
                                ?>
                                <form method="POST">
                                    <input type="hidden" name="id" value="<?php echo $row1['id']; ?>">
                                
                                <h3 class="text-center" style="color: green;">Do you want to subscribe to this package?</h3>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                                  Cancel
                                </button>
                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                 <a href="instructor.php?package=<?php echo $package_id; ?>" class="btn btn-outline-success">Yes</a>
                                <!-- <input type="submit" class="btn btn-outline-success" name="subs" value="Yes"> -->
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>

                        