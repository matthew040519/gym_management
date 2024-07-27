<div
                          class="modal fade"
                          id="modalCenterdelete<?php echo $row['id']; ?>"
                          aria-labelledby="modalToggleLabel"
                          tabindex="-1"
                          aria-hidden="true"
                        >
                          <div class="modal-dialog modal-sm modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalToggleLabel">Warning</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">
                                <form method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <div style="text-align: center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" style="fill: rgba(215, 32, 32, 1);"><path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>
                               <br>
                                Do you want to delete this package?
                                </div>
                            </div>
                              <div class="modal-footer">
                                <button
                                  class="btn btn-danger"
                                  type="submit"
                                  name="delete"
                                >
                                  Delete
                                </button>
                              </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <?php

                            if(isset($_POST['delete']))
                            {
                                $id = $_POST['id'];

                                mysqli_query($con, "UPDATE package SET `active` = 0 WHERE id = '$id'");

                                echo "<script>location.replace('packages.php')</script>";
                            }
                        
                        ?>