<div class="left-sidebar">

    <div class="Search_products">
        <h2>Search</h2>
        <form action="Search.php" method="get">
            <div class="search_box">
                <input type="text" placeholder="Search" name="txtSearch" />
                <button type="submit">Search</button>
            </div>
        </form>
    </div>

    <div class="clearfix"></div>
    <!--/Types-->
    <div class="Types_products">
        <h2>Category</h2>
        <form action="product.php" method="get">
            <?php
            $result = LoaiSanPhamBUS::LayDSLoaiSP();
            if ($result->num_rows > 0) {
            ?>
                <div class="form-group">
                    <select id="cboLoaiSP" class="form-control" name="maLoaiSP" onchange="this.form.submit();">
                        <option value="*">All</option>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["ID"] . "'>" . $row["Name"] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            <?php
            }
            ?>
        </form>
    </div>

    <!--/category-products-->

    <div class="brands_products">
        <!--brands_products-->
        <h2>Brands</h2>
        <form action="product.php" method="get">
            <?php
            $result = LoaiSanPhamBUS::LayDSBrand();
            if ($result->num_rows > 0) {
            ?>
                <div class="form-group">
                    <select id="cboBrand" class="form-control" name="maBrand" onchange="this.form.submit();">
                        <option value="*">All Brand</option>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["ID"] . "'>" . $row["Name"] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            <?php
            }
            ?>
        </form>
        <!--/brands_products-->

        <div class="shipping text-center">
            <!--Sale event-->
            <a href="product.php" target="_blank"><img src="images/home/sale.jpg" alt="" width="280px" /></a>
        </div>
        <!--sale event-->
    </div>

</div>
<script>
    $(document).ready(function() {
        $("#cboLoaiSP").val("<?php echo $_GET['maLoaiSP']; ?>");
    });
</script>