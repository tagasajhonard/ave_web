
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin</title>
</head>
<style type="text/css">
	 form {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
    </style>
<body>

	<div class="nav">
		
		<ul>
			<div class="name">
				<p>ADMIN</p>
			</div>
			<div class="anchor">

				<a href="admin.php"><div class="flex">
					<div class="li_img">
						<img src="image/home.png">
					</div>
					<div class="li_name">
						<li>DASHBOARD</li>
					</div>
				</div></a>

				<a href="candidate.php"><div class="flex">
					<div class="li_img">
						<img src="image/candidate.png">
					</div>
					<div class="li_name">
						<li>CANDIDATE</li>
					</div>
				</div></a>

				<a href="#"><div class="flex">
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

				<a href="#"><div class="flex">
					<div class="li_img">
						<img src="image/setting.png">
					</div>
					<div class="li_name setting">
						<li>SETTINGS</li>
						<span>&plus;</span>
					</div>
				</div></a>
					<ul class="sub_menu">
						<a href=""><li>add candidates</li></a>
						<a href=""><li>add candidates</li></a>
					</ul>
				
			</div>
			
			
		</ul>
	</div>
	<?php 

session_start();

if (!isset($_SESSION['userID'])) {
    header('Location: login.php');
    exit();
}

function logout() {
    $_SESSION = array();
    session_destroy();
    header('Location: login.php');
    exit();
}

if (isset($_POST['logout'])) {
    logout();
}


// Logout button


?>
	
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

			<div class="card_container">
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
							<img src="image/job-offer.png">	
						</div>
					</div>
		    	</div>

		    	<div class="card">
					<div class="reg_voters">
						<p>Daily Profit</p>
					</div>
					<div class="card_icon">
						<div class="numbers">
							<p class="prodNum">00</p>
						</div>
						<div>
							<img src="image/job-offer.png">	
						</div>
					</div>
		    	</div>

			</div>
			

			<div id="overlay">

			<form id="dateTimeForm">
    			<div id="closeButton" onclick="hideForm()">X</div>
    
    			<div>
        			<h2>Add Category</h2>
    			</div>
    			<div>
        			<input type="text" id="category"  placeholder="Category Name" required>
    			</div>
    			<div>
        			<button type="button" id="confirm" onclick="sendData()">Confirm</button>
    			</div>  
			</form>

			<form id="products">
    			<div>
        			<h2>Add Products</h2>
    			</div>
    			<div>
    				<div class="txtborder">
    					<p>Product Name*</p>
        				<input type="text" id="productName" required autofocus>
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
        						<input type="number" id="productQuantity1" name="" placeholder="Enter Price" required>
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
        						<input type="number" id="productQuantity2" name="" placeholder="Enter Price" required>
        					</div>
        				</div>
        			</div>

    				</div>
    				<div class="txtborder">
    					<p>Product Category*</p>
        				<select id="categorySelect" required>
        				</select>
    				</div>
        			<div class="txtborder">
        				<div class="file_holder">
        					<p>Upload Image*</p>
        					<input type="file" name="" id="img">
        				</div>
        			</div>
    			</div>
    			<div class="button_holder">
        			<div>
        				<button id="cancel" onclick="hideProd()">Cancel</button>
        			</div>
        			<div>
    					<button type="button" id="confirm" onclick="sendProd()">Confirm</button>
    				</div>
    			</div>  
			</form>
			</div>

    			<div id="show_winner">
    				<div>
    					<button id="show_form" onclick="showForm()">Add Category</button>
    				</div>
    				<div>
    					<button id="show_prod" onclick="showProd()">Add Products</button>
    				</div>
    				<div>
    					<a href="message.php"><button id="show_prod">Chats</button></a>
    				</div>
    			</div>

			

			<div class="partlist_holder">
				<div class="partylist1">
            		<div class="order">
                		<p>Pending Orders</p>
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
        		</div>
        		
				
				<div class="partylist2">
						<div class="chart">
							<canvas id="dougnutChart"></canvas>
						</div>
						<div class="chart">
							<canvas id="barChart" width="300px" height="300px"></canvas>
						</div>
				</div>
			</div>
		</div>
	</section>
	

	


</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
<script src="dougnut.js"></script>
<script src="bar.js"></script>

<script type="text/javascript">
	document.getElementById("dateTimeForm").addEventListener("submit", function (e) {
        e.preventDefault(); // Prevent the default form submission behavior
        sendData();
    });
	 function showForm() {
        var form = document.getElementById('dateTimeForm');
        var overlay = document.getElementById('overlay');
        form.style.display = 'block';
        overlay.style.display = 'block';
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

    console.log("Button clicked");

    if (form.style.display === 'none' || form.style.display === '') {
        console.log("Showing form");
        form.style.display = 'block';
        btn.innerText = "*Remove Added Field*";
    } else {
        console.log("Hiding form");
        form.style.display = 'none';
        btn.innerText = "*Add Another Size & Price*"; 
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
            });
        }

        // Function to display orders
        function displayOrders(orders) {
            const ordersTableBody = document.getElementById('ordersTableBody');
            ordersTableBody.innerHTML = ''; // Clear the existing content

            for (const customer in orders) {
                for (const orderId in orders[customer]) {
                    const order = orders[customer][orderId];
                    const orderItem = order.items[0]; // Assuming one item per order for simplicity

                    if (orderItem.orderStatus === 'pending') {
                        const row = document.createElement('tr');
                        
                        
                        const customerCell = document.createElement('td');
                        customerCell.textContent = order.fullName;
                        row.appendChild(customerCell);

                        const productCell = document.createElement('td');
                        productCell.textContent = orderItem.productName;
                        row.appendChild(productCell);

                        const priceCell = document.createElement('td');
                        priceCell.textContent = orderItem.productPrice;
                        row.appendChild(priceCell);

                        const quantityCell = document.createElement('td');
                        quantityCell.textContent = orderItem.quantity;
                        row.appendChild(quantityCell);

                        const sizeCell = document.createElement('td');
                        sizeCell.textContent = orderItem.size;
                        row.appendChild(sizeCell);

                        const paymentCell = document.createElement('td');
                        paymentCell.textContent = orderItem.size;
                        row.appendChild(paymentCell);

                        const statCell = document.createElement('td');
                        statCell.textContent = orderItem.size;
                        row.appendChild(statCell);

                        // const imageCell = document.createElement('td');
                        // const img = document.createElement('img');
                        // img.src = orderItem.productImageUrl;
                        // img.alt = orderItem.productName;
                        // img.width = 50; // Set image width
                        // imageCell.appendChild(img);
                        // row.appendChild(imageCell);
                        const actionCell = document.createElement('td');
                        const actionButtonsDiv = document.createElement('div');
                        actionButtonsDiv.classList.add('action-buttons');

                        const approveImage = document.createElement('img');
                        approveImage.src = 'image/accept.png'; // Path to your approve image
                        approveImage.alt = 'Approve';
                        approveImage.onclick = function() {
                            // Handle approve action here
                            console.log('Approved', orderId);
                        };
                        actionButtonsDiv.appendChild(approveImage);

                        const rejectImage = document.createElement('img');
                        rejectImage.src = 'image/delete.png'; // Path to your image
                        rejectImage.alt = 'Reject';
                        rejectImage.onclick = function() {
                            // Handle reject action here
                            console.log('Rejected', orderId);
                        };
                        actionButtonsDiv.appendChild(rejectImage);

                        actionCell.appendChild(actionButtonsDiv);
                        row.appendChild(actionCell);

                        ordersTableBody.appendChild(row);
                    }
                }
            }
        }

        // Fetch orders on page load
        fetchOrders();

    // Function to save new category to Firebase
    //  function sendData() {
    //     const categoryInput = document.getElementById('category').value;
    //     const categoriesRef = database.ref('category');
        
    //     categoriesRef.once('value', (snapshot) => {
    //         const categoryCount = snapshot.numChildren();
            
    //         const newCategoryKey = 'Category' + (categoryCount + 1);
            
    //         // Save the new category with the generated key
    //         categoriesRef.child(newCategoryKey).set(categoryInput)
    //             .then(() => {
    //                 // Data has been successfully sent to Firebase
    //                 console.log("Data sent successfully");
    //                 alert("Data sent successfully!");
    //                 hideForm()
    //             })
    //             .catch((error) => {
    //                 console.error("Error sending data: ", error);
    //                 alert("Error sending data: " + error.message);
    //             });
    //     });
    // }

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

function sendProd() {
    const productName = document.getElementById('productName').value;
    const size1Select = document.getElementById('size1');
    const size2Select = document.getElementById('size2');
    const productPrice1 = document.getElementById('productQuantity1').value;
    const productPrice2 = document.getElementById('productQuantity2').value;
    let productSize1 = size1Select.value;
    let productSize2 = size2Select.value;
    const selectedCategory = document.getElementById('categorySelect').value;
    const imgFile = document.getElementById('img').files[0];

    document.getElementById('productName').focus();
    
    if (productName === '') {
        alert("Please enter a product name.");
        return;
    }
    
    // Check if a category is selected
    if (selectedCategory === 'Select Category') {
        alert('Please select a category.');
        return;
    }
    
    const productsRef = database.ref('Products');

    // Check if the product already exists
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
            return;
        }

        // Proceed to add the new product
        productsRef.once('value', (snapshot) => {
            const productCount = snapshot.numChildren();
            const newProductKey = 'Product' + (productCount + 1);

            const storageRef = storage.ref().child('productImages/' + imgFile.name);

            storageRef.put(imgFile).then((snapshot) => {
                console.log('Image uploaded successfully');
                return snapshot.ref.getDownloadURL();
            }).then((downloadURL) => {
                // Create product data object
                const productData = {
                    ProductName: productName,
                    Category: selectedCategory,
                    ImageURL: downloadURL
                };

                // Check if size1 is selected
                if (productSize1 && productSize1 !== 'Set Size') {
                    productData[productSize1] = productPrice1;
                }

                // Check if size2 is selected
                if (productSize2 && productSize2 !== 'Set Size') {
                    productData[productSize2] = productPrice2;
                }

                // Set product data to Firebase
                return productsRef.child(newProductKey).set(productData);
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

                document.getElementById('productName').focus();

                // hideForm(); // Uncomment if you want to hide the form after submission
            }).catch((error) => {
                // Handle errors
                console.error("Error sending product data: ", error);
                alert("Error sending product data: " + error.message);
            });
        });
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



</script>
</html>