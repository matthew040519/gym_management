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
                                        
                                        $products = mysqli_query($con, "SELECT * FROM products WHERE id = '$id'");
                                        while($rowproducts = mysqli_fetch_array($products)){
                                ?>
                                <form method="POST">
                                    <input type="hidden" name="id" value="<?php echo $rowproducts['id']; ?>">
                                    <div class="row g-2">
                                        <div class="col mb-3">
                                            <label for="emailWithTitle" class="form-label">Product Name</label>
                                            <input
                                            type="text"
                                            name="product_name"
                                            id="emailWithTitle"
                                            class="form-control"
                                            placeholder="Type"
                                            value="<?php echo $rowproducts['product_name']; ?>"
                                            />
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col mb-3">
                                            <label for="dobWithTitle" class="form-label">Product Price</label>
                                            <input
                                            type="number"
                                            id="dobWithTitle"
                                            name="product_price"
                                            class="form-control"
                                            placeholder="Rate"
                                            value="<?php echo $rowproducts['price']; ?>"
                                            />
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col mb-3">
                                            <label for="emailWithTitle" class="form-label">Details</label>
                                            <textarea name="details" id="" rows="6" class="form-control"><?php echo $rowproducts['product_details']; ?></textarea>
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
                            $product_name = $_POST['product_name'];
                            $product_price = $_POST['product_price'];
                            $details = $_POST['details'];
                            $product_id = $_POST['id'];

                            mysqli_query($con, "UPDATE products SET `product_name` = '$product_name', `price` = '$product_price', 
                            `product_details` = '$details' WHERE id = '$product_id'");

                            echo "<script>location.replace('products.php')</script>";
                        }
                        
                        
                        ?>
                              </div>
                            </div>
                          </div>
                        </div>