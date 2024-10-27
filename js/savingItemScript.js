

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
	                            			<li>Restrict</li>
	                            			<li>Block</li>
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
                        	<p>Address : ${user.sitioStreet} ${user.street} ${user.town}</p>
                        	<!-- Add other user details here -->
                    	`;
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
                                            <li class="editBtn" onclick="handleEdit(event)">Edit</li>
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

        

        window.onload = function() {
    		fetchAndDisplayUsers();
    		manageCustomerDisplay();
    		manageProductDisplay();
	};


// Function to handle form cancel
// Function to handle cancel button click
function handleCancel() {
    // Reset the form
    const form = document.getElementById('productForm');
    if (form) {
        form.reset(); // Reset form fields
    }

    // Hide the form overlay
    const formElement = document.getElementById('overlay');
    if (formElement) {
        formElement.style.display = 'none';
    }

    // Ensure the form is hidden and ready for the next display
    const formContainer = document.getElementById('formContainer');
    if (formContainer) {
        formContainer.style.display = 'none'; // Hide form container
    }
}

// Function to handle edit button click
function handleEdit(event) {
    console.log('Edit button clicked');
    const productDiv = event.target.closest('.prod_manage');
    if (!productDiv) {
        console.error("Product div not found");
        return;
    }

    const productId = productDiv.dataset.id;
    if (!productId) {
        console.error("Product ID not found");
        return;
    }

    console.log('Product ID:', productId);
    const productRef = database.ref('Products/' + productId);

    productRef.once('value').then((snapshot) => {
        const product = snapshot.val();
        if (!product) {
            console.error("Product data not found");
            return;
        }
        console.log('Product data:', product);

        // Populate the form with product details
        document.getElementById('productName').value = product.ProductName || '';
        console.log('Product Name:', product.ProductName);

        document.getElementById('categorySelect').value = product.Category || '';
        console.log('Product Category:', product.Category);

        // Check and populate product sizes and prices
        document.getElementById('size1').value = product.Small ? 'Small' : 'Set Size';
        document.getElementById('productQuantity1').value = product.Small || '';
        console.log('Small Size Price:', product.Small);

        document.getElementById('size2').value = product.Large ? 'Large' : 'Set Size';
        document.getElementById('productQuantity2').value = product.Large || '';
        console.log('Large Size Price:', product.Large);

        // Populate flavors if they exist
        for (let i = 1; i <= 5; i++) {
            const flavorKey = 'Flavor' + i;
            const flavorInput = document.getElementById('productFlavor' + i);
            const flavorContainer = document.getElementById('another_flavor' + (i - 1));
            if (product[flavorKey]) {
                flavorInput.value = product[flavorKey];
                console.log(`Flavor ${i}:`, product[flavorKey]);
                if (i > 1 && flavorContainer) {
                    flavorContainer.style.display = 'block';
                }
            } else if (flavorInput) {
                flavorInput.value = '';
                if (i > 1 && flavorContainer) {
                    flavorContainer.style.display = 'none';
                }
            }
        }

        // Show the form and overlay
        const formElement = document.getElementById('overlay');
        const formContainer = document.getElementById('formContainer');
        if (formElement) {
            formElement.style.display = 'block';
            formElement.style.zIndex = '999'; // Ensure the form appears in front
        }
        if (formContainer) {
            formContainer.style.display = 'block'; // Ensure the form container is visible
        }
        console.log('Form displayed');
    }).catch((error) => {
        console.error("Error fetching product data: ", error);
    });
}

// Add event listener to the Cancel button
document.getElementById('cancel').addEventListener('click', handleCancel);




    




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
            confirmButton.classList.remove('loading');
            confirmButton.innerHTML = 'Confirm';
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

                // Add flavors to the product data
                flavors.forEach((flavor, index) => {
                    productData['Flavor' + (index + 1)] = flavor;
                });

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




// function sendProd() {
//     const confirmButton = document.getElementById('confirm');
//     const productName = document.getElementById('productName').value;
//     const size1Select = document.getElementById('size1');
//     const size2Select = document.getElementById('size2');
//     const productPrice1 = document.getElementById('productQuantity1').value;
//     const productPrice2 = document.getElementById('productQuantity2').value;
//     let productSize1 = size1Select.value;
//     let productSize2 = size2Select.value;
//     const selectedCategory = document.getElementById('categorySelect').value;
//     const imgFile = document.getElementById('img').files[0];

//     // Get product flavors
//     const productFlavor1 = document.getElementById('productFlavor').value;
//     const productFlavor2 = document.getElementById('productFlavor2') ? document.getElementById('productFlavor2').value : '';
//     const productFlavor3 = document.getElementById('productFlavor3') ? document.getElementById('productFlavor3').value : '';
//     const productFlavor4 = document.getElementById('productFlavor4') ? document.getElementById('productFlavor4').value : '';
//     const productFlavor5 = document.getElementById('productFlavor5') ? document.getElementById('productFlavor5').value : '';

//     document.getElementById('productName').focus();
    
//     if (productName === '') {
//         alert("Please enter a product name.");
//         return;
//     }

//     const productsRef = database.ref('Products');

//     // Check if the product already exists
//     productsRef.orderByChild('ProductName').equalTo(productName).once('value', (snapshot) => {
//         let productExists = false;

//         snapshot.forEach((childSnapshot) => {
//             const product = childSnapshot.val();
//             if (product.Category === selectedCategory) {
//                 productExists = true;
//             }
//         });

//         if (productExists) {
//             alert("This product already exists in the selected category.");
//             confirmButton.classList.remove('loading');
//             confirmButton.innerHTML = 'Confirm';
//             return;
//         }

//         // Proceed to add the new product
//         productsRef.once('value', (snapshot) => {
//             const productCount = snapshot.numChildren();
//             const newProductKey = 'Product' + (productCount + 1);

//             const storageRef = storage.ref().child('productImages/' + imgFile.name);

//             storageRef.put(imgFile).then((snapshot) => {
//                 console.log('Image uploaded successfully');
//                 return snapshot.ref.getDownloadURL();
//             }).then((downloadURL) => {
//                 // Create product data object
//                 const productData = {
//                     ProductName: productName,
//                     Category: selectedCategory,
//                     ImageURL: downloadURL,
//                     Flavors: []
//                 };

//                 // Add flavors to product data
//                 if (productFlavor1) productData.Flavors.push(productFlavor1);
//                 if (productFlavor2) productData.Flavors.push(productFlavor2);
//                 if (productFlavor3) productData.Flavors.push(productFlavor3);
//                 if (productFlavor4) productData.Flavors.push(productFlavor4);
//                 if (productFlavor5) productData.Flavors.push(productFlavor5);

//                 // Check if size1 is selected
//                 if (productSize1 && productSize1 !== 'Set Size') {
//                     productData[productSize1] = productPrice1;
//                 }

//                 // Check if size2 is selected
//                 if (productSize2 && productSize2 !== 'Set Size') {
//                     productData[productSize2] = productPrice2;
//                 }

//                 // Set product data to Firebase
//                 return productsRef.child(newProductKey).set(productData);
//             }).then(() => {
//                 // Product data has been successfully sent to Firebase
//                 console.log("Product data sent successfully");
//                 alert("Product data sent successfully!");

//                 // Clear input fields and select options
//                 document.getElementById('productName').value = '';
//                 size1Select.selectedIndex = 0;
//                 size2Select.selectedIndex = 0;
//                 document.getElementById('productQuantity1').value = '';
//                 document.getElementById('productQuantity2').value = '';
//                 document.getElementById('categorySelect').selectedIndex = 0;
//                 document.getElementById('img').value = null;

//                 document.getElementById('productFlavor').value = '';
//                 if (document.getElementById('productFlavor2')) document.getElementById('productFlavor2').value = '';
//                 if (document.getElementById('productFlavor3')) document.getElementById('productFlavor3').value = '';
//                 if (document.getElementById('productFlavor4')) document.getElementById('productFlavor4').value = '';
//                 if (document.getElementById('productFlavor5')) document.getElementById('productFlavor5').value = '';

//                 document.getElementById('productName').focus();

//                 // hideForm(); // Uncomment if you want to hide the form after submission
//             }).catch((error) => {
//                 // Handle errors
//                 console.error("Error sending product data: ", error);
//                 alert("Error sending product data: " + error.message);
//             }).finally(() => {
//                 confirmButton.classList.remove('loading');
//                 confirmButton.innerHTML = 'Confirm';
//             });
//         });
//     });
// }


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