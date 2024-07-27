<div class="modal fade" id="modalCenter<?php echo $row['id']; ?>" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Edit Rate</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">
                                <?php 
                                        $id = $row['id'];
                                        
                                        $rates = mysqli_query($con, "SELECT * FROM rates WHERE id = '$id'");
                                        while($rowrates = mysqli_fetch_array($rates)){
                                ?>
                                <form method="POST">
                                    <input type="hidden" name="id" value="<?php echo $rowrates['id']; ?>">
                                    <div class="row g-2">
                                        <div class="col mb-3">
                                            <label for="emailWithTitle" class="form-label">Type</label>
                                            <input
                                            type="text"
                                            name="type"
                                            id="emailWithTitle"
                                            class="form-control"
                                            placeholder="Type"
                                            value="<?php echo $rowrates['type']; ?>"
                                            />
                                        </div>
                                        <div class="col mb-3">
                                            <label for="dobWithTitle" class="form-label">Rate</label>
                                            <input
                                            type="number"
                                            id="dobWithTitle"
                                            name="rate"
                                            class="form-control"
                                            placeholder="Rate"
                                            value="<?php echo $rowrates['rate']; ?>"
                                            />
                                        </div>
                                    </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                <input type="submit" class="btn btn-primary" name="update" value="Save Changes">
                        </form>
                        <?php }
                        
                        
                        if(isset($_POST['update']))
                        {
                            $type = $_POST['type'];
                            $rate = $_POST['rate'];
                            $rate_id = $_POST['id'];

                            mysqli_query($con, "UPDATE rates SET `type` = '$type', `rate` = '$rate' WHERE id = '$rate_id'");

                            echo "<script>location.replace('rates.php')</script>";
                        }
                        
                        
                        ?>
                              </div>
                            </div>
                          </div>
                        </div>