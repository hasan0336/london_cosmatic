
<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="index1.php" class="nav-link <?php if($page=='index1.php'){echo 'active';}?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
               
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="sale.php" class="nav-link <?php if($page=='sale.php'){echo 'active';}?> ">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Sales
                
              </p>
            </a>
          </li>
          <li class="nav-header">Manage</li>
          <!-- <li class="nav-item has-treeview">
            <a href="homesetting.php" class="nav-link <?php if($page=='homesetting.php'){echo 'active';}?> ">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home Page Content
               
              </p>
            </a>
          </li> -->
          <li class="nav-item has-treeview">
            <a href="EditIndexpage.php" class="nav-link <?php if($page=='EditIndexpage.php'){echo 'active';}?> ">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Index Page Content
               
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="addBlog.php" class="nav-link <?php if($page=='addBlog.php'){echo 'active';}?> ">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Add Blog Content
               
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="customer.php" class="nav-link <?php if($page=='customer.php'){echo 'active';}?> ">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Customer
               
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="order.php" class="nav-link <?php if($page=='order.php'){echo 'active';}?> ">
              <i class="nav-icon far fa-circle "></i>
              <p>
                Orders
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Products
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
			<li class="nav-item">
                <a href="addproduct.php" class="nav-link <?php if($page=='addproduct.php'){echo 'active';}?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Product</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="showproduct.php" class="nav-link <?php if($page=='showproduct.php'){echo 'active';}?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="addcategory.php" class="nav-link <?php if($page=='addcategory.php'){echo 'active';}?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="subcategory.php" class="nav-link <?php if($page=='subcategory.php'){echo 'active';}?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sub Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="addbrand.php" class="nav-link <?php if($page=='addbrand.php'){echo 'active';}?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Brand</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="addcolor.php" class="nav-link <?php if($page=='addcolor.php'){echo 'active';}?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Color</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="addstyle.php" class="nav-link <?php if($page=='addstyle.php'){echo 'active';}?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Style</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Gateway Setting
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="paypal.php" id="paypal" data-title="PayPal Setting" class="nav-link <?php if($page=='paypal.php'){echo 'active';}?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>PayPal Setting</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="barclay.php" id="bar" data-title="Barclay Setting" class="nav-link <?php if($page=='barclay.php'){echo 'active';}?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lloyds Setting</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="message.php" class="nav-link <?php if($page=='message.php'){echo 'active';}?> ">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Contact Message
                
              </p>
            </a>
            
          </li>
          <li class="nav-item has-treeview">
            <a href="manageevent.php" id="event" data-title="Manage Event" class="nav-link <?php if($page=='manageevent.php'){echo 'active';}?> ">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Manage Event
                
              </p>
            </a>
            
          </li>
          <li class="nav-item has-treeview">
            <a href="shippingcharge.php" id="sc" data-title="Shipping Charges" class="nav-link <?php if($page=='shippingcharge.php'){echo 'active';}?> ">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Shipping Charges
                
              </p>
            </a>
            
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Footer Pages
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="deliveryandreturn.php" id="d" data-title="Delivery & Return" class="nav-link <?php if($page=='deliveryandreturn.php'){echo 'active';}?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Delivery & Return</p>
                </a>
              </li>
            <li class="nav-item">
                <a href="faqs.php" id="d4" data-title="FAQs" class="nav-link <?php if($page=='faqs.php'){echo 'active';}?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>FAQs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="aboutus.php" id="d5" data-title="About Us" class="nav-link <?php if($page=='aboutus.php'){echo 'active';}?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>About Us</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="contactus.php" id="d6" data-title="Contact Us" class="nav-link <?php if($page=='contactus.php'){echo 'active';}?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contact Us</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="termsandconditions.php" id="d7" data-title="Terms & Conditions" class="nav-link <?php if($page=='termsandconditions.php'){echo 'active';}?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Terms & Conditions</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
                <a href="adminprofile.php" id="p1" data-title="Profile" class="nav-link <?php if($page=='adminprofile.php'){echo 'active';}?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../Controller/LogoutController.php" class="nav-link <?php if($page=='LogoutController.php'){echo 'active';}?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sign Out</p>
                </a>
              </li>
          
        </ul>
      </nav>