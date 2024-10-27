<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="css/adminClone.css">
	<link rel="stylesheet" type="text/css" href="css/formEditing.css">
	<meta charset="UTF-8">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/x-icon" href="image/webicon.png">
	<title>Dashboard</title>
</head>
<style type="text/css">
	.my-actions {
  margin: 2em 2em 0;
}

.order-1 {
  order: 1;
}

.order-2 {
  order: 2;
}

.order-3 {
  order: 3;
}

.right-gap {
  margin-right: auto;
}
.custom-swal {
    height: 700px;
    overflow-y: auto;
}

	 form {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        * {
        box-sizing: border-box;
    }
        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
        #overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5); /* Semi-dark background color */
        z-index: 999;
    }
         #dateTimeForm {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: white;
        padding: 20px;
        z-index: 1000;
    }

    #closeButton {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
    }

    label {
        display: block;
        margin-bottom: 8px;
        margin-top: 8px; /* Add margin to the top */
    }

    input {
        width: 100%;
        padding: 8px;
        margin-bottom: 16px;
        box-sizing: border-box;
    }
    #logoutbtn{
    	background-color: transparent;
    	border: none;
    }
    #formlog{
    	border: none;
    	box-shadow: none;
    	padding: 0;
    	margin: 0;
    }
    #formlog input{
    	font-size: 15px;
    }
    .action-buttons{
    	display: flex;
    	justify-content: space-evenly;
    	align-items: center;
    }
    .action-buttons img {
            width: 25px;
            height: 25px;
            cursor: pointer;
        }
        .sub_menu {
            display: none;
            list-style-type: none;
            padding-left: 30px;
            opacity: 0;
    		transition: opacity 1s ease-in-out;
        }
		.sub_menu.show {
		    display: block;
		    opacity: 1;
		}
        .sub_menu a {
            text-decoration: none;
            color: black;
        }
        #manage{
        	display: flex;
        	grid-gap: 8px;
        }
        
    </style>
<body>

	<div class="nav">
		
		<ul>
			<div class="name">
				<p>ADMIN</p>
			</div>
			<div class="anchor">

				<a href="adminClone.php"><div class="flex">
					<div class="li_img">
						<img src="image/home.png">
					</div>
					<div class="li_name">
						<li>DASHBOARD</li>
					</div>
				</div></a>

            	<div class="dropdown">
                    <a href="#" class="management">
                        <div class="flex">
                            <div class="li_img">
                                <img src="image/candidate.png">
                            </div>
                            <div class="li_name" id="manage">
                            	<div>
                            		<li>MANAGEMENT</li>
                            	</div>
                                <div class="drop">
                                	<li>+</li>
                                </div>
                                
                            </div>
                        </div>
                    </a>
                    <ul class="sub_menu">
                    	<a href="" class="manage"><li>Customers</li></a>
                        <a href="" class="productManage"><li>Products</li></a>
                        <a href="" class="staff"><li>Staff</li></a>
                    </ul>
                </div>

				<div class="dropdown">
                    <a href="#" class="management">
                        <div class="flex">
                            <div class="li_img">
                                <img src="image/communications.png">
                            </div>
                            <div class="li_name" id="manage">
                            	<div>
                            		<li>INTERACT</li>
                            	</div>
                                <div class="drop">
                                	<li>+</li>
                                </div>
                                
                            </div>
                        </div>
                    </a>
                    <ul class="sub_menu">
                    	<a href="message.php" class=""><li>Messages</li></a>
                        <a href="" class=""><li>Feedback</li></a>
                        <a href="" class=""><li>Ratings</li></a>
                    </ul>
                </div>

				<a href="#"><div class="flex">
					<div class="li_img">
						<img src="image/rankings.png">
					</div>
					<div class="li_name">
						<li>FEEDBACK</li>
					</div>
				</div></a>

				<a href="#"><div class="flex">
					<div class="li_img">
						<img src="image/setting.png">
					</div>
					<div class="li_name setting">
						<li>SETTINGS</li>
					</div>
				</div></a>
					<!-- <ul class="">
						<a href=""><li>add candidates</li></a>
						<a href=""><li>add candidates</li></a>
					</ul> -->
				
			</div>
			
			
		</ul>
	</div>



	
	<section class="content section1" >
		<div class="dashboard_holder">
			<div class="dashboard_title">

			  	<div class="new_btn_holder">
			  		<div class="hamburger">
						<span></span>
					</div>

					<div class="new_nav">
		
						<ul>
							<div class="new_name">
								<p>MENU</p>
							</div>
							<div class="popnav">

								<a href="admin.php"><div class="flex">
									<div class="li_img">
										<img src="image/home.png">
									</div>
									<div class="li_name">
										<li>DASHBOARD</li>
									</div>
								</div></a>

								<a href="#"><div class="flex">
									<div class="li_img">
										<img src="image/candidate.png">
									</div>
									<div class="li_name">
										<li>CANDIDATE</li>
									</div>
								</div></a>

								<a href="add_stud_firebase.php"><div class="flex">
									<div class="li_img">
										<img src="image/voters.png">
									</div>
									<div class="li_name">
										<li>VOTERS</li>
									</div>
								</div></a>

								<a href="#"><div class="flex">
									<div class="li_img">
										<img src="image/rankings.png">
									</div>
									<div class="li_name">
										<li>RESULTS</li>
									</div>
								</div></a>
				
							</div>
			
			
						</ul>
					</div>
					
			  	</div>

				<div>
					<h2>DASHBOARD</h2>
				</div>

				<div class="divide">
					<div class="admin_img">
						<div>
							<?php
								if (isset($_SESSION['username'])) {
    							echo "Welcome, " . $_SESSION['fname'] ." ". $_SESSION['lname'] . "!";
								}
							?>
						</div>
						<div>
							<img src="image/avenueLogo.png">
						</div>
					</div>
					<div class="logout_part">
						<div>
							<?php 
								echo "<form id='formlog' action='' method='post'>";
								echo "<input type='submit' id='logoutbtn' value='Logout' name='logout'>";
								echo "</form>";
							?>
						</div>
						<div>
							<img src="image/logout.png">
						</div>	
					</div>
				</div>
			</div>
		
			<div id="overlay">

			<form id="dateTimeForm">
    
    			<div>
        			<h2>Add Category</h2>
    			</div>
    			<div>
        			<input type="text" id="category"  placeholder="Category Name" required>
    			</div>
    			<div class="button_holder">
        			<div>
        				<button id="cancel" onclick="hideForm()">Cancel</button>
        			</div>
        			<div>
    					<button type="button" id="confirm" onclick="sendData()">Confirm</button>
    				</div>
    			</div> 
			</form>


			<form id="products">
    			<div>
        			<h2>Add Products</h2>
    			</div>
    			<div class="productsHolder">
    				<div class="txtborder Name">
    					<p>Product Name*</p>
        				<input type="text" id="productName" required autofocus>
    				</div>

    				<div class="txtborder Category">
    					<p>Product Category*</p>
        				<select id="categorySelect" required>
        				</select>
    				</div>

    				<div class="txtborder">
            			<p>Product Flavor #1*</p>
            			<input type="text" id="productFlavor1"  autofocus>
            			<p id="anotherFlavor1" onclick="showAnotherFlavor1()">*Add Another flavor #2*</p>
            			<div id="another_flavor1" style="display: none;">
            			    <p>Flavor #2*</p>
            			    <input type="text" id="productFlavor2"  autofocus>
            			    <p id="anotherFlavor2" onclick="showAnotherFlavor2()">*Add Another flavor #3*</p>
            			    <div id="another_flavor2" style="display: none;">
            			        <p>Flavor #3*</p>
            			        <input type="text" id="productFlavor3"  autofocus>
            			        <p id="anotherFlavor3" onclick="showAnotherFlavor3()">*Add Another flavor #4*</p>
            			        <div id="another_flavor3" style="display: none;">
            			            <p>Flavor #4*</p>
            			            <input type="text" id="productFlavor4"  autofocus>
            			            <p id="anotherFlavor4" onclick="showAnotherFlavor4()">*Add Another flavor #5*</p>
            			            <div id="another_flavor4" style="display: none;">
            			                <p>Flavor #5*</p>
            			                <input type="text" id="productFlavor5"  autofocus>
            			            </div>
            			        </div>
            			    </div>
            			</div>
        			</div>

    				<div class="txtborder Price">
        				<div class="file_holder">
        					<p>Upload Product Image*</p>
        					<input type="file" name="" id="img">
        				</div>
        			</div>


    				<div class="txtborder">
    					<p>Product Price*</p>
    					<div id="holderSize">
        					<div>
        						<select id="size1" onchange="updateOptions()">
        							<option disabled selected>Set Size</option>
        							<option value="Regular">Regular</option>
        							<option value="Large">Large</option>
        							<option value="Small">Small</option>
        						</select>
        					</div>
        					<div>
        						<input type="number" id="productQuantity1" name="" placeholder="Enter Price" required oninput="limitDigits(this)">
        					</div>
        				</div>

        			<p id="another" onclick="showAnother()">*Add Another Size & Price*</p>
        			<div id="another_popup">
        				<div id="holderSize">
        					<div>
        						<select id="size2" onchange="updateOptionsReverse()">
        							<option disabled selected>Set Size</option>
        							<option value="Regular">Regular</option>
        							<option value="Large">Large</option>
        							<option value="Small">Small</option>
        						</select>
        					</div>
        					<div>
        						<input type="number" id="productQuantity2" name="" placeholder="Enter Price" required oninput="limitDigits(this)">
        					</div>
        				</div>
        			</div>

    				</div>

    				<div class="txtborder Price">
        				<div class="file_holder">
        					<p>Upload Product Qr Code*</p>
        					<input type="file" name="" id="QrCodeIMG">
        				</div>
        			</div>
    				
        			
    			</div>
    			<div class="button_holder">
        			<div>
        				<button id="cancel" class="cancelBtn" onclick="hideProd()">Cancel</button>
        			</div>
        			<div>
    					<button type="button" id="confirm" onclick="sendProd()">Confirm</button>
    				</div>
    			</div>  
			</form>


			</div>

			<div class="staffOverlay">
				<form id="staff_form">
    			<div>
        			<h2>Add Staff</h2>
    			</div>
    			<div class="productsHolder">
    				<div class="txtborder Name">
    					<p>Staff Name*</p>
        				<input type="text" id="staffName" required autofocus>
    				</div>

    				<div class="txtborder Category">
    					<p>Gender*</p>
    					<select>
    						<option>Male</option>
    						<option>Female</option>
    					</select>
    				</div>

    				<div class="txtborder Category">
    					<p>Phone Number*</p>
        				<input type="number" id="staffNumber" required maxlength="11" pattern="\d*">
    				</div>

    				<div class="txtborder Name">
    					<p>Gmail*</p>
        				<input type="email" id="staffGmail" required>
    				</div>

    				<div class="txtborder Name">
    					<p>Address*</p>
        				<input type="text" id="staffAddress" required>
    				</div>

    				<div class="txtborder Name">
    					<p>Position*</p>
        				<input type="text" id="staffPosition" required>
    				</div>

    				

    				<div class="txtborder Price">
        				<div class="file_holder">
        					<p>Upload Image*</p>
        					<input type="file" name="" id="staffImage">
        				</div>
        			</div>

    				
        			
    			</div>
    			<div class="button_holder">
        			<div>
        				<button id="cancel" class="cancelBtn" onclick="hideStaff()">Cancel</button>
        			</div>
        			<div>
    					<button type="button" id="confirm" onclick="sendStaff()">Confirm</button>
    				</div>
    			</div>  
			</form>
			</div>

			<div class="new_holder">
				<div class="inner_flex">

					<div class="leftside">
						<div class="chartBar">
							<p>Monthly Sales</p>
							<canvas id="barChart" style=" height: 90%;"></canvas>
						</div>
						<div class="customer_list">
							<div class="cust_holder">
								<p>Customer List</p>
								<p class="manage">view</p>
							</div>
							<div class="user_display">
								
							</div>
						</div>
					</div>
					<div class="rightside">
						<div class="innerrightside">

							<div class="donutholder">
								<div class="chartDougnut">
									<p>Top Selling Product</p>
									<canvas id="dougnutChart"></canvas>
								</div>
							</div>
							

							<div class="newcard">
								
								<div class="card">
									<div class="reg_voters">
										<p>Registered Staff</p>
									</div>
									<div class="card_icon">
										<div class="numbers" id="registeredVotersCount">
											<p class="staffNum">00</p>
										</div>
										<div>
											<img src="image/voting.png">	
										</div>
									</div>
		    					</div>

		    					<div class="card">
									<div class="reg_voters">
										<p>Registered Customer</p>
									</div>
									<div class="card_icon">
										<div class="numbers" id="candidatesCount">
											<p class="custNum">00</p>
										</div>
										<div>
											<img src="image/candidate1.png">	
										</div>
									</div>
		    					</div>

		    					<div class="card">
									<div class="reg_voters">
										<p>Numbers of Products</p>
									</div>
									<div class="card_icon">
										<div class="numbers">
											<p class="prodNum">00</p>
										</div>
										<div>
											<img src="image/product.png">	
										</div>
									</div>
		    					</div>

		    					<div class="card">
									<div class="reg_voters">
										<p>Daily Profit</p>
									</div>
									<div class="card_icon">
										<div class="numbers">
											<p class="totalProfit">00</p>
										</div>
										<div>
											<img src="image/cash.png">	
										</div>
									</div>
		    					</div>

							</div>

						</div>
						<div class="tableHolder">
							<div class="table1">
								<div class="order">
									<div>
										<p id="tableTitle">Pending Orders</p>
									</div>
									<div class="tableBtnHolder">
										<div>
                    						<button id="btnPending">Pending Orders</button>
                						</div>
                						<div>
                    						<button id="btnAccepted">Accepted Orders</button>
               						 	</div>
               						 	<div>
               						     	<button id="btnToShip">To Ship Orders</button>
               						 	</div>
               						 	<div>
               						     	<button id="btnCompleted">Completed Orders</button>
               						 	</div>
									</div>
            					</div>

                				<table id="ordersTable">
                    				<thead>
                        				<tr>
                            				<th>Customer</th>
                            				<th>Product</th>
                            				<th>Price</th>
                            				<th>Quantity</th>
                            				<th>Size</th>
                            				<th>Payment</th>
                            				<th>Status</th>
                            				<th>Action</th>
                        				</tr>
                    				</thead>
                    				<tbody id="ordersTableBody">
                        
                    				</tbody>
                				</table>

        <table id="acceptedOrdersTable" style="display:none;">
            <thead>
                <tr>
                    <th>Customer</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Size</th>
                    <th>Payment</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="acceptedOrdersTableBody">
                <!-- Accepted orders will be displayed here -->
            </tbody>
        </table>

        <!-- To Ship Orders Table -->
        <table id="toShipOrdersTable" style="display:none;">
            <thead>
                <tr>
                    <th>Customer</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Size</th>
                    <th>Payment</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="toShipOrdersTableBody">
                <!-- To ship orders will be displayed here -->
            </tbody>
        </table>

        <!-- Completed Orders Table -->
        <table id="completedOrdersTable" style="display:none;">
            <thead>
                <tr>
                    <th>Customer</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Size</th>
                    <th>Payment</th>
                    <th>Status</th>
                    
                </tr>
            </thead>
            <tbody id="completedOrdersTableBody">
                <!-- Completed orders will be displayed here -->
            </tbody>
        </table>                				
							</div>

							
						</div>
						

					</div>

				</div>	
			</div>

		</div>
	</section>
	
	<div class="custpopupoverlay">

		<div class="holding">
			<div class="customer_details">
				<div class="close">&times;</div>
			</div>
			<div class="custpopup">
				<div class="xbtn">&times;</div>
				<h2>Manage Customer Account</h2>

				<div class="user_manage"></div>
			</div>
		</div>

	</div>

	<div class="custpopupoverlay1">

		<div class="holding">
			<div class="">
				<div class="close">&times;</div>
			</div>
			<div class="custpopup1">
				<div class="xbtn3">&times;</div>
				<h2>Manage Staff Account</h2>

				<div class="search-bar">
    				<input type="text" id="staffSearch" placeholder="Search for Staff...">
    				<div class="btn-hold">
    					<details>
    						<summary><img src="image/add.png"></summary>
    						<ul>
    							<li onclick="showStaff()">Add Staff</li>
    							
    						</ul>
    					</details>
    					<!-- <button id="show_form" onclick="showForm()">Add Category</button>
						<button id="show_prod" onclick="showProd()">Add Products</button> -->
    				</div>
				</div>
			</div>
			<div id="displayStaff">
				
			</div>
		</div>

	</div>

	<div class="ProductPopupOverlay">

		<div class="holding2">
			
			<div class="sideBar">
    			<ul>
        			<li class="category-filter selected"  data-category="Milktea">Milktea</li>
        			<li class="category-filter" data-category="Fruit Tea">Fruit Tea</li>
        			<li class="category-filter" data-category="Frappe">Frappe</li>
        			<li class="category-filter" data-category="Milkshake">Milkshake</li>
        			<li class="category-filter" data-category="Coolers">Coolers</li>
        			<li class="category-filter" data-category="Add-Ons">Add-ons</li>
        			<li class="category-filter" data-category="Egg Drop Sandwich">Egg Drop</li>
        			<li class="category-filter" data-category="Pasta">Pasta</li>
        			<li class="category-filter" data-category="Pizza">Pizza</li>
        			<li class="category-filter" data-category="Mozzarella">Mozzarella</li>
        			<li class="category-filter" data-category="Fries">Fries</li>
        			<li class="category-filter" data-category="Cheese Sticks">Cheese Sticks</li>
        			<li class="category-filter" data-category="Nachos">Nachos</li>
        			<li class="category-filter" data-category="Chicken Poppers">Chicken Poppers</li>
    			</ul>
			</div>
			<div class="search_holder">
				<div class="prod-title">
					<h2>Manage Products</h2>
				</div>
				
				<div class="search-bar">
    				<input type="text" id="productSearch" placeholder="Search for products...">
    				<div class="btn-hold">
    					<details>
    						<summary><img src="image/add.png"></summary>
    						<ul>
    							<li onclick="showForm()">Add Category</li>
    							<li onclick="showProd()">Add Products</li>
    						</ul>
    					</details>
    					<!-- <button id="show_form" onclick="showForm()">Add Category</button>
						<button id="show_prod" onclick="showProd()">Add Products</button> -->
    				</div>
				</div>
				<div class="custpopup2">
				
				<div class="xbtn2">&times;</div>
				
				<div class="product_manage"></div>

			</div>
			</div>
			
			<div class="customer_details2">
				
			</div>

		</div>

	</div>

	<!-- <div class="staffFormContainer">
    <h2>Add New Staff</h2>
    <form id="staffForm" action="/submit-staff" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="staffName">Staff Name:</label>
            <input type="text" id="staffName" name="staffName" placeholder="Enter staff name" required>
        </div>

        <div class="form-group">
            <label for="staffPicture">Upload Picture:</label>
            <input type="file" id="staffPicture" name="staffPicture" accept="image/*" required>
        </div>

        <button type="submit" class="submitBtn">Submit</button>
    </form>
</div> -->

	
	


</body>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
<script src="dougnut.js"></script>
<script src="bar.js"></script>

<script src="js/jquery.js"></script>
<script src="js/script.js"></script>


<!-- javascript to table hide and show -->
<script type="text/javascript">
	document.addEventListener('DOMContentLoaded', function() {

	const buttons = document.querySelectorAll('.tableBtnHolder button');

    function resetButtonStyles() {
        buttons.forEach(btn => {
            btn.style.backgroundColor = '';
        });
    }

    function selectButton(button) {
        resetButtonStyles();
        button.style.backgroundColor = 'green';
    }

    // Auto-select the Pending Orders button
    const defaultButton = document.getElementById('btnPending');
    selectButton(defaultButton);
    showTable('pending');

    buttons.forEach(button => {
        button.addEventListener('click', function() {
            selectButton(this);
            const orderType = this.id.replace('btn', '').toLowerCase();
            showTable(orderType);
        });
    });

    function showTable(orderType) {
        const pendingOrdersTable = document.getElementById('ordersTable'); 
        const acceptedOrdersTable = document.getElementById('acceptedOrdersTable');
        const toShipOrdersTable = document.getElementById('toShipOrdersTable');
        const completedOrdersTable = document.getElementById('completedOrdersTable');

        const tableTitle = document.getElementById('tableTitle');

        // Hide all tables
        pendingOrdersTable.style.display = 'none';
        acceptedOrdersTable.style.display = 'none';
        toShipOrdersTable.style.display = 'none';
        completedOrdersTable.style.display = 'none';

        // Show the correct table based on the order type
        if (orderType === 'pending') {
            pendingOrdersTable.style.display = 'table';
            tableTitle.textContent = 'Pending Orders';
        } else if (orderType === 'accepted') {
            acceptedOrdersTable.style.display = 'table';
            tableTitle.textContent = 'Accepted Orders';
        } else if (orderType === 'toShip') {
            toShipOrdersTable.style.display = 'table';
            tableTitle.textContent = 'To Ship Orders';
        } else if (orderType === 'completed') {
            completedOrdersTable.style.display = 'table';
            tableTitle.textContent = 'Completed Orders';
        }
    }

    // Add event listeners to buttons
    document.getElementById('btnPending').addEventListener('click', function() {
        showTable('pending');
    });
    document.getElementById('btnAccepted').addEventListener('click', function() {
        showTable('accepted');
    });
    document.getElementById('btnToShip').addEventListener('click', function() {
        showTable('toShip');
    });
    document.getElementById('btnCompleted').addEventListener('click', function() {
        showTable('completed');
    });

    // Initially show pending orders table
    showTable('pending');
});

</script>


<script type="text/javascript">
	
	

	document.getElementById("dateTimeForm").addEventListener("submit", function (e) {
        e.preventDefault(); // Prevent the default form submission behavior
        sendData();
    });
	 function showForm() {
        var form = document.getElementById('dateTimeForm');
        var overlay = document.getElementById('overlay');
        var prodDiv = document.getElementById('products');

        form.style.display = 'block';
        overlay.style.display = 'block';
        prodDiv.style.display = 'none';
    }

    function hideForm() {
        var form = document.getElementById('dateTimeForm');
        var overlay = document.getElementById('overlay');
        form.style.display = 'none';
        overlay.style.display = 'none';
    }

    function sendData() {
        var form = document.getElementById('dateTimeForm');
        form.style.display = 'none';
        hideForm();
    }
    function showAnother() {
    var form = document.getElementById('another_popup');
    var btn = document.getElementById('another');
    var size2 = document.getElementById('size2');
    var productQuantity2 = document.getElementById('productQuantity2');

    if (form.style.display === 'none' || form.style.display === '') {
        form.style.display = 'block';
        btn.innerText = "*Remove Added Field*";
    } else {
        // Reset the select and input fields
        size2.selectedIndex = 0;  // Reset to default option (Set Size)
        productQuantity2.value = '';  // Clear the input field

        // Hide the form
        form.style.display = 'none';
        btn.innerText = "*Add Another Size & Price*";
    }
}


function showAnotherFlavor1() {
    var form = document.getElementById('another_flavor1');
    var btn = document.getElementById('anotherFlavor1');

    if (form.style.display === 'none' || form.style.display === '') {
        form.style.display = 'block';
        btn.innerText = "*Remove Added Field*";
    } else {
        form.style.display = 'none';
        btn.innerText = "*Add Another Flavor*"; 
    }
}

function showAnotherFlavor2() {
    var form = document.getElementById('another_flavor2');
    var btn = document.getElementById('anotherFlavor2');

    if (form.style.display === 'none' || form.style.display === '') {
        form.style.display = 'block';
        btn.innerText = "*Remove Added Field*";
    } else {
        form.style.display = 'none';
        btn.innerText = "*Add Another Flavor #2*"; 
    }
}

function showAnotherFlavor3() {
    var form = document.getElementById('another_flavor3');
    var btn = document.getElementById('anotherFlavor3');

    if (form.style.display === 'none' || form.style.display === '') {
        form.style.display = 'block';
        btn.innerText = "*Remove Added Field*";
    } else {
        form.style.display = 'none';
        btn.innerText = "*Add Another Flavor #3*"; 
    }
}
function showAnotherFlavor4() {
    var form = document.getElementById('another_flavor4');
    var btn = document.getElementById('anotherFlavor4');

    if (form.style.display === 'none' || form.style.display === '') {
        form.style.display = 'block';
        btn.innerText = "*Remove Added Field*";
    } else {
        form.style.display = 'none';
        btn.innerText = "*Add Another Flavor #4*"; 
    }
}

function showAnotherFlavor5() {
    var form = document.getElementById('another_flavor5');
    var btn = document.getElementById('anotherFlavor5');

    if (form.style.display === 'none' || form.style.display === '') {
        form.style.display = 'block';
        btn.innerText = "*Remove Added Field*";
    } else {
        form.style.display = 'none';
        btn.innerText = "*Add Another Flavor #5*"; 
    }
}

function limitDigits(input) {
    if (input.value.length > 4) {
        input.value = input.value.slice(0, 4);
    }
}


function updateOptions() { 
    var selectedSize = document.getElementById('size1').value;
    var size2Options = document.getElementById('size2').options;

    for (var i = 0; i < size2Options.length; i++) {
        if (size2Options[i].value === selectedSize) {
            size2Options[i].disabled = true;
        } else {
            size2Options[i].disabled = false;
        }
    }
    
    var size1SelectedIndex = document.getElementById('size1').selectedIndex;
    if (size1SelectedIndex !== 0) {
        document.getElementById('size2').getElementsByTagName('option')[0].disabled = true;
    } else {
        document.getElementById('size2').getElementsByTagName('option')[0].disabled = false;
    }
}

function updateOptionsReverse() { 
    var selectedSize = document.getElementById('size2').value;
    var size1Options = document.getElementById('size1').options;

    for (var i = 0; i < size1Options.length; i++) {
        if (size1Options[i].value === selectedSize) {
            size1Options[i].disabled = true;
        } else {
            size1Options[i].disabled = false;
        }
    }
    
    var size2SelectedIndex = document.getElementById('size2').selectedIndex;
    if (size2SelectedIndex !== 0) {
        document.getElementById('size1').getElementsByTagName('option')[0].disabled = true;
    } else {
        document.getElementById('size1').getElementsByTagName('option')[0].disabled = false;
    }
}




    // added products

    document.getElementById("products").addEventListener("submit", function (e) {
        e.preventDefault(); // Prevent the default form submission behavior
        sendData();
    });
	 function showProd() {
        var form = document.getElementById('products');
        var overlay = document.getElementById('overlay');
        form.style.display = 'block';
        overlay.style.display = 'block';
    }
    function hideProd() {
        var form = document.getElementById('products');
        var overlay = document.getElementById('overlay');
        form.style.display = 'none';
        overlay.style.display = 'none';
    }
   
    function sendData() {
        var form = document.getElementById('products');
        form.style.display = 'none';
        hideForm();
    }


    function showStaff() {
    document.querySelector('.staffOverlay').style.display = 'block';
}

function hideStaff() {
    document.querySelector('.staffOverlay').style.display = 'none';
}

</script>

<script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-database.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-storage.js"></script>

<script>

        // Initialize Firebase
  const firebaseConfig = {
  apiKey: "AIzaSyCMTIQkR66Zz-ENPofBTkuxg-J1oRpaCf4",
  authDomain: "avenue-t-house.firebaseapp.com",
  databaseURL: "https://avenue-t-house-default-rtdb.firebaseio.com",
  projectId: "avenue-t-house",
  storageBucket: "avenue-t-house.appspot.com",
  messagingSenderId: "928838424164",
  appId: "1:928838424164:web:2c289e01a7744d8df57171",
  measurementId: "G-GMMWS6J7ED"
};

        firebase.initializeApp(firebaseConfig);
        
        const database = firebase.database();
        const storage = firebase.storage();
        const categorySelect = document.getElementById('categorySelect');

    // Function to populate select dropdown with categories from Firebase
    function populateCategories() {
        const categoriesRef = database.ref('category');
        categoriesRef.on('value', (snapshot) => {
            categorySelect.innerHTML = '<option disabled selected>Select Category</option>';
            snapshot.forEach((childSnapshot) => {
                const category = childSnapshot.val();
                const option = document.createElement('option');
                option.value = category;
                option.textContent = category;
                categorySelect.appendChild(option);
            });
        });
    }

    function fetchOrders() {
            const ordersRef = firebase.database().ref('Orders');
            ordersRef.on('value', (snapshot) => {
                const orders = snapshot.val();
                displayOrders(orders);
                displayAcceptedOrders(orders);
                displayShipOrders(orders);
                displayCompletedOrders(orders);
            });
        }

        // Function to display orders
function displayOrders(orders) {
    const ordersTableBody = document.getElementById('ordersTableBody');
    ordersTableBody.innerHTML = ''; 

    for (const customer in orders) {
        const customerOrders = orders[customer];
        const row = document.createElement('tr');
        row.classList.add('itemInDialog');  
        
        // Initialize strings to collect data
        let productNames = '';
        let productPrices = '';
        let quantities = '';
        let sizes = '';
        let paymentMethods = '';
        let status = '';

        let hasPendingOrder = false; // Flag to track if there is at least one pending order

        for (const orderId in customerOrders) {
            const order = customerOrders[orderId];

            // Only process orders with 'pending' status
            if (order.status === 'pending') {
                hasPendingOrder = true; // Set flag to true if a pending order is found

                // Iterate through order items
                order.items.forEach((orderItem) => {
                    productNames += orderItem.productName + '<br>'; // Collect product names
                    productPrices += orderItem.productPrice + '<br>'; // Collect product prices
                    quantities += orderItem.quantity + '<br>'; // Collect quantities
                    sizes += orderItem.size + '<br>'; // Collect sizes
                });

                // Collect payment method and status (same for all items in the order)
                paymentMethods = order.paymentMethod;
                status = order.status;
            }
        }

        // Only append the row to the table if a pending order was found
        if (hasPendingOrder) {
            // Create cells for customer and aggregated data
            const customerCell = document.createElement('td');
            customerCell.innerHTML = customer; // Display customer name
            row.appendChild(customerCell);

            const productCell = document.createElement('td');
            productCell.innerHTML = productNames; // Display all product names
            row.appendChild(productCell);

            const priceCell = document.createElement('td');
            priceCell.innerHTML = productPrices; // Display all product prices
            row.appendChild(priceCell);

            const quantityCell = document.createElement('td');
            quantityCell.innerHTML = quantities; // Display all quantities
            row.appendChild(quantityCell);

            const sizeCell = document.createElement('td');
            sizeCell.innerHTML = sizes; // Display all sizes
            row.appendChild(sizeCell);

            const paymentCell = document.createElement('td');
            paymentCell.textContent = paymentMethods;
            row.appendChild(paymentCell);

            const statCell = document.createElement('td');
            statCell.textContent = status; // Aggregated status for the row
            row.appendChild(statCell);

            // Add the action buttons
            const actionCell = document.createElement('td');
            const actionButtonsDiv = document.createElement('div');
            actionButtonsDiv.classList.add('action-buttons');

            const approveImage = document.createElement('img');
            approveImage.src = 'image/accept.png'; // Path to your approve image
            approveImage.alt = 'Approve';

            approveImage.onclick = function() {
                let orderSummary = '<table style="width:100%; text-align:center;">' +
                                   '<tr><th>Customer</th><th>Product</th><th>Quantity</th><th>Size</th><th>Price</th></tr>';
                for (const orderId in customerOrders) {
                    const order = customerOrders[orderId];
                    const fullName = order.fullName;
                    const total = order.total;
                    const orderDate = order.orderTime;

                    order.items.forEach(item => {
                        orderSummary += `<tr>
                                            <td>${fullName}</td>
                                            <td>${item.productName}</td>
                                            <td>${item.quantity}</td>
                                            <td>${item.size}</td>
                                            <td>${item.productPrice}</td>
                                        </tr>`;
                    });

                    orderSummary += `<tr>
                                        <td colspan="4" style="text-align:right;"><strong>Total:</strong></td>
                                        <td>${total}</td>
                                    </tr>`;
                    orderSummary += `<tr>
                                        <td colspan="4" style="text-align:right;"><strong>Order Date:</strong></td>
                                        <td>${orderDate}</td>
                                    </tr>`;
                }

                orderSummary += '</table>';

                // Show confirmation dialog
                Swal.fire({
                    title: 'Do you want to accept this order?',
                    html: orderSummary,
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    denyButtonText: 'No',
                    width: '70%',
                    customClass: {
                        actions: 'my-actions',
                        cancelButton: 'order-1 right-gap',
                        confirmButton: 'order-2',
                        denyButton: 'order-3',
                    },
                }).then((result) => {
                    if (result.isConfirmed) {
                        console.log('Approved', customer);

                        const acceptedTime = new Date().toLocaleString();

                        for (const orderId in customerOrders) {
                            const order = customerOrders[orderId];
                            if (order.status === 'pending') {
                                order.status = 'accepted';
                                order.acceptedTime = acceptedTime;
                                Swal.fire('Order confirmed!', '', 'success');

                                const orderRef = firebase.database().ref(`Orders/${customer}/${orderId}`);
                                orderRef.update({
                                    status: 'accepted',
                                    acceptedTime: acceptedTime
                                }).then(() => {
                                    displayOrders(orders);
                                }).catch((error) => {
                                    console.error('Error updating order status:', error);
                                });
                            }
                        }
                    } else {
                        Swal.fire('Changes are not saved', '', 'info');
                    }
                });
            };

            actionButtonsDiv.appendChild(approveImage);

            const rejectImage = document.createElement('img');
            rejectImage.src = 'image/delete.png'; // Path to your reject image
            rejectImage.alt = 'Reject';
            rejectImage.onclick = function() {
                // Handle reject action here
                console.log('Rejected', customer);
            };
            actionButtonsDiv.appendChild(rejectImage);

            actionCell.appendChild(actionButtonsDiv);
            row.appendChild(actionCell);

            ordersTableBody.appendChild(row); // Only append the row if it contains pending orders
        }
    }
} 
    












    function displayAcceptedOrders(orders) {
    const acceptedOrdersTableBody = document.getElementById('acceptedOrdersTableBody');
    acceptedOrdersTableBody.innerHTML = ''; 

    for (const customer in orders) {
        const customerOrders = orders[customer];
        const row = document.createElement('tr');
        row.classList.add('itemInDialog');  
        
        // Initialize strings to collect data
        let productNames = '';
        let productPrices = '';
        let quantities = '';
        let sizes = '';
        let paymentMethods = '';
        let status = '';

        let hasPendingOrder = false; // Flag to track if there is at least one pending order

        for (const orderId in customerOrders) {
            const order = customerOrders[orderId];

            // Only process orders with 'pending' status
            if (order.status === 'accepted') {
                hasPendingOrder = true; // Set flag to true if a pending order is found

                // Iterate through order items
                order.items.forEach((orderItem) => {
                    productNames += orderItem.productName + '<br>'; // Collect product names
                    productPrices += orderItem.productPrice + '<br>'; // Collect product prices
                    quantities += orderItem.quantity + '<br>'; // Collect quantities
                    sizes += orderItem.size + '<br>'; // Collect sizes
                });

                // Collect payment method and status (same for all items in the order)
                paymentMethods = order.paymentMethod;
                status = order.status;
            }
        }

        // Only append the row to the table if a pending order was found
        if (hasPendingOrder) {
            // Create cells for customer and aggregated data
            const customerCell = document.createElement('td');
            customerCell.innerHTML = customer; // Display customer name
            row.appendChild(customerCell);

            const productCell = document.createElement('td');
            productCell.innerHTML = productNames; // Display all product names
            row.appendChild(productCell);

            const priceCell = document.createElement('td');
            priceCell.innerHTML = productPrices; // Display all product prices
            row.appendChild(priceCell);

            const quantityCell = document.createElement('td');
            quantityCell.innerHTML = quantities; // Display all quantities
            row.appendChild(quantityCell);

            const sizeCell = document.createElement('td');
            sizeCell.innerHTML = sizes; // Display all sizes
            row.appendChild(sizeCell);

            const paymentCell = document.createElement('td');
            paymentCell.textContent = paymentMethods;
            row.appendChild(paymentCell);

            const statCell = document.createElement('td');
            statCell.textContent = status; // Aggregated status for the row
            row.appendChild(statCell);

            // Add the action buttons
            const actionCell = document.createElement('td');
            const actionButtonsDiv = document.createElement('div');
            actionButtonsDiv.classList.add('action-buttons');

            const shipOutButton = document.createElement('button');
			shipOutButton.innerText = 'Ship Out'; // Set button text
			shipOutButton.classList.add('ship-out-button');

            shipOutButton.onclick = function() {
                let orderSummary = '<table style="width:100%; text-align:center;">' +
                                   '<tr><th>Customer</th><th>Product</th><th>Quantity</th><th>Size</th><th>Price</th></tr>';
                for (const orderId in customerOrders) {
                    const order = customerOrders[orderId];
                    const fullName = order.fullName;
                    const total = order.total;
                    const orderDate = order.orderTime;


                    order.items.forEach(item => {
                        orderSummary += `<tr>
                                            <td>${fullName}</td>
                                            <td>${item.productName}</td>
                                            <td>${item.quantity}</td>
                                            <td>${item.size}</td>
                                            <td>${item.productPrice}</td>
                                        </tr>`;
                    });

                    orderSummary += `<tr>
                                        <td colspan="4" style="text-align:right;"><strong>Total:</strong></td>
                                        <td>${total}</td>
                                    </tr>`;
                    orderSummary += `<tr>
                                        <td colspan="4" style="text-align:right;"><strong>Order Date:</strong></td>
                                        <td>${orderDate}</td>
                                    </tr>`;
                    if (order.acceptedTime) {
                        orderSummary += `<tr>
                                            <td colspan="4" style="text-align:right;"><strong>Accepted At:</strong></td>
                                            <td>${order.acceptedTime}</td>
                                         </tr>`;
                    }
                }

                orderSummary += '</table>';

                // Show confirmation dialog
                Swal.fire({
                    title: 'Do you want to ship this order?',
                    html: orderSummary,
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    denyButtonText: 'No',
                    width: '70%',
                    customClass: {
                        actions: 'my-actions',
                        cancelButton: 'order-1 right-gap',
                        confirmButton: 'order-2',
                        denyButton: 'order-3',
                    },
                }).then((result) => {
                    if (result.isConfirmed) {

                        const shipTime = new Date().toLocaleString();

                        for (const orderId in customerOrders) {
                            const order = customerOrders[orderId];
                            if (order.status === 'accepted') {
                                order.status = 'in transit';
                                order.shipTime = shipTime;
                                Swal.fire('Order confirmed!', '', 'success');

                                const orderRef = firebase.database().ref(`Orders/${customer}/${orderId}`);
                                orderRef.update({
                                    status: 'in transit',
                                    shipTime: shipTime
                                }).then(() => {
                                    displayOrders(orders);
                                }).catch((error) => {
                                    console.error('Error updating order status:', error);
                                });
                            }
                        }
                    } else {
                        Swal.fire('Changes are not saved', '', 'info');
                    }
                });
            };

            actionButtonsDiv.appendChild(shipOutButton);

            actionCell.appendChild(actionButtonsDiv);
            row.appendChild(actionCell);

            acceptedOrdersTableBody.appendChild(row); // Only append the row if it contains pending orders
        }
    }
} 





















function displayShipOrders(orders) {
    const toShipOrdersTableBody = document.getElementById('toShipOrdersTableBody');
    toShipOrdersTableBody.innerHTML = ''; 

    for (const customer in orders) {
        const customerOrders = orders[customer];
        const row = document.createElement('tr');
        row.classList.add('itemInDialog');  
        
        // Initialize strings to collect data
        let productNames = '';
        let productPrices = '';
        let quantities = '';
        let sizes = '';
        let paymentMethods = '';
        let status = '';

        let hasPendingOrder = false; // Flag to track if there is at least one pending order

        for (const orderId in customerOrders) {
            const order = customerOrders[orderId];

            // Only process orders with 'pending' status
            if (order.status === 'in transit') {
                hasPendingOrder = true; // Set flag to true if a pending order is found

                // Iterate through order items
                order.items.forEach((orderItem) => {
                    productNames += orderItem.productName + '<br>'; // Collect product names
                    productPrices += orderItem.productPrice + '<br>'; // Collect product prices
                    quantities += orderItem.quantity + '<br>'; // Collect quantities
                    sizes += orderItem.size + '<br>'; // Collect sizes
                });

                // Collect payment method and status (same for all items in the order)
                paymentMethods = order.paymentMethod;
                status = order.status;
            }
        }

        // Only append the row to the table if a pending order was found
        if (hasPendingOrder) {
            // Create cells for customer and aggregated data
            const customerCell = document.createElement('td');
            customerCell.innerHTML = customer; // Display customer name
            row.appendChild(customerCell);

            const productCell = document.createElement('td');
            productCell.innerHTML = productNames; // Display all product names
            row.appendChild(productCell);

            const priceCell = document.createElement('td');
            priceCell.innerHTML = productPrices; // Display all product prices
            row.appendChild(priceCell);

            const quantityCell = document.createElement('td');
            quantityCell.innerHTML = quantities; // Display all quantities
            row.appendChild(quantityCell);

            const sizeCell = document.createElement('td');
            sizeCell.innerHTML = sizes; // Display all sizes
            row.appendChild(sizeCell);

            const paymentCell = document.createElement('td');
            paymentCell.textContent = paymentMethods;
            row.appendChild(paymentCell);

            const statCell = document.createElement('td');
            statCell.textContent = status; // Aggregated status for the row
            row.appendChild(statCell);

            // Add the action buttons
            const actionCell = document.createElement('td');
            const actionButtonsDiv = document.createElement('div');
            actionButtonsDiv.classList.add('action-buttons');

            const received = document.createElement('button');
			received.innerText = 'Received'; // Set button text
			received.classList.add('received');

            received.onclick = function() {
                let orderSummary = '<table style="width:100%; text-align:center;">' +
                                   '<tr><th>Customer</th><th>Product</th><th>Quantity</th><th>Size</th><th>Price</th></tr>';
                for (const orderId in customerOrders) {
                    const order = customerOrders[orderId];
                    const fullName = order.fullName;
                    const total = order.total;
                    const orderDate = order.orderTime;


                    order.items.forEach(item => {
                        orderSummary += `<tr>
                                            <td>${fullName}</td>
                                            <td>${item.productName}</td>
                                            <td>${item.quantity}</td>
                                            <td>${item.size}</td>
                                            <td>${item.productPrice}</td>
                                        </tr>`;
                    });

                    orderSummary += `<tr>
                                        <td colspan="4" style="text-align:right;"><strong>Total:</strong></td>
                                        <td>${total}</td>
                                    </tr>`;
                    orderSummary += `<tr>
                                        <td colspan="4" style="text-align:right;"><strong>Order Date:</strong></td>
                                        <td>${orderDate}</td>
                                    </tr>`;
                    if (order.acceptedTime) {
                        orderSummary += `<tr>
                                            <td colspan="4" style="text-align:right;"><strong>Accepted At:</strong></td>
                                            <td>${order.acceptedTime}</td>
                                         </tr>`;
                    }
                }

                orderSummary += '</table>';

                // Show confirmation dialog
                Swal.fire({
                    title: 'Do you want to received this order?',
                    html: orderSummary,
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    denyButtonText: 'No',
                    width: '70%',
                    customClass: {
                        actions: 'my-actions',
                        cancelButton: 'order-1 right-gap',
                        confirmButton: 'order-2',
                        denyButton: 'order-3',
                    },
                }).then((result) => {
                    if (result.isConfirmed) {

                        const receivedTime = new Date().toLocaleString();

                        for (const orderId in customerOrders) {
                            const order = customerOrders[orderId];
                            if (order.status === 'in transit') {
                                order.status = 'delivered';
                                order.receivedTime = receivedTime;
                                Swal.fire('Order confirmed!', '', 'success');

                                const orderRef = firebase.database().ref(`Orders/${customer}/${orderId}`);
                                orderRef.update({
                                    status: 'delivered',
                                    receivedTime: receivedTime
                                }).then(() => {
                                    displayOrders(orders);
                                }).catch((error) => {
                                    console.error('Error updating order status:', error);
                                });
                            }
                        }
                    } else {
                        Swal.fire('Changes are not saved', '', 'info');
                    }
                });
            };

            actionButtonsDiv.appendChild(received);

            actionCell.appendChild(actionButtonsDiv);
            row.appendChild(actionCell);

            toShipOrdersTableBody.appendChild(row); // Only append the row if it contains pending orders
        }
    }
} 

















function displayCompletedOrders(orders) {
    const completedOrdersTableBody = document.getElementById('completedOrdersTableBody');
    completedOrdersTableBody.innerHTML = ''; 

    for (const customer in orders) {
        const customerOrders = orders[customer];
        const row = document.createElement('tr');
        row.classList.add('itemInDialog');  
        
        // Initialize strings to collect data
        let productNames = '';
        let productPrices = '';
        let quantities = '';
        let sizes = '';
        let paymentMethods = '';
        let status = '';

        let hasPendingOrder = false; // Flag to track if there is at least one pending order

        for (const orderId in customerOrders) {
            const order = customerOrders[orderId];

            // Only process orders with 'pending' status
            if (order.status === 'delivered' || order.status === 'history') {
                hasPendingOrder = true; // Set flag to true if a pending order is found

                // Iterate through order items
                order.items.forEach((orderItem) => {
                    productNames += orderItem.productName + '<br>'; // Collect product names
                    productPrices += orderItem.productPrice + '<br>'; // Collect product prices
                    quantities += orderItem.quantity + '<br>'; // Collect quantities
                    sizes += orderItem.size + '<br>'; // Collect sizes
                });

                // Collect payment method and status (same for all items in the order)
                paymentMethods = order.paymentMethod;
                status = order.status;
            }
        }

        // Only append the row to the table if a pending order was found
        if (hasPendingOrder) {
            // Create cells for customer and aggregated data
            const customerCell = document.createElement('td');
            customerCell.innerHTML = customer; // Display customer name
            row.appendChild(customerCell);

            const productCell = document.createElement('td');
            productCell.innerHTML = productNames; // Display all product names
            row.appendChild(productCell);

            const priceCell = document.createElement('td');
            priceCell.innerHTML = productPrices; // Display all product prices
            row.appendChild(priceCell);

            const quantityCell = document.createElement('td');
            quantityCell.innerHTML = quantities; // Display all quantities
            row.appendChild(quantityCell);

            const sizeCell = document.createElement('td');
            sizeCell.innerHTML = sizes; // Display all sizes
            row.appendChild(sizeCell);

            const paymentCell = document.createElement('td');
            paymentCell.textContent = paymentMethods;
            row.appendChild(paymentCell);

            const statCell = document.createElement('td');
            statCell.textContent = status; // Aggregated status for the row
            row.appendChild(statCell);


            completedOrdersTableBody.appendChild(row); // Only append the row if it contains pending orders
        }
    }
} 



















        // Fetch orders on page load
        fetchOrders();
        // Function to display orders



    function sendData() {
            const categoryInput = document.getElementById('category').value;
            const categoriesRef = database.ref('category');

            if (categoryInput === '') {
                alert("Please enter a category.");
                return;
            }
            
            // Check if the category already exists
            categoriesRef.orderByValue().equalTo(categoryInput).once('value', (snapshot) => {
                if (snapshot.exists()) {
                    // Category already exists
                    document.getElementById('category').value = '';
                    alert("Category already exists!");
                } else {
                    // Category does not exist, proceed to add it
                    categoriesRef.once('value', (snapshot) => {
                        const categoryCount = snapshot.numChildren();
                        const newCategoryKey = 'Category' + (categoryCount + 1);

                        // Save the new category with the generated key
                        categoriesRef.child(newCategoryKey).set(categoryInput)
                            .then(() => {
                                // Data has been successfully sent to Firebase
                                console.log("Data sent successfully");
                                document.getElementById('category').value = '';
                                alert("Data sent successfully!");
                                // hideForm();
                            })
                            .catch((error) => {
                                console.error("Error sending data: ", error);
                                alert("Error sending data: " + error.message);
                            });
                    });
                }
            });
        }

    populateCategories();


    function fetchAndDisplayUsers() {
            const usersRef = database.ref('Users');
            usersRef.once('value', (snapshot) => {
                const users = snapshot.val();
                const customerListDiv = document.querySelector('.user_display');

                for (const userId in users) {
                    if (users.hasOwnProperty(userId)) {
                        const user = users[userId];
                        
                        // Create a div for each user
                        const userDiv = document.createElement('div');
                        userDiv.classList.add('user_indi');

                        // Add user information
                        userDiv.innerHTML = `
                            <p>${user.fullName}</p>
                        `;

                        // Append the user div to the customer list div
                        customerListDiv.appendChild(userDiv);
                    }
                }
            });
        }


        // function manageCustomerDisplay() {
        //     const usersRef = database.ref('Users');
        //     usersRef.once('value', (snapshot) => {
        //         const users = snapshot.val();
        //         const customerListDiv = document.querySelector('.user_manage');
        //         const customerDetailsDiv = document.querySelector('.customer_details');

        //         for (const userId in users) {
        //             if (users.hasOwnProperty(userId)) {
        //                 const user = users[userId];
                        
        //                 // Create a div for each user
        //                 const userDiv = document.createElement('div');
        //                 userDiv.classList.add('cust_manage');

        //                 // Add user information
        //                 userDiv.innerHTML = `
        //                 		<div>
								// 	<div class="indiImg"><img src="image/admin.png" alt=""></div>
        //                     		<div class="dislaying">${user.fullName} </div>
        //                 		</div>
							
        //                     	<div class="detail_holder">
        //                     		<div class="show">Show More</div>
        //                     		<details class="detCust">

        //                     		<summary><img src="image/more.png" alt=""></summary>

	       //                      		<ul class="managingBtn">
	       //                      			<li class="detBtn">Details</li>
	       //                      			<li>Restrict</li>
	       //                      			<li>Block</li>
	       //                      		</ul>
                            
        //                     		</details>
        //                     	</div>
                        	
        //                 `;

        //                 // Append the user div to the customer list div
        //                 customerListDiv.appendChild(userDiv);


        //                 const detailsButton = userDiv.querySelector('.detBtn');
        //         		detailsButton.addEventListener('click', () => {
        //             	// Show the customer details div

        //             	customerDetailsDiv.style.display = 'block';

        //             	// Update the customer details div with user information
        //             	customerDetailsDiv.innerHTML = `
        //                 	<h4>${user.fullName}</h4>
        //                 	<p>Phone: ${user.phoneNumber}</p>
        //                 	<p>Address : ${user.sitioStreet} ${user.street} ${user.town}</p>
        //                 	<!-- Add other user details here -->
        //             	`;
        //         		});

        //             }
        //         }
        //     });
        // }

        function manageCustomerDisplay() {
    const usersRef = database.ref('Users');
    usersRef.once('value', (snapshot) => {
        const users = snapshot.val();
        const customerListDiv = document.querySelector('.user_manage');
        const customerDetailsDiv = document.querySelector('.customer_details');

        for (const userId in users) {
            if (users.hasOwnProperty(userId)) {
                const user = users[userId];

                // Create a div for each user
                const userDiv = document.createElement('div');
                userDiv.classList.add('cust_manage');

                // Add user information
                userDiv.innerHTML = `
                    <div>
                        <div class="indiImg"><img src="image/admin.png" alt=""></div>
                        <div class="dislaying">${user.fullName} </div>
                    </div>
                    <div class="detail_holder">
                        <div class="show">Show More</div>
                        <details class="detCust">
                            <summary><img src="image/more.png" alt=""></summary>
                            <ul class="managingBtn">
                                <li class="detBtn">Details</li>
                                <li class="blockBtn">Block</li> <!-- Added class for Block button -->
                                <li>Restrict</li>
                            </ul>
                        </details>
                    </div>
                `;

                // Append the user div to the customer list div
                customerListDiv.appendChild(userDiv);

                const detailsButton = userDiv.querySelector('.detBtn');
                detailsButton.addEventListener('click', () => {
                    // Show the customer details div
                    customerDetailsDiv.style.display = 'block';

                    // Update the customer details div with user information
                    customerDetailsDiv.innerHTML = `
                        <h4>${user.fullName}</h4>
                        <p>Phone: ${user.phoneNumber}</p>
                        <p>Address: ${user.sitioStreet} ${user.street} ${user.town}</p>
                        <!-- Add other user details here -->
                    `;
                });

                const blockButton = userDiv.querySelector('.blockBtn');
                blockButton.addEventListener('click', () => {
                    // SweetAlert confirmation
                    Swal.fire({
                        title: `Block ${user.fullName}?`,
                        text: `Are you sure you want to block this user?`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, block',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Update Firebase with status 'blocked'
                            usersRef.child(userId).update({
                                status: 'blocked'
                            }).then(() => {
                                Swal.fire(
                                    'Blocked!',
                                    `${user.fullName} has been blocked.`,
                                    'success'
                                );
                            }).catch((error) => {
                                Swal.fire(
                                    'Error!',
                                    `There was an error blocking the user: ${error.message}`,
                                    'error'
                                );
                            });
                        }
                    });
                });
            }
        }
    });
}


    function manageProductDisplay() {
    const productsRef = database.ref('Products');
    productsRef.once('value', (snapshot) => {
        const products = snapshot.val();
        const productListDiv = document.querySelector('.product_manage');
        const productDetailsDiv = document.querySelector('.customer_details2');

        // Function to display products based on the selected category
        function displayProducts(category) {
            productListDiv.innerHTML = ''; // Clear the product list div

            for (const productId in products) {
                if (products.hasOwnProperty(productId)) {
                    const product = products[productId];

                    // Filter products by category
                    if (product.Category === category || category === 'All') {
                        // Create a div for each product
                        const productDiv = document.createElement('div');

                        productDiv.classList.add('prod_manage');
						productDiv.setAttribute('data-id', productId);
						 // productDiv.setAttribute('data-id', 'Product1')
                        productDiv.innerHTML = `
                       	  
							<div>
                                <div class="prodImg"><img src="${product.ImageURL}" alt="${product.ProductName}"></div>
                                <div class="displaying">${product.ProductName}</div>
                            </div>
                            <div class="detail_holder">
                                <div class="show">Show More</div>
                                <div class="details-wrapper">
                                    <details>
                                        <summary><img src="image/more.png" alt="More"></summary>
                                        <ul class="managingBtn">
                                            <li class="detBtn">Details</li>
                                            <li class="editBtn" data-product-id="${productId}" onclick="onEditButtonClick(this)">Edit</li>

                                            <li>Disable</li>
                                        </ul>
                                    </details>
                                </div>
                            </div>

                            
                        `;


                        // Append the product div to the product list div
                        productListDiv.appendChild(productDiv);

                        const detailsButton = productDiv.querySelector('.detBtn');
                        const detailsElement = productDiv.querySelector('details');

                        detailsButton.addEventListener('click', () => {
                            // Show the product details div
                            productDetailsDiv.style.display = 'block';

                            // Update the product details div with product information
                            productDetailsDiv.innerHTML = `
                                <h4>${product.ProductName}</h4>
                                <p>Category: ${product.Category}</p>
                                <p>Large: ${product.Large}</p>
                                <p>Small: ${product.Small}</p>
                                <img class="detImg" src="${product.ImageURL}" alt="${product.ProductName}">
                                <button class="closeBtn">Close</button>
                            `;

                            detailsElement.removeAttribute('open');

                            const closeButton = productDetailsDiv.querySelector('.closeBtn');
                            closeButton.addEventListener('click', () => {
                                productDetailsDiv.style.display = 'none';
                            });
                        });
                    }
                }
            }
        }

        // Add event listeners to sidebar items
        const categoryFilters = document.querySelectorAll('.category-filter');
        categoryFilters.forEach(filter => {
            filter.addEventListener('click', () => {
                const category = filter.getAttribute('data-category');
                displayProducts(category);
            });
        });

        // Automatically select "Milktea" category
        const milkteaFilter = document.querySelector('.category-filter[data-category="Milktea"]');
        if (milkteaFilter) {
            milkteaFilter.click();
        }
        const searchBar = document.getElementById('productSearch');
        searchBar.addEventListener('input', () => {
            const searchQuery = searchBar.value.toLowerCase();
            
            // Check if the search query matches any product names
            let foundProduct = false;
            for (const productId in products) {
                if (products.hasOwnProperty(productId)) {
                    const product = products[productId];
                    if (product.ProductName.toLowerCase().includes(searchQuery)) {
                        foundProduct = true;
                        const matchingCategory = product.Category;

                        // Select the category
                        const categoryFilter = document.querySelector(`.category-filter[data-category="${matchingCategory}"]`);
                        if (categoryFilter) {
                            categoryFilter.click();
                        }

                        // Highlight matching product
                        const productDivs = document.querySelectorAll('.prod_manage');
                        productDivs.forEach(div => {
                            const productName = div.querySelector('.displaying').textContent.toLowerCase();
                            if (productName.includes(searchQuery)) {
                                div.classList.add('highlight');
                                div.scrollIntoView({ behavior: 'smooth', block: 'center' });
                            } else {
                                div.classList.remove('highlight');
                            }
                        });
                        break;
                    }
                }
            }

            if (!foundProduct) {
                displayProducts('All', searchQuery);
            }
            if (searchQuery === '') {
                if (milkteaFilter) {
                    milkteaFilter.click();
                }
            }
        });
    });
}

        
function fetchOrdersAndCalculateTotal() {
    const ordersRef = firebase.database().ref('Orders');
    let overallTotal = 0; // Variable to hold overall total

  

    // Set up a new listener
    ordersRef.on('value', (snapshot) => {
        overallTotal = 0; // Reset the overall total for fresh calculation
        snapshot.forEach((customerSnapshot) => {
            customerSnapshot.forEach((orderSnapshot) => {
                const orderData = orderSnapshot.val();
                if (orderData) {
                    if (orderData.status === 'delivered' || orderData.status === 'history') {
                        const totalStr = orderData.total.replace("₱", "").replace(",", "").trim(); // Remove currency symbol and commas
                        const total = parseFloat(totalStr); // Convert to float
                        overallTotal += total; // Add to overall total
                    }
                }
            });
        });

        // Update the UI with the overall total
        updateTotalDisplay(overallTotal);
    });
}

// Function to update the total display in the UI
function updateTotalDisplay(total) {
    const dailyProfitElement = document.querySelector('.totalProfit'); // Ensure the correct class name
    dailyProfitElement.textContent = `₱ ${total.toLocaleString()}`; // Format and set the total with currency symbol
}

// Call the function to fetch orders and calculate total

        window.onload = function() {
    		fetchAndDisplayUsers();
    		manageCustomerDisplay();
    		manageProductDisplay();
    		fetchOrdersAndCalculateTotal();
	};


// Function to handle form cancel
function handleCancel() {


    // Hide the form overlay
    const formElement = document.getElementById('editProductsOverlay');
    if (formElement) {
        formElement.style.display = 'none';
    }
}


// Add event listener to the Cancel button
document.getElementById('cancel').addEventListener('click', hideForm);




    




function sendProd() {
    const confirmButton = document.getElementById('confirm');
    const productName = document.getElementById('productName').value;
    const size1Select = document.getElementById('size1');
    const size2Select = document.getElementById('size2');
    const productPrice1 = document.getElementById('productQuantity1').value;
    const productPrice2 = document.getElementById('productQuantity2').value;
    let productSize1 = size1Select.value;
    let productSize2 = size2Select.value;
    const selectedCategory = document.getElementById('categorySelect').value;
    const imgFile = document.getElementById('img').files[0];
    const qrIMG = document.getElementById('QrCodeIMG').files[0];

    const flavors = [];
    for (let i = 1; i <= 5; i++) {
        const flavorInput = document.getElementById('productFlavor' + i);
        if (flavorInput && flavorInput.value.trim() !== '') {
            flavors.push(flavorInput.value.trim());
        }
    }

    document.getElementById('productName').focus();

    if (productName === '') {
        alert("Please enter a product name.");
        return;
    }

    if (selectedCategory === '' || selectedCategory === 'Select Category') {
        alert("Please select a category.");
        return;
    }

    const productsRef = database.ref('Products');


    productsRef.orderByChild('ProductName').equalTo(productName).once('value', (snapshot) => {
        let productExists = false;

        snapshot.forEach((childSnapshot) => {
            const product = childSnapshot.val();
            if (product.Category === selectedCategory) {
                productExists = true;
            }
        });

        if (productExists) {
            alert("This product already exists in the selected category.");
            confirmButton.classList.remove('loading');
            confirmButton.innerHTML = 'Confirm';
            return;
        }

        // Proceed to add the new product
        productsRef.once('value', (snapshot) => {
            const productCount = snapshot.numChildren();
            const newProductKey = 'Product' + (productCount + 1);

            const storageRef = storage.ref().child('productImages/' + imgFile.name);
            const storageQr = storage.ref().child('qrImages/' + qrIMG.name);

            storageRef.put(imgFile).then((snapshot) => {
                console.log('Image uploaded successfully');
                return snapshot.ref.getDownloadURL();
            }).then((downloadURL) => {
        // Then upload the QR image
        return storageQr.put(qrIMG).then((qrSnapshot) => {
            console.log('QR image uploaded successfully');
            return qrSnapshot.ref.getDownloadURL();
        }).then((qrDownloadURL) => {
            // Create product data object
            const productData = {
                ProductName: productName,
                Category: selectedCategory,
                ImageURL: downloadURL,   // Product image URL
                QRImageURL: qrDownloadURL  // QR image URL
            };

                if (productSize1 && productSize1 !== 'Set Size') {
                    productData[productSize1] = productPrice1;
                }

                // Check if size2 is selected
                if (productSize2 && productSize2 !== 'Set Size') {
                    productData[productSize2] = productPrice2;
                }

                // Add flavors to the product data
                flavors.forEach((flavor, index) => {
                    productData['Flavor' + (index + 1)] = flavor;
                });

                // Set product data to Firebase
                return productsRef.child(newProductKey).set(productData);
                });
            }).then(() => {
                // Product data has been successfully sent to Firebase
                console.log("Product data sent successfully");
                alert("Product data sent successfully!");

                // Clear input fields and select options
                document.getElementById('productName').value = '';
                size1Select.selectedIndex = 0;
                size2Select.selectedIndex = 0;
                document.getElementById('productQuantity1').value = '';
                document.getElementById('productQuantity2').value = '';
                document.getElementById('categorySelect').selectedIndex = 0;
                document.getElementById('img').value = null;

                for (let i = 1; i <= 5; i++) {
                    const flavorInput = document.getElementById('productFlavor' + i);
                    if (flavorInput) {
                        flavorInput.value = '';
                    }
                    if (i > 1) {
                        document.getElementById('another_flavor' + (i - 1)).style.display = 'none';
                    }
                }

                document.getElementById('productName').focus();

                // hideForm(); // Uncomment if you want to hide the form after submission
            }).catch((error) => {
                // Handle errors
                console.error("Error sending product data: ", error);
                alert("Error sending product data: " + error.message);
            }).finally(() => {
                confirmButton.classList.remove('loading');
                confirmButton.innerHTML = 'Confirm';
            });
        });
    });
}

function onEditButtonClick(element) {
    const productId = element.getAttribute('data-product-id'); // Get productId from the data attribute
    const productRef = database.ref(`Products/${productId}`);
    productRef.once('value').then((snapshot) => {
        const product = snapshot.val();

        // Create the edit form template
        const editFormTemplate = `
			<form id="editProductForm">
    			<div>
        			<h2>Add Products</h2>
    			</div>
    			<div class="productsHolder">
    				<div class="txtborder Name">
    					<p>Product Name*</p>
        				<input type="text" id="editProductName" required>
    				</div>

    				<div class="txtborder Category">
    					<p>Product Category*</p>
        				<select id="editCategorySelect" required>
        				<option value="${product.Category}">${product.Category}</option>

        				</select>
    				</div>

    				<div class="txtborder">
            			<p>Product Flavor #1*</p>
            			<input type="text" id="editProductFlavor1">
            			<p id="anotherFlavor1" onclick="showAnotherFlavor1()">*Add Another flavor #2*</p>
            			<div id="another_flavor1" style="display: none;">
            			    <p>Flavor #2*</p>
            			    <input type="text" id="editProductFlavor2">
            			    <p id="anotherFlavor2" onclick="showAnotherFlavor2()">*Add Another flavor #3*</p>
            			    <div id="another_flavor2" style="display: none;">
            			        <p>Flavor #3*</p>
            			        <input type="text" id="editProductFlavor3">
            			        <p id="anotherFlavor3" onclick="showAnotherFlavor3()">*Add Another flavor #4*</p>
            			        <div id="another_flavor3" style="display: none;">
            			            <p>Flavor #4*</p>
            			            <input type="text" id="editProductFlavor4">
            			            <p id="anotherFlavor4" onclick="showAnotherFlavor4()">*Add Another flavor #5*</p>
            			            <div id="another_flavor4" style="display: none;">
            			                <p>Flavor #5*</p>
            			                <input type="text" id="editProductFlavor5">
            			            </div>
            			        </div>
            			    </div>
            			</div>
        			</div>

    				<div class="txtborder Price">
        				<div class="file_holder">
        					<p>Upload Product Image*</p>
        					<input type="file" name="" id="img">
        				</div>
        			</div>


    				<div class="txtborder">
    					<p>Product Price*</p>
    					<div id="holderSize">
        					<div>
        						

								<input type="text" id="size1">

        					</div>
        					<div>
        						<input type="number" id="editProductPrice" name="" placeholder="Enter Price" required oninput="limitDigits(this)">
        					</div>
        				</div>

        			<p id="another" onclick="showAnother()">*Add Another Size & Price*</p>
        			<div id="another_popup">
        				<div id="holderSize">
        					<div>
        						<select id="size2">
        							<option disabled selected>Set Size</option>
        							<option value="Regular">Regular</option>
        							<option value="Large">Large</option>
        							<option value="Small">Small</option>
        						</select>
        					</div>
        					<div>
        						<input type="number" id="productQuantity2" name="" placeholder="Enter Price" required oninput="limitDigits(this)">
        					</div>
        				</div>
        			</div>

    				</div>

    				<div class="txtborder Price">
        				<div class="file_holder">
        					<p>Upload Product Qr Code*</p>
        					<input type="file" name="" id="QrCodeIMG">
        				</div>
        			</div>
    				
        			
    			</div>
    			<div class="button_holder">
        			<div>
        				<button id="cancel" class="cancelBtn" onclick="hideProd()">Cancel</button>
        			</div>
        			<div>
    					<button type="button" id="confirm" onclick="editProd()">Confirm</button>
    				</div>
    			</div>  
			</form>
        `;

        // Show SweetAlert with the edit form
        Swal.fire({
            html: editFormTemplate,
            showCloseButton: true,
            showCancelButton: false,
            showConfirmButton: false, // Hide the OK button
            focusConfirm: false,
            width: '70%',
            didOpen: () => {
                // Populate the fields with product data
                document.getElementById('editProductName').value = product.ProductName;
        		document.getElementById('editProductPrice').value = product.Price;

const sizeInput = document.getElementById('size1');
const priceField = document.getElementById('editProductPrice');

// Log the product data to ensure it has the expected structure
console.log("Product data:", product);

if (product.Small) {
    console.log("Setting size to Small and price to", product.Small);
    sizeInput.value = 'Small'; // Set the size to Small
    priceField.value = product.Small; // Set the price to Small's value
} 
else if (product.Large) {
    console.log("Setting size to Large and price to", product.Large);
    sizeInput.value = 'Large'; // Set the size to Large
    priceField.value = product.Large; // Set the price to Large's value
} 
else if (product.Regular) {
    console.log("Setting size to Regular and price to", product.Regular);
    sizeInput.value = 'Regular'; // Set the size to Regular
    priceField.value = product.Regular; // Set the price to Regular's value
} else {
    console.log("No valid size found in product data.");
}





        		// Populate flavor fields if they exist
        		if (product.Flavor1) document.getElementById('editProductFlavor1').value = product.Flavor1;
        		if (product.Flavor2) {
            		document.getElementById('editProductFlavor2').value = product.Flavor2;
            		document.getElementById('another_flavor1').style.display = 'block';
        		}
        		if (product.Flavor3) {
            		document.getElementById('editProductFlavor3').value = product.Flavor3;
            		document.getElementById('another_flavor2').style.display = 'block';
        		}
        		if (product.Flavor4) {
            		document.getElementById('editProductFlavor4').value = product.Flavor4;
            		document.getElementById('another_flavor3').style.display = 'block';
        		}
        		if (product.Flavor5) {
            		document.getElementById('editProductFlavor5').value = product.Flavor5;
            		document.getElementById('another_flavor4').style.display = 'block';
        		}
        		// Set the selected category if applicable
        		document.getElementById('editCategorySelect').value = product.Category;
            		}
        		});
    		}).catch((error) => {
        		console.error('Error retrieving product data:', error);
    		});
	}		

function editProd(productId) {
    const productName = document.getElementById('editProductName').value;
    const productPrice = document.getElementById('editProductPrice').value;
    const productFlavor1 = document.getElementById('editProductFlavor1').value;
    const productFlavor2 = document.getElementById('editProductFlavor2').value;
    const productFlavor3 = document.getElementById('editProductFlavor3').value;
    const productFlavor4 = document.getElementById('editProductFlavor4').value;
    const productFlavor5 = document.getElementById('editProductFlavor5').value;
    const category = document.getElementById('editCategorySelect').value;

    const productRef = database.ref(`Products/${productId}`);
    productRef.update({
        ProductName: productName,
        Price: productPrice,
        Flavor1: productFlavor1,
        Flavor2: productFlavor2,
        Flavor3: productFlavor3,
        Flavor4: productFlavor4,
        Flavor5: productFlavor5,
        Category: category,
        // Include other fields as necessary
    }).then(() => {
        Swal.fire('Product updated successfully!', '', 'success');
        // Optionally refresh the product list or close the modal
    }).catch((error) => {
        console.error('Error updating product:', error);
        Swal.fire('Error updating product', '', 'error');
    });
}



// Reference to the "Products" node in Firebase
const productsRef = firebase.database().ref('Products');

// Function to update the count
function updateProductCount() {
    productsRef.once('value', (snapshot) => {
        // Get the count of child nodes under "Products"
        const productCount = snapshot.numChildren();

        // Update the HTML with the product count
         document.querySelector('.prodNum').innerText = productCount;
    });
}

// Call the function initially to set the initial count
updateProductCount();

// Listen for changes in the "Products" node and update the count accordingly
productsRef.on('child_added', updateProductCount);
productsRef.on('child_removed', updateProductCount);


// code for displaying registered customer
const customerRef = firebase.database().ref('Users');
function updateRegCustomer() {
    customerRef.once('value', (snapshot) => {
        // Get the count of child nodes under "Products"
        const productCount = snapshot.numChildren();

        // Update the HTML with the product count
         document.querySelector('.custNum').innerText = productCount;
    });
}

// Call the function initially to set the initial count
updateRegCustomer();

// Listen for changes in the "Products" node and update the count accordingly
customerRef.on('child_added', updateRegCustomer);
customerRef.on('child_removed', updateRegCustomer);

// code for sending staff to firebase

function sendStaff() {
    // Retrieve form values
    const staffName = document.getElementById('staffName').value;
    const gender = document.querySelector('select').value;
    const staffNumber = document.getElementById('staffNumber').value;
    const staffGmail = document.getElementById('staffGmail').value;
    const staffAddress = document.getElementById('staffAddress').value;
    const staffPosition = document.getElementById('staffPosition').value;
    const staffImage = document.getElementById('staffImage').files[0]; // Get selected file

    // Validate phone number length
    if (staffNumber.length > 11) {
        alert('Phone number cannot exceed 11 digits.');
        return;
    }

    // Create staff object
    const staffData = {
        name: staffName,
        gender: gender,
        phoneNumber: staffNumber,
        gmail: staffGmail,
        address: staffAddress,
        position: staffPosition
    };

    if (staffImage) {
        const storageRef = storage.ref('staffImages/' + staffImage.name);

        const uploadTask = storageRef.put(staffImage);

        uploadTask.on('state_changed', (snapshot) => {
            const progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
            console.log('Upload is ' + progress + '% done');
        }, (error) => {
            // Handle errors here
            console.error('Upload failed:', error);
        }, () => {
            uploadTask.snapshot.ref.getDownloadURL().then((downloadURL) => {
                staffData.imageURL = downloadURL;

                database.ref('Staff/' + staffName).set(staffData)
                    .then(() => {
                        alert('Staff added successfully!');
                        document.getElementById('staff_form').reset();
                    })
                    .catch((error) => {
                        console.error('Error adding staff:', error);
                    });
            });
        });
    } else {
        database.ref('Staff/' + staffName).set(staffData)
            .then(() => {
                alert('Staff added successfully!');
                document.getElementById('staff_form').reset();
            })
            .catch((error) => {
                console.error('Error adding staff:', error);
            });
    }
}
function displayStaff() {
    const displayStaffDiv = document.getElementById('displayStaff');
    displayStaffDiv.innerHTML = ''; // Clear previous data

    // Get staff data from Firebase Realtime Database
    const staffRef = database.ref('Staff');

    staffRef.once('value', (snapshot) => {
        snapshot.forEach((childSnapshot) => {
            const staffData = childSnapshot.val();
            const staffName = staffData.name;
            const staffPosition = staffData.position;
            const staffImageURL = staffData.imageURL; // URL of the staff image

            // Create staff element
            const staffDiv = document.createElement('div');
            staffDiv.classList.add('staff');

            // Create image element if URL exists
            const imageElement = staffImageURL ? 
                `<img src="${staffImageURL}" alt="${staffName}'s Image" class="staff-image">` : 
                `<img src="image/default.png" alt="Default Image" class="staff-image">`;

            staffDiv.innerHTML = `
                <div class="staff-info">
                    <div class="staffIMG">
						${imageElement}
					</div>
					<div class="staffN">
						<p>${staffName}</p>
					</div>
					<div class="staffPos">
						<p>Position : ${staffPosition}</p>
					</div>
                </div>
            `;

            // Append staff element to displayStaff div
            displayStaffDiv.appendChild(staffDiv);
        });
    });
}

displayStaff();






</script>
</html>