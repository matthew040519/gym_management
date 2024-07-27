<div class="modal fade" id="modalCenter<?php echo $row['id']; ?>" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Edit Blogs</h5>
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
                                        
                                        $blogs = mysqli_query($con, "SELECT * FROM blogs WHERE id = '$id'");
                                        while($rowblogs = mysqli_fetch_array($blogs)){
                                ?>
                                <form method="POST">
                                    <input type="hidden" name="id" value="<?php echo $rowblogs['id']; ?>">
                                    <div class="row g-2">
                                        <div class="col mb-3">
                                            <label for="emailWithTitle" class="form-label">Title</label>
                                            <input
                                            type="text"
                                            name="title"
                                            id="emailWithTitle"
                                            class="form-control"
                                            placeholder="Type"
                                            value="<?php echo $rowblogs['title']; ?>"
                                            />
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col mb-3">
                                            <label for="emailWithTitle" class="form-label">Content</label>
                                            <textarea name="content" id="" class="form-control"><?php echo $rowblogs['content']; ?></textarea>
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
                            $title = $_POST['title'];
                            $content = $_POST['content'];
                            $blog_id = $_POST['id'];

                            mysqli_query($con, "UPDATE blogs SET `title` = '$title', `content` = '$content' WHERE id = '$blog_id'");

                            echo "<script>location.replace('blogs.php')</script>";
                        }
                        
                        
                        ?>
                              </div>
                            </div>
                          </div>
                        </div>