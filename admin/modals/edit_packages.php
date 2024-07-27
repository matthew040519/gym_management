<div class="modal fade" id="modalCenter<?php echo $row['id']; ?>" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Edit Instructor</h5>
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
                                        
                                        $package = mysqli_query($con, "SELECT * FROM package WHERE id = '$id'");
                                        while($rowpackage = mysqli_fetch_array($package)){
                                ?>
                                <form method="POST">
                                    <input type="hidden" name="id" value="<?php echo $rowpackage['id']; ?>">
                                    <div class="row g-2">
                                        <div class="col mb-3">
                                            <label for="emailWithTitle" class="form-label">Package</label>
                                            <input
                                            type="text"
                                            name="package"
                                            id="emailWithTitle"
                                            class="form-control"
                                            placeholder="Package"
                                            value="<?php echo $rowpackage['package_name']; ?>"
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
                                            value="<?php echo $rowpackage['amount']; ?>"
                                            />
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-md-6">
                                            <div class="col mb-3">
                                                <label for="emailWithTitle" class="form-label">Duration</label>
                                                <select id="" name="duration" class="form-control">
                                                    <option value="Week" <?php echo $rowpackage['type'] = 'Week' ? 'selected' : ''; ?>>Week</option>
                                                    <option value="Months" <?php echo $rowpackage['type'] = 'Months' ? 'selected' : ''; ?>>Months</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col mb-3 mt-4" >
                                                <input
                                                style="margin-top: 30px;"
                                                    type="number"
                                                    name="count"
                                                    id="emailWithTitle"
                                                    class="form-control"
                                                    placeholder="Duration"
                                                    value="<?php echo $rowpackage['count']; ?>"
                                                    />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                      <div class="col mb-3 mt-4" >
                                          <label for="emailWithTitle" class="form-label">Details</label>
                                          <textarea name="details" class="form-control" id=""><?php echo $rowpackage['details']; ?></textarea>
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
                        
                        
                        
                        ?>
                              </div>
                            </div>
                          </div>
                        </div>