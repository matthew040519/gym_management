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
                                        
                                        $instructor = mysqli_query($con, "SELECT * FROM instructor WHERE id = '$id'");
                                        while($rowInstructor = mysqli_fetch_array($instructor)){
                                ?>
                                <form method="POST">
                                    <input type="hidden" name="id" value="<?php echo $rowInstructor['id']; ?>">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="nameWithTitle" class="form-label">Name</label>
                                            <input
                                            type="text"
                                            name="fullname"
                                            id="nameWithTitle"
                                            class="form-control"
                                            placeholder="Enter Name"
                                            required
                                            value="<?php echo $rowInstructor['fullname']; ?>"
                                            />
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col mb-3">
                                            <label for="emailWithTitle" class="form-label">Contact Number</label>
                                            <input
                                            type="text"
                                            name="contact_number"
                                            id="emailWithTitle"
                                            class="form-control"
                                            placeholder="Contact Number"
                                            required
                                            value="<?php echo $rowInstructor['contact']; ?>"
                                            />
                                        </div>
                                        <div class="col mb-3">
                                            <label for="dobWithTitle" class="form-label">Address</label>
                                            <input
                                            type="text"
                                            id="dobWithTitle"
                                            name="address"
                                            class="form-control"
                                            placeholder="address"
                                            required
                                            value="<?php echo $rowInstructor['address']; ?>"
                                            />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="nameWithTitle" class="form-label">Biography</label>
                                           <textarea name="bio" class="form-control" id="" required><?php echo $rowInstructor['biography']; ?></textarea>
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
                            $fullname = $_POST['fullname'];
                            $contact_number = $_POST['contact_number'];
                            $address = $_POST['address'];
                            $bio = $_POST['bio'];
                            $instructor_id = $_POST['id'];

                            mysqli_query($con, "UPDATE instructor SET `fullname` = '$fullname', `contact` = '$contact_number', `address` = '$address',
                            `biography` = '$bio' WHERE `id` = '$instructor_id'");

                            echo "<script>location.replace('instructor.php')</script>";
                        }
                        
                        ?>
                              </div>
                            </div>
                          </div>
                        </div>